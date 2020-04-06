<?php


namespace App\Shared;


class SetarEntidadeShared
{
    /**
     * Método para setar os atributos de um objeto a partir de um array
     *
     * @param       $class
     * @param array $dados
     * @param bool  $entidade
     *
     * @return bool|object
     * @throws \ReflectionException
     */
    public static function setarArrayEmEntidade($class, array $dados, $entidade = false)
    {
        $reflection = new \ReflectionClass($class);

        if(!$entidade) {
            $entidade = $reflection->newInstance();
        }

        foreach ($dados as $key=>$value){
            //if(!empty($value)) {
                $nomeMetodo = "set" . ucfirst($key);
                if($reflection->hasMethod($nomeMetodo)){
                    $metodo = $reflection->getMethod($nomeMetodo);

                    if(gettype($value) == "array"){
                        $parametros = $metodo->getParameters();
                        $class_nome = $parametros[0]->getType()->getName();
                        $metodo->invoke($entidade, self::setarArrayEmEntidade($class_nome, $value));
                    }else{
                        $metodo->invoke($entidade, $value);
                    }
                }
            //}

        }

        return $entidade;
    }

    public static function setarEntidadeEmEntidade($class_origem, $class_destino)
    {
        $reflection = new \ReflectionClass($class_origem);
        $reflection_destino = new \ReflectionClass($class_destino);

        $propriedades = $reflection->getProperties();

        foreach ($propriedades as $propriedade){
            $nome_parametro = $propriedade->getName();

            if($reflection_destino->hasProperty($nome_parametro)) {
                $nomeMetodo = "get" . ucfirst($nome_parametro);

                $metodo = $reflection->getMethod($nomeMetodo);

                $valor = $metodo->invoke($class_origem);

                if (gettype($valor) == 'object') {
                    $metodo_destino = $reflection_destino->getMethod("set" . ucfirst($nome_parametro));
                    $parametros = $metodo_destino->getParameters();

                    $tipo = $parametros[0]->getType()->getName();
                    if($tipo == 'array'){

                    }elseif($tipo == 'object'){
                        self::setarEntidadeEmEntidade($valor, $parametros[0]->getType()->getName());
                    }
                } else {
                    $metodo_destino = $reflection_destino->getMethod("get" . ucfirst($nome_parametro));
                    $metodo_destino->invoke($class_destino, $valor);
                }
            }
        }
    }
}
