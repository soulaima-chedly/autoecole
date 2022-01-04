<?php

namespace App\Entity;

use App\Repository\ResultatExamanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultatExamanRepository::class)
 */
class ResultatExaman
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
    private $Resultat;

    /**
     * @ORM\OneToOne(targetEntity=Condidat::class, cascade={"persist", "remove"})
     */
    private $idc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat(): ?string
    {
        return $this->Resultat;
    }

    public function setResultat(string $Resultat): self
    {
        $this->Resultat = $Resultat;

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
