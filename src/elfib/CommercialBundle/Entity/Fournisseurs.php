<?php

namespace elfib\CommercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fournisseurs
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\CommercialBundle\Entity\FournisseursRepository")
 */
class Fournisseurs
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
     * @ORM\Column(name="code", type="string", length=6)
     * @Assert\Length(
     *          min = "6",
     *          max = "6",
     *          exactMessage = "Le code client doit faire {{ limit }} caractères."
     * )
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="adrRue", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $adrRue;

    /**
     * @var string
     *
     * @ORM\Column(name="adrCP", type="string", length=5)
     * @Assert\Length(
     *          min = "5",
     *          max = "5",
     *          exactMessage = "Le code postal doit faire {{ limit }} caractères."
     * )
     */
    private $adrCP;

    /**
     * @var string
     *
     * @ORM\Column(name="adrVille", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $adrVille;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=80)
     * @Assert\NotBlank()
     */
    private $nom;

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
     * @ORM\Column(name="email", type="string", length=40)
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="elfib\ArticleBundle\Entity\MatierePremiere", cascade={"persist"})
     */
    private $matierePremieres;

    public function __construct()
    {
        $this->matierePremieres = new ArrayCollection();
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
     * Set code
     *
     * @param string $code
     * @return Fournisseurs
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set adrRue
     *
     * @param string $adrRue
     * @return Fournisseurs
     */
    public function setAdrRue($adrRue)
    {
        $this->adrRue = $adrRue;
    
        return $this;
    }

    /**
     * Get adrRue
     *
     * @return string 
     */
    public function getAdrRue()
    {
        return $this->adrRue;
    }

    /**
     * Set adrCP
     *
     * @param string $adrCP
     * @return Fournisseurs
     */
    public function setAdrCP($adrCP)
    {
        $this->adrCP = $adrCP;
    
        return $this;
    }

    /**
     * Get adrCP
     *
     * @return string 
     */
    public function getAdrCP()
    {
        return $this->adrCP;
    }

    /**
     * Set adrVille
     *
     * @param string $adrVille
     * @return Fournisseurs
     */
    public function setAdrVille($adrVille)
    {
        $this->adrVille = $adrVille;
    
        return $this;
    }

    /**
     * Get adrVille
     *
     * @return string 
     */
    public function getAdrVille()
    {
        return $this->adrVille;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Fournisseurs
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
     * Set fax
     *
     * @param string $fax
     * @return Fournisseurs
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
     * Set tel
     *
     * @param string $tel
     * @return Fournisseurs
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
     * Set email
     *
     * @param string $email
     * @return Fournisseurs
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Fournisseurs
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
     * Add matierePremieres
     *
     * @param \elfib\ArticleBundle\Entity\MatierePremiere $matierePremieres
     * @return Fournisseurs
     */
    public function addMatierePremiere(\elfib\ArticleBundle\Entity\MatierePremiere $matierePremieres)
    {
        $this->matierePremieres[] = $matierePremieres;
    
        return $this;
    }

    /**
     * Remove matierePremieres
     *
     * @param \elfib\ArticleBundle\Entity\MatierePremiere $matierePremieres
     */
    public function removeMatierePremiere(\elfib\ArticleBundle\Entity\MatierePremiere $matierePremieres)
    {
        $this->matierePremieres->removeElement($matierePremieres);
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