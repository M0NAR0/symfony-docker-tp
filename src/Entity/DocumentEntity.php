<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEntity
 *
 * @ORM\Table(name="document_entity", indexes={@ORM\Index(name="FK_DOCUMENT_ENTITY_DOCUMENT_TYPE", columns={"DOCTYPE_ID"}), @ORM\Index(name="FK_DOCUMENT_ENTITY_SITE", columns={"SITE_ID"}), @ORM\Index(name="FK_DOCUMENT_ENTITY_EMPLOYEE", columns={"EMPLOYEE_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEntityRepository")
 */
class DocumentEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="DOCUMENT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOCUMENT_REFERENCE", type="string", length=50, nullable=true)
     */
    private $documentReference;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DOCUMENT_CREATED_AT", type="date", nullable=true)
     */
    private $documentCreatedAt;

    /**
     * @var DocumentType
     *
     * @ORM\ManyToOne(targetEntity="DocumentType", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DOCTYPE_ID", referencedColumnName="DOCTYPE_ID", onDelete="SET NULL")
     * })
     */
    private $doctype;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EMPLOYEE_ID", referencedColumnName="EMPLOYEE_ID", onDelete="SET NULL")
     * })
     */
    private $employee;

    /**
     * @var Site
     *
     * @ORM\ManyToOne(targetEntity="Site", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SITE_ID", referencedColumnName="SITE_ID", onDelete="SET NULL")
     * })
     */
    private $site;

    /**
     * @ORM\ManyToMany(targetEntity="Site", mappedBy="documentEntities", cascade={"persist"})
     */
    private $sites;

    /**
     * @ORM\ManyToMany(targetEntity="DocumentEavType", inversedBy="documentEntities", cascade={"persist"})
     * @ORM\JoinTable(name="document_eav_type_document_entity",
     *     joinColumns={@ORM\JoinColumn(name="DOCUMENT_ID", referencedColumnName="DOCUMENT_ID", onDelete="SET NULL")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="DOCUMENT_EAV_TYPE_ID", referencedColumnName="DOCUMENT_EAV_TYPE_ID")}
     * )
     */
    private $documentEavTypes;

    /**
     * DocumentEntity constructor.
     */
    public function __construct()
    {
        //On creation, by default it's todays date
        $this->documentCreatedAt = new \DateTime();
        $this->sites = new ArrayCollection();
        $this->documentEavTypes = new ArrayCollection();
    }

    public function getDocumentId(): ?int
    {
        return $this->documentId;
    }

    public function getDocumentReference(): ?string
    {
        return $this->documentReference;
    }

    public function setDocumentReference(?string $documentReference): self
    {
        $this->documentReference = $documentReference;
        return $this;
    }

    public function getDocumentCreatedAt(): ?\DateTimeInterface
    {
        return $this->documentCreatedAt;
    }

    public function setDocumentCreatedAt(?\DateTimeInterface $documentCreatedAt): self
    {
        $this->documentCreatedAt = $documentCreatedAt;
        return $this;
    }

    public function getDoctype(): ?DocumentType
    {
        return $this->doctype;
    }

    public function setDoctype(?DocumentType $doctype): self
    {
        $this->doctype = $doctype;
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

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): self
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @return Collection|Site[]
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }
    public function addSite(Site $site): self
    {
        if (!$this->sites->contains($site)) {
            $this->sites[] = $site;
            $site->addDocumentEntity($this);
        }
        return $this;
    }
    public function removeSite(Site $article): self
    {
        if ($this->sites->contains($article)) {
            $this->sites->removeElement($article);
            $article->removeDocumentEntity($this);
        }
        return $this;
    }

    /**
     * @return Collection|DocumentEavType[]
     */
    public function getDocumentEavTypes(): Collection
    {
        return $this->documentEavTypes;
    }
    public function addDocumentEavType(DocumentEavType $documentEavType): self
    {
        if (!$this->documentEavTypes->contains($documentEavType)) {
            $this->documentEavTypes[] = $documentEavType;
        }
        return $this;
    }
    public function removeDocumentEavType(DocumentEavType $documentEavType): self
    {
        if ($this->documentEavTypes->contains($documentEavType)) {
            $this->documentEavTypes->removeElement($documentEavType);
        }
        return $this;
    }

    public function __toString()
    {
        return $this->documentReference;
    }
}
