<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Banner;
use App\Area;
class BannersController extends Controller
{
     public function __construct()
    {
        $this->page_name_active = 'banners';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

   
        return view('admin.banners.index')
                ->with('banners',Banner::all())
                ->with('title','List Banner')
                ->with('page_name_active',$this->page_name_active);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = Banner::all();
        $num_selected_banner =0;
        $array_banner = array();
        foreach($banners as $banner){
            foreach($banner->areas as $area) {
                
                $array_banner[$num_selected_banner] = $area->id;
                $num_selected_banner++;
                
               
            }
        }

        return view('admin.banners.create')
                ->with('areas',Area::all())
                ->with('array_banner',$array_banner)
                ->with('title','Create a Banner')
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
            'name' => 'required|unique:banners',
            'width' => 'required|integer',
            'hight' => 'required|integer',
            'areas' => 'required',
            'linkimage' => 'required|image',
            'linkurl' =>'required|url',
            'contact_email' =>'required|email',
            'expire_date' =>'required',
        ]);

        

        $linkimage = $request->linkimage;

        $linkimage_new_name = time().$linkimage->getClientOriginalName();

        $linkimage->move('uploads/banners', $linkimage_new_name);


        $banner = new Banner;
        
        $banner->name  = $request->name;
        $banner->width = $request->width;
        $banner->hight = $request->hight;
        $banner->is_show = $request->is_show;
        $banner->linkurl = $request->linkurl;
        $banner->contact_email = $request->contact_email;
        $banner->expire_date = $request->expire_date;
        $banner->linkimage = '/uploads/banners/'.$linkimage_new_name;
        $banner->save();

        $banner->areas()->attach($request->areas);
        
        Session::flash('success', 'You successfully created a banner.');
        
        return redirect()->route('banners');
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
        $banner_selected = Banner::find($id);
        //dd($banner_selected->areas);

        $banners = Banner::all();
        $num_selected_banner =0;
        $array_banner_disable = array();
        $array_banner_selected = array();
        foreach($banners as $banner){
            foreach($banner->areas as $area) {
                $found=false;
                foreach($banner->areas as $area_selected){
                    foreach($banner_selected->areas as $selected)
                    {
                        if($selected->id == $area->id){
                            $found =true;
                            array_push($array_banner_selected,$area->id);
                         }

                    }
                    
                }
                if($found == false){
                        array_push($array_banner_disable,$area->id);
                }

            }
            
        }

        return view('admin.banners.edit')
               ->with('banner',$banner_selected)
               ->with('areas',Area::all())
               ->with('array_banner_disable',$array_banner_disable)
               ->with('array_banner_selected',$array_banner_selected)
               ->with('title','Edit a Banner')
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
            'name' => 'required',
            'width' => 'required|integer',
            'hight' => 'required|integer',
            'areas' => 'required',
            'linkurl' =>'required|url',
            'contact_email' =>'required|email',
            'expire_date' =>'required',
        ]);
        $banner = Banner::find($id);

        if($request->hasFile('linkimage'))
        {
            $linkimage = $request->linkimage;

            $linkimage_new_name = time() . $linkimage->getClientOriginalName();

            $linkimage->move('uploads/avatar', $linkimage_new_name);

            $banner->linkimage = '/uploads/avatar/'.$linkimage_new_name;
            
        }

        $banner->name  = $request->name;
        $banner->width = $request->width;
        $banner->hight = $request->hight;
        $banner->is_show = $request->is_show;
        $banner->linkurl = $request->linkurl;
        $banner->contact_email = $request->contact_email;
        $banner->expire_date = $request->expire_date;
        $banner->save();

        $banner->areas()->sync($request->areas);
        
       

        Session::flash('success', 'Banner updated successfully.');

        return redirect()->route('banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        Session::flash('success', 'You successfully deleted a banner.');
        return redirect()->route('banners');
    }
}
