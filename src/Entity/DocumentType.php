<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentType
 *
 * @ORM\Table(name="document_type")
 * @ORM\Entity (repositoryClass="App\Repository\DocumentRepository")
 */
class DocumentType
{
    /**
     * @var int
     *
     * @ORM\Column(name="DOCTYPE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $doctypeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOCTYPE_CODE", type="string", length=150, nullable=true)
     */
    private $doctypeCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOCTYPE_TITLE", type="string", length=150, nullable=true)
     */
    private $doctypeTitle;

    public function getDoctypeId(): ?int
    {
        return $this->doctypeId;
    }

    public function getDoctypeTitle(): ?string
    {
        return $this->doctypeTitle;
    }

    public function setDoctypeTitle(?string $doctypeTitle): self
    {
        $this->doctypeTitle = $doctypeTitle;

        return $this;
    }

    public function getDoctypeCode(): ?string
    {
        return $this->doctypeCode;
    }

    public function setDoctypeCode(?string $doctypeCode): self
    {
        $this->doctypeCode = $doctypeCode;
        return $this;
    }

    public function __toString()
    {
        return $this->doctypeTitle;
    }
}
