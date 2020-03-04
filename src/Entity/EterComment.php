<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterCommentRepository")
 */
class EterComment
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
    private $comment_content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $comment_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterContent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $content_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentContent(): ?string
    {
        return $this->comment_content;
    }

    public function setCommentContent(string $comment_content): self
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    public function getCommentDate(): ?\DateTimeInterface
    {
        return $this->comment_date;
    }

    public function setCommentDate(\DateTimeInterface $comment_date): self
    {
        $this->comment_date = $comment_date;

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

    public function getContentId(): ?EterContent
    {
        return $this->content_id;
    }

    public function setContentId(?EterContent $content_id): self
    {
        $this->content_id = $content_id;

        return $this;
    }
}
