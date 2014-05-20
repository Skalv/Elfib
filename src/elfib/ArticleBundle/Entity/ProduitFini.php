<?php

namespace elfib\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use elfib\ArticleBundle\Entity\Nomenclatures;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * ProduitFini
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\ArticleBundle\Entity\ProduitFiniRepository")
 */
class ProduitFini extends Nomenclatures
{
    /**
     * @var MatierePremiere
     *
     * @ORM\ManyToMany(targetEntity="elfib\ArticleBundle\Entity\MatierePremiere", cascade={"persist"})
     */
    private $matierePremieres;

    /**
     * Set composants
     *
     * @param array $composants
     * @return ProduitFini
     */
    public function setComposants($composants)
    {
        $this->composants = $composants;
    
        return $this;
    }

    /**
     * Get composants
     *
     * @return array 
     */
    public function getComposants()
    {
        return $this->composants;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emplacements;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $mouvements;


    /**
     * Add MatierePremiere
     *
     * @param \elfib\ArticleBundle\Entity\MatierePremiere $matierePremiere
     * @return ProduitFini
     */
    public function addMatierePremiere(\elfib\ArticleBundle\Entity\MatierePremiere $matierePremiere)
    {
        $this->MatierePremiere[] = $matierePremiere;
    
        return $this;
    }

    /**
     * Remove MatierePremiere
     *
     * @param \elfib\ArticleBundle\Entity\MatierePremiere $matierePremiere
     */
    public function removeMatierePremiere(\elfib\ArticleBundle\Entity\MatierePremiere $matierePremiere)
    {
        $this->MatierePremiere->removeElement($matierePremiere);
    }

    /**
     * Get MatierePremiere
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatierePremiere()
    {
        return $this->MatierePremiere;
    }

    /**
     * Add emplacements
     *
     * @param \elfib\StockBundle\Entity\Emplacements $emplacements
     * @return ProduitFini
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
     * Add mouvements
     *
     * @param \elfib\StockBundle\Entity\Emplacements $mouvements
     * @return ProduitFini
     */
    public function addMouvement(\elfib\StockBundle\Entity\Emplacements $mouvements)
    {
        $this->mouvements[] = $mouvements;
    
        return $this;
    }

    /**
     * Remove mouvements
     *
     * @param \elfib\StockBundle\Entity\Emplacements $mouvements
     */
    public function removeMouvement(\elfib\StockBundle\Entity\Emplacements $mouvements)
    {
        $this->mouvements->removeElement($mouvements);
    }

    /**
     * Get mouvements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMouvements()
    {
        return $this->mouvements;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matierePremieres = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get matierePremieres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatierePremieres()
    {
        return $this->matierePremieres;
    }
}