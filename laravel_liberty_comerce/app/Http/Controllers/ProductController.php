<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'name' => 'required',
            'stock' => 'required|gt:0',
            'price' => 'required|gt:0',
            'category' => 'required',
            'description' => 'required'
        ]);
        $image_name = $this->storeImage($request);
        $val['image'] = $image_name;
        Product::create($val);
        return redirect('/admin');
    }

    public function addToCart(Request $request)
    {
        $user = auth()->user();
        for ($i=0; $i<$request->product_quantity; $i++){
            $user->products()->attach($request->product_id, [
                'product_id' => $request->product_id,
            ]);
        }
        return redirect('cart');
    }

    public function removeFromCart(Request $request)
    {
        $user = auth()->user();
        $user->products()->detach($request->product_id, [
            'product_id' => $request->product_id,
        ]);
        return redirect('cart');
    }

    public function order(Request $request)
    {
        $shipping_address = $request->address;
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'shipping_address' => $shipping_address
        ]);
        $items = $request->data;
        $items_ordered = json_decode($items);
        if ($items_ordered->isEmpty()) {
            return;
        }
        foreach ($items_ordered as $item) {
            for ($i = 0; $i < $item->qty; $i++) {
                if (DB::table('products')->where('id', $item->id)->first()->stock > 0) {
                    DB::table('products')->where('id', $item->id)->decrement('stock');
                    DB::insert('INSERT INTO orders_has_products VALUES (?, ?)', [$order->id, $item->id]);
                }
            }
        }
        return;
    }

    public function delete(Request $request)
    {
        DB::table('products')->where('id', $request->id)->delete();
        return redirect('catalogue');
    }
    
    public function modify(Request $request)
    {

        $product = Product::where('id', $request->id);

        if(!is_null($request->name)) {
            $product->update([
                'name' => $request->name
            ]);
        }
        if(!is_null($request->image)) {
            $image_name = $this->storeImage($request);
            $product->update([
                'image' => $image_name
            ]);
        }
        if(!is_null($request->description)) {
            $product->update([
                'description' => $request->description
            ]);
        }
        if(!is_null($request->price)) {
            $product->update([
                'price' => $request->price
            ]);
        }
        if(!is_null($request->category)) {
            $product->update([
                'category' => $request->category
            ]);
        }
        if(!is_null($request->stock)) {
            $product->increment('stock', $request->stock);
        }
        return back()->with(['success' => 'Le produit a bien été modifié.']);
    }

    public function storeImage($request) {
        $image_name = $request->file('image')->getClientOriginalName();
        $image_name = time().'_'.$image_name;
        $request->file('image')->storeAs(
            'public/images/products', $image_name
        );
        return $image_name;
    } 
}