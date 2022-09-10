<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Product;
use App\Category;

class HomeController extends Controller
{


    private $product;
    private $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category =$category;
    }




    public function index()
    {

        $products = $this->product->orderBy('id','desc')->limit(9)->get();
        $category = $this->category->orderBy('id','desc')->get();
        return view('welcome',compact('products'));
    }

    public function single($slug)
    {
        $product=$this->product->whereSlug($slug)->first();
        return view('single', compact('product'));
    }
}
