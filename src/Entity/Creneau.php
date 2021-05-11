<?php

namespace App\Entity;

use App\Repository\CreneauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreneauRepository::class)
 */
class Creneau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fin;

    /**
     * @ORM\ManyToMany(targetEntity=Cooperateur::class, mappedBy="inscriptions")
     */
    private $inscrits;

    /**
     * @ORM\Column(type="array")
     */
    private $effectifs = [];

    public function __construct()
    {
        $this->inscrits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * @return Collection|Cooperateur[]
     */
    public function getInscrits(): Collection
    {
        return $this->inscrits;
    }

    public function addInscrit(Cooperateur $inscrit): self
    {
        if (!$this->inscrits->contains($inscrit)) {
            $this->inscrits[] = $inscrit;
            $inscrit->addInscription($this);
        }

        return $this;
    }

    public function removeInscrit(Cooperateur $inscrit): self
    {
        if ($this->inscrits->removeElement($inscrit)) {
            $inscrit->removeInscription($this);
        }

        return $this;
    }

    public function getEffectifs(): ?array
    {
        return $this->effectifs;
    }

    public function setEffectifs(array $effectifs): self
    {
        $this->effectifs = $effectifs;

        return $this;
    }
}
