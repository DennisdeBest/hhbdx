<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneauhh
 *
 * @ORM\Table(name="hhbdx_crenau_hh")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreneauhhRepository")
 */
class Creneauhh
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
     * @var Jour
     *
     * @ORM\ManyToOne(targetEntity="Jour", cascade={"persist"})
     */
    private $jour;

    /**
     * @var Heure
     *
     * @ORM\ManyToOne(targetEntity="Heure", cascade={"persist"})
     */
    private $heureDebut;

    /**
     * @var Heure
     *
     * @ORM\ManyToOne(targetEntity="Heure", cascade={"persist"})
     */
    private $heureFin;

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
     * Set jour
     *
     * @param \AppBundle\Entity\Jour $jour
     *
     * @return Creneauhh
     */
    public function setJour(\AppBundle\Entity\Jour $jour = null)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \AppBundle\Entity\Jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set heureDebut
     *
     * @param \AppBundle\Entity\Heure $heureDebut
     *
     * @return Creneauhh
     */
    public function setHeureDebut(\AppBundle\Entity\Heure $heureDebut = null)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return \AppBundle\Entity\Heure
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin
     *
     * @param \AppBundle\Entity\Heure $heureFin
     *
     * @return Creneauhh
     */
    public function setHeureFin(\AppBundle\Entity\Heure $heureFin = null)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return \AppBundle\Entity\Heure
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }
}
