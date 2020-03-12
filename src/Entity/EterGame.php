<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterGameRepository")
 */
class EterGame
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
    private $game_name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterUser", mappedBy="user_game")
     */
    private $eterUsers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterGender", inversedBy="eterGames")
     */
    private $game_gender;

    public function __construct()
    {
        $this->eterUsers = new ArrayCollection();
        $this->game_gender = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameName(): ?string
    {
        return $this->game_name;
    }

    public function setGameName(string $game_name): self
    {
        $this->game_name = $game_name;

        return $this;
    }

    /**
     * @return Collection|EterUser[]
     */
    public function getEterUsers(): Collection
    {
        return $this->eterUsers;
    }

    public function addEterUser(EterUser $eterUser): self
    {
        if (!$this->eterUsers->contains($eterUser)) {
            $this->eterUsers[] = $eterUser;
            $eterUser->addUserGame($this);
        }

        return $this;
    }

    public function removeEterUser(EterUser $eterUser): self
    {
        if ($this->eterUsers->contains($eterUser)) {
            $this->eterUsers->removeElement($eterUser);
            $eterUser->removeUserGame($this);
        }

        return $this;
    }

    /**
     * @return Collection|EterGender[]
     */
    public function getGameGender(): Collection
    {
        return $this->game_gender;
    }

    public function addGameGender(EterGender $gameGender): self
    {
        if (!$this->game_gender->contains($gameGender)) {
            $this->game_gender[] = $gameGender;
        }

        return $this;
    }

    public function removeGameGender(EterGender $gameGender): self
    {
        if ($this->game_gender->contains($gameGender)) {
            $this->game_gender->removeElement($gameGender);
        }

        return $this;
    }
}
