<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterStatutRepository")
 */
class EterStatut
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $statut_state;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatutState(): ?string
    {
        return $this->statut_state;
    }

    public function setStatutState(string $statut_state): self
    {
        $this->statut_state = $statut_state;

        return $this;
    }
}
