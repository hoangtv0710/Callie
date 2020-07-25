<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use Response;
use File;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::select('*'))
            ->addColumn('action', 'admin.pages.share.action')
            ->addColumn('status', 'admin.pages.share.status')
            ->rawColumns(['action', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.pages.category.list');
    } 

    public function store(Request $request)
    {  
        $rules = array(
            'name' => 'required|max:255',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return Response::json(['errors' => $error->errors()->all()]);
        }
    
        $id = $request->category_id;

        $slug = str_slug($request->name);
        $details = ['name' => $request->name, 'slug' => $slug, 'status' => $request->status];
    
        Category::updateOrCreate(['id' => $id], $details);  
            
        return Response::json(['success' => 'Thêm thành công', 'id' => $id]);
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $category  = Category::where($where)->first();

        return Response::json($category);
    }

    public function destroy($id) 
    {
        $subcategory = SubCategory::where('cate_id',$id)->delete();
        $category = Category::where('id',$id)->delete();

        return Response::json(['success' => 'Xoá thành công']);
    }
}
