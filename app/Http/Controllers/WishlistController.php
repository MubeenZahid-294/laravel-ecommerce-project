<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->with('product')
            ->latest()
            ->get();
        return view('wishlist', compact('wishlist'));
    }

    public function toggle(Product $product)
    {
        $existing = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            $existing->delete();
            return back()->with('success', 'Removed from wishlist!');
        }

        Wishlist::create([
            'user_id'    => auth()->id(),
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Added to wishlist! ❤️');
    }

    public function remove(Product $product)
    {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->delete();

        return back()->with('success', 'Removed from wishlist!');
    }
}