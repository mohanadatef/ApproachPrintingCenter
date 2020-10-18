<?php

namespace App\Exports;


use App\Models\Type_Export;
use App\Models\Order_Type;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TypeExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return ['#', 'order','customer name','customer phone', 'status', 'user create', 'size', 'type', 'quantity','meter', 'user_discount', 'user pay', 'time pay at',
            'total cost', 'discount', 'paid', 'rest', 'kind pay', 'number visa', 'created at','discarded','user discarded','time discarded id','chasier status'];
    }

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function collection()
    {
        Type_Export::truncate();
        $Types = Order_Type::where('created_at', '>=', $this->start)->where('created_at', '<=', $this->end)->get();
        foreach ($Types as $Type) {
            $order_type = new Type_Export();
            $order_type->quantity = $Type->quantity;
            $order_type->meter = $Type->meter;
            if ($Type->status == 0) {
                $order_type->status = 'wiat to pay';
            } else if ($Type->status == 1) {
                $order_type->status = 'finish';
            } else if ($Type->status == 2) {
                $order_type->status = 'discarded';
            }
            $order_type->order = $Type->order_id;
            $order_type->size = $Type->size->name;
            $order_type->customer_name = $Type->order->customer->name;
            $order_type->customer_phone = $Type->order->customer->phone;
            $order_type->type= $Type->type->name;
            $order_type->user_pay = $Type->user_pay->name;
            $order_type->user_create = $Type->order->user->name;
            $order_type->time_pay_at = $Type->time_pay_at;
            $order_type->time_discarded_at = $Type->time_discarded_at;
            if ($Type->kind_pay == 0) {
                $order_type->kind_pay = 'chas';
            } else {
                $order_type->kind_pay = 'visa';
            }
            if ($Type->chasier_status == 0) {
                $order_type->chasier_status = 'in chasier';
            } elseif ($Type->chasier_status == 1) {
                $order_type->chasier_status = 'done';
            }
            $order_type->user_discount = $Type->user_discount->name;
            $order_type->user_discarded = $Type->user_discarded->name;
            $order_type->number_visa = $Type->number_visa;
            $order_type->discount = $Type->discount;
            $order_type->rest = $Type->rest;
            $order_type->paid = $Type->paid;
            $order_type->discarded = $Type->discarded;
            $order_type->total_cost = $Type->total_cost;
            $order_type->save();
        }
        return Type_Export::all(['id', 'order','customer_name','customer_phone', 'status', 'user_create','size', 'type', 'quantity', 'meter',
            'user_discount', 'user_pay', 'time_pay_at', 'total_cost', 'discount', 'paid', 'rest',
            'kind_pay', 'number_visa', 'created_at','discarded','user_discarded','time_discarded_at','chasier_status']);
    }

}
