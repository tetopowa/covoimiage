<?php
namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as CSTRT;
use Doctrine\ORM\Mapping as ORM;
use Eko\FeedBundle\Item\Writer\ItemInterface;

/**
* @ORM\Entity
* @ORM\Table(name="Trajet")
* @ORM\Entity(repositoryClass="AppBundle\Repository\TrajetRepository")
*/
class Trajet implements ItemInterface
{
	/**
	* Clé primaire de Trajet
	* @ORM\Column(name="ID_trajet", type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $ID_trajet;
	/**
	* @ORM\Column(name="nbplaces", type="integer")
	*/
	private $nbplaces;
	/**
	* Un personne est conducteur par trajet
	* @CSTRT\NotBlank(groups={"Trajet"})
	* Une personne peut être conducteur pour plusieurs trajet
	* @ORM\Column(name="IDconducteur", type="integer")
	* @ORM\ManyToOne(targetEntity="Personne")
	* @ORM\JoinColumn(name="IDconducteur", referencedColumnName="ID_personne")
	*/
	private $IDconducteur;
	/**
	* Description
	*
	* @ORM\Column(name="description", type="string")
	*/
	private $description;
	/**
	* @ORM\Column(name="villedep", type="string")
	*
	* @CSTRT\NotBlank(groups={"Trajet"})
	*
	*/
	private $villedep;
	/**
	* @ORM\Column(name="IDvilledep", type="string")
	*
	* @CSTRT\NotBlank(groups={"Trajet"})
	*/
	private $IDvilledep;
	/**
	* @ORM\Column(name="villefin", type="string")
	*
	*
	*/
	private $villefin;
	/**
	* @ORM\Column(name="IDvillefin", type="string")
	* @CSTRT\NotBlank(groups={"Trajet"})
	*
	*/
	private $IDvillefin;

	/**
	* @CSTRT\NotBlank(groups={"Trajet"})
	* @ORM\Column(name="date", type="date")
	*
	*/
	private $date;
	/**
	* @CSTRT\NotBlank(groups={"Trajet"})
	* @ORM\Column(name="min", type="integer")
	*
	*/
	private $min;
	/**
	* @CSTRT\NotBlank(groups={"Trajet"})
	* @ORM\Column(name="heure", type="integer")
	*
	*/
	private $heure;

	/**
	* @CSTRT\NotBlank(groups={"Trajet"})
	* @ORM\Column(name="prix", type="integer")
	*
	*/
	private $prix;


    /**
     * Get iDTrajet
     *
     * @return integer
     */
    public function getIDTrajet()
    {
        return $this->ID_trajet;
    }

    /**
     * Set nbplaces
     *
     * @param integer $nbplaces
     *
     * @return Trajet
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    /**
     * Get nbplaces
     *
     * @return integer
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * Set iDconducteur
     *
     * @param integer $iDconducteur
     *
     * @return Trajet
     */
    public function setIDconducteur($iDconducteur)
    {
        $this->IDconducteur = $iDconducteur;

        return $this;
    }

    /**
     * Get iDconducteur
     *
     * @return integer
     */
    public function getIDconducteur()
    {
        return $this->IDconducteur;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Trajet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set villedep
     *
     * @param string $villedep
     *
     * @return Trajet
     */
    public function setVilledep($villedep)
    {
        $this->villedep = $villedep;

        return $this;
    }

    /**
     * Get villedep
     *
     * @return string
     */
    public function getVilledep()
    {
        return $this->villedep;
    }

    /**
     * Set iDvilledep
     *
     * @param string $iDvilledep
     *
     * @return Trajet
     */
    public function setIDvilledep($iDvilledep)
    {
        $this->IDvilledep = $iDvilledep;

        return $this;
    }

    /**
     * Get iDvilledep
     *
     * @return string
     */
    public function getIDvilledep()
    {
        return $this->IDvilledep;
    }

    /**
     * Set villefin
     *
     * @param string $villefin
     *
     * @return Trajet
     */
    public function setVillefin($villefin)
    {
        $this->villefin = $villefin;

        return $this;
    }

    /**
     * Get villefin
     *
     * @return string
     */
    public function getVillefin()
    {
        return $this->villefin;
    }

    /**
     * Set iDvillefin
     *
     * @param string $iDvillefin
     *
     * @return Trajet
     */
    public function setIDvillefin($iDvillefin)
    {
        $this->IDvillefin = $iDvillefin;

        return $this;
    }

    /**
     * Get iDvillefin
     *
     * @return string
     */
    public function getIDvillefin()
    {
        return $this->IDvillefin;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Trajet
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set min
     *
     * @param integer $min
     *
     * @return Trajet
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min
     *
     * @return integer
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set heure
     *
     * @param integer $heure
     *
     * @return Trajet
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return integer
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Trajet
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

		public function getFeedItemTitle() {
			return $this->ID_trajet;
		}
		public function getFeedItemDescription() {
			return $this->description;
		}
		public function getFeedItemPubDate() {
			return $this->date;
		}
		public function getFeedItemLink() {
			return 'http://trajet/trajet/'.$this->ID_trajet;
		}
}
