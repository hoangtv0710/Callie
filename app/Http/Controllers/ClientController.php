<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Post;

class ClientController extends Controller
{
    public function index()
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $subcategory = SubCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $post = Post::where('status', 1)->orderBy('id', 'desc')->get();
        return view('client.index', compact('category', 'subcategory', 'post'));
    }

    function load_data(Request $request)
    {
        if($request->ajax()) {
            if($request->id > 0){
                $data = Post::where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(5)->get();
            } else {
                $data = Post::orderBy('id', 'DESC')->limit(5)->get();
            }

            $output = '';
            $last_id = '';

            if(!$data->isEmpty()) {
                foreach($data as $row) {
                    $output .= '
                    <div class="post post-row">
                        <a class="post-img" href="blog-post.html"><img src="images/posts/'. $row->image .'" height="190"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">'. $row->subcategory->name .'</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">'. $row->title .'</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">'. $row->author .'</a></li>
                                <li>'. \Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i') .'</li>
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

}
