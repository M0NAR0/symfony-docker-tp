<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity (repositoryClass="App\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @var int
     *
     * @ORM\Column(name="PROVIDER_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $providerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROVIDER_COMPANY_NAME", type="string", length=150, nullable=true)
     */
    private $providerCompanyName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROVIDER_SIRET", type="string", length=50, nullable=true)
     */
    private $providerSiret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROVIDER_CONTACT_FULLNAME", type="string", length=150, nullable=true)
     */
    private $providerContactFullname;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="PROVIDER_CONTACT_GENRE", type="boolean", nullable=true)
     */
    private $providerContactGenre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROVIDER_EMAIL", type="string", length=150, nullable=true)
     */
    private $providerEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROVIDER_TEL", type="string", length=10, nullable=true)
     */
    private $providerTel;

    public function getProviderId(): ?int
    {
        return $this->providerId;
    }

    public function getProviderCompanyName(): ?string
    {
        return $this->providerCompanyName;
    }

    public function setProviderCompanyName(?string $providerCompanyName): self
    {
        $this->providerCompanyName = $providerCompanyName;

        return $this;
    }

    public function getProviderSiret(): ?string
    {
        return $this->providerSiret;
    }

    public function setProviderSiret(?string $providerSiret): self
    {
        $this->providerSiret = $providerSiret;

        return $this;
    }

    public function getProviderContactFullname(): ?string
    {
        return $this->providerContactFullname;
    }

    public function setProviderContactFullname(?string $providerContactFullname): self
    {
        $this->providerContactFullname = $providerContactFullname;

        return $this;
    }

    public function getProviderContactGenre(): ?bool
    {
        return $this->providerContactGenre;
    }

    public function setProviderContactGenre(?bool $providerContactGenre): self
    {
        $this->providerContactGenre = $providerContactGenre;

        return $this;
    }

    public function getProviderEmail(): ?string
    {
        return $this->providerEmail;
    }

    public function setProviderEmail(?string $providerEmail): self
    {
        $this->providerEmail = $providerEmail;

        return $this;
    }

    public function getProviderTel(): ?string
    {
        return $this->providerTel;
    }

    public function setProviderTel(?string $providerTel): self
    {
        $this->providerTel = $providerTel;

        return $this;
    }

    public function __toString()
    {
        return $this->providerCompanyName;
    }
}
