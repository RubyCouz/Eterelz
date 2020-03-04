<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterParticipationRepository")
 */
class EterParticipation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterClan", inversedBy="eterParticipations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clan_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterEvent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClanId(): ?EterClan
    {
        return $this->clan_id;
    }

    public function setClanId(?EterClan $clan_id): self
    {
        $this->clan_id = $clan_id;

        return $this;
    }

    public function getEventId(): ?EterEvent
    {
        return $this->event_id;
    }

    public function setEventId(?EterEvent $event_id): self
    {
        $this->event_id = $event_id;

        return $this;
    }
}
