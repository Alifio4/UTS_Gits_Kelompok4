<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::with('cart')->get();

        return view('auth/checkout', $data);
    }
    
    public function store(Request $request, $id)
    {

        $a = DB::table('carts')->where('product_id',$id)->get()->count();
        // dd($a);
        if (empty($a)) {
            $keranjang = new Cart;
                $keranjang->product_id = $id;
                $keranjang->save();
                return redirect('/');
          }
        else {
            $detect = DB::table('carts')->where('product_id',$id)->get();
            foreach ($detect as $item) {
                if ($item->product_id == $id) {
                    $qty = Cart::findorfail($item->id);
                    // dd ($qty);
                    DB::table('carts')->where('product_id',$id)->update([
                        'qty'=> $qty->qty + 1,
                    ]);
                    return redirect('/');
                }
                else if ($item->product_id !== $id){
                    // dd($item->product_id." dan ".$id);
                    $keranjang = new Cart;
                    $keranjang->product_id = $id;
                    $keranjang->save();
                    return redirect('/');
                }
            }

        }
        
        
    }

    public function reduce(Request $request, $id)
    {

        $a = DB::table('carts')->where('product_id',$id)->get()->count();
        // dd($a);
        if ($a===1) {
            Cart::destroy($id);
            return redirect('cart/checkout');
          }
        else {
            $detect = DB::table('carts')->where('product_id',$id)->get();
            foreach ($detect as $item) {
                if ($item->product_id == $id) {
                    $qty = Cart::findorfail($item->id);
                    // dd ($qty);
                    DB::table('carts')->where('product_id',$id)->update([
                        'qty'=> $qty->qty - 1,
                    ]);
                    return redirect('cart/checkout');
                }
                // else if ($item->product_id !== $id){
                //     // dd($item->product_id." dan ".$id);
                //     $keranjang = new Cart;
                //     $keranjang->product_id = $id;
                //     $keranjang->save();
                //     return redirect('/');
                // }
            }

        }
        
        
        
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect('cart/checkout');
    }
}
