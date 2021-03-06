<?php

namespace elfib\MouvementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use elfib\MouvementBundle\Entity\Mouvement;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * livraisonMP
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\MouvementBundle\Entity\livraisonMPRepository")
 */
class livraisonMP extends Mouvement
{
    /**
     * @var string
     *
     * @ORM\Column(name="typeMouvement", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $typeMouvement;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="elfib\CommercialBundle\Entity\Fournisseurs", cascade={"persist"})
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="destinataire", type="string", length=255)
     */
    private $destinataire;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="elfib\ArticleBundle\Entity\MatierePremiere", cascade={"persist"})
     */
    private $matierePremiere;

    public function __construct()
    {
        $this->typeMouvement = "entre";
    }

    /**
     * Set expediteur
     *
     * @param string $expediteur
     * @return livraisonMP
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;
    
        return $this;
    }

    /**
     * Get expediteur
     *
     * @return string 
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire
     *
     * @param string $destinataire
     * @return livraisonMP
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;
    
        return $this;
    }

    /**
     * Get destinataire
     *
     * @return string 
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set typeMouvement
     *
     * @param string $typeMouvement
     * @return livraisonMP
     */
    public function setTypeMouvement($typeMouvement)
    {
        $this->typeMouvement = $typeMouvement;
    
        return $this;
    }

    /**
     * Get typeMouvement
     *
     * @return string 
     */
    public function getTypeMouvement()
    {
        return $this->typeMouvement;
    }

    public function setMatierePremiere($matierePremiere)
    {
        $this->matierePremiere = $matierePremiere;
    }

    public function getMatierePremiere()
    {
        return $this->matierePremiere;
    }
}