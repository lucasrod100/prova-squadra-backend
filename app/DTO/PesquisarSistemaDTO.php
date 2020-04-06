<?php


namespace App\DTO;


class PesquisarSistemaDTO
{
    /**
     * @var integer
     */
    private $page;

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
     * @return int
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return PesquisarSistemaDTO
     */
    public function setPage(?int $page): PesquisarSistemaDTO
    {
        $this->page = $page;
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
     * @return PesquisarSistemaDTO
     */
    public function setDescricao(?string $descricao): PesquisarSistemaDTO
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
     * @return PesquisarSistemaDTO
     */
    public function setSigla(?string $sigla): PesquisarSistemaDTO
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
     * @return PesquisarSistemaDTO
     */
    public function setEmail(?string $email): PesquisarSistemaDTO
    {
        $this->email = $email;
        return $this;
    }


}
