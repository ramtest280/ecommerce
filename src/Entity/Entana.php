<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntanaRepository::class)
 */
class Entana
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $lanjany;

    /**
     * @ORM\Column(type="integer")
     */
    private $vidiniray;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $avance;

    /**
     * @ORM\Column(type="integer")
     */
    private $reste;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Trondro::class)
     */
    private $trondro;

    /**
     * @ORM\ManyToOne(targetEntity=Paiement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $paiement;


    public function getId(): ?int
    {
        return $this->id;
    }



    public function getLanjany(): ?int
    {
        return $this->lanjany;
    }

    public function setLanjany(int $lanjany): self
    {
        $this->lanjany = $lanjany;

        return $this;
    }

    public function getVidiniray(): ?int
    {
        return $this->vidiniray;
    }

    public function setVidiniray(int $vidiniray): self
    {
        $this->vidiniray = $vidiniray;

        return $this;
    }

    public function getAvance(): ?int
    {
        return $this->avance;
    }

    public function setAvance(?int $avance): self
    {
        $this->avance = $avance;

        return $this;
    }

    public function getReste(): ?int
    {
        return $this->reste;
    }

    public function setReste(int $reste): self
    {
        $this->reste = $reste;

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


    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
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

    public function getPaiement(): ?Paiement
    {
        return $this->paiement;
    }

    public function setPaiement(?Paiement $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }
}
