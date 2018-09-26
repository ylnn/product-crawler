<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->paginate(10);
        return $products;
    }
}
