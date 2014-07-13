<?php

namespace elfib\MouvementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Mouvement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\MouvementBundle\Entity\MouvementRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="inheritance", type="string")
 * @ORM\DiscriminatorMap({
 *   "livraisonMP" = "livraisonMP",
 *   "commandePF" = "commandePF",
 *   "livraisonPF" = "livraisonPF",
 *   "commandeMP" = "commandeMP",
 *  })
 */
class Mouvement
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
     * @var emplacement
     *
     * @ORM\OneToOne(targetEntity="elfib\StockBundle\Entity\Emplacements", cascade={"persist"})
     */
    private $emplacementDepart;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="elfib\StockBundle\Entity\Emplacements", cascade={"persist"})
     */
    private $emplacementArrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     * @Assert\NotBlank()
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataExecution", type="datetime")
     * @Assert\NotBlank()
     */
    private $dataExecution;

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
     * Set typeMouvement
     *
     * @param string $typeMouvement
     * @return Mouvement
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

    /**
     * Set emplacementDepart
     *
     * @param string $emplacementDepart
     * @return Mouvement
     */
    public function setEmplacementDepart($emplacementDepart)
    {
        $this->emplacementDepart = $emplacementDepart;
    
        return $this;
    }

    /**
     * Get emplacementDepart
     *
     * @return string 
     */
    public function getEmplacementDepart()
    {
        return $this->emplacementDepart;
    }

    /**
     * Set emplacementArrive
     *
     * @param string $emplacementArrive
     * @return Mouvement
     */
    public function setEmplacementArrive($emplacementArrive)
    {
        $this->emplacementArrive = $emplacementArrive;
    
        return $this;
    }

    /**
     * Get emplacementArrive
     *
     * @return string 
     */
    public function getEmplacementArrive()
    {
        return $this->emplacementArrive;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Mouvement
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set quantite
     *
     * @param string $quantite
     * @return Mouvement
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return string 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set dataExecution
     *
     * @param \DateTime $dataExecution
     * @return Mouvement
     */
    public function setDataExecution($dataExecution)
    {
        $this->dataExecution = $dataExecution;
    
        return $this;
    }

    /**
     * Get dataExecution
     *
     * @return \DateTime 
     */
    public function getDataExecution()
    {
        return $this->dataExecution;
    }

    /**
     * Set expediteur
     *
     * @param string $expediteur
     * @return Mouvement
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
     * @return Mouvement
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
}