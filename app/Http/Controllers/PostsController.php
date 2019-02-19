<?php

namespace App\Http\Controllers;
use Auth;
use Image;
use App\Post;
use App\Category;
use App\SubCategory;
use App\Links;

use Illuminate\Http\Request;
use Session;
class PostsController extends Controller
{
    public $page_name_active;

    public function __construct()
    {
        $this->page_name_active = 'posts';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategories = SubCategory::all();
        $subcategory_select = "";
        return view('admin.posts.index')
            ->with('posts',Post::orderBy('created_at', 'desc')->paginate(10))
            ->with('subcategories',$subcategories)
            ->with('subcategory_select',$subcategory_select)
            ->with('title','List Posts')
            ->with('query_text','')
            ->with('page_name_active',$this->page_name_active);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if(count($categories) ==0)
        {
            Session::flash('info','You must have some categories before attemping to create a post.');
            return redirect()->back();
        }
        $subcategories = SubCategory::all();
        if(count($subcategories) ==0)
        {
            Session::flash('info','You must have some categories before attemping to create a post.');
            return redirect()->back();
        }
        $tags = Post::existingTags()->pluck('name');
        return view('admin.posts.create',compact('tags'))
               ->with('categories',$categories)
               ->with('title','Create a Posts')
               ->with('page_name_active',$this->page_name_active);
    }
    public function search(Request $request){
        $query_text = "";
        $subcategory_select = "";
        $subcategories = SubCategory::all();
        if($request->query()['subcategory'] != ""){
              $subcategory_select = $request->query()['subcategory'];
              if( $request->query()['query'] !=""){
                $query_text = $request->query()['query'];
                $posts = \App\Post::where('title','like',  '%' . $request->query()['query'] . '%')->where('subcategory_id',$request->query()['subcategory'])->paginate(10);
              }
              else {
                $posts = \App\Post::where('subcategory_id',$request->query()['subcategory'])->paginate(10);

              }

        }else{
          if( $request->query()['query'] !="")
          {
            $posts = \App\Post::where('title','like',  '%' . $request->query()['query'] . '%')->paginate(10);
            $query_text = $request->query()['query'];
          }
          else {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);

          }

        }
        //$posts = \App\Post::where('title','like',  '%' . $request->query()['query'] . '%')->paginate(10);


