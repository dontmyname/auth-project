<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function index()
    {
        return view('products', [
            'products' => Product::all()
        ]);
    }

    function store(Request $req)
    {

        $path = '';

        if ($req->file('img')) {
            $req->file('img')->store('public');
            $path = 'storage/' . $req->file('img')->hashName();
        }

        date_default_timezone_set("Asia/Tashkent");

        Product::create([
            'user_id' => Auth::id(),
            'name' => $req->name,
            'price' => $req->price,
            'qty' => $req->qty,
            'brand' => $req->brand,
            'photo' => $path,
            'production_date' => $req->production_date
        ]);

        return back()->with('success', 'Product added successfully!');
    }

    function my_products()
    {
        return view('my_products', ['products' => Product::where('user_id', Auth::user()->id)->get()]);
    }

    function delete_product($id)
    {
        $message = 'It\'s not your product!!!';

        if (Product::where('id', $id)->where('user_id', Auth::id())->first()) {
            Product::where('id', $id)->where('user_id', Auth::id())->first()->delete();
            $message = 'Deleted successfully';
        }

        return back()->with('success', $message);
    }
}
