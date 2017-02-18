<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Tipocomercio;

/**
 * Buscar
 *
 * @ORM\Table(name="buscar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuscarRepository")
 */
class Buscar
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
     * @ORM\Column(name="criterio", type="string", length=100)
     */
    private $criterio;

    /**
     * @var \string
     *
     * @ORM\Column(name="fecha", type="string", length=10)
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Tipocomercio", inversedBy="busquedas")
     * @ORM\JoinColumn(name="tipoanuncio_id", referencedColumnName="id", nullable=true)
     */
    protected $tipocomercio;


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
     * Set criterio
     *
     * @param string $criterio
     * @return Buscar
     */
    public function setCriterio($criterio)
    {
        $this->criterio = $criterio;

        return $this;
    }

    /**
     * Get criterio
     *
     * @return string 
     */
    public function getCriterio()
    {
        return $this->criterio;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Buscar
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
     * Set Tipocomercio
     *
     * @param \AppBundle\Entity\Tipocomercio $tipocomercio
     * @return Buscar
     */
    public function setTipocomercio(\AppBundle\Entity\Tipocomercio $tipocomercio)
    {
        $this->tipocomercio = $tipocomercio;

        return $this;
    }

    /**
     * Get Tipocomercio
     *
     * @return \AppBundle\Entity\Tipocomercio 
     */
    public function getTipocomercio()
    {
        return $this->tipocomercio;
    }
}
