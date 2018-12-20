<?php

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getTrickData() as [ $title, $content, $user, $comments, $videos, $images]) {
            $trick = new Trick();
            $trick->setTitle($title);
            $trick->setContent($content);
            $trick->setUser($user);
            $trick->setComments($comments);
            $trick->setVideos($videos);
            $trick->setImages($images);
            $manager->persist($trick);
        }
 
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
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'arthur','https://www.youtube.com/watch?v=u20epr7tSEU','24ff22e64d1d68b9c29e286d1add25cd.jpeg']
        ];
    }
 
 
}

