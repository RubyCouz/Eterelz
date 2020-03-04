<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterOwnRepository")
 */
class EterOwn
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterGame")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTypeId(): ?EterType
    {
        return $this->type_id;
    }

    public function setTypeId(?EterType $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }
}
