@extends('admin.layouts.master')

@section('title')
	Quản trị danh mục
@endsection

@section('description')
	Danh mục
@endsection

@section('content')
<div class="card shadow mb-4">

  <div class="card-header py-3">
    <a href="javascript:void(0)" class="btn btn-info ml-3" id="add">Thêm mới</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="category_datatable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
            <th width="20%">Chức năng</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
 
<div class="modal fade" id="add-or-edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="categoryCrudModal"></h4>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form id="categoryForm" name="categoryForm" class="form-horizontal" enctype="multipart/form-data">

          <input type="hidden" name="category_id" id="category_id">
          <div class="form-group">
            <label for="name" class="col-sm-12 control-label">Tên danh mục</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
              <span class="error" style="color: red;font-size: 1rem;"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12 control-label">Trạng thái</label>
            <div class="col-sm-12">
              <input type="radio" name="status" id="status" value="1" class="show" checked> Hiển thị &ensp;
              <input type="radio" name="status" id="status" value="0" class="hide"> Không hiên thị
              <span class="error" style="color: red;font-size: 1rem;"></span>
            </div>
          </div>
 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" id="btn-save">
            </button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
          </div>
 
        </form>
      </div>
      <div class="modal-footer">
         
      </div>
    </div>
  </div>
  
</div> 

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn xóa danh mục này không?</h5>
          </div>
          <div class="modal-body" style="margin-left: 183px;">
              <button type="button" class="btn btn-success" id="deleteCategory">Có</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          </div>
      </div>
  </div>
</div>

@endsection

@section('script')
  <script src="assets/admin/js/category.js"></script>
@endsection