<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEntityDate
 *
 * @ORM\Table(name="document_entity_date", indexes={@ORM\Index(name="FK_DOCUMENT_ENTITY_DATE_DOCUMENT_ENTITY", columns={"DOCUMENT_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEntityDateRepository")
 */
class DocumentEntityDate
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="DOCUMENT_ENTITY_DATE_ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentEntityDateId;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="DOCUMENT_ENTITY_DATE_VALUE", type="date", nullable=true)
     */
    private $documentEntityDateValue;

    /**
     * @var DocumentEav
     *
     * @ORM\ManyToOne(targetEntity="DocumentEav", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DOCUMENT_EAV_ID", referencedColumnName="DOCUMENT_EAV_ID", onDelete="SET NULL")
     * })
     */
    private $documentEav;

    /**
     * @var DocumentEntity
     *
     * @ORM\ManyToOne(targetEntity="DocumentEntity", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DOCUMENT_ID", referencedColumnName="DOCUMENT_ID")
     * })
     */
    private $document;


    public function getDocumentEntityDateId(): ?int
    {
        return $this->documentEntityDateId;
    }

    public function getDocumentEntityDateValue(): ?\DateTimeInterface
    {
        return $this->documentEntityDateValue;
    }

    public function setDocumentEntityDateValue(?\DateTimeInterface $documentEntityDateValue): self
    {
        $this->documentEntityDateValue = $documentEntityDateValue;
        return $this;
    }

    public function getDocumentEav(): ?DocumentEav
    {
        return $this->documentEav;
    }

    public function setDocumentEav(?DocumentEav $document): self
    {
        $this->documentEav = $document;
        return $this;
    }

    public function getDocument(): ?DocumentEntity
    {
        return $this->document;
    }

    public function setDocument(?DocumentEntity $document): self
    {
        $this->document = $document;
        return $this;
    }
}
