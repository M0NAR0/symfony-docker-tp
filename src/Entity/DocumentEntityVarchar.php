<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentEntityVarchar
 *
 * @ORM\Table(name="document_entity_varchar", indexes={@ORM\Index(name="FK_DOCUMENT_ENTITY_VARCHAR_DOCUMENT_ENTITY", columns={"DOCUMENT_ID"})})
 * @ORM\Entity (repositoryClass="App\Repository\DocumentEntityVarcharRepository")
 */
class DocumentEntityVarchar
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="DOCUMENT_ENTITY_VARCHAR_ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentEntityVarcharId;

    /**
     * @var string|null
     * @ORM\Column(name="DOCUMENT_ENTITY_VARCHAR_VALUE", type="text", length=65535, nullable=true)
     */
    private $documentEntityVarcharValue;

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
     *   @ORM\JoinColumn(name="DOCUMENT_ID", referencedColumnName="DOCUMENT_ID", onDelete="SET NULL")
     * })
     */
    private $document;

    public function getDocumentEntityVarcharId(): ?int
    {
        return $this->documentEntityVarcharId;
    }

    public function getDocumentEntityVarcharValue(): ?string
    {
        return $this->documentEntityVarcharValue;
    }

    public function setDocumentEntityVarcharValue(?string $documentEntityVarcharValue): self
    {
        $this->documentEntityVarcharValue = $documentEntityVarcharValue;
        return $this;
    }

    public function getDocumentEav(): ?DocumentEav
    {
        return $this->documentEav;
    }

    public function setDocumentEav(?DocumentEav $documentEav): self
    {
        $this->documentEav = $documentEav;
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
