<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="post")
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Room", mappedBy="post")
     */
    private $room_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UploadedFile", mappedBy="post_id", cascade={"persist", "remove"})
     */
    private $uploadedFile;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->room_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
            $userId->setPost($this);
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        if ($this->user_id->contains($userId)) {
            $this->user_id->removeElement($userId);
            // set the owning side to null (unless already changed)
            if ($userId->getPost() === $this) {
                $userId->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Room[]
     */
    public function getRoomId(): Collection
    {
        return $this->room_id;
    }

    public function addRoomId(Room $roomId): self
    {
        if (!$this->room_id->contains($roomId)) {
            $this->room_id[] = $roomId;
            $roomId->setPost($this);
        }

        return $this;
    }

    public function removeRoomId(Room $roomId): self
    {
        if ($this->room_id->contains($roomId)) {
            $this->room_id->removeElement($roomId);
            // set the owning side to null (unless already changed)
            if ($roomId->getPost() === $this) {
                $roomId->setPost(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getUploadedFile(): ?UploadedFile
    {
        return $this->uploadedFile;
    }

    public function setUploadedFile(?UploadedFile $uploadedFile): self
    {
        $this->uploadedFile = $uploadedFile;

        // set (or unset) the owning side of the relation if necessary
        $newPost_id = null === $uploadedFile ? null : $this;
        if ($uploadedFile->getPostId() !== $newPost_id) {
            $uploadedFile->setPostId($newPost_id);
        }

        return $this;
    }
}
