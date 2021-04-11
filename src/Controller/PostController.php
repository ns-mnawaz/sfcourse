<?php

namespace App\Controller;

use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Post;

/**
 * @Route("/post", name="post.")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param PostRepository $postRepository
     * @return Response
     */
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [ 'posts' => $posts ]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response{
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            /**
             * @var UploadedFile $file
             */
            $file = $request->files->get('post')['image_attachment'];

            if($file){
                $filename = md5(uniqid()). '.'.$file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $filename
                );
                $post->setImage($filename);
            }

            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'Post was created ✅');

            return $this->redirectToRoute('post.index', [ ]);
        }

        return $this->render('post/create.html.twig', [ 'form' => $form->createView() ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     * @param $id
     * @param PostRepository $postRepository
     * @return Response
     */
    public function show($id, PostRepository $postRepository): Response {
        $post = $postRepository->find($id);

        return $this->render('post/show.html.twig', [ 'post'=>$post ]);
    }

    /**
     * @Route("/remove/{id}", name="remove")
     * @param Post $post
     * @return Response
     */
    public function remove(Post $post): Response {
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post was removed ✅');

        return $this->redirectToRoute('post.index', [ ]);
    }
}
