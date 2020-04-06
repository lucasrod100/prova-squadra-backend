<?php

namespace App\Http\Controllers;

use App\DTO\PesquisarSistemaDTO;
use App\Entities\Sistema;
use App\Exceptions\ServiceException;
use App\Factories\ServiceFactory;
use App\Services\SistemaService;
use App\Shared\SerializarShared;
use App\Shared\SetarEntidadeShared;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SistemaController extends AbstractController
{
    /**
     * Método para realizar a pesquisa de sistemas
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function pesquisar(Request $request)
    {
        /** @var PesquisarSistemaDTO $objPesquisarSistemaDTO */
        $objPesquisarSistemaDTO = SetarEntidadeShared::setarArrayEmEntidade(
            PesquisarSistemaDTO::class,
            $request->all()
        );

        $sistemas = $this->getService()->pesquisar($objPesquisarSistemaDTO);

        return SerializarShared::json($sistemas);
    }

    /**
     * Método para realizar a insersão de um novo sistema
     *
     * @param Request $request
     *
     * @return string
     * @throws ServiceException
     */
    public function inserir(Request $request)
    {
        /** @var Sistema $objSistema */
        $objSistema = SetarEntidadeShared::setarArrayEmEntidade(
            Sistema::class, $request->all()
        );

        $sistema = $this->getService()->inserir($objSistema);

        return SerializarShared::json($sistema);
    }

    /**
     * Método para realizar a alteração de um sistema
     *
     * @param Request $request
     * @param integer $id
     *
     * @return string
     * @throws ServiceException
     */
    public function alterar(Request $request, int $id)
    {
        $dados = $request->all();
        $dados['id'] = $id;
        /** @var Sistema $sistema */
        $sistema = SetarEntidadeShared::setarArrayEmEntidade(
            Sistema::class, $dados
        );
        $alterar = $this->getService()->alterar($sistema);

        return SerializarShared::json($alterar);
    }

    /**
     * Método para retornar um sistema especifico
     *
     * @param int $id
     *
     * @return string
     * @throws ServiceException
     */
    public function exibir(int $id)
    {
        $sistema = $this->getService()->exibir($id);

        return SerializarShared::json($sistema);
    }

    /**
     * Método para retornar a instancia do service do sistema
     *
     * @return SistemaService
     */
    public function getService()
    {
        return ServiceFactory::getService(ServiceFactory::ENTIDADE_SISTEMA);
    }
}
