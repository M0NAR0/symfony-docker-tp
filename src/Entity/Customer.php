<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity (repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="CUSTOMER_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOMER_COMPANY", type="string", length=200, nullable=true)
     */
    private $customerCompany;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOMER_ADDRESS", type="string", length=200, nullable=true)
     */
    private $customerAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOMER_CITY", type="string", length=100, nullable=true)
     */
    private $customerCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOMER_POSTAL_CODE", type="string", length=5, nullable=true)
     */
    private $customerPostalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOMER_CONTACT_NAME", type="string", length=100, nullable=true)
     */
    private $customerContactName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOMER_DIRECTION", type="string", length=150, nullable=true)
     */
    private $customerDirection;

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function getCustomerCompany(): ?string
    {
        return $this->customerCompany;
    }

    public function setCustomerCompany(?string $customerCompany): self
    {
        $this->customerCompany = $customerCompany;
        return $this;
    }

    public function getCustomerAddress(): ?string
    {
        return $this->customerAddress;
    }

    public function setCustomerAddress(?string $customerAddress): self
    {
        $this->customerAddress = $customerAddress;
        return $this;
    }

    public function getCustomerCity(): ?string
    {
        return $this->customerCity;
    }

    public function setCustomerCity(?string $customerCity): self
    {
        $this->customerCity = $customerCity;
        return $this;
    }

    public function getCustomerPostalCode(): ?string
    {
        return $this->customerPostalCode;
    }

    public function setCustomerPostalCode(?string $customerPostalCode): self
    {
        $this->customerPostalCode = $customerPostalCode;
        return $this;
    }

    public function getCustomerContactName(): ?string
    {
        return $this->customerContactName;
    }

    public function setCustomerContactName(?string $customerContactName): self
    {
        $this->customerContactName = $customerContactName;
        return $this;
    }

    public function getCustomerDirection(): ?string
    {
        return $this->customerDirection;
    }

    public function setCustomerDirection(?string $customerDirection): self
    {
        $this->customerDirection = $customerDirection;
        return $this;
    }

    public function __toString()
    {
        return $this->customerCompany;
    }
}
