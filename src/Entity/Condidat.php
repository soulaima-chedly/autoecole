<?php

namespace App\Entity;

use App\Repository\CondidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CondidatRepository::class)
 */
class Condidat
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
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     */
    private $numcin;

    /**
     * @ORM\Column(type="integer")
     */
    private $numtel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job;

    /**
     * @ORM\OneToMany(targetEntity=SeanceDeformation::class, mappedBy="idc")
     */
    private $seanceDeformations;

    /**
     * @ORM\ManyToOne(targetEntity=Examen::class, inversedBy="condidats")
     */
    private $idex;

    public function __construct()
    {
        $this->seanceDeformations = new ArrayCollection();
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNumcin(): ?int
    {
        return $this->numcin;
    }

    public function setNumcin(int $numcin): self
    {
        $this->numcin = $numcin;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return Collection|SeanceDeformation[]
     */
    public function getSeanceDeformations(): Collection
    {
        return $this->seanceDeformations;
    }

    public function addSeanceDeformation(SeanceDeformation $seanceDeformation): self
    {
        if (!$this->seanceDeformations->contains($seanceDeformation)) {
            $this->seanceDeformations[] = $seanceDeformation;
            $seanceDeformation->setIdc($this);
        }

        return $this;
    }

    public function removeSeanceDeformation(SeanceDeformation $seanceDeformation): self
    {
        if ($this->seanceDeformations->removeElement($seanceDeformation)) {
            // set the owning side to null (unless already changed)
            if ($seanceDeformation->getIdc() === $this) {
                $seanceDeformation->setIdc(null);
            }
        }

        return $this;
    }

    public function getIdex(): ?Examen
    {
        return $this->idex;
    }

    public function setIdex(?Examen $idex): self
    {
        $this->idex = $idex;

        return $this;
    }
}
