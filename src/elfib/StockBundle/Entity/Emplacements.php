<?php

namespace elfib\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Emplacements
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\StockBundle\Entity\EmplacementsRepository")
 */
class Emplacements
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
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer")
     * @Assert\NotBlank()
     */
    private $capacite;

    /**
     * @var integer
     *
     * @ORM\Column(name="currentOccupancy", type="integer")
     */
    private $currentOccupancy;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="elfib\StockBundle\Entity\Magasins",
     *   cascade={"persist"},
     *   inversedBy="magasin")
     * @Assert\NotBlank()
     */
    private $magasin;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="elfib\ArticleBundle\Entity\ProduitFini")
     */
    private $produitFini;

    /**
     * @ORM\ManyToOne(targetEntity="elfib\ArticleBundle\Entity\MatierePremiere")
     */
    private $matierePremiere;

    /**
     * @ORM\Column(name="dateEntre", type="datetime")
     */
    private $dateEntre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    public function __construct()
    {
        $this->currentOccupancy = 0;
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
     * @return Emplacements
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
     * Set Date entre
     */
    public function setDateEntre($date)
    {
        $this->dateEntre = $date;

        return $this;
    }

    /**
     * get date Entre
     */
    public function getDateEntre()
    {
        return $this->dateEntre;
    }

    /**
     * Set capacite
     *
     * @param integer $capacite
     * @return Emplacements
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    
        return $this;
    }

    /**
     * Get capacite
     *
     * @return integer 
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * Set magasin
     *
     * @param \elfib\StockBundle\Entity\Magasins $magasin
     * @return Emplacements
     */
    public function setMagasin(\elfib\StockBundle\Entity\Magasins $magasin = null)
    {
        $this->magasin = $magasin;
    
        return $this;
    }

    /**
     * Get magasin
     *
     * @return \elfib\StockBundle\Entity\Magasins 
     */
    public function getMagasin()
    {
        return $this->magasin;
    }

    /**
     * Set nomenclature
     *
     * @param \elfib\ArticleBundle\Entity\Nomenclatures $nomenclature
     * @return Emplacements
     */
    public function setNomenclature($nomenclature = null)
    {
        if (get_class($nomenclature) == "elfib\ArticleBundle\Entity\MatierePremiere") {
            $this->matierePremiere = $nomenclature;
        } else if(get_class($nomenclature) == "elfib\ArticleBundle\Entity\ProduitFini") {
            $this->produitFini = $nomenclature;
        }
    
        return $this;
    }

    /**
     * Get nomenclature
     *
     * @return \elfib\ArticleBundle\Entity\Nomenclatures 
     */
    public function getNomenclature()
    {
        return ($this->matierePremiere)? $this->matierePremiere : $this->produitFini;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Emplacements
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    
        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Test si l'emplacement est vide ou non
     *
     * @return boolean
     */
    public function hasNomenclature()
    {
        return (count($this->getNomenclature()) > 0)? true : false;
    }

    /**
     * Set currentOccupancy
     *
     * @param integer $currentOccupancy
     * @return Emplacements
     */
    public function setCurrentOccupancy($currentOccupancy)
    {
        $this->currentOccupancy = $currentOccupancy;
    
        return $this;
    }

    /**
     * Get currentOccupancy
     *
     * @return integer 
     */
    public function getCurrentOccupancy()
    {
        return $this->currentOccupancy;
    }
}