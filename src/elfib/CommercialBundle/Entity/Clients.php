<?php

namespace elfib\CommercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Clients
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\CommercialBundle\Entity\ClientsRepository")
 */
class Clients
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
     * @ORM\Column(name="nom", type="string", length=40)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=40)
     * @Assert\NotBlank()
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="sieRue", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $sieRue;

    /**
     * @var string
     *
     * @ORM\Column(name="sieCP", type="string", length=5)
     * @Assert\Length(
     *          min = "5",
     *          max = "5",
     *          exactMessage = "Le code postal doit faire {{ limit }} caractères."
     * )
     */
    private $sieCP;

    /**
     * @var string
     *
     * @ORM\Column(name="sieVille", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $sieVille;

    /**
     * @var string
     *
     * @ORM\Column(name="livRue", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $livRue;

    /**
     * @var string
     *
     * @ORM\Column(name="livCP", type="string", length=5)
     * @Assert\Length(
     *          min = "5",
     *          max = "5",
     *          exactMessage = "Le code postal doit faire {{ limit }} caractères."
     * )
     */
    private $livCP;

    /**
     * @var string
     *
     * @ORM\Column(name="livVille", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $livVille;

    /**
     * @var string
     *
     * @ORM\Column(name="facRue", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $facRue;

    /**
     * @var string
     *
     * @ORM\Column(name="facCP", type="string", length=5)
     * @Assert\Length(
     *          min = "5",
     *          max = "5",
     *          exactMessage = "Le code postal doit faire {{ limit }} caractères."
     * )
     */
    private $facCP;

    /**
     * @var string
     *
     * @ORM\Column(name="facVille", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $facVille;

    /**
     * @var string
     *
     * @ORM\Column(name="formeJuridique", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $formeJuridique;

    /**
     * @var string
     *
     * @ORM\Column(name="rcs", type="string", length=25)
     * @Assert\NotBlank()
     */
    private $rcs;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=14)
     * @Assert\Length(
     *          min = "14",
     *          max = "14",
     *          exactMessage = "Le numéro de siret doit faire {{ limit }} caractères."
     * )
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="stdTel", type="string", length=10)
     * @Assert\Length(
     *          min = "10",
     *          max = "10",
     *          exactMessage = "Le numéro de téléphone doit faire {{ limit }} caractères."
     * )
     */
    private $stdTel;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=10)
     * @Assert\Length(
     *          min = "10",
     *          max = "10",
     *          exactMessage = "Le numéro de téléphone doit faire {{ limit }} caractères."
     * )
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=10)
     * @Assert\Length(
     *          min = "10",
     *          max = "10",
     *          exactMessage = "Le numéro de fax doit faire {{ limit }} caractères."
     * )
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="ca", type="integer")
     * @Assert\NotBlank()
     */
    private $ca;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;


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
     * Set nom
     *
     * @param string $nom
     * @return Clients
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
     * Set activite
     *
     * @param string $activite
     * @return Clients
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;
    
        return $this;
    }

    /**
     * Get activite
     *
     * @return string 
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set sieRue
     *
     * @param string $sieRue
     * @return Clients
     */
    public function setSieRue($sieRue)
    {
        $this->sieRue = $sieRue;
    
        return $this;
    }

    /**
     * Get sieRue
     *
     * @return string 
     */
    public function getSieRue()
    {
        return $this->sieRue;
    }

    /**
     * Set sieCP
     *
     * @param string $sieCP
     * @return Clients
     */
    public function setSieCP($sieCP)
    {
        $this->sieCP = $sieCP;
    
        return $this;
    }

    /**
     * Get sieCP
     *
     * @return string 
     */
    public function getSieCP()
    {
        return $this->sieCP;
    }

    /**
     * Set sieVille
     *
     * @param string $sieVille
     * @return Clients
     */
    public function setSieVille($sieVille)
    {
        $this->sieVille = $sieVille;
    
        return $this;
    }

    /**
     * Get sieVille
     *
     * @return string 
     */
    public function getSieVille()
    {
        return $this->sieVille;
    }

    /**
     * Set livRue
     *
     * @param string $livRue
     * @return Clients
     */
    public function setLivRue($livRue)
    {
        $this->livRue = $livRue;
    
        return $this;
    }

    /**
     * Get livRue
     *
     * @return string 
     */
    public function getLivRue()
    {
        return $this->livRue;
    }

    /**
     * Set livCP
     *
     * @param string $livCP
     * @return Clients
     */
    public function setLivCP($livCP)
    {
        $this->livCP = $livCP;
    
        return $this;
    }

    /**
     * Get livCP
     *
     * @return string 
     */
    public function getLivCP()
    {
        return $this->livCP;
    }

    /**
     * Set livVille
     *
     * @param string $livVille
     * @return Clients
     */
    public function setLivVille($livVille)
    {
        $this->livVille = $livVille;
    
        return $this;
    }

    /**
     * Get livVille
     *
     * @return string 
     */
    public function getLivVille()
    {
        return $this->livVille;
    }

    /**
     * Set facRue
     *
     * @param string $facRue
     * @return Clients
     */
    public function setFacRue($facRue)
    {
        $this->facRue = $facRue;
    
        return $this;
    }

    /**
     * Get facRue
     *
     * @return string 
     */
    public function getFacRue()
    {
        return $this->facRue;
    }

    /**
     * Set facCP
     *
     * @param string $facCP
     * @return Clients
     */
    public function setFacCP($facCP)
    {
        $this->facCP = $facCP;
    
        return $this;
    }

    /**
     * Get facCP
     *
     * @return string 
     */
    public function getFacCP()
    {
        return $this->facCP;
    }

    /**
     * Set facVille
     *
     * @param string $facVille
     * @return Clients
     */
    public function setFacVille($facVille)
    {
        $this->facVille = $facVille;
    
        return $this;
    }

    /**
     * Get facVille
     *
     * @return string 
     */
    public function getFacVille()
    {
        return $this->facVille;
    }

    /**
     * Set formeJuridique
     *
     * @param string $formeJuridique
     * @return Clients
     */
    public function setFormeJuridique($formeJuridique)
    {
        $this->formeJuridique = $formeJuridique;
    
        return $this;
    }

    /**
     * Get formeJuridique
     *
     * @return string 
     */
    public function getFormeJuridique()
    {
        return $this->formeJuridique;
    }

    /**
     * Set rcs
     *
     * @param string $rcs
     * @return Clients
     */
    public function setRcs($rcs)
    {
        $this->rcs = $rcs;
    
        return $this;
    }

    /**
     * Get rcs
     *
     * @return string 
     */
    public function getRcs()
    {
        return $this->rcs;
    }

    /**
     * Set siret
     *
     * @param string $siret
     * @return Clients
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
    
        return $this;
    }

    /**
     * Get siret
     *
     * @return string 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set stdTel
     *
     * @param string $stdTel
     * @return Clients
     */
    public function setStdTel($stdTel)
    {
        $this->stdTel = $stdTel;
    
        return $this;
    }

    /**
     * Get stdTel
     *
     * @return string 
     */
    public function getStdTel()
    {
        return $this->stdTel;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Clients
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Clients
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set ca
     *
     * @param integer $ca
     * @return Clients
     */
    public function setCa($ca)
    {
        $this->ca = $ca;
    
        return $this;
    }

    /**
     * Get ca
     *
     * @return integer 
     */
    public function getCa()
    {
        return $this->ca;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Clients
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
}