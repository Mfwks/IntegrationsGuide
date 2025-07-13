# Pix
- Criar Chave Pix
- Consultar Chave Pix
- Excluir Chave Pix
- Gerar QRCode Estático
- Enviar Pix
- Receber Pix (webhook)
- Criar Conta

## Criar Chave Pix
```
/pix/pix/criar-chave
```
```php
    public function criarChave($conta, $tipo_chave, $chave)
    {
        // implementação
        return [];
    }
```
## Consultar Chave Pix
```
- 
    
```
```php
consultaChavePix($chavePix, Conta $conta)
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
/pix/pix/consultar-qrcode
/pix/pix/gera-qrcode-estatico
```
```php
consultaQRCode($emv, $pagador)
geraQRCodeEstatico(Conta $conta, $valor, $pixelsModulo, $formatoImagem, $externo, $chavePix)   
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
pix/pix/receber-pix
```
```php
retornoPix()
```
## Criar Conta
```
???
```
```php
criarConta($conta);
```
