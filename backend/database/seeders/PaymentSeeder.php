<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $payments = [
            // ORD-0041 — paid (card)
            [
                'order_id' => '019e80bb-9448-7218-95fe-96512f08c3b2',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0001',
                'method'           => 'card',
                'status'           => 'paid',
                'amount'           => 3200.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'visa', 'last4' => '4242', 'exp' => '12/26', 'auth_code' => 'A12301']),
                'processed_at'     => '2024-06-01 09:18:00',
                'created_at'       => '2024-06-01 09:15:00',
                'updated_at'       => '2024-06-01 09:18:00',
            ],
            // ORD-0042 — pending (transfer)
            [
                'order_id' => '019e80bb-944a-72a5-937c-d9a718f166e6',
                'gateway_id'       => 'tr_spei_0042_abc',
                'method'           => 'transfer',
                'status'           => 'pending',
                'amount'           => 890.50,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['clabe' => '**************88', 'bank' => 'Banamex', 'reference' => 'SPEI-0042']),
                'processed_at'     => null,
                'created_at'       => '2024-06-01 11:30:00',
                'updated_at'       => '2024-06-01 11:30:00',
            ],
            // ORD-0043 — failed (card, 1er intento) + failed (card, 2do intento)
            [
                'order_id' => '019e80bb-944a-72a5-937c-d9a7196384c4',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0043a',
                'method'           => 'card',
                'status'           => 'failed',
                'amount'           => 150.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'mastercard', 'last4' => '1234', 'error' => 'insufficient_funds', 'decline_code' => 'do_not_honor']),
                'processed_at'     => '2024-05-31 16:46:00',
                'created_at'       => '2024-05-31 16:45:00',
                'updated_at'       => '2024-05-31 16:46:00',
            ],
            [
                'order_id' => '019e80bb-944a-72a5-937c-d9a7196384c4',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0043b',
                'method'           => 'card',
                'status'           => 'failed',
                'amount'           => 150.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'mastercard', 'last4' => '1234', 'error' => 'card_declined', 'decline_code' => 'generic_decline']),
                'processed_at'     => '2024-05-31 16:50:00',
                'created_at'       => '2024-05-31 16:49:00',
                'updated_at'       => '2024-05-31 16:50:00',
            ],
            // ORD-0044 — paid (crypto)
            [
                'order_id' => '019e80bb-944b-72c1-a6c0-93ce58ccca29',
                'gateway_id'       => 'crypto_tx_0044_btc',
                'method'           => 'crypto',
                'status'           => 'paid',
                'amount'           => 5400.00,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['coin' => 'BTC', 'tx_hash' => '0xaabbccdd0044', 'confirmations' => 6, 'network' => 'mainnet']),
                'processed_at'     => '2024-05-31 08:05:00',
                'created_at'       => '2024-05-31 08:00:00',
                'updated_at'       => '2024-05-31 08:05:00',
            ],
            // ORD-0045 — refunded (card)
            [
                'order_id' => '019e80bb-944b-72c1-a6c0-93ce58fd283d',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0045',
                'method'           => 'card',
                'status'           => 'refunded',
                'amount'           => 2100.75,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'amex', 'last4' => '0005', 'refund_id' => 're_0045abc', 'refunded_at' => '2024-05-30 15:00:00']),
                'processed_at'     => '2024-05-30 14:22:00',
                'created_at'       => '2024-05-30 14:20:00',
                'updated_at'       => '2024-05-30 15:00:00',
            ],
            // ORD-0046 — failed (cash)
            [
                'order_id' => '019e80bb-944c-7360-bfb1-7b29b6217b3f',
                'gateway_id'       => 'cash_ref_0046_oxxo',
                'method'           => 'cash',
                'status'           => 'failed',
                'amount'           => 750.00,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['store' => 'OXXO', 'barcode' => '0046OXXO123', 'error' => 'daily_limit_exceeded']),
                'processed_at'     => '2024-05-30 10:06:00',
                'created_at'       => '2024-05-30 10:05:00',
                'updated_at'       => '2024-05-30 10:06:00',
            ],
            // ORD-0047 — paid (transfer)
            [
                'order_id' => '019e80bb-944d-7233-bc5b-faa438aa90ce',
                'gateway_id'       => 'tr_spei_0047_xyz',
                'method'           => 'transfer',
                'status'           => 'paid',
                'amount'           => 980.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['clabe' => '**************77', 'bank' => 'BBVA', 'reference' => 'SPEI-0047', 'confirmed_at' => '2024-05-29 13:02:00']),
                'processed_at'     => '2024-05-29 13:02:00',
                'created_at'       => '2024-05-29 13:00:00',
                'updated_at'       => '2024-05-29 13:02:00',
            ],
            // ORD-0048 — paid (card)
            [
                'order_id' => '019e80bb-944d-7233-bc5b-faa4390a54d5',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0048',
                'method'           => 'card',
                'status'           => 'paid',
                'amount'           => 3780.20,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['brand' => 'visa', 'last4' => '9999', 'exp' => '08/25', 'auth_code' => 'B48099']),
                'processed_at'     => '2024-05-29 09:48:00',
                'created_at'       => '2024-05-29 09:45:00',
                'updated_at'       => '2024-05-29 09:48:00',
            ],
            // ORD-0049 — pending (cash)
            [
                'order_id' => '019e80bb-944e-72c2-93fc-19f6eddf067d',
                'gateway_id'       => 'cash_ref_0049_seven',
                'method'           => 'cash',
                'status'           => 'pending',
                'amount'           => 210.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['store' => '7-Eleven', 'barcode' => '0049SEVEN456', 'expires_at' => '2024-05-30 23:59:00']),
                'processed_at'     => null,
                'created_at'       => '2024-05-28 17:30:00',
                'updated_at'       => '2024-05-28 17:30:00',
            ],
            // ORD-0050 — paid (transfer)
            [
                'order_id' => '019e80bb-944e-72c2-93fc-19f6ee742026',
                'gateway_id'       => 'wire_0050_global',
                'method'           => 'transfer',
                'status'           => 'paid',
                'amount'           => 12000.00,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['swift' => 'BOFAUS3N', 'iban' => 'US**0050', 'reference' => 'WIRE-0050', 'confirmed_at' => '2024-05-28 06:10:00']),
                'processed_at'     => '2024-05-28 06:10:00',
                'created_at'       => '2024-05-28 06:00:00',
                'updated_at'       => '2024-05-28 06:10:00',
            ],
            // ORD-0051 — failed (card)
            [
                'order_id' => '019e80bb-944f-730a-a58b-d90463471c01',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0051',
                'method'           => 'card',
                'status'           => 'failed',
                'amount'           => 430.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'mastercard', 'last4' => '5678', 'error' => 'card_declined', 'decline_code' => 'do_not_honor']),
                'processed_at'     => '2024-05-27 20:16:00',
                'created_at'       => '2024-05-27 20:15:00',
                'updated_at'       => '2024-05-27 20:16:00',
            ],
            // ORD-0052 — paid (crypto)
            [
                'order_id' => '019e80bb-944f-730a-a58b-d9046369acfc',
                'gateway_id'       => 'crypto_tx_0052_btc',
                'method'           => 'crypto',
                'status'           => 'paid',
                'amount'           => 6700.00,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['coin' => 'BTC', 'tx_hash' => '0xabc123def456', 'confirmations' => 6, 'network' => 'mainnet']),
                'processed_at'     => '2024-05-27 11:05:00',
                'created_at'       => '2024-05-27 11:00:00',
                'updated_at'       => '2024-05-27 11:05:00',
            ],
            // ORD-0053 — refunded (card)
            [
                'order_id' => '019e80bb-944f-730a-a58b-d90463ecd104',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0053',
                'method'           => 'card',
                'status'           => 'refunded',
                'amount'           => 320.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'visa', 'last4' => '3333', 'refund_id' => 're_0053xyz', 'refunded_at' => '2024-05-26 09:00:00']),
                'processed_at'     => '2024-05-26 08:32:00',
                'created_at'       => '2024-05-26 08:30:00',
                'updated_at'       => '2024-05-26 09:00:00',
            ],
            // ORD-0054 — pending (transfer)
            [
                'order_id' => '019e80bb-9450-7335-a9c0-d33ea1b2b6df',
                'gateway_id'       => 'wire_0054_pending',
                'method'           => 'transfer',
                'status'           => 'pending',
                'amount'           => 1850.00,
                'currency'         => 'USD',
                'gateway_response' => json_encode(['swift' => 'WFBIUS6S', 'reference' => 'WIRE-0054', 'estimated_arrival' => '2024-05-28']),
                'processed_at'     => null,
                'created_at'       => '2024-05-26 15:45:00',
                'updated_at'       => '2024-05-26 15:45:00',
            ],
            // ORD-0055 — paid (card)
            [
                'order_id' => '019e80bb-9450-7335-a9c0-d33ea22de768',
                'gateway_id'       => 'pi_3PBaM2LkdIwHu7ix0055',
                'method'           => 'card',
                'status'           => 'paid',
                'amount'           => 550.00,
                'currency'         => 'MXN',
                'gateway_response' => json_encode(['brand' => 'visa', 'last4' => '8888', 'exp' => '03/27', 'auth_code' => 'C55088']),
                'processed_at'     => '2024-05-25 12:02:00',
                'created_at'       => '2024-05-25 12:00:00',
                'updated_at'       => '2024-05-25 12:02:00',
            ],
        ];

        foreach ($payments as $payment) {
            Payment::create([
                'order_id' => $payment["order_id"],
                'gateway_id' => $payment["gateway_id"],
                'method' => $payment["method"],
                'status' => $payment["status"],
                'amount' => $payment["amount"],
                'currency' => $payment["currency"],
                'gateway_response' => $payment["gateway_response"],
                'processed_at' => $payment["processed_at"],
                'created_at' => $payment["created_at"],
                'updated_at' => $payment["updated_at"],
            ]);
        }
    }
}