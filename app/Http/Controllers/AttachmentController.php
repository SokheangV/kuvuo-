<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AttachmentController extends Controller
{
    public function index()
    {
        return view('attachments');
    }

    public function category($type, $slug)
    {
        $categorySlug = $type . '-' . $slug;

        $products = Product::whereHas('category', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })->get();

        return view('attachment-category', compact('products', 'type', 'slug'));
    }
}