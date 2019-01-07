<?php

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class ImageFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getImageData() as [ $name ]) {
            $image = (new Image())
                    ->setName($name)
                    ->setTrick($tricks[rand(0,8)]); 
            $manager->persist($name);
            
            $this->addReference('trick', $trick);
        }
 
        $manager->flush();
    }
 
    private function getImageData(): array
    {
        return [
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg'],
            ['0603508e3f060885b2073eca70e2b37b.jpeg']
        ];
    }
    
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }
 
}