<?php

namespace App\Factories;

use App\Services\SistemaService;

/**
 * ServiceFactory
 *
 */
class ServiceFactory
{
    private static $factory;

    private $instancia = [];

    private $Services = [
        'sistema' => SistemaService::class,
        'usuario' => ''
    ];

    const ENTIDADE_SISTEMA = 'sistema';
    const ENTIDADE_USUARIO = 'usuario';

    /**
     * Método para retornar uma instancia de um serviço, caso não existir, cria uma nova.
     *
     * @param $entidade
     *
     * @return mixed
     */
    private function getServiceEntidade($entidade){
        if(empty($this->instancia[$entidade])){
            $this->instancia[$entidade] = new $this->Services[$entidade];
        }

        return $this->instancia[$entidade];
    }

    /**
     * Método para retornar a instancia da fabrica de serviço, caso não existir, cria uma nova.
     *
     * @return ServiceFactory
     */
    public static function getServiceFactory()
    {
        if (!isset(self::$factory)) {
            self::$factory = new ServiceFactory();
        }
        return self::$factory;
    }

    /**
     * Método para retornar a instancia de um serviço especifico
     *
     * @param $entidade
     *
     * @return mixed
     */
    public static function getService($entidade){
        return self::getServiceFactory()->getServiceEntidade($entidade);
    }
}
