<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusLogSeeder extends Seeder
{
    public function run(): void
    {
        // changed_by = 1 es el admin operador
        $logs = [
            // ORD-0041 — paid
            ['order_id' => '019e80bb-9448-7218-95fe-96512f08c3b2', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada', 'changed_by' => null, 'created_at' => '2024-06-01 09:15:00'],
            ['order_id' => '019e80bb-9448-7218-95fe-96512f08c3b2', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'Pago confirmado por gateway', 'changed_by' => null, 'created_at' => '2024-06-01 09:18:00'],

            // ORD-0042 — pending
            ['order_id' => '019e80bb-944a-72a5-937c-d9a718f166e6', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada', 'changed_by' => null, 'created_at' => '2024-06-01 11:30:00'],

            // ORD-0043 — failed (dos intentos)
            ['order_id' => '019e80bb-944a-72a5-937c-d9a7196384c4', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',              'changed_by' => null, 'created_at' => '2024-05-31 16:45:00'],
            ['order_id' => '019e80bb-944a-72a5-937c-d9a7196384c4', 'from_status' => 'pending', 'to_status' => 'failed',  'reason' => 'Fondos insuficientes (1er intento)', 'changed_by' => null, 'created_at' => '2024-05-31 16:46:00'],
            ['order_id' => '019e80bb-944a-72a5-937c-d9a7196384c4', 'from_status' => 'failed',  'to_status' => 'failed',  'reason' => 'Tarjeta rechazada (2do intento)',    'changed_by' => null, 'created_at' => '2024-05-31 16:50:00'],

            // ORD-0044 — paid (crypto)
            ['order_id' => '019e80bb-944b-72c1-a6c0-93ce58ccca29', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',              'changed_by' => null, 'created_at' => '2024-05-31 08:00:00'],
            ['order_id' => '019e80bb-944b-72c1-a6c0-93ce58ccca29', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'TX confirmada en blockchain (6 confirmaciones)', 'changed_by' => null, 'created_at' => '2024-05-31 08:05:00'],

            // ORD-0045 — refunded
            ['order_id' => '019e80bb-944b-72c1-a6c0-93ce58fd283d', 'from_status' => null,      'to_status' => 'pending',  'reason' => 'Orden creada',             'changed_by' => null, 'created_at' => '2024-05-30 14:20:00'],
            ['order_id' => '019e80bb-944b-72c1-a6c0-93ce58fd283d', 'from_status' => 'pending', 'to_status' => 'paid',     'reason' => 'Pago confirmado por gateway', 'changed_by' => null, 'created_at' => '2024-05-30 14:22:00'],
            ['order_id' => '019e80bb-944b-72c1-a6c0-93ce58fd283d', 'from_status' => 'paid',    'to_status' => 'refunded', 'reason' => 'Solicitud de devolución por cliente', 'changed_by' => 1, 'created_at' => '2024-05-30 15:00:00'],

            // ORD-0046 — failed (cash)
            ['order_id' => '019e80bb-944c-7360-bfb1-7b29b6217b3f', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',              'changed_by' => null, 'created_at' => '2024-05-30 10:05:00'],
            ['order_id' => '019e80bb-944c-7360-bfb1-7b29b6217b3f', 'from_status' => 'pending', 'to_status' => 'failed',  'reason' => 'Límite diario excedido',    'changed_by' => null, 'created_at' => '2024-05-30 10:06:00'],

            // ORD-0047 — paid (transfer)
            ['order_id' => '019e80bb-944d-7233-bc5b-faa438aa90ce', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',              'changed_by' => null, 'created_at' => '2024-05-29 13:00:00'],
            ['order_id' => '019e80bb-944d-7233-bc5b-faa438aa90ce', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'SPEI confirmado por banco', 'changed_by' => null, 'created_at' => '2024-05-29 13:02:00'],

            // ORD-0048 — paid (card)
            ['order_id' => '019e80bb-944d-7233-bc5b-faa4390a54d5', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',              'changed_by' => null, 'created_at' => '2024-05-29 09:45:00'],
            ['order_id' => '019e80bb-944d-7233-bc5b-faa4390a54d5', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'Pago confirmado por gateway', 'changed_by' => null, 'created_at' => '2024-05-29 09:48:00'],

            // ORD-0049 — pending (cash)
            ['order_id' => '019e80bb-944e-72c2-93fc-19f6eddf067d', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada, esperando pago en tienda', 'changed_by' => null, 'created_at' => '2024-05-28 17:30:00'],

            // ORD-0050 — paid (wire)
            ['order_id' => '019e80bb-944e-72c2-93fc-19f6ee742026', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',             'changed_by' => null, 'created_at' => '2024-05-28 06:00:00'],
            ['order_id' => '019e80bb-944e-72c2-93fc-19f6ee742026', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'Wire transfer confirmado', 'changed_by' => null, 'created_at' => '2024-05-28 06:10:00'],

            // ORD-0051 — failed (card duplicada)
            ['order_id' => '019e80bb-944f-730a-a58b-d90463471c01', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',             'changed_by' => null, 'created_at' => '2024-05-27 20:15:00'],
            ['order_id' => '019e80bb-944f-730a-a58b-d90463471c01', 'from_status' => 'pending', 'to_status' => 'failed',  'reason' => 'Tarjeta rechazada por banco emisor', 'changed_by' => null, 'created_at' => '2024-05-27 20:16:00'],

            // ORD-0052 — paid (crypto)
            ['order_id' => '019e80bb-944f-730a-a58b-d9046369acfc', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',             'changed_by' => null, 'created_at' => '2024-05-27 11:00:00'],
            ['order_id' => '019e80bb-944f-730a-a58b-d9046369acfc', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'TX BTC confirmada (6 confirmaciones)', 'changed_by' => null, 'created_at' => '2024-05-27 11:05:00'],

            // ORD-0053 — refunded (error cobro doble)
            ['order_id' => '019e80bb-944f-730a-a58b-d90463ecd104', 'from_status' => null,      'to_status' => 'pending',  'reason' => 'Orden creada',            'changed_by' => null, 'created_at' => '2024-05-26 08:30:00'],
            ['order_id' => '019e80bb-944f-730a-a58b-d90463ecd104', 'from_status' => 'pending', 'to_status' => 'paid',     'reason' => 'Pago confirmado por gateway', 'changed_by' => null, 'created_at' => '2024-05-26 08:32:00'],
            ['order_id' => '019e80bb-944f-730a-a58b-d90463ecd104', 'from_status' => 'paid',    'to_status' => 'refunded', 'reason' => 'Error en cobro doble — devolución automática', 'changed_by' => 1, 'created_at' => '2024-05-26 09:00:00'],

            // ORD-0054 — pending (wire)
            ['order_id' => '019e80bb-9450-7335-a9c0-d33ea1b2b6df', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada, wire transfer iniciado', 'changed_by' => null, 'created_at' => '2024-05-26 15:45:00'],

            // ORD-0055 — paid (card)
            ['order_id' => '019e80bb-9450-7335-a9c0-d33ea22de768', 'from_status' => null,      'to_status' => 'pending', 'reason' => 'Orden creada',             'changed_by' => null, 'created_at' => '2024-05-25 12:00:00'],
            ['order_id' => '019e80bb-9450-7335-a9c0-d33ea22de768', 'from_status' => 'pending', 'to_status' => 'paid',    'reason' => 'Pago confirmado por gateway', 'changed_by' => null, 'created_at' => '2024-05-25 12:02:00'],
        ];

        // Añadir updated_at a todos (igual que created_at)
        $logs = array_map(fn($l) => array_merge($l, ['updated_at' => $l['created_at']]), $logs);

        foreach ($logs as $log) {
            $findOrder = Order::where("id", $log["order_id"])->first();

            if (!is_null($findOrder)) {
                $findOrder->orderStatusLog()->create([
                    'from_status' => $log["from_status"],
                    'to_status' => $log["to_status"],
                    'reason' => $log["reason"],
                    'changed_by' => $log["changed_by"],
                    'created_at' => $log["created_at"],
                    'updated_at' => $log["updated_at"]
                ]);
            }
        }
    }
}