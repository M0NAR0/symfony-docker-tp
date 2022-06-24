<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEav
 *
 * @ORM\Table le(name="document_eav_type", indexes={@ORM\Index(name="FK_DOCUMENT_EAV_TYPE_DOCUMENT_ENTITY", columns={"DOCUMENT_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEavTypeRepository")
 */
class DocumentEavType
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="DOCUMENT_EAV_TYPE_ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentEavTypeId;

    /**
     * @var string|null
     * @ORM\Column(name="DOCUMENT_EAV_TYPE_CODE", type="string", length=255, nullable=true)
     */
    private $documentEavTypeCode;

    /**
     * @var string|null
     * @ORM\Column(name="DOCUMENT_EAV_TYPE_TITLE", type="string", length=255, nullable=true)
     */
    private $documentEavTypeTitle;

    /**
     * @var int|null
     * @ORM\Column(name="DOCUMENT_EAV_TYPE_ORDER", type="string", nullable=true)
     */
    private $documentEavTypeOrder;

    /**
     * @ORM\ManyToMany(targetEntity="DocumentEntity", mappedBy="documentEavTypes", cascade={"persist"})
     */
    private $documentEntities;

    /**
     * @ORM\ManyToMany(targetEntity="DocumentEav", mappedBy="documentEavTypes", cascade={"persist"})
     */
    private $documentEavs;

    public function __construct()
    {
        $this->documentEntities = new ArrayCollection();
        $this->documentEavs = new ArrayCollection();
    }

    public function getDocumentEavTypeId(): ?int
    {
        return $this->documentEavTypeId;
    }

    public function getDocumentEavTypeCode(): ?string
    {
        return $this->documentEavTypeCode;
    }

    public function setDocumentEavTypeCode(?string $documentEavTypeCode): self
    {
        $this->documentEavTypeCode = $documentEavTypeCode;
        return $this;
    }

    public function getDocumentEavTypeTitle(): ?string
    {
        return $this->documentEavTypeTitle;
    }

    public function setDocumentEavTypeTitle(?string $documentEavTypeTitle): self
    {
        $this->documentEavTypeTitle = $documentEavTypeTitle;
        return $this;
    }

    public function getDocumentEavTypeOrder(): ?string
    {
        return $this->documentEavTypeOrder;
    }

    public function setDocumentEavTypeOrder(?int $documentEavTypeOrder): self
    {
        $this->documentEavTypeOrder = $documentEavTypeOrder;
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
            $documentEntity->addDocumentEavType($this);
        }
        return $this;
    }
    public function removeDocumentEntity(DocumentEntity $documentEntity): self
    {
        if ($this->documentEntities->contains($documentEntity)) {
            $this->documentEntities->removeElement($documentEntity);
            $documentEntity->removeDocumentEavType($this);
        }
        return $this;
    }

    /**
     * @return Collection|DocumentEav[]
     */
    public function getDocumentEavs(): Collection
    {
        return $this->documentEavs;
    }
    public function addDocumentEav(DocumentEntity $documentEav): self
    {
        if (!$this->documentEavs->contains($documentEav)) {
            $this->documentEavs[] = $documentEav;
            $documentEav->addDocumentEavType($this);
        }
        return $this;
    }
    public function removeDocumentEav(DocumentEntity $documentEav): self
    {
        if ($this->documentEavs->contains($documentEav)) {
            $this->documentEavs->removeElement($documentEav);
            $documentEav->removeDocumentEavType($this);
        }
        return $this;
    }

    public function __toString()
    {
        return $this->documentEavTypeTitle;
    }
}