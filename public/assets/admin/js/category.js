$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //show data in table
    $('#category_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "admin/category",
            type: 'GET',
        },
        columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false},
                ],
        order: [[0, 'desc']]
    });

    //after click button add
    $('#add').click(function () {
        $('#btn-save').html("Thêm");
        $('#category_id').val('');
        $('#categoryForm').trigger("reset");
        $('#categoryCrudModal').html("Thêm mới danh mục");
        $('#add-or-edit').modal('show');
    });
    
    //after click button edit
    $('body').on('click', '.edit', function () {
        var category_id = $(this).data('id');
        $('#form_result').html('');
        $.get('admin/category/' + category_id +'/edit', function (data) {
        $('#categoryCrudModal').html("Sửa danh mục");
            $('#add-or-edit').modal('show');
            $('#btn-save').html("Sửa");
            $('#category_id').val(data.id);
            $('#name').val(data.name);
            if (data.status == 1) {
            $(".show").prop("checked", true)
        } else {
            $(".hide").prop("checked", true)
        }
        })
    });

    //submit add or edit
    $('body').on('submit', '#categoryForm', function (e) {
        e.preventDefault();
        var actionType = $('#btn-save').val();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "admin/category/store",
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
                        html += '<span>' + data.errors[count] + '</span>';
                    }
                    html += '</div>';
                    $('#form_result').html(html);
                }
                if(data.success) {
                    toastr.success(data.success, 'Thông báo', {timeOut: 2000});
                    $('#categoryForm')[0].reset();
                    $('#category_datatable').DataTable().ajax.reload();
                    $('#form_result').html('');
                }
            } else {
                toastr.success('Sửa thành công', 'Thông báo', {timeOut: 2000});
                $('#categoryForm').trigger("reset");
                $('#add-or-edit').modal('hide');
                $('#btn-save').html('Save...');
                var oTable = $('#category_datatable').dataTable();
                oTable.fnDraw(false);
            }
            },
            complete: function(){
            $('.ajax-loader').hide();
        }
        });
    });

    //delete
    $('body').on('click', '.delete', function () {
        var category_id = $(this).data("id");
        $('#deleteCategory').click(function(){
            $.ajax({
                type: "get",
                url: "admin/category/delete/"+category_id,
                beforeSend: function(){
                    $('.ajax-loader').show();
                },
                success : function(data){
                    toastr.success(data.success, 'Thông báo', {timeOut: 1000});
                    $('#delete').modal('hide');
                    var oTable = $('#category_datatable').dataTable(); 
                    oTable.fnDraw(false);
                },
                error: function (data) {
                    toastr.error(data, 'Lỗi', {timeOut: 2000});
                },
                complete: function(){
                    $('.ajax-loader').hide();
                }
            });
        });
    });

    //end document ready
});

    
   

   