<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRole", mappedBy="user")
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="user_creator")
     */
    private $room;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RoomUser", mappedBy="user_id")
     */
    private $roomUsers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classwork", inversedBy="user_id")
     */
    private $classwork;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="user_id")
     */
    private $post;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->roomUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|UserRole[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(UserRole $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setUser($this);
        }

        return $this;
    }

    public function removeType(UserRole $type): self
    {
        if ($this->type->contains($type)) {
            $this->type->removeElement($type);
            // set the owning side to null (unless already changed)
            if ($type->getUser() === $this) {
                $type->setUser(null);
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

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

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
            $roomUser->addUserId($this);
        }

        return $this;
    }

    public function removeRoomUser(RoomUser $roomUser): self
    {
        if ($this->roomUsers->contains($roomUser)) {
            $this->roomUsers->removeElement($roomUser);
            $roomUser->removeUserId($this);
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
