<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    // -----------------------------------------------------------------------decrementQuantity Function----------------------------------------------------
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quentity Updated',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong..!',
                'type' => 'error',
                'status' => 404
            ]);
        }

    }

     // -----------------------------------------------------------------------incrementQuantity Function----------------------------------------------------
     public function incrementQuantity(int $cartId)
     {

        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {

            if($cartData->product->quantity > $cartData->quantity)
            {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quentity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'only '.$cartData->product->quantity.' Quantity Available',
                    'type' => 'error',
                    'status' => 404
                ]);
            }

        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong..!',
                'type' => 'error',
                'status' => 404
            ]);
        }
     }

    //  ------------------------------------------------------------------------removeCartItem Function------------------------------------------

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData)
        {
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Remove Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong..!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    // -----------------------------------------------------------------------Render Function----------------------------------------------------
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
