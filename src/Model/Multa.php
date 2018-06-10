<?php
namespace ApiMaster\Model;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Multas
 *
 * @ORM\Table(name="multas")
 * @ORM\Entity
 */
class Multa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @JMS\Groups({"list"})
     */
    private $id;

    /**
     * @var string
     * @JMS\Groups({"list"})
     *
     * @ORM\Column(name="descricao_multa", type="string", length=150, nullable=true)
     */
    private $descricao_multa;

    /**
     * @var float
     * @JMS\Groups({"list"})
     * 
     * @ORM\Column(name="placa_veiculo_multa", type="float", precision=10, scale=2, nullable=true)
     */
    private $placa_veiculo_multa;

    /**
     * @var string
     * @JMS\Groups({"list"})
     * 
     * @ORM\Column(name="status_multa", type="string", length=30, nullable=true)
     */
    private $status_multa;

    /**
     * @var string
     *    
     * @JMS\Groups({"list"})
     * 
     * @ORM\Column(name="id_oficial", type="string", length=30, nullable=true)
     */
    private $id_oficial;

    /**
     * @var string
     * 
     * @JMS\Groups({"list"})
     * 
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;


    /**
     * @var \DateTime
     * 
     * @JMS\Groups({"list"})
     * 
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     * 
     * @JMS\Groups({"list"})
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricaoMulta()
    {
        return $this->descricao_multa;
    }

    /**
     * @param string $descricao_multa
     */
    public function setDescricaoMulta($descricao_multa)
    {
        $this->descricao_multa = $descricao_multa;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlacaVeiculo()
    {
        return $this->placa_veiculo_multa;
    }

    /**
     * @param string $placa_veiculo_multa
     */
    public function setPlacaVeiculo($placa_veiculo_multa)
    {
        $this->placa_veiculo_multa = $placa_veiculo_multa;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusMulta()
    {
        return $this->status_multa;
    }

    /**
     * @param int $status_multa
     */
    public function setStatusMulta($status_multa)
    {
        $this->status_multa = $status_multa;
        return $this;
    }


    /**
     * @return Multa
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param  $img
     * @return Multa
     */
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
