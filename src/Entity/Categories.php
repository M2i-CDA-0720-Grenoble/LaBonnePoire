<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SubCategories::class, mappedBy="categories", orphanRemoval=true)
     */
    private $subCategorie;

    public function __construct()
    {
        $this->subCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|SubCategories[]
     */
    public function getSubCategorie(): Collection
    {
        return $this->subCategorie;
    }

    public function addSubCategorie(SubCategories $subCategorie): self
    {
        if (!$this->subCategorie->contains($subCategorie)) {
            $this->subCategorie[] = $subCategorie;
            $subCategorie->setCategories($this);
        }

        return $this;
    }

    public function removeSubCategorie(SubCategories $subCategorie): self
    {
        if ($this->subCategorie->removeElement($subCategorie)) {
            // set the owning side to null (unless already changed)
            if ($subCategorie->getCategories() === $this) {
                $subCategorie->setCategories(null);
            }
        }

        return $this;
    }
}
