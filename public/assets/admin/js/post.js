$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //show data in table
    $('#post_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "admin/post",
            type: 'GET',
        },
        columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                    { data: 'title', name: 'title' },
                    { data: 'image', name: 'image' },
                    { data: 'category', name: 'category.name', orderable: false,},
                    { data: 'subcategory', name: 'subcategory.name', orderable: false,},
                    { data: 'author', name: 'author' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'views', name: 'views' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false},
                ],
        order: [[0, 'desc']]
    });

    //after click button add
    $('#add').click(function () {
        $('#btn-save').html("Thêm");
        $('#form_result').html('');
        $('#postCrudModal').html("Thêm mới bài viết");
        $('#post_id').val('');
        $('#postForm')[0].reset();
        CKEDITOR.instances['content_post'].setData('');
        $('#add-or-edit').modal('show');
        $('#cate_id').find('option[value=""]').remove();
        $("#cate_id").prepend("<option value='' selected='selected'>-- Chọn --</option>");
        $('#subcate_id').prop('disabled', 'disabled');
        $('#modal-preview').attr('src', '/images/400x250.png');
    });

    $('#cate_id').change(function(){
        $('#subcate_id').removeAttr("disabled");
        let cate_id = $(this).val();
        $.ajax({
            url : 'admin/post/getSubcategory',
            data : {
                cate_id : cate_id,
            },
            type : 'get',
            dataType : 'json',
            beforeSend: function(){
                $('.ajax-loader').show();
            },
            success : function(data){
                let html = '';
                $.each(data,function($key,$value){
                    html += '<option value='+$value['id']+'>';
                        html += $value['name'];
                    html += '</option>';
                });
                $('#subcate_id').html(html);
            },
            complete: function(){
                $('.ajax-loader').hide();
            }
        });
    });
    
    //after click button edit
    $('body').on('click', '.edit', function () {
        $('#subcate_id').removeAttr("disabled");
        $('#form_result').html('');
        var post_id = $(this).data('id');
        $.get('admin/post/' + post_id +'/edit', function (data) {
        $('#postCrudModal').html("Sửa bài viết");
            $('#add-or-edit').modal('show');
            $('#btn-save').html("Sửa");

            $('#post_id').val(data.post.id);
            $('#title').val(data.post.title);
            $('#description').val(data.post.description);
            CKEDITOR.instances['content_post'].setData(data.post.content);
            $('#author').val(data.post.author);

            $('#modal-preview').attr('alt', 'No image available');
            if(data.post.image){
                $('#modal-preview').attr('src', '/images/posts/' + data.post.image);
                $('#hidden_image').val(data.post.image);
            }

            let html = '';
            $.each(data.category,function(key,value){
                if(data.post.cate_id == value['id']){
                    html += '<option value="'+value['id']+'" selected>';
                        html += value['name'];
                    html += '</option>';
                } else {
                    html += '<option value="'+value['id']+'">';
                        html += value['name'];
                    html += '</option>';
                }
            });
            $('#cate_id').html(html);

            let getCategoryId = $("#cate_id option:selected").val();
            let html1 = '';
            $.each(data.subcategory,function(key,value){
                if(data.post.subcate_id == value['id']){
                    html1 += '<option value="'+value['id']+'" selected>';
                        html1 += value['name'];
                    html1 += '</option>';
                } else if (value['cate_id'] == getCategoryId) {
                    html1 += '<option value="'+value['id']+'">';
                        html1 += value['name'];
                    html1 += '</option>';
                }
            });
            $('#subcate_id').html(html1);

            if (data.post.status == 1) {
                $(".show").prop("checked", true)
            } else {
                $(".hide").prop("checked", true)
            }
        })
    });

    //submit add or edit
    $('body').on('submit', '#postForm', function (e) {
        e.preventDefault();
        var actionType = $('#btn-save').val();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "admin/post/store",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
            $('.ajax-loader').show();
        },
            success: (data) => {
            var html = '';
            if(data.id == null) {
                if(data.errors) {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<span>' + data.errors[count] + '</span>' + '<br>';
                    }
                    html += '</div>';
                    $('#form_result').html(html);
                }
                if(data.success) {
                    toastr.success(data.success, 'Thông báo', {timeOut: 2000});
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#postForm')[0].reset();
                    CKEDITOR.instances['content_post'].setData('');
                    $('#modal-preview').attr('src', '/images/400x250.png');
                    $('#post_datatable').DataTable().ajax.reload();
                    $('#form_result').html('');
                }
            } else {
                toastr.success('Sửa thành công', 'Thông báo', {timeOut: 2000});
                $('#postForm').trigger("reset");
                $('#add-or-edit').modal('hide');
                $('#btn-save').html('Save...');
                $('#modal-preview').attr('src', '/images/400x250.png');
                var oTable = $('#post_datatable').dataTable();
                oTable.fnDraw(false);
            }
            },
            complete: function(){
                $('.ajax-loader').hide();
            }
        });
    });

    //delete
    var post_id;
    $('body').on('click', '.delete', function () {
        post_id = $(this).data("id");
    });

    $('#deletePost').click(function(){
        $.ajax({
            url: "admin/post/delete/"+post_id,
            beforeSend: function(){
                $('.ajax-loader').show();
            },
            success : function(data){
                toastr.success(data.success, 'Thông báo', {timeOut: 1000});
                $('#delete').modal('hide');
                $('#post_datatable').DataTable().ajax.reload();
            },
            error: function (data) {
                toastr.error(data, 'Lỗi', {timeOut: 1000});
            },
            complete: function(){
                $('.ajax-loader').hide();
            }
        });
    });

    //end document ready
});

    
   

   