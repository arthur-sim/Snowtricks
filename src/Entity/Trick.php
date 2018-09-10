<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrickRepository")
 */
class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_at;
    
    /**
    * @ORM\ManyToOne(targetEntity="User")
    * @ORM\JoinColumn(nullable = false)
    */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="trick")
     */
    protected $comments;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="trick")
     */
    protected $videos;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="trick")
     */
    protected $images;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }
    
    public function getComments()
    {
            return $this->comments;
    }
    
    function getUser() : ?UserInterface{ 
        return $this->user;
    }

    function setUser(UserInterface $user):self {
        $this->user = $user;
        return $this;
    }
    
    public function getImages()
    {
            return $this->images;
    }   

}
