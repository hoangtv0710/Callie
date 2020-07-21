<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Response;
use File;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::select('*'))
            ->addColumn('action', 'admin.pages.category.action')
            ->addColumn('status', 'admin.pages.category.status')
            ->rawColumns(['action', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.pages.category.list');
    } 

    public function store(Request $request)
    {  
        $rules = array(
            'name' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return Response::json(['errors' => $error->errors()->all()]);
        }
    
        $id = $request->category_id;
    
        $details = ['name' => $request->name, 'status' => $request->status];
    
        Category::updateOrCreate(['id' => $id], $details);  
            
        return Response::json(['success' => 'Thao tác thành công', 'id' => $id]);
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $category  = Category::where($where)->first();
    
        return Response::json($category);
    }

    public function destroy($id) 
    {
        $category = Category::where('id',$id)->delete();
        return Response::json($category);
    }
}
