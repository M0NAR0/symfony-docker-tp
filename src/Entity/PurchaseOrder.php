<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseOrder
 *
 * @ORM\Table(name="purchase_order", indexes={@ORM\Index(name="FK_PURCHASE_ORDER_PROVIDER", columns={"PROVIDER_ID"}), @ORM\Index(name="FK_PURCHASE_ORDER_EMPLOYEE", columns={"EMPLOYEE_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\PurchaseOrderRepository")
 */
class PurchaseOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="PURCH_ORDER_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $purchOrderId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PURCH_ORDER_CREATED_AT", type="date", nullable=true)
     */
    private $purchOrderCreatedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PURCH_ORDER_ASKED_PRICE", type="boolean", nullable=true)
     */
    private $purchOrderAskedPrice;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PURCH_ORDER_DELIVERY_DATE", type="date", nullable=true)
     */
    private $purchOrderDeliveryDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PURCH_ORDER_DELIVERY_LOCATION", type="string", length=200, nullable=true)
     */
    private $purchOrderDeliveryLocation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PURCH_ORDER_NB_PAGE", type="integer", nullable=true)
     */
    private $purchOrderNbPage;

    /**
     * @var \Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EMPLOYEE_ID", referencedColumnName="EMPLOYEE_ID")
     * })
     */
    private $employee;

    /**
     * @var \Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PROVIDER_ID", referencedColumnName="PROVIDER_ID")
     * })
     */
    private $provider;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseOrderProduct", mappedBy="purchOrder", fetch="EXTRA_LAZY", cascade={"persist", "remove"})
     */
    private $purchOrderProducts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->purchOrderProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPurchOrderId(): ?int
    {
        return $this->purchOrderId;
    }

    public function getPurchOrderCreatedAt(): ?\DateTimeInterface
    {
        return $this->purchOrderCreatedAt;
    }

    public function setPurchOrderCreatedAt(?\DateTimeInterface $purchOrderCreatedAt): self
    {
        $this->purchOrderCreatedAt = $purchOrderCreatedAt;

        return $this;
    }

    public function getPurchOrderAskedPrice(): ?bool
    {
        return $this->purchOrderAskedPrice;
    }

    public function setPurchOrderAskedPrice(?bool $purchOrderAskedPrice): self
    {
        $this->purchOrderAskedPrice = $purchOrderAskedPrice;

        return $this;
    }

    public function getPurchOrderDeliveryDate(): ?\DateTimeInterface
    {
        return $this->purchOrderDeliveryDate;
    }

    public function setPurchOrderDeliveryDate(?\DateTimeInterface $purchOrderDeliveryDate): self
    {
        $this->purchOrderDeliveryDate = $purchOrderDeliveryDate;

        return $this;
    }

    public function getPurchOrderDeliveryLocation(): ?string
    {
        return $this->purchOrderDeliveryLocation;
    }

    public function setPurchOrderDeliveryLocation(?string $purchOrderDeliveryLocation): self
    {
        $this->purchOrderDeliveryLocation = $purchOrderDeliveryLocation;

        return $this;
    }

    public function getPurchOrderNbPage(): ?int
    {
        return $this->purchOrderNbPage;
    }

    public function setPurchOrderNbPage(?int $purchOrderNbPage): self
    {
        $this->purchOrderNbPage = $purchOrderNbPage;

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

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return Collection|PurchaseOrderProducts[]
     */
    public function getPurchaseOrderProducts(): Collection
    {
        return $this->purchOrderProducts;
    }

    public function addPurchaseOrderProduct(PurchaseOrderProduct $purchOrderProduct): self
    {
        if (!$this->purchOrderProducts->contains($purchOrderProduct)) {
            $this->purchOrderProducts[] = $purchOrderProduct;
            $purchOrderProduct->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removePurchaseOrderProduct(PurchaseOrderProduct $purchOrderProduct): self
    {
        if ($this->purchOrderProducts->removeElement($purchOrderProduct)) {
            if ($purchOrderProduct->getPurchaseOrder() === $this) {
                $purchOrderProduct->setPurchaseOrder(null);
            }
        }

        return $this;
    }

}
