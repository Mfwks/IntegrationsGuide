# Pix (Sumário)
- Criar Chave Pix
- Consultar Chave Pix
- Excluir Chave Pix
- Gerar QRCode Estático
- Consultar QRCode
- Enviar Pix
- Receber Pix (webhook)
- Criar Conta
## Introdução
Todas implementações devem ser feitas na classe do fornecedor e deve-se evitar ao máximo contaminar a classe principal que serve de eixo para operações Pix, a **model Pix**:
```
modules/pix/models/Pix.php
```
No cenário atual não é possível garantir isso para o método **enviarPix**, há um aviso sobre a necessidade de alteração.
## Criar Chave Pix
```
/pix/pix/criar-chave
```
```php
    public function criarChave(Conta $conta, ?string $tipo_chave, ?string $chave = null)
    {

        // Implementação

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

        // Implementação

        $dados = $response->body ?? null;

        // As propriedades reais em $dados serão conforme a integração
        if (empty($dados->key)) {
            return null;
        }

        $banco = Bancos::findOne(['ispb' => $dados->ispb]);

        // Retorno necessário ao app
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

        // Implementação

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
        
        // Implementação

        // Retorno necessário ao app
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
        
        // Implementação

        $dados = new \StdClass(); // Ajuste as propriedades conforme o retorno da integração

        // Retorno necessário ao app
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
    public function enviarPix(float $value, string $mensagem, $chavePix, string $banco, string $numeroConta, string $agencia, string $documento, string $tipoConta, string $nome, Conta $conta, $identificadorTransacao, $endToEndId, ?string $type, ?int $movPixId)
    {

        // Implementação

        return $response->body->transactionCode ?? null;
    }
```
---

> ⚠️ **Aviso Importante:** este método força a contaminação da classe eixo, não tem pra onde correr.

---
## Receber Pix (webhook)
```
/pix/pix/receber-pix
```
```php
    public function receberPix($content)
    {
        // Implementação webhook
        $conta->cobrarTarifa($chave, $valor, $mov_id); // Se tudo ok, cobrar tarifa 
    }
```
Nestse casos é importante copiar de métodos já existentes em outras integrações toda a dinâmica envolvendo a model MovPix e o uso da geraMov em Conta.
---
## Confirma enviar pix (webhook)
```
[sem webhook padrão]
```
```php
    public function confirmaPix()
    {
        // Implementação webhook para confirmação do enviarPix
        $conta->cobrarTarifa($chave, $valor, $mov_id); // Se tudo ok, cobrar tarifa 
    }
```
## Criar Conta
```
/pix/pix/criar-conta-pf
/pix/pix/criar-conta-pj
```
```php
    public function criarConta($conta)
    {
        return ($conta->usuario->tipoPessoa()==1) ? $this->criarContaPF($conta) : $this->criarContaPJ($conta); // Implemente criarContaPF e criarContaPJ
    }
```
Neste caso, esse tipo de método deveria estar associado ao onboarding (dormentes).
