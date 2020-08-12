@extends('admin.layouts.master')

@section('title')
	Quản trị bài viết
@endsection

@section('description')
	Liên hệ
@endsection

@section('content')
<div class="card shadow mb-4">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="contact_datatable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th width="3%">STT</th>
            <th width="20%">Tên người gửi</th>
            <th>Email</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th width="10%">Trạng thái</th>
            <th width="15%">Chức năng</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
 
<div class="modal fade" id="reply" aria-hidden="true">
  <div class="modal-dialog" style="max-width:980px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ContactModal"></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form id="contactForm" name="contactForm" class="form-horizontal">
          <input type="hidden" name="contact_id" id="contact_id">
          <input type="hidden" name="name" id="name">
          <input type="hidden" name="email" id="email">
          <p class="col-md-12">Email người nhận: <span id="show_email"></span></p>
          <div class="row">
              <div class="form-group col-md-12">
                <label for="name" class="col-sm-12 control-label">Nội dung trả lời</label>
                <div class="col-sm-12">
                <textarea name="content" id="content_reply" rows="5" class="form-control"></textarea>
                <span class="error" style="color: red;font-size: 1rem;"></span>
                </div>
            </div>

            <div class="form-group col-md-12">
              <div class="float-right">
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
              <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn xóa liên hệ này không?</h5>
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
  <script src="assets/admin/js/contact.js"></script>
  <script>
    CKEDITOR.replace('content_reply');
  </script>
@endsection