@extends('admin.layouts.master')

@section('title')
	Quản trị bài viết
@endsection

@section('description')
	Bài viết
@endsection

@section('content')
<div class="card shadow mb-4">

  <div class="card-header py-3">
    <a href="javascript:void(0)" class="btn btn-info ml-3" id="add">Thêm mới</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="post_datatable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th width="3%">STT</th>
            <th width="20%">Tiêu đề</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
            <th>Danh mục con</th>
            <th>Tác giả</th>
            <th>Ngày tạo</th>
            <th width="5%">Lượt xem</th>
            <th width="5%">Trạng thái</th>
            <th width="8%">Chức năng</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
 
<div class="modal fade" id="add-or-edit" aria-hidden="true">
  <div class="modal-dialog" style="max-width:980px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="postCrudModal"></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form id="postForm" name="postForm" class="form-horizontal" enctype="multipart/form-data">

          <input type="hidden" name="post_id" id="post_id">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name" class="col-sm-12 control-label">Tiêu đề</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề bài viết">
                <span class="error" style="color: red;font-size: 1rem;"></span>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="name" class="col-sm-12 control-label">Tác giả</label>
              <div class="col-sm-12">
                  <input type="text" name="author" id="author" class="form-control">
                <span class="error" style="color: red;font-size: 1rem;"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="name" class="col-sm-12 control-label">Mô tả</label>
            <div class="col-sm-12">
              <textarea name="description" id="description" rows="3" class="form-control"></textarea>
              <span class="error" style="color: red;font-size: 1rem;"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="name" class="col-sm-12 control-label">Nội dung</label>
            <div class="col-sm-12">
              <textarea name="content" id="content_post" rows="5" class="form-control"></textarea>
              <span class="error" style="color: red;font-size: 1rem;"></span>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="name" class="col-sm-12 control-label">Thuộc danh mục</label>
              <div class="col-sm-12">
                <select name="cate_id" id="cate_id" class="form-control">
                    @foreach ($category as $itemc)
                      <option value="{{ $itemc->id }}">{{ $itemc->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="name" class="col-sm-12 control-label">Thuộc danh mục con</label>
              <div class="col-sm-12">
                <select name="subcate_id" id="subcate_id" class="form-control">
                    @foreach ($subcategory as $itemsc)
                      <option value="{{ $itemsc->id }}">{{ $itemsc->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label class="col-sm-12 control-label">Ảnh bài viết</label>
              <div class="col-sm-12">
                <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                <input type="hidden" name="hidden_image" id="hidden_image">
              </div>
              <img id="modal-preview" src="images/400x250.png" alt="Preview" class="form-group hidden m-3" width="400" height="250">
            </div>
 
            <div class="form-group col-md-6">
              <label for="name" class="col-sm-12 control-label">Trạng thái</label>
              <div class="col-sm-12">
                <input type="radio" name="status" id="status" value="1" class="show" checked> Hiển thị &ensp;
                <input type="radio" name="status" id="status" value="0" class="hide"> Không hiển thị
                <span class="error" style="color: red;font-size: 1rem;"></span>
              </div>
              <div class="m-5 float-right">
                <button type="submit" class="btn btn-primary" id="btn-save">
                </button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
              </div>
            </div>
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
              <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn xóa bài viết này không?</h5>
          </div>
          <div class="modal-body" style="margin-left: 183px;">
              <button type="button" class="btn btn-success" id="deletePost">Có</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          </div>
      </div>
  </div>
</div>

@endsection

@section('script')
  <script src="assets/admin/js/post.js"></script>
  <script>
    function readURL(input, id) {
        id = id || '#modal-preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
       
            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };
       
            reader.readAsDataURL(input.files[0]);
        }
    }
    CKEDITOR.replace('content_post');
  </script>
@endsection