<?php


namespace App\DTO;

use DateTime;

class EditarSistemaDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $usuarioAlteracao;

    /**
     * @var DateTime
     */
    private $dataHoraAlteracao;

    /**
     * @var string
     */
    private $justificativaAlteracao;

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
     * @return EditarSistemaDTO
     */
    public function setId(?int $id): EditarSistemaDTO
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
     * @return EditarSistemaDTO
     */
    public function setDescricao(?string $descricao): EditarSistemaDTO
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
     * @return EditarSistemaDTO
     */
    public function setSigla(?string $sigla): EditarSistemaDTO
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
     * @return EditarSistemaDTO
     */
    public function setEmail(?string $email): EditarSistemaDTO
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
     * @return EditarSistemaDTO
     */
    public function setUrl(?string $url): EditarSistemaDTO
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return EditarSistemaDTO
     */
    public function setStatus(?int $status): EditarSistemaDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsuarioAlteracao(): ?string
    {
        return $this->usuarioAlteracao;
    }

    /**
     * @param string $usuarioAlteracao
     *
     * @return EditarSistemaDTO
     */
    public function setUsuarioAlteracao(?string $usuarioAlteracao): EditarSistemaDTO
    {
        $this->usuarioAlteracao = $usuarioAlteracao;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDataHoraAlteracao(): ?DateTime
    {
        return $this->dataHoraAlteracao;
    }

    /**
     * @param DateTime $dataHoraAlteracao
     *
     * @return EditarSistemaDTO
     */
    public function setDataHoraAlteracao(?DateTime $dataHoraAlteracao): EditarSistemaDTO
    {
        if($dataHoraAlteracao instanceof DateTime){
            $dataHoraAlteracao = $dataHoraAlteracao->format('d/m/Y H:i:s');
        }
        $this->dataHoraAlteracao = $dataHoraAlteracao;
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
     * @return EditarSistemaDTO
     */
    public function setJustificativaAlteracao(?string $justificativaAlteracao): EditarSistemaDTO
    {
        $this->justificativaAlteracao = $justificativaAlteracao;
        return $this;
    }


}
