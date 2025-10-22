# Boletos (Sumário)
- registrar (model criada para integração)
- registrarBoleto (model criada para integração)
- Métodos de operações
- GerarBoletoCobranca (model eixo BoletoCobranca)

## Introdução
Todas implementações devem ser feitas na classe do fornecedor e deve-se evitar ao máximo contaminar a classe principal que serve de eixo para operações Pix, a model Pix:
```
modules/boleto/models/BoletoCobranca.php
```
A propósito, as classes dos fornecedores estão nesta mesma classe principal **BoletoCobranca**, que estendem ela com suas próprias implementações.
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
## Juros de atraso
Por razões históricas, os juros são armazenados como juro percentual diário, mas nas aplicações, pelo app ou Internet Banking, o valor orientado aos usuários é um valor nominal diário calculado à partir do juros percentual diário. As classes dos fornecedores fazem o resgate dos juros percentual diário através do valor nominal diário (juros / valor * 100).

## Métodos de operações
Estes métodos são usados para as operações respectivas no backoffice e IB no controller BoletoController.
- actionCancelarInterno
- actionCancelarSelecionados
- actionBaixaBoleto (chama baixaBoletoManual)
- actionBoletoCobranca (chama GerarBoletoCobranca)
- actionEmissaoBloquetoExterno (chama GerarBoletoCobranca)

## GerarBoletoCobranca
Classe principal onde as models criadas para integração são chamadas com suas próprias implementações de emissão de boletos. O acoplamento é alto e poluído, são mais de 250 linhas no método e as implementações atuais forçam o acoplamento das novas implementações.
