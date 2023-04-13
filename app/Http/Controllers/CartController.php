<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $b = Auth::user()->id;
        $data['carts'] = Cart::with('cart')->where('user_id', $b)->get();

        $balance = 0;

        return view('auth/checkout', $data);
    }

    public function store(Request $request, $id)
    {
        $b = Auth::id();
        // dd($b);
        $a = DB::table('carts')
            ->where('user_id', $b)
            ->where('product_id', $id)->get()->count();


        // $a = DB::table('carts')->where('product_id',$id)->get()->count();
        // dd($a);
        if (empty($a)) {
            $keranjang = new Cart;
            //tes per user
            $b = Auth::id();

            $keranjang->user_id = $b;
            //
            $keranjang->product_id = $id;
            $keranjang->save();
            return redirect('/');
        } else {
            $detect = DB::table('carts')->where('product_id', $id)->get();
            foreach ($detect as $item) {
                if ($item->product_id == $id) {
                    $qty = Cart::findorfail($item->id);
                    // dd ($qty);
                    DB::table('carts')->where('product_id', $id)->update([
                        'qty' => $qty->qty + 1,
                    ]);
                    return redirect('/');
                } else if ($item->product_id !== $id) {
                    // dd($item->product_id." dan ".$id);
                    $keranjang = new Cart;
                    $keranjang->product_id = $id;
                    $keranjang->save();
                    return redirect('/');
                }
            }
        }
    }

    public function subtract(Request $request, $id)
    {
        // echo "Hello world!<br>";

        $a = DB::table('carts')->where('product_id', $id)->get();
        // $a = DB::table('carts')->where('product_id',$id)->pluck('qty');
        // $a = cart::where('qty', '=', $id)->get();

        // dd($a);
        foreach ($a as $a) {
            if ($a->qty === 1) {
                Cart::where('product_id', $id)->delete();
                // echo $a;
                return redirect('cart/checkout');
            } else {
                $user_id = Auth::id();
                $detect = DB::table('carts')->where('user_id', $user_id)->where('product_id', $id)->get();
                foreach ($detect as $item) {
                    if ($item->product_id == $id) {
                        $qty = Cart::findorfail($item->id);
                        // dd ($qty);
                        if ($qty->qty > 1) {
                            DB::table('carts')->where('id', $item->id)->update([
                                'qty' => $qty->qty - 1,
                            ]);
                            return redirect('cart/checkout');
                        } else {
                            // Quantity is already 1, so do nothing
                            return redirect('cart/checkout');
                        }
                    }
                }
            }
        }
    }

    public function add(Request $request, $id)
    {

        $a = DB::table('carts')->where('product_id', $id)->get()->count();
        // dd($a);
        if (empty($a)) {
            $keranjang = new Cart;
            $keranjang->product_id = $id;
            $keranjang->save();
            return redirect('/');
        } else {
            $user_id = Auth::id();
            $item = Cart::where('user_id', $user_id)->where('product_id', $id)->first();
            if ($item) {
                // Jika item sudah ada di keranjang, maka update jumlahnya
                DB::table('carts')->where('id', $item->id)->update([
                    'qty' => $item->qty + 1,
                ]);
            } else {
                // Jika item belum ada di keranjang, maka tambahkan item baru
                $keranjang = new Cart;
                $keranjang->product_id = $id;
                $keranjang->user_id = $user_id;
                $keranjang->save();
            }
            return redirect('cart/checkout');
        }
    }

    public function destroy($id)
    {
        Cart::where('product_id', $id)->delete();
        return redirect('cart/checkout');
    }

    public function pay(Request $request)
    {
        // Mengambil data cart yang terkait dengan user yang sedang login
        $carts = Cart::where('user_id', Auth::id())->get();

        // Memindahkan data dari tabel cart ke tabel transactions
        foreach ($carts as $cart) {
            Transaction::create([
                'status' => 'paid',
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'user_id' => Auth::id(),
            ]);

            // Menghapus data yang terkait dari tabel cart
            $cart->delete();
        }

        return redirect()->route('home')->with('success', 'Payment success!');
    }
}
