<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site", indexes={@ORM\Index(name="FK_SITE_CUSTOMER", columns={"CUSTOMER_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\SiteRepository")
 */
class Site
{
    /**
     * @var int
     *
     * @ORM\Column(name="SITE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $siteId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SITE_TITLE", type="string", length=200, nullable=true)
     */
    private $siteTitle;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="SITE_NEUF", type="boolean", nullable=true)
     */
    private $siteNeuf;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="SITE_RENOVATION", type="boolean", nullable=true)
     */
    private $siteRenovation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SITE_CREATED_AT", type="date", nullable=true)
     */
    private $siteCreatedAt;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CUSTOMER_ID", referencedColumnName="CUSTOMER_ID", onDelete="SET NULL")
     * })
     */
    private $customer;

    /**
     * @ORM\ManyToMany(targetEntity="DocumentEntity", inversedBy="sites", cascade={"remove"})
     * @ORM\JoinTable(name="document_entity_site",
     *     joinColumns={@ORM\JoinColumn(name="SITE_ID", referencedColumnName="SITE_ID")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="DOCUMENT_ID", referencedColumnName="DOCUMENT_ID")}
     * )
     */
    private $documentEntities;

    /**
     * Site constructor.
     */
    public function __construct()
    {
        //On creation, by default it's todays date
        $this->siteCreatedAt = new \DateTime();
        $this->documentEntities = new ArrayCollection();
    }

    public function getSiteId(): ?int
    {
        return $this->siteId;
    }

    public function getSiteTitle(): ?string
    {
        return $this->siteTitle;
    }

    public function setSiteTitle(?string $siteTitle): self
    {
        $this->siteTitle = $siteTitle;
        return $this;
    }

    public function getSiteNeuf(): ?bool
    {
        return $this->siteNeuf;
    }

    public function setSiteNeuf(?bool $siteNeuf): self
    {
        $this->siteNeuf = $siteNeuf;
        return $this;
    }

    public function getSiteRenovation(): ?bool
    {
        return $this->siteRenovation;
    }

    public function setSiteRenovation(?bool $siteRenovation): self
    {
        $this->siteRenovation = $siteRenovation;
        return $this;
    }

    public function getSiteCreatedAt(): ?\DateTimeInterface
    {
        return $this->siteCreatedAt;
    }

    public function setSiteCreatedAt(?\DateTimeInterface $siteCreatedAt): self
    {
        $this->siteCreatedAt = $siteCreatedAt;
        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Collection|DocumentEntity[]
     */
    public function getDocumentEntities(): Collection
    {
        return $this->documentEntities;
    }
    public function addDocumentEntity(DocumentEntity $documentEntity): self
    {
        if (!$this->documentEntities->contains($documentEntity)) {
            $this->documentEntities[] = $documentEntity;
        }
        return $this;
    }
    public function removeDocumentEntity(DocumentEntity $documentEntity): self
    {
        if ($this->documentEntities->contains($documentEntity)) {
            $this->documentEntities->removeElement($documentEntity);
        }
        return $this;
    }

    public function __toString()
    {
        return $this->siteTitle;
    }
}
