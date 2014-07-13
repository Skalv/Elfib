<?php

namespace elfib\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\ArrayCollection;

/**
 * Composant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\ArticleBundle\Entity\ComposantRepository")
 */
class Composant
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
     * @ORM\ManyToOne(targetEntity="elfib\ArticleBundle\Entity\ProduitFini", inversedBy="composants", cascade={"persist"})
     */
    private $produitFini;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="elfib\ArticleBundle\Entity\MatierePremiere", cascade={"persist"})
     */
    private $matierePremiere;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    public function __construct()
    {

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
     * Set produitFini
     *
     * @param string $produitFini
     * @return Composant
     */
    public function setProduitFini($produitFini)
    {
        $this->produitFini = $produitFini;
    
        return $this;
    }

    /**
     * Get produitFini
     *
     * @return string 
     */
    public function getProduitFini()
    {
        return $this->produitFini;
    }

    /**
     * Set matierePremiere
     *
     * @param string $matierePremiere
     * @return Composant
     */
    public function setMatierePremiere($matierePremiere)
    {
        $this->matierePremiere = $matierePremiere;
    
        return $this;
    }

    /**
     * Get matierePremiere
     *
     * @return string 
     */
    public function getMatierePremiere()
    {
        return $this->matierePremiere;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Composant
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}
