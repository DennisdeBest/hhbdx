<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boisson
 *
 * @ORM\Table(name="hhbdx_boisson")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BoissonRepository")
 */
class Boisson
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\column(name="name", type="string")
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="prixNormal", type="float")
     */
    private $prixNormal;

    /**
     * @var float
     *
     * @ORM\Column(name="prixHH", type="float")
     */
    private $prixHH;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prixNormal
     *
     * @param float $prixNormal
     *
     * @return Boisson
     */
    public function setPrixNormal($prixNormal)
    {
        $this->prixNormal = $prixNormal;

        return $this;
    }

    /**
     * Get prixNormal
     *
     * @return float
     */
    public function getPrixNormal()
    {
        return $this->prixNormal;
    }

    /**
     * Set prixHH
     *
     * @param float $prixHH
     *
     * @return Boisson
     */
    public function setPrixHH($prixHH)
    {
        $this->prixHH = $prixHH;

        return $this;
    }

    /**
     * Get prixHH
     *
     * @return float
     */
    public function getPrixHH()
    {
        return $this->prixHH;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Boisson
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
