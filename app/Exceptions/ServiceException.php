<?php


namespace App\Exceptions;


use App\Shared\ConstantesShared;
use App\Shared\RespostaShared;
use Exception;

class ServiceException extends Exception
{
    private $params;

    public function __construct($codigo, $params = null)
    {
        $this->code = $codigo;
        $this->message = RespostaShared::getMensagem($codigo, $params);

        if($codigo == ConstantesShared::RESPOSTA_MULTIPLOS_ERROS){
            $this->multiplosErros($params);
        }else{
            $this->params = $params;
        }
    }

    public function showExcecaoFormatada()
    {
        return RespostaShared::showRespostaFormatada($this->code, $this->message, $this->getParams());
    }

    private function multiplosErros($errors)
    {
        $this->params = null;
        if($errors && is_array($errors)){
            foreach($errors as $e){
                $this->params[] = [
                    'erro'=> RespostaShared::getMensagem($e['erro'], $e['params']),
                    'params' => $e['params']
                ];
            }
        }
    }

    public function getParams()
    {
        return $this->params;
    }
}
