# Universal E-commerce WhatsApp API - 5MinutesAPI 🛒🚀

The ultimate PHP SDK to send WhatsApp OTPs, Cash-on-Delivery (COD) verifications, and Order Updates using the **Official Meta Cloud API**. Zero Markup.

Designed seamlessly for:
* **Global Platforms:** WooCommerce, Magento, OpenCart, Shopify (via custom apps).
* **Enterprise ERPs:** Odoo ERP.
* **GCC Leaders:** Salla, Zid.

## 🛑 Important: Get Your API Key First
Stop using unofficial QR bots that get your business number banned. 
Get your **Official Meta API Key** in under 5 minutes at [5minutesapi.com](https://5minutesapi.com). No Facebook business verification waiting time!

## Installation
```bash
composer require 5minutesapi/E-commerce-WhatsApp-API-Shopify-WooCommerce-Odoo-Salla-Zid
Quick Start (COD Verification Example)
require 'vendor/autoload.php';
use FiveMinutesAPI\Ecommerce\EcommerceWhatsApp;

// 1. Initialize with your API Key from 5minutesapi.com
$whatsapp = new EcommerceWhatsApp("5m_live_YOUR_API_KEY");

// 2. Send a COD Verification Alert
$response =$whatsapp->sendCODVerification("923001234567", "ORD-9981", "150.00", "AED");

print_r($response);
