<?php

namespace App\Entity;

use App\Repository\UserProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserProfileRepository::class)
 */
class UserProfile
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
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="userProfile", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=Advert::class, mappedBy="userProfile", orphanRemoval=true)
     */
    private $adverts;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="senderUserProfile", orphanRemoval=true)
     */
    private $senderMessages;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="recipientUserProfile", orphanRemoval=true)
     */
    private $recipientMessages;

    public function __construct()
    {
        $this->adverts = new ArrayCollection();
        $this->senderMessages = new ArrayCollection();
        $this->recipientMessages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdverts(): Collection
    {
        return $this->adverts;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->adverts->contains($advert)) {
            $this->adverts[] = $advert;
            $advert->setUserProfile($this);
        }
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->removeElement($advert)) {
            // set the owning side to null (unless already changed)
            if ($advert->getUserProfile() === $this) {
                $advert->setUserProfile(null);
            }
        }
    }

    /**
     * @return Collection|Message[]
     */
    public function getSenderMessages(): Collection
    {
        return $this->senderMessages;
    }

    public function addSenderMessage(Message $senderMessage): self
    {
        if (!$this->senderMessages->contains($senderMessage)) {
            $this->senderMessages[] = $senderMessage;
            $senderMessage->setSenderUserProfile($this);
        }

        return $this;
    }

    public function removeSenderMessage(Message $senderMessage): self
    {
        if ($this->senderMessages->removeElement($senderMessage)) {
            // set the owning side to null (unless already changed)
            if ($senderMessage->getSenderUserProfile() === $this) {
                $senderMessage->setSenderUserProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getRecipientMessages(): Collection
    {
        return $this->recipientMessages;
    }

    public function addRecipientMessage(Message $recipientMessage): self
    {
        if (!$this->recipientMessages->contains($recipientMessage)) {
            $this->recipientMessages[] = $recipientMessage;
            $recipientMessage->setRecipientUserProfile($this);
        }

        return $this;
    }

    public function removeRecipientMessage(Message $recipientMessage): self
    {
        if ($this->recipientMessages->removeElement($recipientMessage)) {
            // set the owning side to null (unless already changed)
            if ($recipientMessage->getRecipientUserProfile() === $this) {
                $recipientMessage->setRecipientUserProfile(null);
            }
        }

        return $this;
    }
}
