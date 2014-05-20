<?php

namespace elfib\MouvementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use elfib\MouvementBundle\Entity\Mouvement;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * commandeMP
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\MouvementBundle\Entity\commandeMPRepository")
 */
class commandeMP extends Mouvement
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
     * @ORM\OneToOne(targetEntity="elfib\CommercialBundle\Entity\Fournisseurs", cascade={"persist"})
     */
    private $destinataire;

    public function __construct()
    {
        $this->typeMouvement = "entre";
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
     * Set expediteur
     *
     * @param string $expediteur
     * @return commandeMP
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
     * @return commandeMP
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
     * @return commandeMP
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