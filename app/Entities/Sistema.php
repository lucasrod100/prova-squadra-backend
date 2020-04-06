<?php


namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mapeamento da Classe Sistema
 *
 * @package App\Entities
 *
 * @ORM\Entity(repositoryClass="App\Repositories\SistemaRepository")
 * @ORM\Table(name="sistema")
 */
class Sistema
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="descricao", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private $descricao;

    /**
     * @ORM\Column(name="sigla", type="string", length=10, nullable=false)
     *
     * @var string
     */
    private $sigla;

    /**
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     *
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="url", type="string", length=50, nullable=true)
     *
     * @var string
     */
    private $url;

    /**
     * @ORM\Column(name="status", type="boolean", nullable=false)
     *
     * @var boolean
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(nullable=true)
     *
     * @var Usuario
     */
    private $usuarioAlteracao;

    /**
     * @ORM\Column(name="justificativa_alteracao", type="string", length=200, nullable=true)
     *
     * @var string
     */
    private $justificativaAlteracao;

    /**
     * @ORM\Column(name="data_hora_alteracao", type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $dataHoraAlteracao;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Sistema
     */
    public function setId(?int $id): Sistema
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     *
     * @return Sistema
     */
    public function setDescricao(?string $descricao): Sistema
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string
     */
    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    /**
     * @param string $sigla
     *
     * @return Sistema
     */
    public function setSigla(?string $sigla): Sistema
    {
        $this->sigla = $sigla;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Sistema
     */
    public function setEmail(?string $email): Sistema
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return Sistema
     */
    public function setUrl(?string $url): Sistema
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     *
     * @return Sistema
     */
    public function setStatus(?bool $status): Sistema
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getJustificativaAlteracao(): ?string
    {
        return $this->justificativaAlteracao;
    }

    /**
     * @param string $justificativaAlteracao
     *
     * @return Sistema
     */
    public function setJustificativaAlteracao(?string $justificativaAlteracao): Sistema
    {
        $this->justificativaAlteracao = $justificativaAlteracao;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuarioAlteracao(): ?Usuario
    {
        return $this->usuarioAlteracao;
    }

    /**
     * @param Usuario $usuarioAlteracao
     *
     * @return Sistema
     */
    public function setUsuarioAlteracao(?Usuario $usuarioAlteracao): Sistema
    {
        $this->usuarioAlteracao = $usuarioAlteracao;
        return $this;
    }


    /**
     * Get the value of dataHoraAlteracao
     *
     * @return  \DateTime
     */
    public function getDataHoraAlteracao()
    {
        return $this->dataHoraAlteracao;
    }

    /**
     * Set the value of dataHoraAlteracao
     *
     * @param  \DateTime  $dataHoraAlteracao
     *
     * @return  self
     */
    public function setDataHoraAlteracao(?\DateTime $dataHoraAlteracao)
    {
        $this->dataHoraAlteracao = $dataHoraAlteracao;

        return $this;
    }
}
