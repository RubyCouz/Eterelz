<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterCategorieRepository")
 */
class EterCategorie
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
    private $cat_name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterCategorie", inversedBy="cat_id_name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat_id_name;

    public function __construct()
    {
        $this->cat_id_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    public function setCatName(string $cat_name): self
    {
        $this->cat_name = $cat_name;

        return $this;
    }

    public function getCatIdName(): ?self
    {
        return $this->cat_id_name;
    }

    public function setCatIdName(?self $cat_id_name): self
    {
        $this->cat_id_name = $cat_id_name;

        return $this;
    }

    public function addCatIdName(self $catIdName): self
    {
        if (!$this->cat_id_name->contains($catIdName)) {
            $this->cat_id_name[] = $catIdName;
            $catIdName->setCatIdName($this);
        }

        return $this;
    }

    public function removeCatIdName(self $catIdName): self
    {
        if ($this->cat_id_name->contains($catIdName)) {
            $this->cat_id_name->removeElement($catIdName);
            // set the owning side to null (unless already changed)
            if ($catIdName->getCatIdName() === $this) {
                $catIdName->setCatIdName(null);
            }
        }

        return $this;
    }
}
