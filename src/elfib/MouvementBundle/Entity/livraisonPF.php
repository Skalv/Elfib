<?php

namespace elfib\MouvementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use elfib\MouvementBundle\Entity\Mouvement;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * livraisonPF
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\MouvementBundle\Entity\livraisonPFRepository")
 */
class livraisonPF extends Mouvement
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
     * @ORM\Column(name="expediteur", type="string", length=255)
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="destinataire", type="string", length=255)
     * @ORM\OneToOne(targetEntity="elfib\CommercialBundle\Entity\Clients", cascade={"persist"})
     */
    private $destinataire;

    public function __construct()
    {
        $this->typeMouvement = "sortie";
    }

    /**
     * Set expediteur
     *
     * @param string $expediteur
     * @return livraisonPF
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
     * @return livraisonPF
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
     * @return livraisonPF
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
}