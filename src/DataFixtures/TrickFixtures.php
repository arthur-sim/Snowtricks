<?php

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users= $this->getReference('users');
        $tricks=[];
        foreach ($this->getTrickData() as [ $title, $content]) {
            $trick = (new Trick())
                    ->setTitle($title)
                    ->setContent($content)
                    ->setUser($users[rand(0,2)]);                   
            $manager->persist($trick);
            $tricks[]=$trick;            
        }
        $this->addReference('tricks',$tricks);
 
        $manager->flush();
    }
 
    private function getTrickData(): array
    {
        return [
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'] 
        ];
    }
 
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
 
}

