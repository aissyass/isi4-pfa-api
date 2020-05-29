<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RoomUserRepository")
 */
class RoomUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Room", inversedBy="roomUsers")
     */
    private $room_id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="roomUsers")
     */
    private $user_id;

    public function __construct()
    {
        $this->room_id = new ArrayCollection();
        $this->user_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
        }

        return $this;
    }

    public function removeRoomId(Room $roomId): self
    {
        if ($this->room_id->contains($roomId)) {
            $this->room_id->removeElement($roomId);
        }

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
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        if ($this->user_id->contains($userId)) {
            $this->user_id->removeElement($userId);
        }

        return $this;
    }
}
