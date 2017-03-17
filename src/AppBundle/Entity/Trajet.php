<?php
namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as CSTRT;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Trajet")
* @ORM\Entity(repositoryClass="AppBundle\Repository\TrajetRepository")
*/
class Trajet
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
	* @ORM\Column(name="ID_conducteur", type="integer")
	* @ORM\ManyToOne(targetEntity="Personne")
	* @ORM\JoinColumn(name="ID_conducteur", referencedColumnName="ID_personne")
	*/
	private $ID_conducteur;
	/**
	* Un trajet utilise un seul vehicule
	* Un vehicule peut etre utlisé pour plusieurs trajets
	* @ORM\Column(name="ID_vehicule", type="integer", nullable=true)
	* @ORM\ManyToOne(targetEntity="Vehicule")
	* @ORM\JoinColumn(name="ID_vehicule", referencedColumnName="ID_vehicule")
	*/
	private $ID_vehicule;
	/**
	* @ORM\Column(name="description", type="string", nullable=true)
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
	* @ORM\Column(name="ID_villedep", type="string")
	*
	* @CSTRT\NotBlank(groups={"Trajet"})
	*/
	private $ID_villedep;
	/**
	* @ORM\Column(name="villefin", type="string")
	*
	*
	*/
	private $villefin;
	/**
	* @ORM\Column(name="ID_villefin", type="string")
	* @CSTRT\NotBlank(groups={"Trajet"})
	*
	*/
	private $ID_villefin;

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
	*@ORM\Column(name="reservedBy", type="integer")
	*Plusieurs personnes qui ont reservé le trajet
	* @ORM\ManyToMany(targetEntity="Personne")
	* @ORM\JoinColumn(name="ID_conducteur", referencedColumnName="ID_personne")
	*@ORM\JoinColumn(nullable=true)
	*/
	private $reservedBy;

	/**
	* Get iDTrajet
	*
	* @return integer
	*/
	public function getID_Trajet()
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
	* Set iDConducteur
	*
	* @param integer $iDConducteur
	*
	* @return Trajet
	*/
	public function setIDConducteur($iDConducteur)
	{
		$this->ID_conducteur = $iDConducteur;

		return $this;
	}

	/**
	* Get iDConducteur
	*
	* @return integer
	*/
	public function getID_Conducteur()
	{
		return $this->ID_conducteur;
	}

	/**
	* Set iDVehicule
	*
	* @param integer $iDVehicule
	*
	* @return Trajet
	*/
	public function setIDVehicule($iDVehicule)
	{
		$this->ID_vehicule = $iDVehicule;

		return $this;
	}

	/**
	* Get iDVehicule
	*
	* @return integer
	*/
	public function getIDVehicule()
	{
		return $this->ID_vehicule;
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
	* Set iDVilledep
	*
	* @param string $iDVilledep
	*
	* @return Trajet
	*/
	public function setIDVilledep($iDVilledep)
	{
		$this->ID_villedep = $iDVilledep;

		return $this;
	}

	/**
	* Get iDVilledep
	*
	* @return string
	*/
	public function getID_Villedep()
	{
		return $this->ID_villedep;
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
	* Set iDVillefin
	*
	* @param string $iDVillefin
	*
	* @return Trajet
	*/
	public function setIDVillefin($iDVillefin)
	{
		$this->ID_villefin = $iDVillefin;

		return $this;
	}

	/**
	* Get iDVillefin
	*
	* @return string
	*/
	public function getID_Villefin()
	{
		return $this->ID_villefin;
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
		if(!$date instanceof StringType)
		{
			$this->date = $date;
		}else{
			$this->date = date_create($date);
		}

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
}
