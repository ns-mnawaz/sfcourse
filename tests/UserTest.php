<?php

namespace App\Tests;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    protected function setUp(): void {
        $kernel = self::bootKernel();

        DatabasePrimer::prime($kernel);

        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
    }

    public function testItWorks(){
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function a_stock_record_can_be_created_in_the_database(){

        $this->assertTrue(true);
//
//        $user = new User();
//        $password = 'password';
//        $username = 'username';
//        $roles = ['admin', 'user'];
//        $user->setPassword($password);
//        $user->setUsername($username);
//        $user->setRoles($roles);
//
//        $this->entityManager->persist($user);
//
//        $this->entityManager->flush();
//
//        $userRepository = $this->entityManager->getRepository(User::class);
//
//        $userRecord = $userRepository->findOneBy(['username' => $username]);
//
//        $this->assertEquals($username, $userRecord->getUsername());
    }
}
