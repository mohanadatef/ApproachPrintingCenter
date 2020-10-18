<?php

namespace App\Exports;


use App\Models\Laser_Export;
use App\Models\Order_Laser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaserExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return ['#','order','customer name','customer phone','machine','status','user create','user skip','user start','time start at','time start',
            'user end','time end at','time end','total time system','total cost system','total time user','total cost user',
            'user_discount','user pay','time pay at','total cost','discount','paid','rest','kind pay','number visa','notes',
            'created at','discarded','user discarded','time discarded id','chasier status'];
    }

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function collection()
    {
        Laser_Export::truncate();
        $Lasers = Order_Laser::where('created_at', '>=', $this->start)->where('created_at', '<=', $this->end)->get();
        foreach ($Lasers as $Laser) {
            $order_laser = new Laser_Export();
            $order_laser->time_start = $Laser->time_start;
            $order_laser->time_end = $Laser->time_end;
            $order_laser->time_end_at = $Laser->time_end_at;
            $order_laser->time_start_at = $Laser->time_start_at;
            $order_laser->time_pay_at = $Laser->time_pay_at;
            $order_laser->time_discarded_at = $Laser->time_discarded_at;
            $order_laser->total_time_system = $Laser->total_time_system;
            $order_laser->total_time_user = $Laser->total_time_user;
            $order_laser->total_cost_system = $Laser->total_cost_system;
            $order_laser->total_cost_user = $Laser->total_cost_user;
            $order_laser->total_cost = $Laser->total_cost;
            if ($Laser->kind_pay == 0) {
                $order_laser->kind_pay = 'chas';
            } else {
                $order_laser->kind_pay = 'visa';
            }
            $order_laser->user_discount = $Laser->user_discount->name;
            $order_laser->number_visa = $Laser->number_visa;
            $order_laser->discount = $Laser->discount;
            $order_laser->rest = $Laser->rest;
            $order_laser->paid = $Laser->paid;
            $order_laser->discarded = $Laser->discarded;
            if ($Laser->notes == null) {
                $order_laser->notes = ' .';
            }
            else
            {
                $order_laser->notes = $Laser->notes;
            }
            if ($Laser->status == 0) {
                $order_laser->status = 'wiat to start';
            } else if ($Laser->status == 1) {
                $order_laser->status = 'start';
            } else if ($Laser->status == 2) {
                $order_laser->status = 'end';
            } else if ($Laser->status == 3) {
                $order_laser->status = 'wiat to pay';
            } else if ($Laser->status == 4) {
                $order_laser->status = 'finish';
            } else if ($Laser->status == 5) {
                $order_laser->status = 'discarded';
            }
            if ($Laser->chasier_status == 0) {
                $order_laser->chasier_status = 'in chasier';
            } else if ($Laser->chasier_status == 1){
                $order_laser->chasier_status = 'done';
            }
            $order_laser->order = $Laser->order_id;
            $order_laser->customer_name = $Laser->order->customer->name;
            $order_laser->customer_phone = $Laser->order->customer->phone;
            $order_laser->user_create = $Laser->order->user->name;
            $order_laser->machine = $Laser->machine->name;
            $order_laser->user_pay = $Laser->user_pay->name;
            $order_laser->user_start = $Laser->user_start->name;
            $order_laser->user_end = $Laser->user_end->name;
            $order_laser->user_skip = $Laser->user_skip->name;
            $order_laser->user_discarded = $Laser->user_discarded->name;
            $order_laser->save();
        }
        return Laser_Export::all(['id','order','customer_name','customer_phone','machine','status','user_create','user_skip','user_start','time_start_at','time_start',
            'user_end','time_end_at','time_end','total_time_system','total_cost_system','total_time_user','total_cost_user',
            'user_discount','user_pay','time_pay_at','total_cost','discount','paid','rest','kind_pay','number_visa','notes',
            'created_at','discarded','user_discarded','time_discarded_at','chasier_status']);
    }

}
