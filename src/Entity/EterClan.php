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
     * @ORM\Column(type="string", length=6, nullable=true)
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
     * @ORM\ManyToMany(targetEntity="App\Entity\EterGameplay", inversedBy="eterClans")
     */
    private $clan_gameplay;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterUser", mappedBy="user_clan")
     */
    private $eterUsers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterEvent", inversedBy="eterClans")
     */
    private $clan_event;

    public function __construct()
    {
        $this->clan_gameplay = new ArrayCollection();
        $this->eterUsers = new ArrayCollection();
        $this->clan_event = new ArrayCollection();
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

    /**
     * @return Collection|EterGameplay[]
     */
    public function getClanGameplay(): Collection
    {
        return $this->clan_gameplay;
    }

    public function addClanGameplay(EterGameplay $clanGameplay): self
    {
        if (!$this->clan_gameplay->contains($clanGameplay)) {
            $this->clan_gameplay[] = $clanGameplay;
        }

        return $this;
    }

    public function removeClanGameplay(EterGameplay $clanGameplay): self
    {
        if ($this->clan_gameplay->contains($clanGameplay)) {
            $this->clan_gameplay->removeElement($clanGameplay);
        }

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
            $eterUser->addUserClan($this);
        }

        return $this;
    }

    public function removeEterUser(EterUser $eterUser): self
    {
        if ($this->eterUsers->contains($eterUser)) {
            $this->eterUsers->removeElement($eterUser);
            $eterUser->removeUserClan($this);
        }

        return $this;
    }

    /**
     * @return Collection|EterEvent[]
     */
    public function getClanEvent(): Collection
    {
        return $this->clan_event;
    }

    public function addClanEvent(EterEvent $clanEvent): self
    {
        if (!$this->clan_event->contains($clanEvent)) {
            $this->clan_event[] = $clanEvent;
        }

        return $this;
    }

    public function removeClanEvent(EterEvent $clanEvent): self
    {
        if ($this->clan_event->contains($clanEvent)) {
            $this->clan_event->removeElement($clanEvent);
        }

        return $this;
    }
}
