<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivraisonRepository::class)
 */
class Livraison
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
    private $sofera;

    /**
     * @ORM\Column(type="integer")
     */
    private $entana;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\Column(type="boolean")
     */
    private $permis;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=Fournisseur::class)
     */
    private $fournisseur;

    public function __construct()
    {
        $this->fournisseur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSofera(): ?string
    {
        return $this->sofera;
    }

    public function setSofera(string $sofera): self
    {
        $this->sofera = $sofera;

        return $this;
    }

    public function getEntana(): ?int
    {
        return $this->entana;
    }

    public function setEntana(int $entana): self
    {
        $this->entana = $entana;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function isPermis(): ?bool
    {
        return $this->permis;
    }

    public function setPermis(bool $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

    /**
     * @return Collection<int, Fournisseur>
     */
    public function getFournisseur(): Collection
    {
        return $this->fournisseur;
    }

    public function addFournisseur(Fournisseur $fournisseur): self
    {
        if (!$this->fournisseur->contains($fournisseur)) {
            $this->fournisseur[] = $fournisseur;
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $fournisseur): self
    {
        $this->fournisseur->removeElement($fournisseur);

        return $this;
    }
}
