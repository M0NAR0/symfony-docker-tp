<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEntityInt
 *
 * @ORM\Table(name="document_entity_int", indexes={@ORM\Index(name="FK_DOCUMENT_ENTITY_INT_DOCUMENT_ENTITY", columns={"DOCUMENT_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEntityIntRepository")
 */
class DocumentEntityInt
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="DOCUMENT_ENTITY_INT_ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentEntityIntId;

    /**
     * @var int|null
     * @ORM\Column(name="DOCUMENT_ENTITY_INT_VALUE", type="integer", nullable=true)
     */
    private $documentEntityIntValue;

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

    public function getDocumentEntityIntId(): ?int
    {
        return $this->documentEntityIntId;
    }

    public function getDocumentEntityIntValue(): ?int
    {
        return $this->documentEntityIntValue;
    }

    public function setDocumentEntityIntValue(?int $documentEntityIntValue): self
    {
        $this->documentEntityIntValue = $documentEntityIntValue;
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
