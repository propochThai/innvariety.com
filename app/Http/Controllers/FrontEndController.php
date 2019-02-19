<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Category;
use App\SubCategory;
use App\Banner;
use App\Post;
use App\Site;
use App\Gallery;
use Tagging_Tags;
use Illuminate\Http\Request;
use Conner\Tagging\Model\Tagged;
use Feeds;

class FrontEndController extends Controller
{
    function checkNumTake($format)
    {
            if($format ==2){
                return 10;
            }
            elseif($format ==3){
                return 10;
            }
            else{
                return 6;
            }
    }
    public function index()
    {
        $site = Site::find(1);

    	   $categories = Category::whereIn('id', array(1, 2, 3, 4, 5, 6, 7, 8 ,9,12,13))->get();

        //===========Get Hilight News ==============
         $posts_hilight = Post::whereIn('id',array($site->post5_id,$site->post4_id,$site->post3_id,$site->post2_id,$site->post1_id))->orderBy('id','desc')->get();





        //===========End Get Hilight News ==============
        /*
        $subcategory_hilight = SubCategory::find($site->subcategory1_id);
        $posts_hilight = Post::where('subcategory_id',$site->subcategory1_id)->orderBy('contentdate', 'desc')->take(5)->get();
        */


        $posts_hilight2 = Post::where('contentdate','>=', Carbon::now()->subWeek())->orderBy('visitor', 'desc')->take(4)->get();



        $subcategory_1 = SubCategory::find($site->subcategory2_id);

        $posts_1 = Post::where('subcategory_id',$site->subcategory2_id)->orderBy('contentdate', 'desc')->take($this->checkNumTake($site->format2_type))->get();

        $num_tag =0;
        $array_tag_1 = array();
        foreach($posts_1 as $post_1)
            foreach($post_1->tags as $tag) {
                $array_tag_1[$tag->name] = $tag;
                $num_tag++;
                if($num_tag >10){
                    break;
                }

            }

        $subcategory_2 = SubCategory::find($site->subcategory3_id);
        $posts_2 = Post::where('subcategory_id',$site->subcategory3_id)->orderBy('contentdate', 'desc')->take($this->checkNumTake($site->format3_type))->get();

        $num_tag =0;
        $array_tag_2 = array();
        try{
            foreach($posts_2 as $post_1)
                foreach($post_1->tags as $tag) {
                    try{
                        if(is_object($tag)){
                            $array_tag_2[$tag->name] = $tag;

                            $num_tag++;
                            if($num_tag >10){
                                break;
                            }
                        }
                    }
                    catch (ErrorException $e) {
                        continue;
                    }

                }
        }
        catch (Exception $e) {

        }
        


    $subcategory_3 = SubCategory::find($site->subcategory4_id);
   $posts_3 = Post::where('subcategory_id',$site->subcategory4_id)->orderBy('contentdate', 'desc')->take($this->checkNumTake($site->format4_type))->get();

        $num_tag =0;
        $array_tag_3 = array();
        foreach($posts_3 as $post_3)
            foreach($post_3->tags as $tag) {
                $array_tag_3[$tag->name] = $tag;
                $num_tag++;
                if($num_tag >10){
                    break;
                }

            }

    $subcategory_4 = SubCategory::find($site->subcategory5_id);
    $posts_4 = Post::where('subcategory_id',$site->subcategory5_id)->orderBy('contentdate', 'desc')->take($this->checkNumTake($site->format5_type))->get();

        $num_tag =0;
        $array_tag_4 = array();
        foreach($posts_4 as $post_4)
            foreach($post_4->tags as $tag) {
                $array_tag_4[$tag->name] = $tag;
                $num_tag++;
                if($num_tag >10){
                    break;
                }

            }

    $subcategory_5 = SubCategory::find($site->subcategory6_id);
    $posts_5 = Post::where('subcategory_id',$site->subcategory6_id)->orderBy('contentdate', 'desc')->take($this->checkNumTake($site->format6_type))->get();

        $num_tag =0;
        $array_tag_5 = array();
        foreach($posts_5 as $post_5)
            foreach($post_5->tags as $tag) {
                $array_tag_5[$tag->name] = $tag;
                $num_tag++;
                if($num_tag >10){
                    break;
                }

            }

    $subcategory_6 = SubCategory::find($site->subcategory7_id);
    $posts_6 = Post::where('subcategory_id',$site->subcategory7_id)->orderBy('contentdate', 'desc')->take($this->checkNumTake($site->format7_type))->get();

        $num_tag =0;
        $array_tag_6 = array();
        foreach($posts_6 as $post_6)
            foreach($post_6->tags as $tag) {
                $array_tag_6[$tag->name] = $tag;
                $num_tag++;
                if($num_tag >10){
                    break;
                }

            }




        $banners = Banner::all();
        $array_banner = array();
        $banner_count =0;
        foreach($banners as $banner){
            foreach($banner->areas as $area){
                    if(strpos($area->areaname,"Home")){

                            $array_banner[$area->areaname] =$area;

                    }

            }


        }



    $feed = Feeds::make('http://infoquest:74@manga35@www.innnews.co.th/rss-group/c/entertain.xml',true);
       $data = array(
      'title'     => $feed->get_title(),
      'items'     => $feed->get_items(),
    );
        $result_feed = array();
        $i_count=0;
      foreach ($data['items'] as $item)
       {
        $str_description = $item->data["child"][""]["description"][0]["data"];
        $arry_description= explode("<p>", $str_description);
        $image = str_replace("\\n","",str_replace("/>","class=\"img-responsive\" />",$arry_description[0]));

        $result_feed[$i_count]['title'] =$item->data["child"][""]["title"][0]["data"];
        $result_feed[$i_count]['link'] =$item->data["child"][""]["link"][0]["data"];
        $result_feed[$i_count]['image'] =$image;


        $i_count++;
        }

     $feed = Feeds::make('http://infoquest:74@manga35@www.innnews.co.th/rss-group/c/lifestyle.xml',true);

             $data = array(
      'title'     => $feed->get_title(),
      'items'     => $feed->get_items(),
    );
        $result_feed2 = array();
        $i_count=0;
      foreach ($data['items'] as $item)
       {
        $str_description = $item->data["child"][""]["description"][0]["data"];
        $arry_description= explode("<p>", $str_description);
        $image = str_replace("\\n","",str_replace("/>","class=\"img-responsive\" />",$arry_description[0]));

        $result_feed2[$i_count]['title'] =$item->data["child"][""]["title"][0]["data"];
        $result_feed2[$i_count]['link'] =$item->data["child"][""]["link"][0]["data"];
        $result_feed2[$i_count]['image'] =$image;


        $i_count++;
        }


        $feed = Feeds::make('http://linetoday:enil3a4c-joom8bety@www.innnews.co.th/rss-group/c/market.xml',true);

             $data = array(
      'title'     => $feed->get_title(),
      'items'     => $feed->get_items(),
    );
        $result_feed_information = array();
        $i_count=0;
      foreach ($data['items'] as $item)
       {
        $str_description = $item->data["child"][""]["description"][0]["data"];
        $arry_description= explode("<p>", $str_description);
        $image = str_replace("\\n","",str_replace("/>","class=\"img-responsive\" />",$arry_description[0]));

        $result_feed_information[$i_count]['title'] =$item->data["child"][""]["title"][0]["data"];
        $result_feed_information[$i_count]['link'] =$item->data["child"][""]["link"][0]["data"];
        $result_feed_information[$i_count]['image'] =$image;


        $i_count++;
        }

        $feed = Feeds::make('http://linetoday:enil3a4c-joom8bety@www.innnews.co.th/rss-group/c/technology.xml',true);

             $data = array(
      'title'     => $feed->get_title(),
      'items'     => $feed->get_items(),
    );
        $result_feed_it = array();
        $i_count=0;
      foreach ($data['items'] as $item)
       {
        $str_description = $item->data["child"][""]["description"][0]["data"];
        $arry_description= explode("<p>", $str_description);
        $image = str_replace("\\n","",str_replace("/>","class=\"img-responsive\" />",$arry_description[0]));

        $result_feed_it[$i_count]['title'] =$item->data["child"][""]["title"][0]["data"];
        $result_feed_it[$i_count]['link'] =$item->data["child"][""]["link"][0]["data"];
        $result_feed_it[$i_count]['image'] =$image;


        $i_count++;
        }

$feed = Feeds::make('http://linetoday:enil3a4c-joom8bety@www.innnews.co.th/rss-group/c/bestclip.xml
',true);

             $data = array(
      'title'     => $feed->get_title(),
      'items'     => $feed->get_items(),
    );
        $result_feed_best_clip = array();
        $i_count=0;
      foreach ($data['items'] as $item)
       {
        $str_description = $item->data["child"][""]["description"][0]["data"];
        $arry_description= explode("<p>", $str_description);
        $image = str_replace("\\n","",str_replace("/>","class=\"img-responsive\" />",$arry_description[0]));

        $result_feed_best_clip[$i_count]['title'] =$item->data["child"][""]["title"][0]["data"];
        $result_feed_best_clip[$i_count]['link'] =$item->data["child"][""]["link"][0]["data"];
        $result_feed_best_clip[$i_count]['image'] =$image;


        $i_count++;
        }

        $feed = Feeds::make('http://linetoday:enil3a4c-joom8bety@www.innnews.co.th/rss-group/c/goodstory.xml
',true);

             $data = array(
      'title'     => $feed->get_title(),
      'items'     => $feed->get_items(),
    );
        $result_feed_goodstory = array();
        $i_count=0;
      foreach ($data['items'] as $item)
       {
        $str_description = $item->data["child"][""]["description"][0]["data"];
        $arry_description= explode("<p>", $str_description);
        $image = str_replace("\\n","",str_replace("/>","class=\"img-responsive\" />",$arry_description[0]));

        $result_feed_goodstory[$i_count]['title'] =$item->data["child"][""]["title"][0]["data"];
        $result_feed_goodstory[$i_count]['link'] =$item->data["child"][""]["link"][0]["data"];
        $result_feed_goodstory[$i_count]['image'] =$image;


        $i_count++;
        }



        $pagenametruehit='Home';
        $image = "http://www.innvariety.com/uploads/home.jpg";
    	return view('index')
                ->with('result_feed',$result_feed)
                ->with('result_feed2',$result_feed2)
                ->with('result_feed_it',$result_feed_it)
                ->with('result_feed_goodstory',$result_feed_goodstory)
                ->with('result_feed_best_clip',$result_feed_best_clip)
                ->with('result_feed_information',$result_feed_information)
                ->with('data',$data)
                ->with('pagenametruehit',$pagenametruehit)
    			->with('title',$site->name)
                ->with('keyword',$site->keyword)
                ->with('description',$site->description)
                ->with('site',$site)
                ->with('posts_hilight',$posts_hilight)
                ->with('image',$image)
                ->with('subcategory_1',$subcategory_1)
                ->with('subcategory_2',$subcategory_2)
                ->with('subcategory_3',$subcategory_3)
                ->with('subcategory_4',$subcategory_4)
                ->with('subcategory_5',$subcategory_5)
                ->with('subcategory_6',$subcategory_6)
    			->with('categories',$categories)
                ->with('posts_1',$posts_1)
                ->with('array_banner',$array_banner)
                ->with('posts_2',$posts_2)
                ->with('posts_3',$posts_3)
                ->with('posts_4',$posts_4)
                ->with('posts_5',$posts_5)
                ->with('posts_6',$posts_6)
                ->with('pagename',"HOME")
                ->with('posts_hilight2',$posts_hilight2)
                ->with('array_tag_1',$array_tag_1)
                ->with('array_tag_2',$array_tag_2)
                ->with('array_tag_3',$array_tag_3)
                ->with('array_tag_4',$array_tag_4)
                ->with('array_tag_5',$array_tag_5)
                ->with('array_tag_6',$array_tag_6)
    			->with('subcategories', SubCategory::all());
    }
    public function tag($slug)
    {
        $site = Site::find(1);
        $categories = Category::whereIn('id', array(1, 2, 3, 4, 5, 6, 7, 8 ,9,12,13))->get();

        $tags = Tagged::where('tag_slug',$slug)->first();

        $all_post = POST::withAnyTag([$tags->tag_name])->orderBy('contentdate', 'desc')->paginate(10);

         $post_hit = POST::withAnyTag([$tags->tag_name])->where('contentdate','>=', Carbon::now()->subWeek())->orderBy('visitor', 'desc')->take(4)->get();


        $banners = Banner::all();
        $array_banner = array();
        $banner_count =0;
        foreach($banners as $banner){
            foreach($banner->areas as $area){
                    if(strpos($area->areaname,"List")){

                            $array_banner[$area->areaname] =$area;

                    }

            }


        }
        $pagenametruehit=$tags->tag_name;

        $image = "http://www.innvariety.com/uploads/home.jpg";
        return view('tags')->with('all_post',$all_post)
                            ->with('post_hit', $post_hit)
                            ->with('image', $image)
                            ->with('pagenametruehit',$pagenametruehit)
                            ->with('title', $tags->tag_name)
                            ->with('keyword',$tags->tag_name)
                            ->with('description',$tags->tag_name)
                            ->with('array_banner', $array_banner)
                            ->with('keyword', $tags->tag_name)
                            ->with('site',$site)
                            ->with('categories',$categories)
                            ->with('pagename',"LIST")
                            ->with('subcategories', SubCategory::all())
                            ->with('description', $tags->tag_name);



    }
    public function category($slug)
    {
        $site = Site::find(1);

         $categories = Category::whereIn('id', array(1, 2, 3, 4, 5, 6, 7, 8 ,9,12,13))->get();

        $subcategory_selected = SubCategory::where('slug', $slug)->first();
         $banners = Banner::all();
        $array_banner = array();
        $banner_count =0;
        foreach($banners as $banner){
            foreach($banner->areas as $area){
                    if(strpos($area->areaname,"List")){

                            $array_banner[$area->areaname] =$area;

                    }

            }


        }

        $image = "http://www.innvariety.com/uploads/home.jpg";
        if($subcategory_selected ==null){
             $error = "ขอโทษค่ะยังไม่มีข้อมุลใน หมวดนี้ ";
             $pagenametruehit=$error;
             return view('error')->compact(error)
                                ->with('categories',$categories)
                                ->with('array_banner',$array_banner)
                                ->with('pagenametruehit',$pagenametruehit)
                                ->with('site',$site)
                                ->with('image', $image)
                                ->with('subcategories', SubCategory::all())
                                ->with('title', "Data not found")
                                ->with('keyword', "Data not found")
                                ->with('description', "Data not found");

        }

        $post_hit = Post::where('subcategory_id',$subcategory_selected->id)->where('created_at','>=', Carbon::now()->subWeek())->orderBy('visitor', 'desc')->take(4)->get();



        $first_post = POST::where('subcategory_id',$subcategory_selected->id)->first();
        if($first_post ==null){
             $error = "ขอโทษค่ะยังไม่มีข้อมุลใน หมวดนี้ ";
             $pagename="error";
             $pagenametruehit=$error;
             return view('error')->with('error',$error)
                                ->with('categories',$categories)
                                ->with('site',$site)
                                ->with('pagenametruehit',$pagenametruehit)
                                ->with('pagename',$pagename)
                                ->with('subcategories', SubCategory::all())
                                ->with('title', "Data not found")
                                ->with('pagename',"HOME")
                                ->with('image', $image)
                                ->with('array_banner',$array_banner)
                                ->with('keyword', "Data not found")
                                ->with('description', "Data not found");

        }


        $all_post = POST::where('subcategory_id',$subcategory_selected->id)->orderBy('contentdate', 'desc')->paginate(10);


        $top_tags = Post::where('subcategory_id',$subcategory_selected->id)->orderBy('visitor', 'desc')->take(20)->get();
        $num_tag =0;
        $array_tag_1 = array();
        foreach($top_tags as $post_1)
            foreach($post_1->tags as $tag) {
                $array_tag_1[$tag->name] = $tag;
                $num_tag++;
                if($num_tag >20){
                    break;
                }

            }

        $pagenametruehit=$subcategory_selected->title;

        return view('lists')->with('all_post',$all_post)
                            ->with('title', $subcategory_selected->title)
                            ->with('keyword', $subcategory_selected->keyword)
                            ->with('description', $subcategory_selected->description)
                            ->with('array_tag_1',$array_tag_1)
                            ->with('site',$site)
                            ->with('pagenametruehit',$pagenametruehit)
                            ->with('css_name',$subcategory_selected->style->cssname)
                            ->with('categories',$categories)
                            ->with('subcategory_selected',$subcategory_selected)
                            ->with('post_hit',$post_hit)
                            ->with('array_banner',$array_banner)
                            ->with('pagename',"LIST")
                            ->with('image', $image)
                            ->with('subcategories', SubCategory::all())
                            ->with('first_post', $first_post);



    }
    public function lists()
    {
        $site = Site::find(1);
    	$categories = Category::whereIn('id', array(1, 2, 3, 4, 5, 6, 7, 8 ,9,12,13))->get();
        $image = "http://www.innvariety.com/uploads/home.jpg";
    	return view('lists')
    			->with('title','InnVariety:List')
    			->with('categories',$categories)
                ->with('site',$site)
                ->with('image', $image)
    			->with('subcategories', SubCategory::all());

    }

    public function view($id)
    {
        $site = Site::find(1);
         $categories = Category::whereIn('id', array(1, 2, 3, 4, 5, 6, 7, 8 ,9,12,13))->get();

        $post = POST::find($id);
        $relative_post = POST::where('subcategory_id',$post->subcategory_id)->orderBy('contentdate', 'desc')->take(4)->get();
        $banners = Banner::all();
        foreach($banners as $banner){
            foreach($banner->areas as $area){
                    if(strpos($area->areaname,"View")){

                            $array_banner[$area->areaname] =$area;

                    }

            }


        }

        $post->visitor = $post->visitor+1;
        $image = $post->featured;
        $post->save();

        $gallery = Gallery::where('post_id',$id)->get();
        $pagenametruehit=$post->title;

        return view('view')->with('title', $post->title)
                            ->with('css_name',$post->subcategory->style->cssname)
                            ->with('image', $image)
                            ->with('keyword', $post->keyword)
                            ->with('pagenametruehit',$pagenametruehit)
                            ->with('relative_post',$relative_post)
                            ->with('description', $post->description)
                            ->with('categories',$categories)
                            ->with('array_banner',$array_banner)
                            ->with('site',$site)
                            ->with('gallery',$gallery)
                            ->with('pagename',"VIEW")
                            ->with('subcategories', SubCategory::all())
                            ->with('post', $post);
    }


}
