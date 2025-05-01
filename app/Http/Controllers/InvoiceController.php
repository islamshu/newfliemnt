<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show(Order $order)
    {
        // Get user details and order details using Eloquent relationships
        $orderDetails = $order->orderDetails;

        $currentDate = Carbon::now()->format('Y/m/d');
        $totalPrice = $orderDetails->sum('price'); // Assuming price is stored on the OrderDetail model
        $firstBatch = $order->first_batch;
    

        return view('frontend.invoice', compact('order', 'orderDetails', 'totalPrice', 'firstBatch', 'currentDate'));
    }
    public function contact($code)
{
    $order = Order::where('code',$code)->first();

    if (!$order) {
        abort(404);
    }

    $name = $order->name;
    $phone = $order->phone;
    $location = $order->location . '-' . $order->street;
    $payment = $order->payment;
    $first_batch = $order->first_batch !== 'نقدا' ? $order->first_batch : 'نقدا';
    $totel_price= $payment;

    // Get products in cart
 
   
    $batch = 0 ;
    if($order->payment_getway == 'tappy' || $order->payment_getway == 'tamara'){
        $batch = $order->first_batch;
    }elseif($order->payment_getway == 'installment'){
        $each = $order->payment - $order->first_batch;
        $batch = $each / $order->CashOrBatch;
    }else{
        $batch = $order->first_batch;
    }
    $products_name = [];
    foreach ($order->orderDetails as $product) {
        $products_name[] = $product->product->name;
    }
    $products_name = implode(',', $products_name);

    $currentDate = now()->format('Y/m/d');

    return view('frontend.contact', compact('products_name','name', 'phone', 'location', 'payment', 'first_batch', 'totel_price', 'batch', 'currentDate'));
}
}
