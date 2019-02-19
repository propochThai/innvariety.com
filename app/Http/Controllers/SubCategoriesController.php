<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use App\Style;
use Session;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
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
        $subcategories =  SubCategory::paginate(10);
        
    
        return view('admin.subcategories.index')
                    ->with('title','List SubCategory')
                    ->with('subcategories',$subcategories)
                    ->with('page_name_active',$this->page_name_active);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories =  Category::all();
        $styles =  Style::all();
        if(count($categories)==0){
            //session()->flash('info','You must have some categories before attemping to create a subcategories.2');

            Session::flash('info','You must have some categories before attemping to create a subcategories.');
            
            return redirect()->back();

        }
        return view('admin.subcategories.create')
                    ->with('categories',$categories)
                    ->with('title','Create a SubCategory')
                    ->with('styles',$styles)
                    ->with('page_name_active',$this->page_name_active);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showsubcat(Request $request)
    {

        $id = $request->category_id;

        $subcategories = SubCategory::where('category_id', $id)->get();
        
        return view('admin.subcategories.viewselect')
                ->with('subcategories',$subcategories);
                

    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'keyword' => 'required',
            'description' => 'required',
            'style_id' => 'required'
        ]);
        $subcategory = new SubCategory;
        $subcategory->category_id  = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->title = $request->title;
        $subcategory->keyword = $request->keyword;
        $subcategory->description = $request->description;
        $subcategory->style_id = $request->style_id;


        $subcategory->slug = $this::slug_thai($request->name);
        $subcategory->save();
        Session::flash('success', 'You successfully created a subcategory.');
        return redirect()->route('subcategories');

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
        $subcategory = SubCategory::find($id);
        $styles =  Style::all();
        return view('admin.subcategories.edit')
                ->with('subcategory',$subcategory)
                ->with('categories',Category::all())
                ->with('title','Edit a SubCategory')
                ->with('styles',$styles)
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
        $subcategory = SubCategory::find($id);
        $subcategory->name =$request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->slug = $this::slug_thai($request->name);
        $subcategory->style_id = $request->style_id;
        $subcategory->title = $request->title;
        $subcategory->description = $request->description;
        $subcategory->keyword = $request->keyword;

        $subcategory->save();
        Session::flash('success', 'You successfully updated a subcategory.');
        return redirect()->route('subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        Session::flash('success', 'You successfully deleted a subcategory.');
        return redirect()->route('subcategories');

    }
}
