<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Order;
use App\Models\Order_Laser;
use App\Models\Order_Print;
use App\Models\Order_Type;
use Illuminate\Support\Facades\Auth;
use Elibyy\TCPDF\TCPDF;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.admin');
    }

    public function index_laser($id1)
    {
        $id=$id1;
        return view('admin.admin',compact('id'));
    }
    public function index_print($id1)
    {
        $id=$id1;
        return view('admin.admin',compact('id'));
    }
    public function index_type($id1)
    {
        $id=$id1;
        return view('admin.admin',compact('id'));
    }
    public function laser_print_bills($id)
    {
        $order_laser = Order_Laser::find($id);
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->action = 'print laser bills' . $order_laser->id;
        $log->save();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('approachprintingcenter');
        $pdf->SetTitle('Order');
        $pdf->SetSubject('Order laser');
        $pdf->SetKeywords('Order, PDF');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(false);

        $pdf->SetTitle($order_laser->order->id . "_" . "MA");

        $pdf->SetFont('aealarabiya', '', 11);
        $pdf->SetFontSubsetting(false);
        $pdf->AddPage();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
// Period of Coverage
        $pdf->SetFontSize(20);
        $pdf->Image('public/image/info/approach logo-01.png', 30, 0, 10, 10);
        $pdf->SetFontSize(11);
        $pdf->Cell(63, 6, 'time create : ' . Carbon::now(), '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'number bills : ' . $order_laser->order_id . '-' . $order_laser->id . '-' . auth::user()->id, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'order number : ' . $order_laser->order_id, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'Customer name : ' . $order_laser->order->customer->name, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'Customer number : ' . $order_laser->order->customer->phone, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'time pay :  ' . $order_laser->time_pay_at, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'total cost :  ' . $order_laser->total_cost, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'paid :  ' . $order_laser->paid, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'chasier name:  ' . auth::user()->name, '0', 1, 'C', 1);
        $pdfname = $order_laser->order_id . '-' . $order_laser->id . '-' . auth::user()->id . ".pdf";
        $pdf->output($pdfname, "I");
    }
    public function print_print_bills($id)
    {
        $order_pritn = Order_Print::find($id);
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->action = 'print bills' . $order_pritn->id;
        $log->save();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('approachprintingcenter');
        $pdf->SetTitle('Order');
        $pdf->SetSubject('Order pritn');
        $pdf->SetKeywords('Order, PDF');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(false);

        $pdf->SetTitle($order_pritn->order->id . "_" . "MA");

        $pdf->SetFont('aealarabiya', '', 11);
        $pdf->SetFontSubsetting(false);
        $pdf->AddPage();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
// Period of Coverage
        $pdf->SetFontSize(20);
        $pdf->Image('public/image/info/approach logo-01.png', 30, 0, 10, 10);
        $pdf->SetFontSize(11);
        $pdf->Cell(63, 6, 'time create : ' . Carbon::now(), '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'number bills : ' . $order_pritn->order_id . '-' . $order_pritn->id . '-' . auth::user()->id, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'order number : ' . $order_pritn->order_id, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'Customer name : ' . $order_pritn->order->customer->name, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'Customer number : ' . $order_pritn->order->customer->phone, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'time pay :  ' . $order_pritn->time_pay_at, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'total cost :  ' . $order_pritn->total_cost, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'paid :  ' . $order_pritn->paid, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'chasier name:  ' . auth::user()->name, '0', 1, 'C', 1);
        $pdfname = $order_pritn->order_id . '-' . $order_pritn->id . '-' . auth::user()->id . ".pdf";
        $pdf->output($pdfname, "I");
    }
    public function type_print_bills($id)
    {
        $order_type = Order_Type::find($id);
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->action = 'mettrail bills' . $order_type->id;
        $log->save();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('approachprintingcenter');
        $pdf->SetTitle('Order');
        $pdf->SetSubject('Order type');
        $pdf->SetKeywords('Order, PDF');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(false);

        $pdf->SetTitle($order_type->order->id . "_" . "MA");

        $pdf->SetFont('aealarabiya', '', 11);
        $pdf->SetFontSubsetting(false);
        $pdf->AddPage();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
// Period of Coverage
        $pdf->SetFontSize(20);
        $pdf->Image('public/image/info/approach logo-01.png', 30, 0, 10, 10);
        $pdf->SetFontSize(11);
        $pdf->Cell(63, 6, 'time create : ' . Carbon::now(), '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'number bills : ' . $order_type->order_id . '-' . $order_type->id . '-' . auth::user()->id, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'order number : ' . $order_type->order_id, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'Customer name : ' . $order_type->order->customer->name, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'Customer number : ' . $order_type->order->customer->phone, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'time pay :  ' . $order_type->time_pay_at, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'total cost :  ' . $order_type->total_cost, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'paid :  ' . $order_type->paid, '0', 1, 'C', 1);
        $pdf->Cell(63, 6, 'chasier name:  ' . auth::user()->name, '0', 1, 'C', 1);
        $pdfname = $order_type->order_id . '-' . $order_type->id . '-' . auth::user()->id . ".pdf";
        $pdf->output($pdfname, "I");
    }


}

?>