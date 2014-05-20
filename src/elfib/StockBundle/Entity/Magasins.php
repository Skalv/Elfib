<?php

namespace elfib\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Magasins
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\StockBundle\Entity\MagasinsRepository")
 */
class Magasins
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=40)
     * @Assert\NotBlank()
     */
    private $libelle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    /**
     * @ORM\OneToMany(targetEntity="elfib\StockBundle\Entity\Emplacements", mappedBy="magasin")
     */
    protected $emplacements;

    public function __construct()
    {
        $this->emplacements = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Magasins
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add emplacements
     *
     * @param \elfib\StockBundle\Entity\Emplacements $emplacements
     * @return Magasins
     */
    public function addEmplacement(\elfib\StockBundle\Entity\Emplacements $emplacements)
    {
        $this->emplacements[] = $emplacements;
    
        return $this;
    }

    /**
     * Remove emplacements
     *
     * @param \elfib\StockBundle\Entity\Emplacements $emplacements
     */
    public function removeEmplacement(\elfib\StockBundle\Entity\Emplacements $emplacements)
    {
        $this->emplacements->removeElement($emplacements);
    }

    /**
     * Get emplacements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmplacements()
    {
        return $this->emplacements;
    }

    /**
     * Set actif
     *
     * @param \boolean $actif
     * @return Magasins
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    
        return $this;
    }

    /**
     * Get actif
     *
     * @return \boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Test si un magasin à des emplacements de définis.
     *
     * @return boolean $hasEmp
     */
    public function hasEmplacement()
    {
      return (count($this->getEmplacements()) > 0)? true : false;
    }
}