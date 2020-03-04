<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterContentRepository")
 */
class EterContent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content_text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $content_date;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $content_extension;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterStatut")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterCategorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentText(): ?string
    {
        return $this->content_text;
    }

    public function setContentText(string $content_text): self
    {
        $this->content_text = $content_text;

        return $this;
    }

    public function getContentDate(): ?\DateTimeInterface
    {
        return $this->content_date;
    }

    public function setContentDate(\DateTimeInterface $content_date): self
    {
        $this->content_date = $content_date;

        return $this;
    }

    public function getContentExtension(): ?string
    {
        return $this->content_extension;
    }

    public function setContentExtension(?string $content_extension): self
    {
        $this->content_extension = $content_extension;

        return $this;
    }

    public function getStatutId(): ?EterStatut
    {
        return $this->statut_id;
    }

    public function setStatutId(?EterStatut $statut_id): self
    {
        $this->statut_id = $statut_id;

        return $this;
    }

    public function getCatId(): ?EterCategorie
    {
        return $this->cat_id;
    }

    public function setCatId(?EterCategorie $cat_id): self
    {
        $this->cat_id = $cat_id;

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
