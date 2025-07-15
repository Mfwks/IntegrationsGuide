# Pix (Sumário)
- Criar Chave Pix
- Consultar Chave Pix
- Excluir Chave Pix
- Gerar QRCode Estático
- Consultar QRCode
- Enviar Pix
- Receber Pix (webhook)
- Criar Conta

## Criar Chave Pix
```
/pix/pix/criar-chave
```
```php
    public function criarChave(Conta $conta, ?string $tipo_chave, ?string $chave = null)
    {

        // implementação

        return $response ?? null;
    }
```
## Consultar Chave Pix
```
/pix/pix/consultar-chave   
```
```php
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
```
## Excluir Chave Pix
```
/pix/pix/excluir-chave
```
```php
    public function excluirChave($conta, $key)
    {

        // implementação

        return $response->body ?? '0';
    }
```
## Gerar QRCode Estático
```
/pix/pix/gera-qrcode-estatico
```
```php
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
```
## Consultar QRCode
```
/pix/pix/consultar-qrcode
```
```php
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
```
## Enviar Pix
```
/pix/pix/consultar-chave
```
```php
enviarPix($valor, $mensagem, $chavePix, $banco, $conta, $agencia, $documento, $tipoConta, $nome, $pagador, $identificadorTransacao, $endToEndId, $type, $movPix->id, null, null, $validation_code, $tipo_pagamento_pix)
```
## Receber Pix (webhook)
```
/pix/pix/receber-pix
```
```php
retornoPix()
```
## Criar Conta
```
/pix/pix/criar-conta-pf
/pix/pix/criar-conta-pj
```
```php
criarConta($conta);
```
