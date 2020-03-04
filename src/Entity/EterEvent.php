<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterEventRepository")
 */
class EterEvent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $event_date;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $event_score;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $event_winner;

    /**
     * @ORM\Column(type="datetime")
     */
    private $event_creation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->event_date;
    }

    public function setEventDate(\DateTimeInterface $event_date): self
    {
        $this->event_date = $event_date;

        return $this;
    }

    public function getEventScore(): ?string
    {
        return $this->event_score;
    }

    public function setEventScore(?string $event_score): self
    {
        $this->event_score = $event_score;

        return $this;
    }

    public function getEventWinner(): ?string
    {
        return $this->event_winner;
    }

    public function setEventWinner(?string $event_winner): self
    {
        $this->event_winner = $event_winner;

        return $this;
    }

    public function getEventCreation(): ?\DateTimeInterface
    {
        return $this->event_creation;
    }

    public function setEventCreation(\DateTimeInterface $event_creation): self
    {
        $this->event_creation = $event_creation;

        return $this;
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
}
