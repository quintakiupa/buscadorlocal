<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tipoanuncio
 *
 * @ORM\Table(name="tipoanuncio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoanuncioRepository")
 */
class Tipoanuncio
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
     * @ORM\Column(name="nombre", type="string", length=100, unique=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Anuncio", mappedBy="tipoanuncio", cascade={"persist", "remove"})
     */
    protected $tipoanuncios;
    
    public function __construct()
    {
        $this->tipoanuncios = new ArrayCollection();
    }

        public function __toString()
    {
        return $this->nombre;
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
     * @return Tipoanuncio
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
     * Add tipoanuncios
     *
     * @param \AppBundle\Entity\Anuncio $tipoanuncios
     * @return Tipoanuncio
     */
    public function addTipoanuncio(\AppBundle\Entity\Anuncio $tipoanuncios)
    {
        $this->tipoanuncios[] = $tipoanuncios;

        return $this;
    }

    /**
     * Remove tipoanuncios
     *
     * @param \AppBundle\Entity\Anuncio $tipoanuncios
     */
    public function removeTipoanuncio(\AppBundle\Entity\Anuncio $tipoanuncios)
    {
        $this->tipoanuncios->removeElement($tipoanuncios);
    }

    /**
     * Get tipoanuncios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTipoanuncios()
    {
        return $this->tipoanuncios;
    }
}
