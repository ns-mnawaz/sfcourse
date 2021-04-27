<?php

namespace App\Tests;

use App\Entity\User;

class UserTest extends DatabaseDependentTestCase
{
    /**
     * @test User Record Created In Database
     */
    public function testItCreateUserRecord(){

        $user = new User();
        $password = 'password';
        $username = 'username';
        $roles = [0 => 'ADMIN', 2 => 'ROLE_USER'];
        $user->setPassword($password);
        $user->setUsername($username);
        $user->setRoles($roles);

        $this->entityManager->persist($user);

        $this->entityManager->flush();

        $userRepository = $this->entityManager->getRepository(User::class);

        $userRecord = $userRepository->findOneBy(['username' => $username]);

        $this->assertEquals($username, $userRecord->getUsername());
        $this->assertEquals($password, $userRecord->getPassword());
        $this->assertEquals($roles, $userRecord->getRoles());
    }
}
