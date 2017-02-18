<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tipocomercio
 *
 * @ORM\Table(name="tipocomercio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipocomercioRepository")
 */
class Tipocomercio
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
     * @ORM\OneToMany(targetEntity="Comercio", mappedBy="tipocomercio", cascade={"persist", "remove"})
     */
    protected $comercios;

    /**
     * @ORM\OneToMany(targetEntity="Buscar", mappedBy="tipocomercio", cascade={"persist", "remove"})
     */
    protected $busquedas;
    
    public function __construct()
    {
        $this->comercios = new ArrayCollection();
        $this->busquedas = new ArrayCollection();
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
     * @return Tipocomercio
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
     * Add comercios
     *
     * @param \AppBundle\Entity\Comercio $comercios
     * @return Tipocomercio
     */
    public function addComercio(\AppBundle\Entity\Comercio $comercios)
    {
        $this->comercios[] = $comercios;

        return $this;
    }

    /**
     * Remove comercios
     *
     * @param \AppBundle\Entity\Comercio $comercios
     */
    public function removeComercio(\AppBundle\Entity\Comercio $comercios)
    {
        $this->comercios->removeElement($comercios);
    }

    /**
     * Get comercios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComercios()
    {
        return $this->comercios;
    }

    /**
     * Add busquedas
     *
     * @param \AppBundle\Entity\Buscar $busquedas
     * @return Tipocomercio
     */
    public function addBusqueda(\AppBundle\Entity\Buscar $busquedas)
    {
        $this->busquedas[] = $busquedas;

        return $this;
    }

    /**
     * Remove busquedas
     *
     * @param \AppBundle\Entity\Buscar $busquedas
     */
    public function removeBusqueda(\AppBundle\Entity\Buscar $busquedas)
    {
        $this->busquedas->removeElement($busquedas);
    }

    /**
     * Get busquedas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBusquedas()
    {
        return $this->busquedas;
    }
}
