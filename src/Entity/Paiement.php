<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Stock::class, mappedBy="Paiement")
     */
    private $stocks;

    /**
     * @ORM\OneToMany(targetEntity=Entana::class, mappedBy="Entana")
     */
    private $entana;



    public function __construct()
    {
        $this->stocks = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->setPaiement($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getPaiement() === $this) {
                $stock->setPaiement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getEntana(): Collection
    {
        return $this->entana;
    }

    public function addEntana(Entana $entana): self
    {
        if (!$this->entana->contains($entana)) {
            $this->entana[] = $entana;
            $entana->setPaiement($this);
        }

        return $this;
    }

    public function removeEntana(Entana $entana): self
    {
        if ($this->entana->removeElement($entana)) {
            // set the owning side to null (unless already changed)
            if ($entana->getPaiement() === $this) {
                $entana->setPaiement(null);
            }
        }

        return $this;
    }
}
