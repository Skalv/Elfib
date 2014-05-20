<?php

namespace elfib\MouvementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use elfib\MouvementBundle\Entity\Mouvement;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * commandePF
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\MouvementBundle\Entity\commandePFRepository")
 */
class commandePF extends Mouvement
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
     * @ORM\OneToOne(targetEntity="elfib\CommercialBundle\Entity\Client", cascade={"persist"})
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="destinataire", type="string", length=255)
     */
    private $destinataire;

    public function __construct()
    {
        $this->typeMouvement = "transfert";
    }

    /**
     * Set expediteur
     *
     * @param string $expediteur
     * @return commandePF
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
     * @return commandePF
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
     * @return commandePF
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