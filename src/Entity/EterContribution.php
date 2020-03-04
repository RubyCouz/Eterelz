<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterContributionRepository")
 */
class EterContribution
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
     * @ORM\ManyToOne(targetEntity="App\Entity\EterEvent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event_id;

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
