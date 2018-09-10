<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 */
class Video
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $platform;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_platform;
    
    /**
    * @ORM\ManyToOne(targetEntity="Trick", inversedBy="videos")
    */
    private $trick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getIdPlatform(): ?string
    {
        return $this->id_platform;
    }

    public function setIdPlatform(string $id_platform): self
    {
        $this->id_platform = $id_platform;

        return $this;
    }
    public function getTrick()
    {
            return $this->trick;
    }

    public function setTrick($trick)
    {
            $this->trick = $trick;
            return $this;
    }
}
