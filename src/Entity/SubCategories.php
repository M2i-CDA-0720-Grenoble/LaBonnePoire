<?php

namespace App\Entity;

use App\Repository\SubCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubCategoriesRepository::class)
 */
class SubCategories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="subCategorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Advert::class, mappedBy="subCategories")
     */
    private $advert;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->advert = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdvert(): Collection
    {
        return $this->advert;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->advert->contains($advert)) {
            $this->advert[] = $advert;
            $advert->setSubCategories($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->advert->removeElement($advert)) {
            // set the owning side to null (unless already changed)
            if ($advert->getSubCategories() === $this) {
                $advert->setSubCategories(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
