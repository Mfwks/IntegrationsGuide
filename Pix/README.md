# Pix
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

        if (empty($dados->key)) {
            return null;
        }

        $bank = Bancos::findOne(['ispb' => $dados->ispb]);

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
excluirChave($conta, $chave)
```
## Gerar QRCode Estático
```
/pix/pix/gera-qrcode-estatico
```
```php
geraQRCodeEstatico(Conta $conta, $valor, $pixelsModulo, $formatoImagem, $externo, $chavePix)   
```
## Consultar QRCode
```
/pix/pix/consultar-qrcode
```
```php
consultaQRCode($emv, $pagador) 
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
