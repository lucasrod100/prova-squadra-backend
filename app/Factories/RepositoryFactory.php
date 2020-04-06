<?php

namespace App\Factories;

use App\Entities\Sistema;
use App\Entities\Usuario;

/**
 * RepositoryFactory
 *
 */
class RepositoryFactory
{
    private static $factory;

    private $instancia = [];

    private $repositorios = [
        'sistema' => Sistema::class,
        'usuario' => Usuario::class
    ];

    const ENTIDADE_SISTEMA = 'sistema';
    const ENTIDADE_USUARIO = 'usuario';

    /**
     * Método para retornar uma instancia de um repositório, caso não existir, cria uma nova.
     *
     * @param $entidade
     *
     * @return mixed
     */
    private function getRepositorioEntidade($entidade){
        if(empty($this->instancia[$entidade])){
            $em = app('em');
            $this->instancia[$entidade] = $em->getRepository($this->repositorios[$entidade]);
        }

        return $this->instancia[$entidade];
    }

    /**
     * Método para retornar a instancia da fabrica de repositório, caso não existir, cria uma nova.
     *
     * @return RepositoryFactory
     */
    private static function getRepositorioFactory()
    {
        if (!isset(self::$factory)) {
            self::$factory = new RepositoryFactory();
        }

        return self::$factory;
    }

    /**
     * Método para retornar a instancia de um repositório especifico
     *
     * @param $entidade
     *
     * @return mixed
     */
    public static function getRepositorio($entidade){
        return self::getRepositorioFactory()->getRepositorioEntidade($entidade);
    }
}
