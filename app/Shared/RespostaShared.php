<?php


namespace App\Shared;


use MessageFormatter;

class RespostaShared
{
    private static $mensagens = [
        ConstantesShared::RESPOSTA_SUCESSO           => "Operaçãp realizada com sucesso.",
        ConstantesShared::RESPOSTA_MULTIPLOS_ERROS   => "Múltiplos Erros.",
        ConstantesShared::RESPOSTA_ERRO              => "Ocorreu um erro, tente novamente.",
        ConstantesShared::RESPOSTA_CAMPO_OBRIGATORIO => "Campo(s) obrigatório(s) não preenchidos(s).",
        ConstantesShared::RESPOSTA_EMAIL_INVALIDO    => "E-mail inválido.",
        ConstantesShared::RESPOSTA_CAMPO_EXISTE      => "Já existe um registro com o campo: {0}.",
        ConstantesShared::RESPOSTA_NENHUM_RESULTADO  => "Consulta não retornou nenhum resultado.",
        ConstantesShared::RESPOSTA_ENTIDADE_NAO_ENCONTRADA  => "{0} não foi encontrado."
    ];

    public static function getMensagem($codigo, $params)
    {
        if (!empty(self::$mensagens[$codigo])) {
            if(!empty($params) && is_array($params) && is_string($params[0])){
                $formatar = MessageFormatter::create('pt-BR', self::$mensagens[$codigo]);
                $msg = $formatar->format($params);
            }else{
                $msg = self::$mensagens[$codigo];
            }
        } else {
            $msg = $codigo;
        }

        return $msg;
    }

    public static function showRespostaFormatada($codigo, $mensagem = null, $parametros = null){
        if($mensagem == null){
            $mensagem = self::getMensagem($codigo, $parametros);
        }
        return [
            'status' => $codigo,
            'mensagem' => $mensagem,
            'parametros' => $parametros
        ];
    }
}