        return view('admin.posts.index')
            ->with('query_text',$query_text)
            ->with('subcategory_select',$subcategory_select)
            ->with('subcategories',$subcategories)
            ->with('posts',$posts)
            ->with('title','List Posts')
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
            'title' =>'required|max:255',
            'textcontent' => 'required',
            'subcategory_id' =>'required',
            'tags' => 'required',
            'keyword' => 'required',
            'contentdate' =>'required'
        ]);






        $post = new Post;
        if($request->has('videocontent') == false){
            $post->videocontent = '-';
        }
        if($request->has('keyword') == false){
            $post->keyword = $request->title;
        }
        if($request->has('description') == false){
            $post->description = $request->title;
        }
        if($request->hasFile('featured'))
        {
                $featured = $request->featured;
                $img = Image::make($featured)->resize(750, 380);
                $featured_new_name = time()."750_".$featured->getClientOriginalName();
                $img->save('uploads/posts/'.$featured_new_name,100);
                $post->featured = '/uploads/posts/'.$featured_new_name;

        }elseif($request->has('videocontent')){
                $array_youtube = explode("watch?v=",$request->videocontent);

                if(count($array_youtube) >1){
                    $thumbnail_url='https://img.youtube.com/vi/'.$array_youtube[1].'/hqdefault.jpg';
                    $img_content=file_get_contents($thumbnail_url);

                    $img = Image::make($img_content)->crop(750, 380);
                    $featured_new_name = time()."750_hqdefault.jpg";
                    $img->save('uploads/posts/'.$featured_new_name,100);

                    $post->featured = '/uploads/posts/'.$featured_new_name;

                    $post->featured = 'https://img.youtube.com/vi/'.$array_youtube[1].'/hqdefault.jpg';
                }

                elseif(count($array_youtube) ==1){
                        $array_youtube = explode("/",$request->videocontent);
                        $thumbnail_url='https://img.youtube.com/vi/'.$array_youtube[count($array_youtube)-1].'/hqdefault.jpg';
                    $img_content=file_get_contents($thumbnail_url);
                    $img = Image::make($img_content)->crop(750, 380);
                    $featured_new_name = time()."750_hqdefault.jpg";
                    $img->save('uploads/posts/'.$featured_new_name,100);

                    $post->featured = '/uploads/posts/'.$featured_new_name;

                    //$post->featured = 'https://img.youtube.com/vi/'.$array_youtube[1].'/hqdefault.jpg';

                        //$post->featured = 'https://img.youtube.com/vi/'.$array_youtube[count($array_youtube)-1].'/hqdefault.jpg';
                }



        }else{
            $this->validate($request,[
            'featured' => 'required|image'
            ]);

        }


        $post->user_id = Auth::id();
        $post->title= $request->title;
        $post->textcontent = str_replace('<img ','<img style="max-width: 100%; height: auto;"',$request->textcontent);
        $post->contentdate = $request->contentdate;
        $post->subcategory_id= $request->subcategory_id;
        $post->videocontent = str_replace("watch?v=","embed/",$request->videocontent);
        $post->keyword = $request->keyword;
        $post->description = $request->description;

        $post->slug =  $this::url_slug($request->title);
        $post->save();
        $post->tag(explode(',', $request->tags));



        // Now add tags


        Session::flash('success','Post created successfully.');
        return redirect()->route('posts');
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

        $post = Post::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::where('category_id',$post->subcategory->category_id)->get();
        $tags = Post::existingTags()->pluck('name');

        //dd($post->tag());
        //$link = Post::with('tagged')->first(); /
        //$tagging_tags = Post::with('tagged')->first();

        return view('admin.posts.edit',compact('tags'))
               ->with('post',$post)
               ->with('categories',$categories)
               ->with('title','Edit a Posts')
               ->with('tags',$tags)
               ->with('subcategories',$subcategories)
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

       $this->validate($request,[
            'title' =>'required|max:255',
            'textcontent' => 'required',
            'videocontent' => 'required',
            'subcategory_id' =>'required',
            'tags' =>'required',
            'keyword' => 'required',
            'description' => 'required',
            'contentdate' => 'required'
        ]);
        $post = Post::find($id);

        if($request->hasFile('featured'))
        {

            $featured = $request->featured;
            $img = Image::make($featured)->resize(750, 380);
            #$img = Image::make($featured)->crop(750, 380);




            $featured_new_name = time()."750_".$featured->getClientOriginalName();

            $img->save('uploads/posts/'.$featured_new_name,100);

            $post->featured = '/uploads/posts/'.$featured_new_name;




        }

        $post->title = $request->title;
        $post->contentdate = $request->contentdate;
        $post->textcontent = str_replace('<img ','<img style="max-width: 100%; height: auto;"',$request->textcontent);



        $post->videocontent = str_replace("watch?v=","embed/",$request->videocontent);
        //$post->user_id = Auth::id();
        $post->subcategory_id = $request->subcategory_id;
        $post->keyword = $request->keyword;
        $post->description = $request->description;

        $post->save();
        $post->retag(explode(',', $request->tags));




        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);

       $post->delete();

       Session::flash('success','The post was just trashed.');
       return redirect()->back();
    }
    public function kill($id)
    {
       $post = Post::withTrashed()->where('id',$id)->first();
       $post->forceDelete();
       Session::flash('success','Post deleted permanently.');
       return redirect()->back();
    }
    public function restore($id)
    {
       $post = Post::withTrashed()->where('id',$id)->first();
       $post->restore();
       Session::flash('success','Post restored successfully.');
       return redirect()->route('posts');
    }


    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')
                ->with('title','List Post in Transhed')
               ->with('posts',$posts)
               ->with('page_name_active',$this->page_name_active);

    }
}
