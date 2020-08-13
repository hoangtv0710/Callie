<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Post;
use View;

class ClientController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $subcategory = SubCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $post = Post::where('status', 1)->orderBy('id', 'desc')->get();
        View::share(['category' => $category, 'subcategory' => $subcategory, 'post' => $post]);
    }

    public function index()
    {
        return view('client.index');
    }

    function load_data(Request $request)
    {
        if($request->ajax()) {
            if($request->id > 0){
                if ($request->cate_id > 0){
                    $data = Post::where('id', '<', $request->id)->where('cate_id', $request->cate_id)->orderBy('views', 'DESC')->limit(10)->get();
                } elseif($request->subcate_id > 0) {
                    $data = Post::where('id', '<', $request->id)->where('subcate_id', $request->subcate_id)->orderBy('views', 'DESC')->limit(10)->get();
                }
            } else {
                if ($request->cate_id > 0) {
                    $data = Post::where('cate_id', $request->cate_id)->orderBy('views', 'DESC')->limit(10)->get();
                } elseif($request->subcate_id > 0) {
                    $data = Post::where('subcate_id', $request->subcate_id)->orderBy('views', 'DESC')->limit(10)->get();
                } 
            }

            $output = '';
            $last_id = '';

            if(!$data->isEmpty()) {
                foreach($data as $row) {
                    $output .= '
                    <div class="post post-row">
                        <a class="post-img" href="'. $row->slug .'.html"><img src="images/posts/'. $row->image .'" height="190"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="'.$row->subcategory->slug .'.html">'. $row->subcategory->name .'</a>
                            </div>
                            <h3 class="post-title"><a href="'. $row->slug .'.html">'. $row->title .'</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">'. $row->author .'</a></li>
                                <li>'. $row->created_at->diffForHumans() .'</li>
                            </ul>
                            <p>'. $row->description .'</p>
                        </div>
                    </div>
                    ';
                    $last_id = $row->id;
                }
            $output .= '
                <div id="load_more" class="section-row loadmore text-center">
                    <button type="button" name="load_more_button" class="primary-button" data-id="'.$last_id.'" id="load_more_button">
                        Xem thêm
                    </button>
                </div>
                ';
            } else {
            $output .= '
                <div id="load_more" class="section-row loadmore text-center">
                    <button type="button" name="load_more_button" class="primary-button">
                        Hết rồi 
                    </button>
                </div>
                ';
            }
            echo $output;
        }
    }

    public function getDetail($slug)
    {
        $p = Post::where('slug', $slug)->first();
        $cate = Category::where('slug', $slug)->first();
        $subcate = SubCategory::where('slug', $slug)->first();

        if ($p != "") {
            $previous = Post::where('id', '<', $p->id)->orderBy('id', 'desc')->first();
            $next = Post::where('id', '>', $p->id)->first();
            $related_post = Post::where('cate_id', $p->cate_id)->where('id', '<>', $p->id)->orderBy('id', 'desc')->limit(6)->get();
            return view('client.pages.post_detail', compact('p', 'previous', 'next', 'related_post'));
        } 
        elseif ($cate != "") {
            return view('client.pages.category', compact('cate'));
        }
        elseif ($subcate != "") {
            return view('client.pages.subcategory', compact('subcate'));
        }
        else {
            return back()->with('error', 'Đường dẫn không tồn tại!');
        }
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function search_post(Request $request)
    {
        $input = $request->keyword;
        $output = Post::where('title', 'LIKE', '%' . $input .'%')->limit(20)->get();
        return view('client.pages.search_post', compact('output', 'input'));
    }

}
