<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


use App\Category;

class CategoriesController extends Controller
{

    public $page_name_active;



    public function __construct()
    {
        $this->page_name_active = 'categories';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index')
               ->with('categories',$categories)
               ->with('title','List Category')
               ->with('page_name_active',$this->page_name_active);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

            
        return view('admin.categories.create')
                ->with('title','Create a Category')
               ->with('page_name_active',$this->page_name_active);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $category = new Category;

        $category->name = $request->name;
        $category->slug = $this::url_slug($request->name);
        $category->save();

        Session::flash('success', 'You successfully created a category.');
        return redirect()->route('categories');


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
        $category = Category::find($id);

        return view('admin.categories.edit')
               ->with('category',$category)
               ->with('title','Edit a Category')
               ->with('page_name_active',$this->page_name_active);
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
        $category = Category::find($id);
        $category->name =$request->name;
        $category->slug = $this::url_slug($request->name);
        $category->save();
        Session::flash('success', 'You successfully updated a category.');
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'You successfully deleted a category.');
        return redirect()->route('categories');

    }
}
