<?php

namespace FiveMinutesAPI\Ecommerce;

class EcommerceWhatsApp
{
    private $apiKey;
    private $baseUrl = 'https://api.5minutesapi.com/v1/send-message';

    public function __construct($apiKey)
    {
        if (empty($apiKey)) {
            throw new \Exception("🛑 [5MinutesAPI]: E-commerce API Key missing! Get your instant key at https://5minutesapi.com");
        }
        $this->apiKey = $apiKey;
    }

    // Universal function for WooCommerce, Magento, Odoo, Salla, Zid etc.
    public function sendCODVerification($to, $orderId, $amount, $currency = 'USD')
    {
        return $this->sendMessage($to, 'cod_verify_template', [$orderId, $amount, $currency]);
    }

    public function sendOrderStatus($to, $orderId, $status)
    {
        return $this->sendMessage($to, 'order_status_update', [$orderId, $status]);
    }

    public function sendMessage($to, $template, $variables = [], $recordId = null)
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $to);

        $payload = json_encode([
            'to' => $cleanPhone,
            'whatsapp_template' => $template,
            'variables' => $variables,
            'record_id' => $recordId
        ]);

        $ch = curl_init($this->baseUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 401) {
            throw new \Exception("🚨 [5MinutesAPI]: Invalid API Key. Get an active key at https://5minutesapi.com");
        }

        return json_decode($response, true);
    }
}
