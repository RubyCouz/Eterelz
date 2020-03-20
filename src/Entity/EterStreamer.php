<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterStreamerRepository")
 */
class EterStreamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stream_url;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $stream_support;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterUser", inversedBy="user_stream")
     */
    private $eterUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreamUrl(): ?string
    {
        return $this->stream_url;
    }

    public function setStreamUrl(string $stream_url): self
    {
        $this->stream_url = $stream_url;

        return $this;
    }

    public function getStreamSupport(): ?string
    {
        return $this->stream_support;
    }

    public function setStreamSupport(string $stream_support): self
    {
        $this->stream_support = $stream_support;

        return $this;
    }

    public function getEterUser(): ?EterUser
    {
        return $this->eterUser;
    }

    public function setEterUser(?EterUser $eterUser): self
    {
        $this->eterUser = $eterUser;

        return $this;
    }

    public function __toString()
    {
        return $this->stream_url;
    }
}
