<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\NotBlank
     */
    private $user_login;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_date;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\Email(
     * message="Adresse email non valide"
     * )
     * @Assert\NotBlank
     */
    private $user_mail;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Regex(
     *  pattern="/^(?=.[A-Z])(?=.[a-z])(?=.\d)(?=.[-+!$@%_])([-+!$@%_\w]{8,99})$/",
     *  message="Mot de passe qui doit comporter de 8 à 15 caractères, au moins une lettre minuscule, au moins une lettre majuscule, au moins un chiffre, au moins un de ces caractères spéciaux: $ @ % * + - _ !"
     * )
     * @Assert\NotBlank
     */
    private $user_password;

    /**
     *@Assert\EqualTo(propertyPath="user_password", message="Vos mots de passe sont différents")
     *@Assert\NotBlank
    */
    public $confirm_user_password;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(
     *  pattern="/^([0-9a-z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$/",
     *  message="Adresse non valide"
     * )
     * @Assert\NotBlank
     */
    private $user_address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Assert\Regex(
     *  pattern="/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/",
     *  message="Code postal non valide"
     * )
     * @Assert\NotBlank
     */
    private $user_zip;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Regex(
     *  pattern="/^[A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï]+([-'\s][A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï])?([-'\s][A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï]+)?$/",
     *  message="Ville non valide"
     * )
     * @Assert\NotBlank
     */
    private $user_city;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\NotBlank
     */
    private $user_discord;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Choice({"M", "F"})
     * @Assert\NotBlank
     */
    private $user_sex;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotBlank
     */
    private $statut;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterRole", inversedBy="eterUsers")
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterClan", inversedBy="eterUsers")
     */
    private $user_clan;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterGame", inversedBy="eterUsers")
     */
    private $user_game;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EterStreamer", mappedBy="eterUser")
     */
    private $user_stream;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EterEvent", mappedBy="event_init")
     */
    private $eterEvents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EterComment", mappedBy="com_user")
     */
    private $eterComments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EterContent", mappedBy="content_user")
     */
    private $eterContents;

    /**
     * @ORM\Column(type="text")
     */
    private $user_description;

    public function __construct()
    {
        $this->user_date = new \DateTime('Europe/Paris');
        $this->role = new ArrayCollection();
        $this->user_clan = new ArrayCollection();
        $this->user_game = new ArrayCollection();
        $this->user_stream = new ArrayCollection();
        $this->eterEvents = new ArrayCollection();
        $this->eterComments = new ArrayCollection();
        $this->eterContents = new ArrayCollection();
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


    public function __toString()
    {
        return $this->user_login;
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

    public function setUserDiscord(string $user_discord): self
    {
        $this->user_discord = $user_discord;

        return $this;
    }


    public function getUserSex(): ?string
    {
        return $this->user_sex;
    }

    public function setUserSex(?string $user_sex): self
    {
        $this->user_sex = $user_sex;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|EterRole[]
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(EterRole $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role[] = $role;
        }

        return $this;
    }

    public function removeUserRole(EterRole $userRole): self
    {
        if ($this->role->contains($userRole)) {
            $this->role->removeElement($userRole);
        }

        return $this;
    }

    /**
     * @return Collection|EterClan[]
     */
    public function getUserClan(): Collection
    {
        return $this->user_clan;
    }

    public function addUserClan(EterClan $userClan): self
    {
        if (!$this->user_clan->contains($userClan)) {
            $this->user_clan[] = $userClan;
        }

        return $this;
    }



    public function removeUserClan(EterClan $userClan): self
    {
        if ($this->user_clan->contains($userClan)) {
            $this->user_clan->removeElement($userClan);
        }

        return $this;
    }

    /**
     * @return Collection|EterGame[]
     */
    public function getUserGame(): Collection
    {
        return $this->user_game;
    }

    public function addUserGame(EterGame $userGame): self
    {
        if (!$this->user_game->contains($userGame)) {
            $this->user_game[] = $userGame;
        }

        return $this;
    }

    public function removeUserGame(EterGame $userGame): self
    {
        if ($this->user_game->contains($userGame)) {
            $this->user_game->removeElement($userGame);
        }

        return $this;
    }

    /**
     * @return Collection|EterStreamer[]
     */
    public function getUserStream(): Collection
    {
        return $this->user_stream;
    }

    public function addUserStream(EterStreamer $userStream): self
    {
        if (!$this->user_stream->contains($userStream)) {
            $this->user_stream[] = $userStream;
            $userStream->setEterUser($this);
        }

        return $this;
    }

    public function removeUserStream(EterStreamer $userStream): self
    {
        if ($this->user_stream->contains($userStream)) {
            $this->user_stream->removeElement($userStream);
            // set the owning side to null (unless already changed)
            if ($userStream->getEterUser() === $this) {
                $userStream->setEterUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EterEvent[]
     */
    public function getEterEvents(): Collection
    {
        return $this->eterEvents;
    }

    public function addEterEvent(EterEvent $eterEvent): self
    {
        if (!$this->eterEvents->contains($eterEvent)) {
            $this->eterEvents[] = $eterEvent;
            $eterEvent->addEventInit($this);
        }

        return $this;
    }

    public function removeEterEvent(EterEvent $eterEvent): self
    {
        if ($this->eterEvents->contains($eterEvent)) {
            $this->eterEvents->removeElement($eterEvent);
            $eterEvent->removeEventInit($this);
        }

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
            $eterComment->setComUser($this);
        }

        return $this;
    }

    public function removeEterComment(EterComment $eterComment): self
    {
        if ($this->eterComments->contains($eterComment)) {
            $this->eterComments->removeElement($eterComment);
            // set the owning side to null (unless already changed)
            if ($eterComment->getComUser() === $this) {
                $eterComment->setComUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EterContent[]
     */
    public function getEterContents(): Collection
    {
        return $this->eterContents;
    }

    public function addEterContent(EterContent $eterContent): self
    {
        if (!$this->eterContents->contains($eterContent)) {
            $this->eterContents[] = $eterContent;
            $eterContent->setContentUser($this);
        }

        return $this;
    }

    public function removeEterContent(EterContent $eterContent): self
    {
        if ($this->eterContents->contains($eterContent)) {
            $this->eterContents->removeElement($eterContent);
            // set the owning side to null (unless already changed)
            if ($eterContent->getContentUser() === $this) {
                $eterContent->setContentUser(null);
            }
        }
        
        return $this;
    }

    public function getUserDescription(): ?string
    {
        return $this->user_description;
    }

    public function setUserDescription(string $user_description): self
    {
        $this->user_description = $user_description;

        return $this;
    }
    public function getPassword() {}

    public function getUsername() {}

    public function eraseCredentials() {}

    public function getSalt() {}

    public function getRoles() {
        return ['ROLE_USER'];
    }
}