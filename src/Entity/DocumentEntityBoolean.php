<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEntityBoolean
 *
 * @ORM\Table(name="document_entity_boolean", indexes={@ORM\Index(name="FK_DOCUMENT_ENTITY_BOOLEAN_DOCUMENT_ENTITY", columns={"DOCUMENT_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEntityBooleanRepository")
 */
class DocumentEntityBoolean
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="DOCUMENT_ENTITY_BOOLEAN_ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentEntityBooleanId;

    /**
     * @var bool|null
     * @ORM\Column(name="DOCUMENT_ENTITY_BOOLEAN_VALUE", type="boolean", nullable=true)
     */
    private $documentEntityBooleanValue;

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


    public function getDocumentEntityBooleanId(): ?int
    {
        return $this->documentEntityBooleanId;
    }

    public function getDocumentEntityBooleanValue(): ?bool
    {
        return $this->documentEntityBooleanValue;
    }

    public function setDocumentEntityBooleanValue(?bool $documentEntityBooleanValue): self
    {
        $this->documentEntityBooleanValue = $documentEntityBooleanValue;
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
