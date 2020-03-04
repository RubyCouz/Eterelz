<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EterAnswerRepository")
 */
class EterAnswer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $answer_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterComment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comment_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EterComment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comment_id_1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswerDate(): ?\DateTimeInterface
    {
        return $this->answer_date;
    }

    public function setAnswerDate(\DateTimeInterface $answer_date): self
    {
        $this->answer_date = $answer_date;

        return $this;
    }

    public function getCommentId(): ?EterComment
    {
        return $this->comment_id;
    }

    public function setCommentId(?EterComment $comment_id): self
    {
        $this->comment_id = $comment_id;

        return $this;
    }

    public function getCommentId1(): ?EterComment
    {
        return $this->comment_id_1;
    }

    public function setCommentId1(?EterComment $comment_id_1): self
    {
        $this->comment_id_1 = $comment_id_1;

        return $this;
    }
}
