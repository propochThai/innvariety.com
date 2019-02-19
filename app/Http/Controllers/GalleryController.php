<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Gallery;
use Session;

class GalleryController extends Controller
{
    public $page_name_active;

    public function __construct()
    {
        $this->page_name_active = 'posts';
    }

    public function editform($postid){
        $post = POST::find($postid);

        $gallery = Gallery::where('post_id',$postid)->orderBy('image_no','ASC')->get();

        return view('admin.gallery.edit')
               ->with('post',$post)
               ->with('title','Gallery')
              ->with('gallery',$gallery)
               ->with('page_name_active',$this->page_name_active);


    }

    public function store($postid,Request $request){
      
      

      if($request->hasFile('images'))
      {
          $files = $request->file('images');

          for($i=1;$i<11;$i++)
          {
              if(array_key_exists($i-1,$files))
              {
                $gallery = Gallery::where('post_id',$postid)->where('image_no',$i)->first();
                $file = $files[$i-1];
                if($gallery == null)
                {

                      $filename = $file->getClientOriginalName();
                      $extension = $file->getClientOriginalExtension();
                      $picture = date('His').$filename;

                      //$img->save('uploads/posts/'.$featured_new_name,100);

                      $destinationPath = base_path() . '/public/uploads/gallery';
                      $file->move($destinationPath, $picture);

                      $gallery_insert = new Gallery;
                      $gallery_insert->post_id = $postid;
                      $gallery_insert->image_no = $i;
                      $gallery_insert->imageurl = '/uploads/gallery/'.$picture;
                      $gallery_insert->save();
                     
                }else{

                      $filename = $file->getClientOriginalName();
                      $extension = $file->getClientOriginalExtension();
                      $picture = date('His').$filename;
                      $destinationPath = base_path() . '/public/uploads/gallery';
                      $file->move($destinationPath, $picture);
                      $gallery->imageurl = '/uploads/gallery/'.$picture;
                      $gallery->save();
                      
                }

              }
              

          }
         

      }

    Session::flash('success', 'Gallery updated successfully.');
    return redirect()->back();
      
    }

    public function destroy($id)
    {
       $gallery = Gallery::find($id);

       $gallery->delete();

       Session::flash('success','The picture was just deleted.');
       return redirect()->back();
    }

}
