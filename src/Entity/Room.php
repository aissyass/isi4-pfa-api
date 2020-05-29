<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 */
class Room
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="room")
     */
    private $user_creator;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RoomUser", mappedBy="room_id")
     */
    private $roomUsers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classwork", inversedBy="room_id")
     */
    private $classwork;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="room_id")
     */
    private $post;

    public function __construct()
    {
        $this->user_creator = new ArrayCollection();
        $this->roomUsers = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserCreator(): Collection
    {
        return $this->user_creator;
    }

    public function addUserCreator(User $userCreator): self
    {
        if (!$this->user_creator->contains($userCreator)) {
            $this->user_creator[] = $userCreator;
            $userCreator->setRoom($this);
        }

        return $this;
    }

    public function removeUserCreator(User $userCreator): self
    {
        if ($this->user_creator->contains($userCreator)) {
            $this->user_creator->removeElement($userCreator);
            // set the owning side to null (unless already changed)
            if ($userCreator->getRoom() === $this) {
                $userCreator->setRoom(null);
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

    /**
     * @return Collection|RoomUser[]
     */
    public function getRoomUsers(): Collection
    {
        return $this->roomUsers;
    }

    public function addRoomUser(RoomUser $roomUser): self
    {
        if (!$this->roomUsers->contains($roomUser)) {
            $this->roomUsers[] = $roomUser;
            $roomUser->addRoomId($this);
        }

        return $this;
    }

    public function removeRoomUser(RoomUser $roomUser): self
    {
        if ($this->roomUsers->contains($roomUser)) {
            $this->roomUsers->removeElement($roomUser);
            $roomUser->removeRoomId($this);
        }

        return $this;
    }

    public function getClasswork(): ?Classwork
    {
        return $this->classwork;
    }

    public function setClasswork(?Classwork $classwork): self
    {
        $this->classwork = $classwork;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
