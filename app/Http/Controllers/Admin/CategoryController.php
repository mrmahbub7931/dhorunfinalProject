<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function orderEdit(Request $request)
    {
        return $request->all();
    }
    // view index file
    public function index()
    {
        $categories = Category::all();
        // return $categories;
        return view('admin.category.index',compact('categories'));
    }

    // create category view
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
        
    }

    // store category
    public function store(Request $request)
    {

        $data = [
            'name' =>  $request->category_name,
            'slug' =>  Str::slug($request->category_name,'-'),
            'icon_class' =>  $request->icon_class,
            'description' =>  $request->description,
            'parent_id' =>  (isset($request->parent_id)) ? $request->parent_id : NULL,
        ];
        $category = Category::create($data);
        return redirect()->route('admin.category.index')->with('success','Category Created Successfully!');
        
    }

    public function edit($id)
    {
        $category = Category::findOrfail($id);
        $categories = Category::all();
        return view('admin.category.edit',compact('category','categories'));
    }

    public function update(Request $request,$id)
    {
        $data = [
            'name' =>  $request->category_name,
            'slug' =>  Str::slug($request->category_name,'-'),
            'icon_class' =>  $request->icon_class,
            'description' =>  $request->description,
            'parent_id' =>  $request->parent_id,
        ];
        $category = Category::findOrfail($id);
        $category->update($data);
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category =  Category::findOrfail($id);
        $category->delete();
        return redirect()->back();
    }
}
