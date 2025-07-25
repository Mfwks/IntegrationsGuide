# Boletos (Sumário)
- registrar
- registrarBoleto

## Introdução
Todas implementações devem ser feitas na classe do fornecedor e deve-se evitar ao máximo contaminar a classe principal que serve de eixo para operações Pix, a model Pix:
```
modules/boleto/models/BoletoCobranca.php
```
A propósito, as classes dos fornecedores devem estender a classe principal **BoletoCobranca**.
## Registrar
```
/boleto/boleto/registrar
```
```php
    public function registrar()
    {

        // implementação

    }
```
## Registrar Cobrança
```
/boleto/boleto/registra-cobranca
```
```php
    public function registrarCobranca()
    {

        // implementação

    }
```
