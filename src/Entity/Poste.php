<?php

namespace App\Entity;

use App\Repository\PosteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PosteRepository::class)
 */
class Poste
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
    private $intitule;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $taches;

    /**
     * @ORM\ManyToMany(targetEntity=Cooperateur::class, mappedBy="qualifications")
     */
    private $cooperateurs;

    public function __construct()
    {
        $this->cooperateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getTaches(): ?string
    {
        return $this->taches;
    }

    public function setTaches(?string $taches): self
    {
        $this->taches = $taches;

        return $this;
    }

    /**
     * @return Collection|Cooperateur[]
     */
    public function getCooperateurs(): Collection
    {
        return $this->cooperateurs;
    }

    public function addCooperateur(Cooperateur $cooperateur): self
    {
        if (!$this->cooperateurs->contains($cooperateur)) {
            $this->cooperateurs[] = $cooperateur;
            $cooperateur->addQualification($this);
        }

        return $this;
    }

    public function removeCooperateur(Cooperateur $cooperateur): self
    {
        if ($this->cooperateurs->removeElement($cooperateur)) {
            $cooperateur->removeQualification($this);
        }

        return $this;
    }
}
