<?php

namespace app\modules\baas\models; // ou app\modules\pix\models

use app\models\Bancos;
use app\models\Conta;
use app\models\Utilitarios;

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

        return key ?? '0';
    }

    public function consultaChavePix($key, $conta, $internal = false)
    {
        // implementação

        $dados = $response->body ?? null;

        // as propriedades reais em $dados serão conforme a integração
        if (empty($dados->key)) {
            return null;
        }

        $banco = Bancos::findOne(['ispb' => $dados->ispb]); // as propriedades reais em $dados serão conforme a integração

        return [
            'end_to_end_id' => $dados->endToEndId, // as propriedades reais em $dados serão conforme a integração
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
        $emv   = 'emv_mock'; // tmp
        $image = 'image_mock'; // tmp
        $idTx  = 'idTx_mock'; // tmp
        // implementação

        // retorno necessário ao app
        return ($emv && $image && $idTx) ? [
            'copia_cola'        => $emv,
            'qrcode'            => $image,
            'transaction_id'    => $idTx
        ] : null;
    }

    public function consultaQRCode($emv, Conta $conta)
    {
        // implementação

        $dados = new \StdClass();
        $dados->chave = 'af166d28-a54e-48ad-b220-c728384bdd78'; // ajuste o retorno da integração para essas propriedades canônicas
        $dados->agencia = '1234';
        $dados->isbp = '12345678';
        $dados->conta = '987654';
        $dados->documento = '12345678901';
        $dados->nome = 'Fulano de Tal';
        $dados->tipo = 'CONTA_CORRENTE';
        $dados->banco = 'Banco Exemplo';
        $dados->idEndToEnd = 'E123456789012345678901234567890';
        $dados->idTx = 'TX123456';
        $dados->tipo_transferencia = 'PIX';

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
            'type' => $dados->tipo_transferencia ?? ''
        ];
    }

    public function enviarPix(float $value, string $mensagem, $chavePix, string $banco, string $numeroConta, string $agencia, string $documento, string $tipoConta, string $nome, Conta $conta, $identificadorTransacao, $endToEndId, ?string $type, ?int $movPixId)
    {
        // implementação

        return $transactionCode ?? null;
    }

    public function podeEnviar()
    {
        // implementar: obrigação do acomplamento
    }

    public function retornoPix($content)
    {
        $this->receberPix($content); // implementar receberPix
    }

    public function receberPix()
    {
        // implementação webhook
    }

    public function criarConta($conta)
    {
        return ($conta->usuario->tipoPessoa()==1) ? $this->criarContaPF($conta) : $this->criarContaPJ($conta);
    }

    // Seção de Onboarding-KYC

    public function criarContaPF()
    {
        // implementação
    }

    public function criarContaPJ()
    {
        // implementação
    }
}
