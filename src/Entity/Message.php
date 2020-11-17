<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=userProfile::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $senderUserProfile;

    /**
     * @ORM\ManyToOne(targetEntity=UserProfile::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recipientUserProfile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSenderUserProfile(): ?userProfile
    {
        return $this->senderUserProfile;
    }

    public function setSenderUserProfile(?userProfile $senderUserProfile): self
    {
        $this->userProfile = $senderUserProfile;

        return $this;
    }

    public function getRecipientUserProfile(): ?UserProfile
    {
        return $this->recipientUserProfile;
    }

    public function setRecipientUserProfile(?UserProfile $recipientUserProfile): self
    {
        $this->recipientUserProfile = $recipientUserProfile;

        return $this;
    }
}
