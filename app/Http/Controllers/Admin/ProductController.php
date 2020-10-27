<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Carbon\Carbon;
use App\Category;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\RequestException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
        
    }
    // "featured_image"               =>  $request->file('featured_image'),
    // "gallery_image"               =>  $request->file('gallery_image'),
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $featured_image = $request->file('featured_image');
        $featured_image_ext =  $request->featured_image->getClientOriginalExtension();
        
        $product = new Product();
            $product_name = response()->json($request->product_name);
            if ($featured_image) {
                $currentDate = Carbon::now()->toDateString();
                $fImage = $request->slug.'-'.$currentDate.uniqid().'.'.$featured_image_ext;
                if (!Storage::disk('public')->exists('products')) {
                    Storage::disk('public')->makeDirectory('products');
                }
                $image = Image::make($featured_image)->resize(1024, 1024)->save($fImage,80);
                Storage::disk('public')->put('products/'.$fImage,$image);
            }
            
            $product->type = $request->type;
            $product->name = $request->product_name;
            $product->slug = $request->slug;
            $product->stock = $request->stock;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->unity = $request->unity;
            $product->status = $request->status;
            $product->short_desc = $request->short_description;
            $product->long_desc = $request->long_description;
            $product->featured_image = url('/public') . '/storage/products/'.$fImage;
            $product->save();
            $product->categories()->attach($request->category_id);
            return redirect()->route('products.index')->with('success','Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
