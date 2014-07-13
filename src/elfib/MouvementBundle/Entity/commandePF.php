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
     * @ORM\OneToOne(targetEntity="elfib\CommercialBundle\Entity\Clients", cascade={"persist"})
     */
    private $destinataire;

    /**
     * @ORM\OnetoOne(targetEntity="elfib\ArticleBundle\Entity\ProduitFini")
     */
    private $produitFini;

    public function __construct()
    {
        $this->typeMouvement = "transfert";
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

    /**
     * Set produitFini
     */
    public function setProduitFini($produitFini)
    {
        $this->produitFini = $produitFini;

        return $this;
    }

    /**
     * Get produit Fini
     */
    public function getProduitFini()
    {
        return $this->produitFini;
    }
}