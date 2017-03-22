<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Persona
 *
 * @ORM\Table(name="persona")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonaRepository")
 */
class Persona
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100)
     */
    private $apellido;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     * @Assert\Range(
     *      min = 18,
     *      max = 90,
     *      minMessage = "person.age.min",
     *      maxMessage = "person.age.max",
     *      invalidMessage = "person.age.invalid"
     * )
     */
    private $edad;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer", unique=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string")
     * @Assert\Choice(choices = {"m", "f"},
     *  message = "person.gender.invalid")
     */
    private $genero;

    /**
     * @var bool
     *
     * @ORM\Column(name="catarroja", type="boolean")
     */
    private $catarroja;


    /**
     * @ORM\OneToMany(targetEntity="Anuncio", mappedBy="persona", cascade={"persist", "remove"})
     */
    protected $anuncios;

    /**
     * @ORM\OneToMany(targetEntity="Comercio", mappedBy="persona", cascade={"persist", "remove"})
     */
    protected $personas;
    
    public function __construct()
    {
        $this->anuncios = new ArrayCollection();
        $this->personas = new ArrayCollection();

    }

        public function __toString()
    {
        return $this->nombre.' '.$this->apellido;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Persona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return Persona
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Persona
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Persona
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
     * Set genero
     *
     * @param string $genero
     * @return Persona
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set catarroja
     *
     * @param boolean $catarroja
     * @return Persona
     */
    public function setCatarroja($catarroja)
    {
        $this->catarroja = $catarroja;

        return $this;
    }

    /**
     * Get catarroja
     *
     * @return boolean 
     */
    public function getCatarroja()
    {
        return $this->catarroja;
    }

    /**
     * Add anuncios
     *
     * @param \AppBundle\Entity\Anuncio $anuncios
     * @return Persona
     */
    public function addAnuncio(\AppBundle\Entity\Anuncio $anuncios)
    {
        $this->anuncios[] = $anuncios;

        return $this;
    }

    /**
     * Remove anuncios
     *
     * @param \AppBundle\Entity\Anuncio $anuncios
     */
    public function removeAnuncio(\AppBundle\Entity\Anuncio $anuncios)
    {
        $this->anuncios->removeElement($anuncios);
    }

    /**
     * Get anuncios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnuncios()
    {
        return $this->anuncios;
    }

    /**
     * Add personas
     *
     * @param \AppBundle\Entity\Comercio $personas
     * @return Persona
     */
    public function addPersona(\AppBundle\Entity\Comercio $personas)
    {
        $this->personas[] = $personas;

        return $this;
    }

    /**
     * Remove personas
     *
     * @param \AppBundle\Entity\Comercio $personas
     */
    public function removePersona(\AppBundle\Entity\Comercio $personas)
    {
        $this->personas->removeElement($personas);
    }

    /**
     * Get personas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonas()
    {
        return $this->personas;
    }
}
