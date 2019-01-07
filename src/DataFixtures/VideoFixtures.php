<?php

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class VideoFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $tricks= $this->getReference('tricks');
        foreach ($this->getVideoData() as [ $urlIFrame ]) {
            $video = (new Video())
                    ->setUrlIFrame($urlIFrame)
                    ->setTrick($tricks[rand(0,8)]);                  
            $manager->persist($video);
        }
 
        $manager->flush();
    }
 
    private function getVideoData(): array
    {
        return [
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo'],
            ['https://www.youtube.com/embed/34lI0CWqmwo']
        ];
    }
    
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }
 
}