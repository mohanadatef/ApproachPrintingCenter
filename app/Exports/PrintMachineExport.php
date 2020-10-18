<?php

namespace App\Exports;


use App\Models\Print_Export;
use App\Models\Order_Print;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrintMachineExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return ['#', 'order','customer name','customer phone', 'status', 'machine', 'user create', 'user skip', 'user start', 'time start at',
            'user end', 'time end at', 'size', 'type', 'color', 'quantity', 'user_discount', 'user pay', 'time pay at',
            'total cost', 'discount', 'paid', 'rest', 'kind pay', 'number visa', 'created at'];
    }

    public function __construct($start, $end,$machine)
    {
        $this->start = $start;
        $this->end = $end;
        $this->machine = $machine;

    }

    public function collection()
    {
        Print_Export::truncate();
        $Prints = Order_Print::where('machine_id', $this->machine)->where('created_at', '>=', $this->start)->where('created_at', '<=', $this->end)->get();
        foreach ($Prints as $Print) {
            $order_print = new Print_Export();
            $order_print->quantity = $Print->quantity;
            if ($Print->status == 0) {
                $order_print->status = 'wiat to pay';
            } else if ($Print->status == 1) {
                $order_print->status = 'wiat to start';
            } else if ($Print->status == 2) {
                $order_print->status = 'start';
            } else if ($Print->status == 3) {
                $order_print->status = 'end';
            } else if ($Print->status == 4) {
                $order_print->status = 'revend';
            }
            $order_print->order = $Print->order_id;
            $order_print->color = $Print->color->name;
            $order_print->size = $Print->size->name;
            $order_print->type= $Print->type->name;
            $order_print->machine = $Print->machine->name;
            $order_print->user_start = $Print->user_start->name;
            $order_print->user_end = $Print->user_end->name;
            $order_print->user_pay = $Print->user_pay->name;
            $order_print->user_create = $Print->order->user->name;
            $order_print->time_end_at= $Print->time_end_at;
            $order_print->time_start_at = $Print->time_start_at;
            $order_print->time_pay_at = $Print->time_pay_at;
            $order_print->user_skip = $Print->user_skip->name;
            if ($Print->kind_pay == 0) {
                $order_print->kind_pay = 'chas';
            } else {
                $order_print->kind_pay = 'visa';
            }
            $order_print->user_discount = $Print->user_discount->name;
            $order_print->customer_name = $Print->order->customer->name;
            $order_print->customer_phone = $Print->order->customer->phone;
            $order_print->number_visa = $Print->number_visa;
            $order_print->discount = $Print->discount;
            $order_print->rest = $Print->rest;
            $order_print->paid = $Print->paid;
            $order_print->total_cost = $Print->total_cost;
            $order_print->save();
        }
        return Print_Export::all(['id', 'order','customer_name','customer_phone', 'status', 'machine', 'user_create', 'user_skip', 'user_start', 'time_start_at',
            'user_end', 'time_end_at', 'size', 'type', 'color', 'quantity', 'user_discount', 'user_pay', 'time_pay_at',
            'total_cost', 'discount', 'paid', 'rest', 'kind_pay', 'number_visa', 'created_at']);
    }

}
