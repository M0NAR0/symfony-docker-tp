<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEav
 *
 * @ORM\Table(name="document_eav")
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEavRepository")
 */
class DocumentEav
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="DOCUMENT_EAV_ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentEavId;

    /**
     * @var string|null
     * @ORM\Column(name="DOCUMENT_EAV_CODE", type="string", length=255, nullable=true, unique=true)
     */
    private $documentEavCode;

    /**
     * @var string|null
     * @ORM\Column(name="DOCUMENT_EAV_TITLE", type="string", length=255, nullable=true)
     */
    private $documentEavTitle;

    /**
     * @var bool|null
     * @ORM\Column(name="DOCUMENT_EAV_IS_VISIBLE", type="boolean", nullable=true)
     */
    private $documentEavIsVisible;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOCUMENT_EAV_DESCIPTION", type="text", length=65535, nullable=true)
     */
    private $documentEavDesciption;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOCUMENT_EAV_VALIDATION_RULE", type="text", length=65535, nullable=true)
     */
    private $documentEavValidationRule;

    /**
     * @ORM\ManyToMany(targetEntity="DocumentEavType", inversedBy="documentEavs", cascade={"persist"})
     * @ORM\JoinTable(name="document_eav_type_document_eav",
     *     joinColumns={@ORM\JoinColumn(name="DOCUMENT_EAV_ID", referencedColumnName="DOCUMENT_EAV_ID", onDelete="SET NULL")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="DOCUMENT_EAV_TYPE_ID", referencedColumnName="DOCUMENT_EAV_TYPE_ID")}
     * )
     */
    private $documentEavTypes;

    /**
     * DocumentEntity constructor.
     */
    public function __construct()
    {
        $this->documentEavTypes = new ArrayCollection();
    }

    public function getDocumentEavId(): ?int
    {
        return $this->documentEavId;
    }

    public function getDocumentEavCode(): ?string
    {
        return $this->documentEavCode;
    }

    public function setDocumentEavCode(?string $documentEavCode): self
    {
        $this->documentEavCode = $documentEavCode;
        return $this;
    }

    public function getDocumentEavTitle(): ?string
    {
        return $this->documentEavTitle;
    }

    public function setDocumentEavTitle(?string $documentEavTitle): self
    {
        $this->documentEavTitle = $documentEavTitle;
        return $this;
    }

    public function getDocumentEavIsVisible(): ?bool
    {
        return $this->documentEavIsVisible;
    }

    public function setDocumentEavIsVisible(?bool $documentEavIsVisible): self
    {
        $this->documentEavIsVisible = $documentEavIsVisible;
        return $this;
    }

    public function getDocumentEavDesciption(): ?string
    {
        return $this->documentEavDesciption;
    }

    public function setDocumentEavDesciption(?string $documentEavDesciption): self
    {
        $this->documentEavDesciption = $documentEavDesciption;
        return $this;
    }

    public function getDocumentEavValidationRule(): ?string
    {
        return $this->documentEavValidationRule;
    }

    public function setDocumentEavValidationRule(?string $documentEavValidationRule): self
    {
        $this->documentEavValidationRule = $documentEavValidationRule;
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
        return $this->documentEavCode;
    }
}
