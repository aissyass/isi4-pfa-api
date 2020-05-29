<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UploadedFileRepository")
 */
class UploadedFile
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
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $extension;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Post", inversedBy="uploadedFile", cascade={"persist", "remove"})
     */
    private $post_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Classwork", inversedBy="uploadedFile", cascade={"persist", "remove"})
     */
    private $classwork_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPostId(): ?Post
    {
        return $this->post_id;
    }

    public function setPostId(?Post $post_id): self
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getClassworkId(): ?Classwork
    {
        return $this->classwork_id;
    }

    public function setClassworkId(?Classwork $classwork_id): self
    {
        $this->classwork_id = $classwork_id;

        return $this;
    }
}
