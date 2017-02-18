<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Tipoanuncio;
use AppBundle\Entity\Persona;

/**
 * Anuncio
 *
 * @ORM\Table(name="anuncio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnuncioRepository")
 */
class Anuncio
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
     * @var \string
     *
     * @ORM\Column(name="fecha", type="string", length=10)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text")
     */
    private $texto;

    /**
     * @ORM\ManyToOne(targetEntity="Tipoanuncio", inversedBy="anuncios")
     * @ORM\JoinColumn(name="tipoanuncio_id", referencedColumnName="id", nullable=false)
     */
    protected $tipoanuncio;

    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="anuncios")
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Anuncio
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Anuncio
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Anuncio
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set tipoanuncio
     *
     * @param \AppBundle\Entity\Tipoanuncio $tipoanuncio
     * @return Anuncio
     */
    public function setTipoanuncio(\AppBundle\Entity\Tipoanuncio $tipoanuncio)
    {
        $this->tipoanuncio = $tipoanuncio;

        return $this;
    }

    /**
     * Get tipoanuncio
     *
     * @return \AppBundle\Entity\Tipoanuncio 
     */
    public function getTipoanuncio()
    {
        return $this->tipoanuncio;
    }

    /**
     * Set persona
     *
     * @param \AppBundle\Entity\Persona $persona
     * @return Anuncio
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
