<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Tipocomercio;

/**
 * Comercio
 *
 * @ORM\Table(name="comercio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComercioRepository")
 */
class Comercio
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
     * @var int
     *
     * @ORM\Column(name="posicion", type="integer")
     */
    private $posicion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100)
     */
    private $direccion;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer", unique=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=100, nullable=true)
     */
    private $web;

    /**
     * @var string
     *
     * @ORM\Column(name="mapa", type="string", length=100)
     */
    private $mapa;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=100)
     */
    private $foto;

    /**
     * @ORM\ManyToOne(targetEntity="Tipocomercio", inversedBy="comercios")
     * @ORM\JoinColumn(name="tipocomercio_id", referencedColumnName="id", nullable=false)
     */
    protected $tipocomercio;

    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="comercios")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id", nullable=true)
     */
    protected $persona;


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
     * Set posicion
     *
     * @param integer $posicion
     * @return Comercio
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return integer 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Comercio
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
     * Set direccion
     *
     * @param string $direccion
     * @return Comercio
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Comercio
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
     * @return Servicio
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
     * Set web
     *
     * @param string $web
     * @return Comercio
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set mapa
     *
     * @param string $mapa
     * @return Comercio
     */
    public function setMapa($mapa)
    {
        $this->mapa = $mapa;

        return $this;
    }

    /**
     * Get mapa
     *
     * @return string 
     */
    public function getMapa()
    {
        return $this->mapa;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Comercio
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set tipocomercio
     *
     * @param \AppBundle\Entity\Tipocomercio $tipocomercio
     * @return Comercio
     */
    public function setTipocomercio(\AppBundle\Entity\Tipocomercio $tipocomercio)
    {
        $this->tipocomercio = $tipocomercio;

        return $this;
    }

    /**
     * Get tipocomercio
     *
     * @return \AppBundle\Entity\Tipocomercio 
     */
    public function getTipocomercio()
    {
        return $this->tipocomercio;
    }

    /**
     * Set persona
     *
     * @param \AppBundle\Entity\Persona $persona
     * @return Comercio
     */
    public function setPersona(\AppBundle\Entity\Persona $persona)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \AppBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }
}
