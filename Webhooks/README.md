# Webhooks
Webhooks

# Celcoin
```php
        $webhooks = [
            'onboarding-backgroundcheck' => 'r=pix/pix/webhook', # Não implementado
            'onboarding-documentscopy' => 'r=pix/pix/webhook', # Não implementado
            'onboarding-file' => 'r=pix/pix/webhook', # Não implementado
            'onboarding-proposal' => 'r=pix/pix/webhook', # Não implementado
            'onboarding-create' => 'r=pix/pix/receber-pix',

            'internal-transfer-in' => 'r=pix/pix/webhook', # Não implementado
            'internal-transfer-out' => 'r=pix/pix/receber-pix',

            'pix-payment-out' => 'r=pix/pix/receber-pix',
            'pix-payment-in' => 'r=pix/pix/receber-pix',
            'pix-reversal-out' => 'r=pix/pix/webhook', # Não implementado
            'pix-reversal-in' => 'r=pix/pix/webhook', # Não implementado

            'pix-automatic-recurrency-awaiting-debtor' => 'r=pix/pix/webhook', # Não implementado
            'pix-automatic-recurrency-completed' => 'r=pix/pix/webhook', # Não implementado
            'pix-automatic-payment-instruction-cashin' => 'r=pix/pix/webhook', # Não implementado
            'pix-automatic-payment-instruction-expired' => 'r=pix/pix/webhook', # Não implementado
            'pix-automatic-payment-instruction-completed' => 'r=pix/pix/webhook', # Não implementado
            'pix-automatic-payment-instruction-cancelled' => 'r=pix/pix/webhook', # Não implementado

            'pix-dict-claim-open' => 'r=pix/pix/receber-pix',
            'pix-dict-claim-waiting' => 'r=pix/pix/receber-pix',
            'pix-dict-claim-confirmed' => 'r=pix/pix/receber-pix',
            'pix-dict-claim-cancelled' => 'r=pix/pix/receber-pix',
            'pix-dict-claim-completed' => 'r=pix/pix/receber-pix',

            'spb-transfer-out' => 'r=baas/webhook/celcoin/transfer-in',
            'spb-transfer-in' => 'r=baas/webhook/celcoin/transfer-out',
            'spb-reversal-in' => 'r=baas/webhook/celcoin/reversal-in',
            'spb-reversal-out' => 'r=baas/webhook/celcoin/reversal-out',

            'charge-in' => 'r=pix/pix/webhook', # Não implementado
            'charge-create' => 'r=boleto/webhook/celcoin/charge-create',
            'charge-canceled' => 'r=boleto/webhook/celcoin/charge-in',
            'charge-expired' => 'r=pix/pix/webhook', # Não implementado

            'billpayment' => 'r=boleto/webhook/celcoin/pagamento',
            'billpayment-occurrence' => 'r=boleto/webhook/celcoin/pagamento',

            'judicial-movement-in' => 'r=pix-bloqueados/webhook-celcoin',
            'judicial-movement-out' => 'r=pix-bloqueados/webhook-celcoin',
            'account-status' => 'r=pix/pix/webhook', # Não implementado

            'launch-in' => 'r=pix/pix/webhook', # Não implementado
            'launch-out' => 'r=pix/pix/webhook', # Não implementado

            'kyc' => 'r=pix/pix/receber-pix'
        ];
```