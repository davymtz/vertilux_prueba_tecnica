<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderIndexRequest;
use App\Http\Requests\RetrieveKpisRequest;
use App\Http\Requests\RetrieveOrderRequest;
use App\Http\Resources\DetailOrderResource;
use App\Http\Resources\OrderListCollection;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(OrderIndexRequest $request)
    {
        try {
            $orders = $this->orderService->getAll($request);

            return new OrderListCollection($orders);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getOrderDetail(RetrieveOrderRequest $request, $id)
    {
        try {
            $orderDetail = $this->orderService->getById($request, $id);

            return new DetailOrderResource($orderDetail);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getKpis(OrderIndexRequest $request)
    {
        try {
            $kpis = $this->orderService->getKpis($request);
        
            return response()->json([
                'success' => true,
                'data' => $kpis,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(["data" => "Mensaje desconocido"], 500);
        }
    }
}
