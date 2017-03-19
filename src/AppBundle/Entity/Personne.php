<?php
namespace AppBundle\Entity;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Validator\Constraints as CSTRT;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Repository\PersonneRepository;
/**
 * @ORM\Entity
 * @ORM\Table(name="Personne")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonneRepository")
 */
class Personne
{
	/**
	 * Clé primaire de Personne et etrangere d euser
     * One personne has One user.
     * @ORM\Id
     * @ORM\Column(name="ID_personne", type="integer")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="ID_personne", referencedColumnName="ID_user")
     */
	private $ID_personne;
	/**
	 * @ORM\Column(name="nom", type="string")
     * @CSTRT\NotBlank(groups={"Profile"})
	 * @CSTRT\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Ton nom ne peut pas contenir de nombre"
	 *     )
	 */
	private $nom;
	/**
	 * @CSTRT\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Ton prenom ne peut pas contenir de nombre"
	 *     )
     * @CSTRT\NotBlank(groups={"Profile"})
	 * @ORM\Column(name="prenom", type="string")
	 */
	private $prenom;
	/**
     * @CSTRT\NotBlank(groups={"Profile"})
	 * @CSTRT\LessThanOrEqual("-18 years")
	 * @ORM\Column(name="dateNaissance", type="date")
	 */
	private $dateNaissance;
	/**
	 * @CSTRT\Choice(choices = {"1", "0"}, message = "Choisisez un sexe valide.")
     * @CSTRT\NotBlank(groups={"Profile"})
	 * @ORM\Column(name="sexe", type="boolean")
	 */
	private $sexe;

	 /**
     * Constructor
     */
    public function __construct()
    {
        $this->voitures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get iDPersonne
     *
     * @return integer
     */
    public function getIDPersonne()
    {
        return $this->ID_personne;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Personne
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Personne
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Personne
     */
    public function setDateNaissance($dateNaissance)
    {
        if(!$dateNaissance instanceof StringType)
        {
            $this->dateNaissance = $dateNaissance;
        }else{
            $this->dateNaissance = date_create($dateNaissance);
        }
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
    public function getDateNaissanceString()
    {
        return $this->dateNaissance->format('Y-m-d');
    }

    /**
     * Set sexe
     *
     * @param boolean $sexe
     *
     * @return Personne
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    /**
     * Get sexe
     *
     * @return boolean
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set iDPersonne
     *
     * @param integer $iDPersonne
     *
     * @return Personne
     */
    public function setIDPersonne($iDPersonne)
    {
        $this->ID_personne = $iDPersonne;

        return $this;
    }
}
