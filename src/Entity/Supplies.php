<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Supplies
 *
 * @ORM\Table(name="supplies", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Supplies
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     * @ORM\ManyToMany(targetEntity="Provider")
     * @ORM\JoinColumn(name="id_provider", referencedColumnName="id")
     * @ORM\Column(name="id_provider", nullable=true)
     */
    public $idProvider;

    /**
     * @var int
     * @ORM\ManyToMany(targetEntity="Product")
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * @ORM\Column(name="id_product", nullable=true)
     */
    public $idProduct;

    public function __construct()
    {
        $this->idProvider = new ArrayCollection();
        $this->idProduct = new ArrayCollection();
    }


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


    public function getIdProvider()
    {
        return $this->idProvider;
    }

    /**
     * @param mixed $idProvider
     * @return Supplies
     */
    public function setIdProvider($idProvider)
    {
        $this->idProvider = $idProvider;
        return $this;
    }


    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param mixed $idProduct
     * @return Supplies
     */
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
        return $this;
    }


}
