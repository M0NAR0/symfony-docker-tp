<?php

namespace App\Entity;

use App\Repository\DemandTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * DemandType
 *
 * @ORM\Table(name="demand_type")
 * @ORM\Entity (repositoryClass="App\Repository\DemandTypeRepository" )
 */
class DemandType
{
    /**
     * @var int
     *
     * @ORM\Column(name="DEMAND_TYPE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="DEMAND_TYPE_LABEL", type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="Demand", mappedBy="DEMAND_ID", fetch="EXTRA_LAZY")
     */
    private $demands;

    public function __construct()
    {
        $this->demands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Demand[]
     */
    public function getDemands(): Collection
    {
        return $this->demands;
    }

    public function addDemand(Demand $demand): self
    {
        if (!$this->demands->contains($demand)) {
            $this->demands[] = $demand;
            $demand->setDemandType($this);
        }

        return $this;
    }

    public function removeDemand(Demand $demand): self
    {
        if ($this->demands->removeElement($demand)) {
            // set the owning side to null (unless already changed)
            if ($demand->getDemandType() === $this) {
                $demand->setDemandType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->label;
    }
}
