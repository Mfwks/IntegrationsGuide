# Pix
Integração Pix

## Model Pix (methods)

[implementar]

- criarChave($conta, $tipo_chave, $chave)
    /pix/pix/criar-chave

- consultaChavePix($chavePix, Conta $conta)
    /pix/pix/consultar-chave

- excluirChave($conta, $chave)
    /pix/pix/excluir-chave

- geraQRCodeEstatico(Conta $conta, $valor, $pixelsModulo, $formatoImagem, $externo, $chavePix)
    /pix/pix/gera-qrcode-estatico

- consultaQRCode($emv, $pagador)
    /pix/pix/consultar-qrcode

- enviarPix($valor, $mensagem, $chavePix, $banco, $conta, $agencia, $documento, $tipoConta, $nome, $pagador, $identificadorTransacao, $endToEndId, $type, $movPix->id, null, null, $validation_code, $tipo_pagamento_pix)
    /pix/pix/enviar-pix

- receberPix => retornoPix() [webhook]
    pix/pix/receber-pix

- criarConta($conta);
