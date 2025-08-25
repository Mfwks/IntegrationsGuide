<?php

namespace app\modules\baas\models; // ou app\modules\pix\models

class NomeDoFornecedor
{
    public string $baseUrl;

    public string $access_token;

    public string $cert;
    public string $key;
    
    public string $webhook;

    public bool $fazRecarga = true; # Obrigação do acoplamento
    
    public function criarChave(Conta $conta, ?string $tipo_chave, ?string $chave = null)
    {

        // implementação

        return $response ?? null;
    }

    public function consultaChavePix($key, $conta, $internal = false)
    {

        // implementação

        $dados = $response->body ?? null;

        // as propriedades reais em $dados serão conforme a integração
        if (empty($dados->key)) {
            return null;
        }

        $banco = Bancos::findOne(['ispb' => $dados->ispb]);

        // retorno necessário ao app
        return [
            'end_to_end_id' => $dados->endToEndId,
            'chave' => $dados->key,
            'tipo_chave' => $dados->keyType,
            'dados_bancarios' => [
                'banco' => $dados->ispb,
                'cod_banco' => $banco->numero_banco ?? '',
                'nome_banco' => $banco->nome_banco ?? '',
                'conta' => $dados->bankAccountNumber,
                'agencia' => $dados->bankBranchNumber,
                'documento' => $dados->nationalRegistration,
                'tipo_conta' => $dados->bankAccountType,
                'nome' => $dados->name
            ],
        ];
    }

    public function excluirChave($conta, $key)
    {

        // implementação

        return $response->body ?? '0';
    }

    public function geraQRCodeEstatico($conta, $valor, $pixelsModulo, $formatoImagem, $externo, $pix_key) 
    {
        
        // implementação

        // retorno necessário ao app
        return ($emv && $image) ? [
            'copia_cola'        => $emv,
            'qrcode'            => $image,
            'transaction_id'    => $idTx
        ] : null;
    }

    public function consultaQRCode($emv, Conta $conta)
    {
        
        // implementação

        $dados = new \StdClass(); // ajuste as propriedades conforme o retorno da integração

        // retorno necessário ao app
        return empty($dados->chave) ? false : [
            'chave' => $dados->chave,
            'dados_bancarios' => [
                'agencia' => $dados->agencia,
                'banco' => $dados->isbp ?? '',
                'conta' => $dados->conta ?? '',
                'documento' => $dados->documento ?? '',
                'nome' => $dados->nome ?? '',
                'tipo_conta' => $dados->tipo,
                'nome_banco' => $dados->banco
            ],
            'devedor' => [],
            'end_to_end_id' => $dados->idEndToEnd ?? '',
            'validation_code' => '',
            'indentificador_transacao' => $dados->idTx ?? '',
            'informacoes_adicionais' => 'valor',
            'valor' => floatval('final_value_cents'),
            'tipo_chave' => Utilitarios::identificarTipoChavePix($dados->chave),
            'type' => $dados->tipo_transferencia ?? '',
        ];
    }

    public function enviarPix(float $value, string $mensagem, $chavePix, string $banco, string $numeroConta, string $agencia, string $documento, string $tipoConta, string $nome, Conta $conta, $identificadorTransacao, $endToEndId, ?string $type, ?int $movPixId)
    {

        // implementação

        return $response->body->transactionCode ?? null;
    }

    public function retornoPix($content)
    {
        $this->receberPix($content); // implementar receberPix
    }

    public function criarConta($conta)
    {
        return ($conta->usuario->tipoPessoa()==1) ? $this->criarContaPF($conta) : $this->criarContaPJ($conta); // implemente criarContaPF e criarContaPJ
    }
}
