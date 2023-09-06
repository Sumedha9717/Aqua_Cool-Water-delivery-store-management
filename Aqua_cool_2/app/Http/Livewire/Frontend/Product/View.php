<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $quantityCount = 1;


    // ------------------------------------------------------------------increment Quantity Function----------------------------------------------

    public function incrementQuantity()
    {

        if($this->quantityCount < 10)
        {
            $this->quantityCount++;
        }
    }


    // ------------------------------------------------------------------dicremenet Quantity Function----------------------------------------------

    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }


// --------------------------------------------------------------------AddTOCart Function-----------------------------------------------------

public function addToCart(int $productID)
{
       if(Auth::check())
       {
            if($this->product->where('id',$productID)->where('status','0')->exists())
            {

                    if($this->product->quantity > 0)
                    {
                            if($this->product->quantity >= $this->quantityCount)
                            {
                                // Insert Product to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productID,
                                    'quantity' => $this->quantityCount
                                ]);

                                $this->emit('CartAddedUpdated');
                                session()->flash('message','Product Added to the cart');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added to the cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                // session()->flash('message','only'.$this->product->quantity.'Quentity Available');
                                // $this->dispatchBrowserEvent('message', [
                                //     'text' => 'Quentity Available',
                                //     'type' => 'success',
                                //     'status' => 200
                                // ]);
                                session()->flash('message','Out of stoke');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of stoke',
                                    'type' => 'danger',
                                    'status' => 401
                                ]);
                            }
                    }
                    else
                    {
                            session()->flash('message','Out of stoke');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of stoke',
                                'type' => 'danger',
                                'status' => 401
                            ]);
                    }
            }
            else
            {
                session()->flash('message','Product does not added');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not added',
                    'type' => 'danger',
                    'status' => 401
                ]);
            }
       }
       else
       {
            session()->flash('message','Please login to Add to cart');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to Add to cart',
                'type' => 'info',
                'status' => 401
            ]);

       }
    }

// ------------------------------------------------------------------Mount Function----------------------------------------------
    public function mount($category,$product)
    {
       $this->category = $category;
       $this->product = $product;
    }

// ------------------------------------------------------------------Render Function----------------------------------------------

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }





}
