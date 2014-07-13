<?php

namespace elfib\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MatierePremiere
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="elfib\ArticleBundle\Entity\MatierePremiereRepository")
 */
class MatierePremiere
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var collection
     *
     * @ORM\ManyToMany(targetEntity="elfib\CommercialBundle\Entity\Fournisseurs", cascade={"persist"})
     */
    private $fournisseurs;

    /**
     * @var string
     *
     * @ORM\Column(name="qrcode", type="string", length=255)
     */
    private $qrcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="seuilMini", type="integer")
     */
    private $seuilMini;

    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
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
     * @return MatierePremiere
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return MatierePremiere
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
     * Set prix
     *
     * @param integer $prix
     * @return MatierePremiere
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set fournisseurs
     *
     * @param array $fournisseurs
     * @return MatierePremiere
     */
    public function setFournisseurs($fournisseurs)
    {
        $this->fournisseurs = $fournisseurs;
    
        return $this;
    }

    /**
     * Get fournisseurs
     *
     * @return array 
     */
    public function getFournisseurs()
    {
        return $this->fournisseurs;
    }

    /**
     * Set seuilMini
     *
     * @param integer $seuilMini
     * @return MatierePremiere
     */
    public function setSeuilMini($seuilMini)
    {
        $this->seuilMini = $seuilMini;
    
        return $this;
    }

    /**
     * Get seuilMini
     *
     * @return integer 
     */
    public function getSeuilMini()
    {
        return $this->seuilMini;
    }

    /**
     * Get web path
     *
     * @return $path string
     */
    public function getQRWebPath()
    {
        return "/img/qrcodes";
    }

    /**
     * Get absolute Path.
     *
     * @return $path
     */
    public function getQRAbsolutePath()
    {
        return "/var/www/project/web".$this->getQRWebPath();
    }

    /**
     * Generate QRCode.
     *
     * @return $name string Name of png created.
     */
    public function GenerateQRCode()
    {
        $viewPath = $this->getQRWebPath();
        $absolutePath = $this->getQRAbsolutePath();
        $name = "qr-".$this->getLibelle().'.png';
        $dr = DIRECTORY_SEPARATOR;

        \PHPQRCode\QRcode::png($viewPath, $absolutePath.$dr.$name, 'L', 4, 2);

        $this->qrcode = $this->getQRWebPath().DIRECTORY_SEPARATOR.$name;
    }

    /**
     * get Qrcode.
     *
     * @return $path Webpath of QRCode
     */
    public function getQRCode()
    {
        return $this->qrcode;
    }

    /**
     * Set qrcode
     *
     * @param string $qrcode
     * @return Nomenclatures
     */
    public function setQrcode($qrcode)
    {
        $this->qrcode = $qrcode;
    
        return $this;
    }
}