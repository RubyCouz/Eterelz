<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterUserRepository")
 */
class EterUser implements UserInterface
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
    private $user_login;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_date;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $user_mail;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $user_password;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $user_address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $user_zip;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $user_city;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $user_discord;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $user_sexe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterStatut")
     */
    private $statut_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterRole", inversedBy="eterUsers")
     */
    private $role_id;

    public function __construct() {
        $this->user_date = new \DateTime();
//        $this->statut_id = '2';
//        $this->role_id = '2';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    public function setUserLogin(string $user_login): self
    {
        $this->user_login = $user_login;

        return $this;
    }

    public function getUserDate(): ?\DateTimeInterface
    {
        return $this->user_date;
    }

    public function setUserDate(\DateTimeInterface $user_date): self
    {
        $this->user_date = $user_date;

        return $this;
    }

    public function getUserMail(): ?string
    {
        return $this->user_mail;
    }

    public function setUserMail(string $user_mail): self
    {
        $this->user_mail = $user_mail;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getUserAddress(): ?string
    {
        return $this->user_address;
    }

    public function setUserAddress(?string $user_address): self
    {
        $this->user_address = $user_address;

        return $this;
    }

    public function getUserZip(): ?string
    {
        return $this->user_zip;
    }

    public function setUserZip(?string $user_zip): self
    {
        $this->user_zip = $user_zip;

        return $this;
    }

    public function getUserCity(): ?string
    {
        return $this->user_city;
    }

    public function setUserCity(?string $user_city): self
    {
        $this->user_city = $user_city;

        return $this;
    }

    public function getUserDiscord(): ?string
    {
        return $this->user_discord;
    }

    public function setUserDiscord(?string $user_discord): self
    {
        $this->user_discord = $user_discord;

        return $this;
    }

    public function getUserSexe(): ?string
    {
        return $this->user_sexe;
    }

    public function setUserSexe(?string $user_sexe): self
    {
        $this->user_sexe = $user_sexe;

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

    public function getRoleId(): ?EterRole
    {
        return $this->role_id;
    }

    public function setRoleId(?EterRole $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {

        // requète sur table role ?
        if ($this->role_id == 1) {
            return ['ROLE_ADMIN'];
        } else {
            return ['ROLE_USER'];
        }

    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->getUserPassword();
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->getUserMail();
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
