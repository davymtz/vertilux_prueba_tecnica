<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            [
                'id' => '019e80bb-9448-7218-95fe-96512f08c3b2',
                'reference'   => 'ORD-0041',
                'user_id'     => '019e809c-f375-7322-98bb-1968c4419322',  // Sofía Ramírez
                'amount'      => 3200.00,
                'currency'    => 'MXN',
                'status'      => 'paid',
                'channel'     => 'web',
                'metadata'    => json_encode([
                    'ip'          => '189.225.10.42',
                    'user_agent'  => 'Mozilla/5.0 (Macintosh)',
                    'description' => 'Suscripción anual premium',
                    'items'       => [['sku' => 'PLAN-PRE-12M', 'qty' => 1, 'price' => 3200.00]],
                ])
            ],
            [
                'id' => '019e80bb-944a-72a5-937c-d9a718f166e6',
                'reference'   => 'ORD-0042',
                'user_id'     => '019e809c-f376-72a6-86ac-51fbac188db2',  // Carlos Mendez
                'amount'      => 890.50,
                'currency'    => 'USD',
                'status'      => 'pending',
                'channel'     => 'api',
                'metadata'    => json_encode([
                    'ip'          => '8.8.4.4',
                    'user_agent'  => 'axios/1.6.0',
                    'description' => 'API integration payment',
                    'items'       => [['sku' => 'API-SEATS-5', 'qty' => 5, 'price' => 178.10]],
                ])
            ],
            [
                'id' => '019e80bb-944a-72a5-937c-d9a7196384c4',
                'reference'   => 'ORD-0043',
                'user_id'     => '019e809c-f377-720a-a3cd-654286b7dca3',  // Ana Torres
                'amount'      => 150.00,
                'currency'    => 'MXN',
                'status'      => 'failed',
                'channel'     => 'app',
                'metadata'    => json_encode([
                    'ip'          => '201.140.22.99',
                    'user_agent'  => 'FinApp/3.1 iOS',
                    'description' => 'Recarga de saldo',
                    'items'       => [['sku' => 'RECARGA-150', 'qty' => 1, 'price' => 150.00]],
                    'failure_reason' => 'Fondos insuficientes',
                ])
            ],
            [
                'id' => '019e80bb-944b-72c1-a6c0-93ce58ccca29',
                'reference'   => 'ORD-0044',
                'user_id'     => '019e809c-f377-720a-a3cd-654287813624',  // Luis García
                'amount'      => 5400.00,
                'currency'    => 'USD',
                'status'      => 'paid',
                'channel'     => 'api',
                'metadata'    => json_encode([
                    'ip'          => '104.16.0.1',
                    'user_agent'  => 'python-httpx/0.27',
                    'description' => 'Enterprise license yearly',
                    'items'       => [['sku' => 'ENT-LIC-1Y', 'qty' => 1, 'price' => 5400.00]],
                ])
            ],
            [
                'id' => '019e80bb-944b-72c1-a6c0-93ce58fd283d',
                'reference'   => 'ORD-0045',
                'user_id'     => '019e809c-f377-720a-a3cd-654287bee4e2',  // María López
                'amount'      => 2100.75,
                'currency'    => 'MXN',
                'status'      => 'refunded',
                'channel'     => 'web',
                'metadata'    => json_encode([
                    'ip'          => '187.188.1.55',
                    'user_agent'  => 'Mozilla/5.0 (Windows NT 10.0)',
                    'description' => 'Compra cancelada por cliente',
                    'items'       => [['sku' => 'PLAN-BIZ-6M', 'qty' => 1, 'price' => 2100.75]],
                    'refund_reason' => 'Solicitud del cliente',
                ])
            ],
            [
                'id' => '019e80bb-944c-7360-bfb1-7b29b6217b3f',
                'reference'   => 'ORD-0046',
                'user_id'     => '019e809c-f378-73e3-80c2-e111497298bb',  // Pedro Sanz
                'amount'      => 750.00,
                'currency'    => 'USD',
                'status'      => 'failed',
                'channel'     => 'app',
                'metadata'    => json_encode([
                    'ip'          => '162.158.0.1',
                    'user_agent'  => 'FinApp/3.1 Android',
                    'description' => 'Cash deposit attempt',
                    'items'       => [['sku' => 'DEPOSIT-750', 'qty' => 1, 'price' => 750.00]],
                    'failure_reason' => 'Límite diario excedido',
                ])
            ],
            [
                'id' => '019e80bb-944d-7233-bc5b-faa438aa90ce',
                'reference'   => 'ORD-0047',
                'user_id'     => '019e809c-f378-73e3-80c2-e111498c67d0',  // Laura Vega
                'amount'      => 980.00,
                'currency'    => 'MXN',
                'status'      => 'paid',
                'channel'     => 'web',
                'metadata'    => json_encode([
                    'ip'          => '189.216.88.10',
                    'user_agent'  => 'Mozilla/5.0 (iPhone)',
                    'description' => 'Pago mensual startup',
                    'items'       => [['sku' => 'PLAN-STR-1M', 'qty' => 1, 'price' => 980.00]],
                ])
            ],
            [
                'id' => '019e80bb-944d-7233-bc5b-faa4390a54d5',
                'reference'   => 'ORD-0048',
                'user_id'     => '019e809c-f379-71f7-89b3-964523d680a5',  // Diego Reyes
                'amount'      => 3780.20,
                'currency'    => 'USD',
                'status'      => 'paid',
                'channel'     => 'api',
                'metadata'    => json_encode([
                    'ip'          => '34.120.0.55',
                    'user_agent'  => 'node-fetch/3.3',
                    'description' => 'Batch order processing',
                    'items'       => [
                        ['sku' => 'MODULE-A', 'qty' => 2, 'price' => 890.10],
                        ['sku' => 'MODULE-B', 'qty' => 1, 'price' => 2000.00],
                    ],
                ])
            ],
            [
                'id' => '019e80bb-944e-72c2-93fc-19f6eddf067d',
                'reference'   => 'ORD-0049',
                'user_id'     => '019e809c-f379-71f7-89b3-96452469f9b5', // Valeria Cruz
                'amount'      => 210.00,
                'currency'    => 'MXN',
                'status'      => 'pending',
                'channel'     => 'app',
                'metadata'    => json_encode([
                    'ip'          => '201.175.3.88',
                    'user_agent'  => 'FinApp/3.1 Android',
                    'description' => 'Pago efectivo en tienda',
                    'items'       => [['sku' => 'CASH-REF-210', 'qty' => 1, 'price' => 210.00]],
                ])
            ],
            [
                'id' => '019e80bb-944e-72c2-93fc-19f6ee742026',
                'reference'   => 'ORD-0050',
                'user_id'     => '019e809c-f379-71f7-89b3-9645250d1b2f', // Roberto Kim
                'amount'      => 12000.00,
                'currency'    => 'USD',
                'status'      => 'paid',
                'channel'     => 'api',
                'metadata'    => json_encode([
                    'ip'          => '1.234.56.78',
                    'user_agent'  => 'java-http-client/11',
                    'description' => 'Global enterprise contract',
                    'items'       => [['sku' => 'ENT-GLOBAL-1Y', 'qty' => 1, 'price' => 12000.00]],
                ])
            ],
            [
                'id' => '019e80bb-944f-730a-a58b-d90463471c01',
                'reference'   => 'ORD-0051',
                'user_id'     => '019e809c-f37a-7373-b365-c0d8980be30a', // Elena Mora
                'amount'      => 430.00,
                'currency'    => 'MXN',
                'status'      => 'failed',
                'channel'     => 'web',
                'metadata'    => json_encode([
                    'ip'          => '201.140.99.11',
                    'user_agent'  => 'Mozilla/5.0 (Linux Android)',
                    'description' => 'Intento de pago duplicado',
                    'items'       => [['sku' => 'PLAN-PRE-1M', 'qty' => 1, 'price' => 430.00]],
                    'failure_reason' => 'Tarjeta rechazada por banco',
                ])
            ],
            [
                'id' => '019e80bb-944f-730a-a58b-d9046369acfc',
                'reference'   => 'ORD-0052',
                'user_id'     => '019e809c-f37a-7373-b365-c0d8980c14f4', // Andrés Ruiz
                'amount'      => 6700.00,
                'currency'    => 'USD',
                'status'      => 'paid',
                'channel'     => 'api',
                'metadata'    => json_encode([
                    'ip'          => '52.86.0.1',
                    'user_agent'  => 'axios/1.6.0',
                    'description' => 'Crypto payment — BTC settlement',
                    'items'       => [['sku' => 'CRYPTO-PAY-USD', 'qty' => 1, 'price' => 6700.00]],
                    'crypto_tx'   => '0xabc123def456',
                ])
            ],
            [
                'id' => '019e80bb-944f-730a-a58b-d90463ecd104',
                'reference'   => 'ORD-0053',
                'user_id'     => '019e809c-f37b-729c-9c2b-2861da02d495', // Camila Nieto
                'amount'      => 320.00,
                'currency'    => 'MXN',
                'status'      => 'refunded',
                'channel'     => 'app',
                'metadata'    => json_encode([
                    'ip'          => '187.190.44.22',
                    'user_agent'  => 'FinApp/3.1 iOS',
                    'description' => 'Devolución automática por error',
                    'items'       => [['sku' => 'PLAN-STR-TRIAL', 'qty' => 1, 'price' => 320.00]],
                    'refund_reason' => 'Error en cobro doble',
                ])
            ],
            [
                'id' => '019e80bb-9450-7335-a9c0-d33ea1b2b6df',
                'reference'   => 'ORD-0054',
                'user_id'     => '019e809c-f37c-70d7-b002-5425fe551936', // Héctor Flores
                'amount'      => 1850.00,
                'currency'    => 'USD',
                'status'      => 'pending',
                'channel'     => 'web',
                'metadata'    => json_encode([
                    'ip'          => '76.76.21.21',
                    'user_agent'  => 'Mozilla/5.0 (Windows NT 10.0)',
                    'description' => 'Wire transfer in progress',
                    'items'       => [['sku' => 'ENT-LIC-6M', 'qty' => 1, 'price' => 1850.00]],
                ])
            ],
            [
                'id' => '019e80bb-9450-7335-a9c0-d33ea22de768',
                'reference'   => 'ORD-0055',
                'user_id'     => '019e809c-f37c-70d7-b002-5425ff4676c5', // Isabella Wong
                'amount'      => 550.00,
                'currency'    => 'MXN',
                'status'      => 'paid',
                'channel'     => 'app',
                'metadata'    => json_encode([
                    'ip'          => '203.177.10.5',
                    'user_agent'  => 'FinApp/3.1 iOS',
                    'description' => 'Pago mensual básico',
                    'items'       => [['sku' => 'PLAN-BAS-1M', 'qty' => 1, 'price' => 550.00]],
                ])
            ],
        ];
 
        foreach($orders as $order) {
            Order::create([
                'id' => $order["id"],
                'reference' => $order["reference"],
                'user_id' => $order["user_id"],
                'amount' => $order["amount"],
                'currency' => $order["currency"],
                'status' => $order["status"],
                'channel' => $order["channel"],
                'metadata' => $order["metadata"],
            ]);
        }
    }
}