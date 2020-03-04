<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterPlayRepository")
 */
class EterPlay
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterGame")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?EterUser
    {
        return $this->user_id;
    }

    public function setUserId(?EterUser $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getGameId(): ?EterGame
    {
        return $this->game_id;
    }

    public function setGameId(?EterGame $game_id): self
    {
        $this->game_id = $game_id;

        return $this;
    }
}
