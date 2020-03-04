<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterAffiliationRepository")
 */
class EterAffiliation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $aff_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EterUser", mappedBy="n")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterClan", inversedBy="eterAffiliations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clan_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffDate(): ?\DateTimeInterface
    {
        return $this->aff_date;
    }

    public function setAffDate(\DateTimeInterface $aff_date): self
    {
        $this->aff_date = $aff_date;

        return $this;
    }

    /**
     * @return Collection|EterUser[]
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(EterUser $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
            $userId->setN($this);
        }

        return $this;
    }

    public function removeUserId(EterUser $userId): self
    {
        if ($this->user_id->contains($userId)) {
            $this->user_id->removeElement($userId);
            // set the owning side to null (unless already changed)
            if ($userId->getN() === $this) {
                $userId->setN(null);
            }
        }

        return $this;
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
}
