<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\SubCategory;
use Response;
use File;
use Carbon\Carbon;
use Validator;

class PostController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Post::select('*'))
            ->addColumn('action', 'admin.pages.share.action')
            ->addColumn('image', 'admin.pages.post.image')
            ->addColumn('category', function (Post $p) {
                return $p->category->name;
            })
            ->addColumn('subcategory', function (Post $p) {
                return $p->subcategory->name;
            })
            ->addColumn('created_at', 'admin.pages.post.created_at')
            ->addColumn('status', 'admin.pages.share.status')
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
        $category = Category::get();
        $subcategory = SubCategory::get();
        return view('admin.pages.post.list', compact('category', 'subcategory'));
    } 

    public function store(Request $request)
    {  
        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
        $rules = array(
            'title' =>  'required|max:255',
            'description' =>  'required',
            'content' =>  'required',
            'cate_id' =>  'required',
            'author' =>  'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(['errors' => $error->errors()->all()]);
        }
    
        $postId = $request->post_id;
        
        $slug = str_slug($request->title);
        $details = ['title' => $request->title, 
                    'slug' => $slug,
                    'description' => $request->description, 
                    'content' => $request->content, 
                    'cate_id' => $request->cate_id, 
                    'subcate_id' => $request->subcate_id, 
                    'author' => $request->author,
                    'status' => $request->status
                ];
    
        if ($files = $request->file('image')) {
            //delete old file
            \File::delete('images/posts/'.$request->hidden_image);
            //insert new file
            $destinationPath = 'images/posts/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $details['image'] = "$profileImage";
            $details['created_at'] = $datetime;
        }
        
        Post::updateOrCreate(['id' => $postId], $details);  
            
        return Response::json(['success' => 'Thêm thành công', 'id' => $postId]);
    }

    public function getSubcategory(Request $request)
    {
        $subcategory = SubCategory::where('cate_id',$request->cate_id)->get();

        return Response::json($subcategory);

    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $post  = Post::where($where)->first();
        $category = Category::get();
        $subcategory = SubCategory::get();

        return Response::json(['post' => $post, 'category' => $category, 'subcategory' => $subcategory]);
    }

    public function destroy($id) 
    {
        $data = Post::where('id',$id)->first(['image']);
        \File::delete('images/posts/'.$data->image);
        $post = Post::where('id',$id)->delete();

        return Response::json(['success' => 'Xoá thành công']);
    }
}
