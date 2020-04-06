<?php


namespace App\Services;


use App\DTO\EditarSistemaDTO;
use App\DTO\PaginacaoDTO;
use App\DTO\PesquisarSistemaDTO;
use App\Entities\Sistema;
use App\Entities\Usuario;
use App\Exceptions\ServiceException;
use App\Factories\RepositoryFactory;
use App\Shared\ConstantesShared;
use App\Shared\PaginacaoShared;
use App\Shared\SetarEntidadeShared;
use DateTime;

class SistemaService extends AbstractService
{
    /**
     * Método para realizar a operação de pesquisa de sistema
     *
     * @param PesquisarSistemaDTO $pesquisarSistemaDTO
     *
     * @return PaginacaoDTO
     * @throws ServiceException
     */
    public function pesquisar(PesquisarSistemaDTO $pesquisarSistemaDTO){
        $this->validarEmail($pesquisarSistemaDTO->getEmail());

        /** @var PaginacaoShared $objPaginacaoShared */
        $objPaginacaoShared = new PaginacaoShared($pesquisarSistemaDTO->getPage(), 5);

        $sistemas = $this->getRepositorio()->paginacao(
            $pesquisarSistemaDTO,
            $objPaginacaoShared->getFirstResult(),
            $objPaginacaoShared->getMaxResults()
        );

        $total = $this->getRepositorio()->getQuantidadeResultado($pesquisarSistemaDTO);
        $objPaginacaoShared->setTotal($total);

        return new PaginacaoDTO(
            $objPaginacaoShared->getCurrentPage(),
            $objPaginacaoShared->getLastPage(),
            $sistemas, $objPaginacaoShared->getTotal()
        );
    }

    /**
     * Método para realizar a operação de inserir sistema
     *
     * @param Sistema $sistema
     *
     * @return Sistema
     * @throws ServiceException
     */
    public function inserir(Sistema $sistema)
    {
        $this->validarCamposObrigatorios($sistema);
        $this->validarEmail($sistema->getEmail());

        $sistema->setStatus(true);

        $this->getRepositorio()->salvar($sistema);

        return $sistema;
    }

    /**
     * Método para realizar a operação de alterar sistema
     *
     * @param Sistema $sistema
     *
     * @return Sistema
     * @throws ServiceException
     */
    public function alterar(Sistema $sistema)
    {
        $this->validarCamposObrigatorios($sistema);
        $this->validarEmail($sistema->getEmail());

        $usuario = RepositoryFactory::getRepositorio(RepositoryFactory::ENTIDADE_USUARIO)->find(1);
        $sistema->setUsuarioAlteracao($usuario);

        $sistema->setDataHoraAlteracao(new DateTime());

        $this->getRepositorio()->salvar($sistema);

        return $sistema;
    }

    /**
     * Método para retornar um sistema especifico pelo id
     *
     * @param int $id
     *
     * @return EditarSistemaDTO
     * @throws ServiceException
     */
    public function exibir(int $id)
    {
        $sistema = $this->getRepositorio()->consultaPorId($id);
        if(!empty($sistema)) {
            $dados = $sistema[0];
            !empty($sistema[1]) ? $dados['usuarioAlteracao'] = $sistema[1]['nome'] : $dados['usuarioAlteracao'] = '';

            return SetarEntidadeShared::setarArrayEmEntidade(
                EditarSistemaDTO::class, $dados
            );
        }else{
            throw new ServiceException(ConstantesShared::RESPOSTA_ENTIDADE_NAO_ENCONTRADA, ['Sistema']);
        }
    }

    /**
     * Método para validar email
     *
     * @param string $email
     *
     * @return void
     * @throws ServiceException
     */
    private function validarEmail(?string $email){
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@([a-z0-9-]{1,})+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        if (!empty($email) && !\preg_match($pattern, $email))
           throw new ServiceException(ConstantesShared::RESPOSTA_EMAIL_INVALIDO, ['email']);
    }

    /**
     * Método para validar os campos obrigatórios
     *
     * @param Sistema $sistema
     *
     * @return void
     * @throws ServiceException
     */
    private function validarCamposObrigatorios(Sistema $sistema)
    {
        $erro = false;

        if(empty($sistema->getDescricao())){
            $erro[] = "email";
        }

        if(empty($sistema->getSigla())){
            $erro[] = "sigla";
        }

        if(!empty($sistema->getId())) {
            if (empty($sistema->getStatus()) && $sistema->getStatus() != 0) {
                $erro[] = "status";
            }

            if (empty($sistema->getJustificativaAlteracao())) {
                $erro[] = "justificativaAlteracao";
            }
        }

        if($erro)
            throw new ServiceException(ConstantesShared::RESPOSTA_CAMPO_OBRIGATORIO, $erro);
    }

    /**
     * Método para retornar a instancia do repositório do sistema
     *
     * @return mixed
     */
    public function getRepositorio()
    {
        return RepositoryFactory::getRepositorio(RepositoryFactory::ENTIDADE_SISTEMA);
    }
}
