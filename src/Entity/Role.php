<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity (repositoryClass="App\Repository\RoleRepository")
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="ROLE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ROLE_TITLE", type="string", length=32, nullable=true, options={"fixed"=true})
     */
    private $roleTitle;

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function getRoleTitle(): ?string
    {
        return $this->roleTitle;
    }

    public function setRoleTitle(?string $roleTitle): self
    {
        $this->roleTitle = $roleTitle;

        return $this;
    }

    public function __toString()
    {
        return $this->roleTitle;
    }
}
