<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assurance;

    /**
     * @ORM\OneToOne(targetEntity=Examen::class, cascade={"persist", "remove"})
     */
    private $idv;

    /**
     * @ORM\OneToMany(targetEntity=SeanceDeformation::class, mappedBy="voiture")
     */
    private $ids;

    public function __construct()
    {
        $this->ids = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getIdv(): ?Examen
    {
        return $this->idv;
    }

    public function setIdv(?Examen $idv): self
    {
        $this->idv = $idv;

        return $this;
    }

    /**
     * @return Collection|SeanceDeformation[]
     */
    public function getIds(): Collection
    {
        return $this->ids;
    }

    public function addId(SeanceDeformation $id): self
    {
        if (!$this->ids->contains($id)) {
            $this->ids[] = $id;
            $id->setVoiture($this);
        }

        return $this;
    }

    public function removeId(SeanceDeformation $id): self
    {
        if ($this->ids->removeElement($id)) {
            // set the owning side to null (unless already changed)
            if ($id->getVoiture() === $this) {
                $id->setVoiture(null);
            }
        }

        return $this;
    }
}
