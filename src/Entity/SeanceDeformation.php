<?php

namespace App\Entity;

use App\Repository\SeanceDeformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceDeformationRepository::class)
 */
class SeanceDeformation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datedeformation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idcondidat;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixparheure;

    /**
     * @ORM\ManyToOne(targetEntity=Voiture::class, inversedBy="ids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voiture;

    /**
     * @ORM\ManyToOne(targetEntity=Condidat::class, inversedBy="seanceDeformations")
     */
    private $idc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedeformation(): ?\DateTimeInterface
    {
        return $this->datedeformation;
    }

    public function setDatedeformation(\DateTimeInterface $datedeformation): self
    {
        $this->datedeformation = $datedeformation;

        return $this;
    }

    public function getIdcondidat(): ?string
    {
        return $this->idcondidat;
    }

    public function setIdcondidat(string $idcondidat): self
    {
        $this->idcondidat = $idcondidat;

        return $this;
    }

    public function getPrixparheure(): ?int
    {
        return $this->prixparheure;
    }

    public function setPrixparheure(int $prixparheure): self
    {
        $this->prixparheure = $prixparheure;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    public function getIdc(): ?Condidat
    {
        return $this->idc;
    }

    public function setIdc(?Condidat $idc): self
    {
        $this->idc = $idc;

        return $this;
    }
}
