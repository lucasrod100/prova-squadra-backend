<?php

namespace App\DTO;

class PaginacaoDTO
{
    private $currentPage;
    private $lastPage;
    private $data;
    private $total;

    public function __construct($currentPage, $lastPage, $data, $total)
    {
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->data = $data;
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param mixed $currentPage
     *
     * @return PaginacaoDTO
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @param mixed $lastPage
     *
     * @return PaginacaoDTO
     */
    public function setLastPage($lastPage)
    {
        $this->lastPage = $lastPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return PaginacaoDTO
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     *
     * @return PaginacaoDTO
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

}
