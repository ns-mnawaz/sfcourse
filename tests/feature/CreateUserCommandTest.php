<?php


namespace App\Tests\feature;


use App\Entity\User;
use App\Tests\DatabaseDependentTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CreateUserCommandTest extends DatabaseDependentTestCase
{

    /**
     * @test
     */

    public function testCreateUserCommand(): void
    {
        $application = new Application(self::$kernel);

        $command = $application->find('app:create-user');

        $commandTester = new CommandTester($command);

        $username = 'username';
        $password = 'password';
        $roles = 'ADMIN,ROLE_USER';

        $commandTester->execute([
            'username' => $username,
            'password' => $password,
            'roles' => $roles
        ]);

        $repo = $this->entityManager->getRepository(User::class);

        $userRecord = $repo->findOneBy(['username' => $username]);

        $this->assertEquals($username, $userRecord->getUsername());
        $this->assertEquals($password, $userRecord->getPassword());
        $this->assertEquals([0 => 'ADMIN', 1 => 'ROLE_USER'], $userRecord->getRoles());

    }
}
