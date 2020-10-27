<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;

class CategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth:api','scopes:create-category,update-category,delete-category'])->except('index','show');
        $this->middleware(['auth:api','scopes:view-category,create-categories,update-categories,delete-categories'])->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryCollection::collection(Category::orderBy('name')->get());
        return response()->json([
            'data'  => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        return response()->json($request->all());
        $data = [
            'name' =>  $request->category_name,
            'slug' =>  Str::slug($request->category_name,'-'),
            'icon_class' =>  $request->icon_class,
            'description' =>  $request->description,
            'parent_id' =>  (isset($request->parent_id)) ? $request->parent_id : NULL,
        ];

        // try {
        //     $category = Category::create($data);
        //     return response()->json($response = [
        //         'error' =>  false,
        //         'message'   =>  'Category create successfully!',
        //         'data'  =>  new CategoryResource($category),
        //     ]);
        // } catch (Exception $e) {
        //     return response()->json($response = [
        //         'error' =>  true,
        //         'message'   =>  'Insertion failed!',
        //         'data'  =>  NULL,
        //     ]);
        // }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = new CategoryResource($category);
        return response()->json([
            'data'  => new CategoryResource($categories)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        // return response()->json($request->all());
        $data = [
            'name' =>  $request->category_name,
            'slug' =>  Str::slug($request->category_name,'-'),
            'icon_class' =>  $request->icon_class,
            'description' =>  $request->description,
            'parent_id' =>  $request->parent_id,
        ];

        try {
            // $category->update($request->all());
            $category = $category->update($data);
            $response = [
                'error' =>  false,
                'message'   =>  'Category updated successfully!',
                'data'  =>  new CategoryResource($category),
            ];
        } catch (Exception $e) {
            $response = [
                'error' =>  true,
                'message'   =>  'Updation failed!',
                'data'  =>  NULL,
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return $request->all();
        $category->delete();
        
    }
}
