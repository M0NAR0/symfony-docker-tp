<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity (repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="PRODUCT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_TITLE", type="string", length=200, nullable=true)
     */
    private $productTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_UNITARY_PRICE", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $productUnitaryPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_DIMENSION", type="string", length=200, nullable=true)
     */
    private $productDimension;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseOrderProduct", mappedBy="product", fetch="EXTRA_LAZY", cascade={"persist", "remove"})
     */
    private $purchOrderProducts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->purchOrderProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function getProductTitle(): ?string
    {
        return $this->productTitle;
    }

    public function setProductTitle(?string $productTitle): self
    {
        $this->productTitle = $productTitle;

        return $this;
    }

    public function getProductUnitaryPrice(): ?string
    {
        return $this->productUnitaryPrice;
    }

    public function setProductUnitaryPrice(?string $productUnitaryPrice): self
    {
        $this->productUnitaryPrice = $productUnitaryPrice;

        return $this;
    }

    public function getProductDimension(): ?string
    {
        return $this->productDimension;
    }

    public function setProductDimension(?string $productDimension): self
    {
        $this->productDimension = $productDimension;

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
            $purchOrderProduct->setProduct($this);
        }

        return $this;
    }

    public function removePurchaseOrderProduct(PurchaseOrderProduct $purchOrderProduct): self
    {
        if ($this->purchOrderProducts->removeElement($purchOrderProduct)) {
            //$purchOrders->removeProduct($this);
            if ($purchOrderProduct->getProduct() === $this) {
                $purchOrderProduct->setProduct(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->productTitle . " | " . $this->productDimension;
    }

}
