<?php

namespace App\Entity;

use App\Repository\DemandRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Demand
 *
 * @ORM\Table(name="demand", indexes={
 *     @ORM\Index(name="FK_DEMAND_DEMAND_TYPE", columns={"DEMAND_TYPE_ID"}),
 *     @ORM\Index(name="FK_DEMAND_EMPLOYEE", columns={"EMPLOYEE_ID"})
 * })
 * @ORM\Entity (repositoryClass="App\Repository\DemandRepository" )
 */
class Demand
{
    /**
     * @var int
     *
     * @ORM\Column(name="DEMAND_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sendingDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @var DemandType
     *
     * @ORM\ManyToOne(targetEntity="DemandType", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DEMAND_TYPE_ID", referencedColumnName="DEMAND_TYPE_ID", nullable=true, onDelete="SET NULL")
     * })
     */
    private $demandType;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EMPLOYEE_ID", referencedColumnName="EMPLOYEE_ID", nullable=true, onDelete="SET NULL")
     * })
     */
    private $employee;

    /**
     * Demand constructor.
     */
    public function __construct()
    {
        //On creation, by default it's todays date
        $this->sendingDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSendingDate(): ?\DateTimeInterface
    {
        return $this->sendingDate;
    }

    public function setSendingDate(\DateTimeInterface $sendingDate): self
    {
        $this->sendingDate = $sendingDate;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDemandType(): ?DemandType
    {
        return $this->demandType;
    }

    public function setDemandType(?DemandType $demandType): self
    {
        $this->demandType = $demandType;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }
}
