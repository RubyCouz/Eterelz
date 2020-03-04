<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterClanRepository")
 */
class EterClan
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $clan_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $clan_members;

    /**
     * @ORM\Column(type="text")
     */
    private $clan_desc;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $clan_ban;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $clan_discord;

    /**
     * @ORM\Column(type="boolean")
     */
    private $clan_recrut;

    /**
     * @ORM\Column(type="boolean")
     */
    private $clan_activity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $clan_gameplay;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClanName(): ?string
    {
        return $this->clan_name;
    }

    public function setClanName(string $clan_name): self
    {
        $this->clan_name = $clan_name;

        return $this;
    }

    public function getClanMembers(): ?int
    {
        return $this->clan_members;
    }

    public function setClanMembers(int $clan_members): self
    {
        $this->clan_members = $clan_members;

        return $this;
    }

    public function getClanDesc(): ?string
    {
        return $this->clan_desc;
    }

    public function setClanDesc(string $clan_desc): self
    {
        $this->clan_desc = $clan_desc;

        return $this;
    }

    public function getClanBan(): ?string
    {
        return $this->clan_ban;
    }

    public function setClanBan(?string $clan_ban): self
    {
        $this->clan_ban = $clan_ban;

        return $this;
    }

    public function getClanDiscord(): ?string
    {
        return $this->clan_discord;
    }

    public function setClanDiscord(?string $clan_discord): self
    {
        $this->clan_discord = $clan_discord;

        return $this;
    }

    public function getClanRecrut(): ?bool
    {
        return $this->clan_recrut;
    }

    public function setClanRecrut(bool $clan_recrut): self
    {
        $this->clan_recrut = $clan_recrut;

        return $this;
    }

    public function getClanActivity(): ?bool
    {
        return $this->clan_activity;
    }

    public function setClanActivity(bool $clan_activity): self
    {
        $this->clan_activity = $clan_activity;

        return $this;
    }

    public function getClanGameplay(): ?bool
    {
        return $this->clan_gameplay;
    }

    public function setClanGameplay(bool $clan_gameplay): self
    {
        $this->clan_gameplay = $clan_gameplay;

        return $this;
    }



}
