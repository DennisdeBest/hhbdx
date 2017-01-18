<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Bar
 *
 * @ORM\Table(name="hhbdx_bar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BarRepository")
 * @Vich\Uploadable
 */
class Bar
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
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="photo1", type="string", length=255)
     */
    private $photo1;

    /**
     * @var string
     *
     * @ORM\Column(name="photo2", type="string", length=255)
     */
    private $photo2;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile2;

    private $updatedAt;

    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeBar")
     */
    private $type;

    /**
     * @var Boisson[]ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Boisson")
     */
    private $boissons;

    /**
     * @var Creneauhh
     *
     * @ @ORM\ManyToOne(targetEntity="Creneauhh", cascade={"persist"})
     */
    private $creneauhh;


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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Bar
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set photo1
     *
     * @param string $photo1
     *
     * @return Bar
     */
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function setImageFile(File $photo1 = null)
    {
        $this->imageFile = $photo1;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($photo1) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function setImageFile2(File $photo2 = null)
    {
        $this->imageFile = $photo2;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($photo2) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getImageFile2()
    {
        return $this->imageFile2;
    }

    /**
     * Get photo1
     *
     * @return string
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }

    /**
     * Set photo2
     *
     * @param string $photo2
     *
     * @return Bar
     */
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;

        return $this;
    }

    /**
     * Get photo2
     *
     * @return string
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Bar
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Bar
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boissons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\TypeBar $type
     *
     * @return Bar
     */
    public function setType(\AppBundle\Entity\TypeBar $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\TypeBar
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add boisson
     *
     * @param \AppBundle\Entity\Boisson $boisson
     *
     * @return Bar
     */
    public function addBoisson(\AppBundle\Entity\Boisson $boisson)
    {
        $this->boissons[] = $boisson;

        return $this;
    }

    /**
     * Remove boisson
     *
     * @param \AppBundle\Entity\Boisson $boisson
     */
    public function removeBoisson(\AppBundle\Entity\Boisson $boisson)
    {
        $this->boissons->removeElement($boisson);
    }

    /**
     * Get boissons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoissons()
    {
        return $this->boissons;
    }

    /**
     * Set creneauHH
     *
     * @param \AppBundle\Entity\Creneauhh $creneauhh
     *
     * @return Bar
     */
    public function setCreneauhh(\AppBundle\Entity\Creneauhh $creneauhh = null)
    {
        $this->creneauhh = $creneauhh;

        return $this;
    }

    /**
     * Get creneauhh
     *
     * @return \AppBundle\Entity\Creneauhh
     */
    public function getCreneauhh()
    {
        return $this->creneauhh;
    }

}
