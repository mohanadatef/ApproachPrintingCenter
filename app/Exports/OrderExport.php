<?php

namespace App\Exports;


use App\Models\Order_Export;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return ['#', 'order','customer name','customer phone', 'status', 'user create', 'total cost', 'discount', 'paid', 'rest','discarded' ,'created at'];
    }

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function collection()
    {
        Order_Export::truncate();
        $Orders = Order::where('created_at', '>=', $this->start)->where('created_at', '<=', $this->end)->get();
        foreach ($Orders as $Order) {
            $order = new Order_Export();
            if ($Order->status == 0) {
                $order->status = 'revend';
            } else if ($Order->status == 1) {
                $order->status = 'work';
            } else if ($Order->status == 2) {
                $order->status = 'end';
            }
            $order->total_cost = $Order->total_cost;
            $order->order = $Order->id;
            $order->discount = $Order->discount;
            $order->rest = $Order->rest;
            $order->paid = $Order->paid;
            $order->discarded = $Order->discarded;
            $order->user_create = $Order->user->name;
            $order->customer_name = $Order->customer->name;
            $order->customer_phone = $Order->customer->phone;
            $order->save();
        }
        return Order_Export::all(['id', 'order','customer_name','customer_phone', 'status', 'user_create',
            'total_cost', 'discount', 'paid', 'rest','discarded', 'created_at']);
    }

}
