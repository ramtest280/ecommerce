<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Trondro::class)
     */
    private $trondro;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="float", length=255)
     */
    private $poids;


    /**
     * @ORM\Column(type="integer")
     */
    private $prix_unitaire;

    /**
     * @ORM\ManyToOne(targetEntity=Etat::class)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $gain;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixenvente;

    /**
     * @ORM\ManyToOne(targetEntity=Paiement::class, inversedBy="stocks")
     */
    private $Paiement;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrondro(): ?Trondro
    {
        return $this->trondro;
    }

    public function setTrondro(?Trondro $trondro): self
    {
        $this->trondro = $trondro;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

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

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }



    public function getPrixUnitaire(): ?int
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(int $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getGain(): ?int
    {
        return $this->gain;
    }

    public function setGain(int $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getPrixenvente(): ?int
    {
        return $this->prixenvente;
    }

    public function setPrixenvente(int $prixenvente): self
    {
        $this->prixenvente = $prixenvente;

        return $this;
    }

    public function getPaiement(): ?Paiement
    {
        return $this->Paiement;
    }

    public function setPaiement(?Paiement $Paiement): self
    {
        $this->Paiement = $Paiement;

        return $this;
    }
}
