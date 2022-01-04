<?php

namespace App\Entity;

use App\Repository\ExamenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamenRepository::class)
 */
class Examen
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
    private $dateexamandecode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultexcode;

    /**
     * @ORM\Column(type="date")
     */
    private $dateExamenpratique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultatExamanPratique;

    /**
     * @ORM\OneToMany(targetEntity=Condidat::class, mappedBy="idex")
     */
    private $condidats;

    public function __construct()
    {
        $this->condidats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateexamandecode(): ?\DateTimeInterface
    {
        return $this->dateexamandecode;
    }

    public function setDateexamandecode(\DateTimeInterface $dateexamandecode): self
    {
        $this->dateexamandecode = $dateexamandecode;

        return $this;
    }

    public function getResultexcode(): ?string
    {
        return $this->resultexcode;
    }

    public function setResultexcode(string $resultexcode): self
    {
        $this->resultexcode = $resultexcode;

        return $this;
    }

    public function getDateExamenpratique(): ?\DateTimeInterface
    {
        return $this->dateExamenpratique;
    }

    public function setDateExamenpratique(\DateTimeInterface $dateExamenpratique): self
    {
        $this->dateExamenpratique = $dateExamenpratique;

        return $this;
    }

    public function getResultatExamanPratique(): ?string
    {
        return $this->resultatExamanPratique;
    }

    public function setResultatExamanPratique(string $resultatExamanPratique): self
    {
        $this->resultatExamanPratique = $resultatExamanPratique;

        return $this;
    }

    /**
     * @return Collection|Condidat[]
     */
    public function getCondidats(): Collection
    {
        return $this->condidats;
    }

    public function addCondidat(Condidat $condidat): self
    {
        if (!$this->condidats->contains($condidat)) {
            $this->condidats[] = $condidat;
            $condidat->setIdex($this);
        }

        return $this;
    }

    public function removeCondidat(Condidat $condidat): self
    {
        if ($this->condidats->removeElement($condidat)) {
            // set the owning side to null (unless already changed)
            if ($condidat->getIdex() === $this) {
                $condidat->setIdex(null);
            }
        }

        return $this;
    }
}
