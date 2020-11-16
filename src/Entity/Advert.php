<?php

namespace App\Entity;

use App\Repository\AdvertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 */
class Advert
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=AdvertPhoto::class, mappedBy="advert", orphanRemoval=true)
     */
    private $advertPhotos;

    public function __construct()
    {
        $this->advertPhotos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|AdvertPhoto[]
     */
    public function getAdvertPhotos(): Collection
    {
        return $this->advertPhotos;
    }

    public function addAdvertPhoto(AdvertPhoto $advertPhoto): self
    {
        if (!$this->advertPhotos->contains($advertPhoto)) {
            $this->advertPhotos[] = $advertPhoto;
            $advertPhoto->setAdvert($this);
        }

        return $this;
    }

    public function removeAdvertPhoto(AdvertPhoto $advertPhoto): self
    {
        if ($this->advertPhotos->removeElement($advertPhoto)) {
            // set the owning side to null (unless already changed)
            if ($advertPhoto->getAdvert() === $this) {
                $advertPhoto->setAdvert(null);
            }
        }

        return $this;
    }
}
