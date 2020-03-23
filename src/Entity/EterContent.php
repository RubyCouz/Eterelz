<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $content_text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $content_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content_pic;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterState", inversedBy="eterContents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $content_state;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterCategorie", inversedBy="eterContents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $content_cat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EterComment", mappedBy="content_com")
     */
    private $eterComments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content_name;

    public function __construct()
    {
        $this->eterComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentText(): ?string
    {
        return $this->content_text;
    }

    public function setContentText(?string $content_text): self
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

    public function getContentPic(): ?string
    {
        return $this->content_pic;
    }

    public function setContentPic(?string $content_pic): self
    {
        $this->content_pic = $content_pic;

        return $this;
    }

    public function getContentState(): ?EterState
    {
        return $this->content_state;
    }

    public function setContentState(?EterState $content_state): self
    {
        $this->content_state = $content_state;

        return $this;
    }

    public function getContentCat(): ?EterCategorie
    {
        return $this->content_cat;
    }

    public function setContentCat(?EterCategorie $content_cat): self
    {
        $this->content_cat = $content_cat;

        return $this;
    }

    /**
     * @return Collection|EterComment[]
     */
    public function getEterComments(): Collection
    {
        return $this->eterComments;
    }

    public function addEterComment(EterComment $eterComment): self
    {
        if (!$this->eterComments->contains($eterComment)) {
            $this->eterComments[] = $eterComment;
            $eterComment->setContentCom($this);
        }

        return $this;
    }

    public function removeEterComment(EterComment $eterComment): self
    {
        if ($this->eterComments->contains($eterComment)) {
            $this->eterComments->removeElement($eterComment);
            // set the owning side to null (unless already changed)
            if ($eterComment->getContentCom() === $this) {
                $eterComment->setContentCom(null);
            }
        }

        return $this;
    }


    public function getContentName(): ?string
    {
        return $this->content_name;
    }

    public function setContentName(string $content_name): self
    {
        $this->content_name = $content_name;

        return $this;
    }

    public function __toString()
    {
        return $this->content_name;
    }

}
