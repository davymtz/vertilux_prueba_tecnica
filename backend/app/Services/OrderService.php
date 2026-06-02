<?php

namespace App\Services;

use App\Http\Requests\OrderIndexRequest;
use App\Http\Requests\RetrieveKpisRequest;
use App\Http\Requests\RetrieveOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
    const OPTION_SORT_BY = [
        "reference" => "orders.reference",
        "email" => "u.email",
        "amount" => "orders.amount",
        "currency" => "orders.currency",
        "status" => "orders.status",
        "method" => "p.method",
        "channel" => "orders.channel"
    ];

    public function getAll(OrderIndexRequest $request)
    {
        $page = $request->input("page", 1);
        $limit = $request->input("limit", 20);
        $builder = $this->QueryBuilder($request);

        return $builder->paginate($limit, ['*'], 'page', $page);
    }

    public function getById(RetrieveOrderRequest $request, $id)
    {
        $orderDetail = Order::where("id", $id)->with([
            "user:id,name,last_name,email,phone",
            "orderStatusLog:id,order_id,from_status,to_status,reason"
        ])->first();

        return $orderDetail;
    }

    public function getKpis(OrderIndexRequest $request)
    {
        return [
            'totalOrders' => $this->getTotalOrders($request),
            'paidOrders' => $this->getPaidOrders($request),
            'pendingOrders' => $this->getPendingOrders($request),
            'refundedOrders' => $this->getRefundedOrders($request)
        ];
    }

    private function getTotalOrders(OrderIndexRequest $request)
    {
        return (float) $this->QueryBuilder($request)->count("orders.id");
    }

    private function getPaidOrders(OrderIndexRequest $request)
    {
        return (float) $this->QueryBuilder($request)->where("orders.status", "paid")->count("orders.id");
    }

    private function getPendingOrders(OrderIndexRequest $request)
    {
        return (float) $this->QueryBuilder($request)->where("orders.status", "pending")->count("orders.id");
    }

    private function getRefundedOrders(OrderIndexRequest $request)
    {
        return (float) $this->QueryBuilder($request)->where("orders.status", "refunded")->count("orders.id");
    }

    private function QueryBuilder(OrderIndexRequest $request)
    {
        $search = $request->input("search");
        $status = $request->input("status");
        $status = $status == "all" ? null : $status;

        $latestPayments = DB::table('payments')
            ->selectRaw('DISTINCT ON (order_id)
                order_id,
                status,
                method,
                created_at')
            ->orderBy('payments.order_id')
            ->orderByDesc('payments.created_at');

        $orders = Order::join("users as u", "u.id", "=", "orders.user_id")
            ->joinSub($latestPayments, 'p', function ($join) {
                $join->on('p.order_id', '=', 'orders.id');
            })
            ->selectRaw("
                orders.id as order_id, orders.reference, concat_ws(' ', u.name, u.last_name) as full_name, u.email, orders.amount, orders.currency,
	            orders.status, p.method, orders.channel, to_char(orders.created_at, 'DD-MM-YYYY HH24:MM:SS') as created_date_order
            ")
            ->when(!is_null($search), function ($q) use ($search) {
                $q->whereAny([
                    'orders.reference',
                    DB::raw("concat_ws(' ', u.name, u.last_name)"),
                    'u.email',
                    'orders.amount',
                    'orders.currency',
                    'orders.status',
                    'p.method',
                    'orders.channel'
                ], 'like', "%{$search}%");
            })->when(!is_null($status), function ($f) use ($status) {
                $f->where("orders.status", $status);
            });

        return $orders;
    }
}