<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Providers
 *
 * @ORM\Table(name="providers", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Providers
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Providers
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}
