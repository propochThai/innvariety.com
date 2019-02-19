<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Category;
use App\Post;
use App\SubCategory;
use Session;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->page_name_active = 'managehome';
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     //->with('posts',Post::orderBy('created_at', 'desc')->paginate(10))
    public function edit()
    {

              $site = Site::find(1);
              $categories = Category::all();
              $subcategories = SubCategory::all();

              return view('admin.site.edit')->with('site',$site)
                                          ->with('title','Edit Site')
                                          ->with('categories',$categories)
                                          ->with('subcategories',$subcategories)
                                          ->with('page_name_active',$this->page_name_active);

    }


    public function edithilightnews()
    {

      $site = Site::find(1);
      $posts = Post::orderBy('created_at', 'desc')->take(50)->get();

      return view('admin.site.edithilight')->with('site',$site)
                                  ->with('title','Edit Hilight')
                                  ->with('posts',$posts)
                                  ->with('page_name_active',$this->page_name_active);



    }

    public function updatehilightnews(Request $request, $id)
    {

        $site = Site::find($id);

        $site->post1_id = $request->post1_id;
        $site->post2_id = $request->post2_id;
        $site->post3_id = $request->post3_id;
        $site->post4_id = $request->post4_id;
        $site->post5_id = $request->post5_id;


        $site->save();
        Session::flash('success', 'Hilight บันเทิง updated successfully.');

        return redirect()->route('site.hilightnews');
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
        $this->validate($request,[
            'name' =>'required|max:255',
            'keyword' => 'required',
            'description' => 'required',
            'facebook' =>'required|max:255',
            'twister' =>'required|max:255',
            'youtube' =>'required|max:255',
            'subcategory2_id' =>'required',
            'format2_type' =>'required',
            'subcategory3_id' =>'required',
            'format3_type' =>'required',
            'subcategory4_id' =>'required',
            'format4_type' =>'required',
            'subcategory5_id' =>'required',
            'format5_type' =>'required',
            'subcategory6_id' =>'required',
            'format6_type' =>'required',
            'subcategory7_id' =>'required',
            'format7_type' =>'required',
        ]);
        $site = Site::find($id);
        $site->name = $request->name;
        $site->keyword = $request->keyword;
        $site->description = $request->description;
        $site->facebook = $request->facebook;
        $site->twister = $request->twister;
        $site->youtube = $request->youtube;
        $site->subcategory2_id = $request->subcategory2_id;
        $site->format2_type = $request->format2_type;

        $site->subcategory3_id = $request->subcategory3_id;
        $site->format3_type = $request->format3_type;
        $site->subcategory4_id = $request->subcategory4_id;
        $site->format4_type = $request->format4_type;
        $site->subcategory5_id = $request->subcategory5_id;
        $site->format5_type = $request->format5_type;
        $site->subcategory6_id = $request->subcategory6_id;
        $site->format6_type = $request->format6_type;
        $site->subcategory7_id = $request->subcategory7_id;
        $site->format7_type = $request->format7_type;

        $site->save();
        Session::flash('success', 'Site updated successfully.');

        return redirect()->route('site.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
