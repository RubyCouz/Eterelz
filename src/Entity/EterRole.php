<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterRoleRepository")
 */
class EterRole
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
    private $role_name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterUser", mappedBy="role")
     */
    private $eterUsers;

    public function __construct()
    {
        $this->eterUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleName(): ?string
    {
        return $this->role_name;
    }

    public function setRoleName(string $role_name): self
    {
        $this->role_name = $role_name;

        return $this;
    }

    public function __toString()
    {
       return $this->role_name;
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
            $eterUser->addUserRole($this);
        }

        return $this;
    }

    public function removeEterUser(EterUser $eterUser): self
    {
        if ($this->eterUsers->contains($eterUser)) {
            $this->eterUsers->removeElement($eterUser);
            $eterUser->removeUserRole($this);
        }

        return $this;
    }
}
