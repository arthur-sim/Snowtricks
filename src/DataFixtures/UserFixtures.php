<?php

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users=[];
        foreach ($this->getUserData() as [ $email, $username, $password, $roles]) {
            $user = (new User())
                    ->setEmail($email)
                    ->setUsername($username)
                    ->setPassword($password)
                    ->setRoles($roles);
            $manager->persist($user);
            $users[]=$user;
            
        }
        $this->addReference('users',$users);
 
        $manager->flush();
    }
 
    private function getUserData(): array
    {
        return [
            ['test1@test.com','admin','password',['ROLE_ADMIN']],
            ['test2@test.com','admin2','password',['ROLE_ADMIN']],
            ['test3@test.com','admin3','password',['ROLE_ADMIN']]
        ];
    }
 
 
}

