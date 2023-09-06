<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0, $payment_mode = NULL, $payment_id = NULL;

    public $fullname, $email, $phone, $pincode, $address;

    protected $listeners = [
        'validationForAll'
    ];

// ---------------------------------------------------------------------------rules Function--------------------------------------------------
    public function rules()
    {
       return [
        'fullname' => 'required|string|max:100',
        'email'=> 'required|email|max:100',
        'phone'=> 'required|string|max:10|min:10',
        'pincode'=> 'required|string|max:6|min:6',
        'address'=> 'required|string|max:250',
       ];
    }

// ---------------------------------------------------------------------------placeOrder Function--------------------------------------------------
    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
        'user_id' => auth()->user()->id,
        'tracking_no' => 'Aqua-cool-'.Str::random(10),
        'fullname'=> $this->fullname,
        'email'=> $this->email,
        'phone'=> $this->phone,
        'pincode'=> $this->pincode,
        'address'=> $this->address,
        'status_message'=> 'in progress',
        'payment_mode'=> $this->payment_mode,
        'payment_id'=> $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem) {

            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            // if($cartItem->product_color_id != NULL){
            //     $cartItem->productColors()->where('id', $cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
            // }else{
            //     $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            // }
        }
        return  $order;

    }

// ---------------------------------------------------------------------------CodOrder Function--------------------------------------------------

    public function codOrder()
    {
        $this->payment_mode = 'Cash On Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id',auth()->user()->id,)->delete();

            // try{
            //     // mail send sucessfully
            //     $order = Order::findOrFail($codOrder->id);
            //     Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            // }
            // catch(\Exception $e)
            // {
            //     // Something went wrong
            // }

            $order = Order::findOrFail($codOrder->id);
                try{

                    Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                    return redirect('orders/'.$order->id)->with('message','Invoice Mail has been sent to'.$order->email);

                }catch(\Exception $e){
                    return redirect('orders/'.$order->id)->with('message','Something Went wrong');

                }

            session()->flash('message','Order Placed successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect('some/url')->to('thank-you');

        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Somthing Went Wrong..!',
                'type' => 'error',
                'status' => 404
            ]);

        }
    }


    // ---------------------------------------------------------------------------Total Product Function--------------------------------------------------

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();

        foreach ($this->carts as $cartItem)
        {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    // ---------------------------------------------------------------------Render Function----------------------------------------------------

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        if (auth()->user()->userDetail) {
            $this->phone = auth()->user()->userDetail->phone;
            $this->pincode = auth()->user()->userDetail->pin_code;
            $this->address = auth()->user()->userDetail->address;
        }




        $this->totalProductAmount = $this->totalProductAmount();

        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
