<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class PurchaseOrderProduct
 *
 * @ORM\Table(name="purchase_order_product")
 * @ORM\Entity (repositoryClass="App\Repository\PurchaseOrderProductRepository")
 */
class PurchaseOrderProduct
{
    /**
     * @var PurchaseOrder
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\PurchaseOrder", inversedBy="purchOrderProducts")
     * @ORM\JoinColumn(name="PURCH_ORDER_ID", referencedColumnName="PURCH_ORDER_ID", nullable=false)
     */
    private $purchOrder;

    /**
     * @var Product
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="purchOrderProducts")
     * @ORM\JoinColumn(name="PRODUCT_ID", referencedColumnName="PRODUCT_ID", nullable=false)
     */
    private $product;

    /**
     * @var int
     *
     * @ORM\Column(name="QUANTITY", type="integer", nullable=false)
     */
    private $quantity;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPurchaseOrder(): ?PurchaseOrder
    {
        return $this->purchOrder;
    }

    public function setPurchaseOrder(?PurchaseOrder $purchOrder): self
    {
        $this->purchOrder = $purchOrder;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}