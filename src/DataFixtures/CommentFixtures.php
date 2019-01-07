<?php

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class CommentFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $users= $this->getReference('users');
        $tricks= $this->getReference('tricks');
        foreach ($this->getCommentData() as [ $title, $content]) {
            $comment = (new Comment())
                    ->setTitle($title)
                    ->setContent($content)
                    ->setUser($users[rand(0,2)])
                    ->setTrick($tricks[rand(0,8)]); 
                    
            $manager->persist($comment);
        }
 
        $manager->flush();
    }
 
    private function getCommentData(): array
    {
        return [
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue']
        ];
    }
 
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
            UserFixtures::class,
        );
    }
 
}

