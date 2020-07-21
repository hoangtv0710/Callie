<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use Response;
use File;
use Validator;

class SubCategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(SubCategory::select('*'))
            ->addColumn('category', function (SubCategory $sc) {
                return $sc->category->name;
            })
            ->addColumn('action', 'admin.pages.share.action')
            ->addColumn('status', 'admin.pages.share.status')
            ->rawColumns(['action', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
        $category = Category::get();
        return view('admin.pages.subcategory.list', compact('category'));
    } 

    public function store(Request $request)
    {  
        $rules = array(
            'name' => 'required',
            'cate_id' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return Response::json(['errors' => $error->errors()->all()]);
        }
    
        $id = $request->category_id;
    
        $details = ['name' => $request->name, 'cate_id' => $request->cate_id, 'status' => $request->status];
    
        SubCategory::updateOrCreate(['id' => $id], $details);  
            
        return Response::json(['success' => 'Thêm thành công', 'id' => $id]);
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $category = Category::get();
        $subcategory  = SubCategory::where($where)->first();
        return Response::json(['category' => $category, 'subcategory' => $subcategory]);
    }

    public function destroy($id) 
    {
        $subcategory = SubCategory::where('id',$id)->delete();
        return Response::json(['success' => 'Xoá thành công']);
    }
}
