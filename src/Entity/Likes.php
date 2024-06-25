<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    private ?Posts $post_id = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    private ?Comments $comment_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(?Users $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPostId(): ?Posts
    {
        return $this->post_id;
    }

    public function setPostId(?Posts $post_id): static
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getCommentId(): ?Comments
    {
        return $this->comment_id;
    }

    public function setCommentId(?Comments $comment_id): static
    {
        $this->comment_id = $comment_id;

        return $this;
    }
}
