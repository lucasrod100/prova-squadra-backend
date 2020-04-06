<?php


namespace App\Shared;


class PaginacaoShared
{
    private $currentPage;
    private $limite;
    private $total;
    private $lastPage;

    public function __construct($currentPage, $limite)
    {
        $this->currentPage = $currentPage;
        $this->limite = $limite;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
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
     */
    public function setTotal($total): void
    {
        $this->total = $total;

        if($this->total == 0){
            $this->lastPage = 0;
        }elseif($this->total > $this->limite){
            $this->lastPage = (int) ceil($this->total / $this->limite);
        }else{
            $this->lastPage = 1;
        }
    }

    /**
     * @return mixed
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @return int
     */
    public function getFirstResult(){
        return ($this->currentPage - 1) * $this->limite;
    }

    /**
     * @return int
     */
    public function getMaxResults(){
        return $this->limite;
    }
}
