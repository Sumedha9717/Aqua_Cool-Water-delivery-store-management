<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    // -----------------------------------------------------------------------Index Function---------------------------------------------------------
    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(10);

         $todayDate = Carbon::now()->format('Y-m-d');
         $orders = Order::when($request->date !== null,function($q) use ($request) {

                return $q->whereDate('created_at',$request->date);
         }, function($q) use ($todayDate){

            return $q->whereDate('created_at',$todayDate);
         })

            ->when($request->status != null,function($q) use ($request){
            return $q->where('status_message',$request->status);
         })
            ->paginate(10);


        return view('admin.orders.index', compact('orders'));
    }

    // -----------------------------------------------------------------------Show Function---------------------------------------------------------
    public function show(int $orderId)
    {
        $order = Order::where('id',$orderId)->first();
        if($order)
        {
            return view('admin.orders.view',compact('order'));
        }
        else{
            return view('admin/orders')->with('message','Order Id is not available');
        }
    }

    // -----------------------------------------------------------------------Update Order Function---------------------------------------------------------

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if($order)
        {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$order->id)->with('message', 'Order Status is updated successfully');
        }
        else{
            return redirect('admin/orders/'.$order->id)->with('message','Order Id is not available');
        }
    }


    //-----------------------------------------------------------------------View Invoice Function---------------------------------------------------------
    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice',compact('order'));

    }

   // -----------------------------------------------------------------------generateInvoice Function---------------------------------------------------------
    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }

    //-----------------------------------------------------------------------MailInvoice Function---------------------------------------------------------
    public function mailInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        try{

            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/'.$orderId)->with('message','Invoice Mail has been sent to'.$order->email);

        }catch(\Exception $e){
            return redirect('admin/orders/'.$orderId)->with('message','Something Went wrong');

        }
        // return redirect('admin/orders/'.$orderId)->with('message','Invoice Mail has been sent to'.$order->email);

    }

}
