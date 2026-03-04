# Webhooks
Webhooks


Celcoin

$webhooks = [
    'onboarding-backgroundcheck' => '',
    'onboarding-documentscopy' => '',
    'onboarding-file' => '',
    'onboarding-proposal' => '',
    'onboarding-create' => 'r=pix/pix/receber-pix',

    'internal-transfer-in' => '',
    'internal-transfer-out' => 'r=pix/pix/receber-pix',

    'pix-payment-out' => 'r=pix/pix/receber-pix',
    'pix-payment-in' => 'r=pix/pix/receber-pix',
    'pix-reversal-out' => '',
    'pix-reversal-in' => '',

    'pix-automatic-recurrency-awaiting-debtor' => '',
    'pix-automatic-recurrency-completed' => '',
    'pix-automatic-payment-instruction-cashin' => '',
    'pix-automatic-payment-instruction-expired' => '',
    'pix-automatic-payment-instruction-completed' => '',
    'pix-automatic-payment-instruction-cancelled' => '',

    'pix-dict-claim-open' => 'r=pix/pix/receber-pix',
    'pix-dict-claim-waiting' => 'r=pix/pix/receber-pix',
    'pix-dict-claim-confirmed' => 'r=pix/pix/receber-pix',
    'pix-dict-claim-cancelled' => 'r=pix/pix/receber-pix',
    'pix-dict-claim-completed' => 'r=pix/pix/receber-pix',

    'spb-transfer-out' => 'r=baas/webhook/celcoin/transfer-in',
    'spb-transfer-in' => 'r=baas/webhook/celcoin/transfer-out',
    'spb-reversal-in' => 'r=baas/webhook/celcoin/reversal-in',
    'spb-reversal-out' => 'r=baas/webhook/celcoin/reversal-out',

    'charge-in' => '',
    'charge-create' => 'r=boleto/webhook/celcoin/charge-create',
    'charge-canceled' => 'r=boleto/webhook/celcoin/charge-in',
    'charge-expired' => '',

    'billpayment' => 'r=boleto/webhook/celcoin/pagamento',
    'billpayment-occurrence' => 'r=boleto/webhook/celcoin/pagamento',

    'judicial-movement-in' => 'r=pix-bloqueados/webhook-celcoin',
    'judicial-movement-out' => 'r=pix-bloqueados/webhook-celcoin',
    'account-status' => '',

    'launch-in' => '',
    'launch-out' => '',

    'kyc' => 'r=pix/pix/receber-pix'
];
