<?php

namespace App\Entity;

use App\Repository\DeliveryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryRepository::class)
 */
class Delivery
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
    private $livreur;


    /**
     * @ORM\OneToOne(targetEntity=fournisseur::class, cascade={"persist", "remove"})
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $permis;

    /**
     * @ORM\Column(type="integer")
     */
    private $colis;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\OneToOne(targetEntity=Trondro::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $trondro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivreur(): ?string
    {
        return $this->livreur;
    }

    public function setLivreur(string $livreur): self
    {
        $this->livreur = $livreur;

        return $this;
    }


    public function getFournisseur(): ?fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getPermis(): ?string
    {
        return $this->permis;
    }

    public function setPermis(string $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

    public function getColis(): ?int
    {
        return $this->colis;
    }

    public function setColis(int $colis): self
    {
        $this->colis = $colis;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTrondro(): ?Trondro
    {
        return $this->trondro;
    }

    public function setTrondro(Trondro $trondro): self
    {
        $this->trondro = $trondro;

        return $this;
    }
}
