<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Sanpham;
use Cart;

class CartController extends Controller
{
    /*
     *
     *
     * */
    public function viewCart() {

        $cartItems = Cart::instance('cart')->content();

        return view('cart', [
            'title' => "Giỏ hàng",
            'cartItems' => $cartItems,
        ]);
    }

    /*
     *
     *
     * */
    public function addCart(Request $request) {

        $product = Sanpham::find($request->id);

        Cart::instance('cart')->add($product->id, $product->tensanpham, $request->quantity, $product->giaban)
            ->associate('App\Models\Sanpham');

        return redirect()->back()->with('message', 'success ! Items has been added successfully');
    }

    /*
     *
     *
     * */
    public function updateCart(Request $request) {
        Cart::instance('cart')->update($request->rowID, $request->quantity);

        return redirect()->route('cart');
    }

    /*
     *
     *
     * */
    public function removeCart(Request $request) {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);

        return redirect()->route('cart');
    }

    /*
     *
     *
     * */
    public function clearCart() {
        Cart::instance('cart')->destroy();

        return redirect()->route('cart');
    }
}
