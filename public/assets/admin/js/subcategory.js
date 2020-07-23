$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //show data in table
    $('#subcategory_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "admin/subcategory",
            type: 'GET',
        },
        columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'category', name: 'category.name' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false},
                ],
        order: [[0, 'desc']]
    });

    //after click button add
    $('#add').click(function () {
        $('#btn-save').html("Thêm");
        $('#subcategory_id').val('');
        $('#subcategoryForm').trigger("reset");
        $('#subcategoryCrudModal').html("Thêm mới danh mục con");
        $('#add-or-edit').modal('show');
    });
    
    //after click button edit
    $('body').on('click', '.edit', function () {
        $('#form_result').html('');
        var subcategory_id = $(this).data('id');
        $.get('admin/subcategory/' + subcategory_id +'/edit', function (data) {
        $('#subcategoryCrudModal').html("Sửa danh mục con");
            $('#add-or-edit').modal('show');
            $('#btn-save').html("Sửa");
            $('#subcategory_id').val(data.subcategory.id);
            $('#name').val(data.subcategory.name);
            let html = '';
            $.each(data.category,function(key,value){
                if(data.subcategory.cate_id == value['id']){
                    html += '<option value="'+value['id']+'" selected>';
                        html += value['name'];
                    html += '</option>';
                }else {
                    html += '<option value="'+value['id']+'">';
                        html += value['name'];
                    html += '</option>';
                }
            });
            $('#cate_id').html(html);
            if (data.subcategory.status == 1) {
                $(".show").prop("checked", true)
            } else {
                $(".hide").prop("checked", true)
            }
        })
    });

    //submit add or edit
    $('body').on('submit', '#subcategoryForm', function (e) {
        e.preventDefault();
        var actionType = $('#btn-save').val();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "admin/subcategory/store",
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
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#subcategoryForm')[0].reset();
                    $('#subcategory_datatable').DataTable().ajax.reload();
                    $('#form_result').html('');
                }
            } else {
                toastr.success('Sửa thành công', 'Thông báo', {timeOut: 2000});
                $('#subcategoryForm').trigger("reset");
                $('#add-or-edit').modal('hide');
                $('#btn-save').html('Save...');
                var oTable = $('#subcategory_datatable').dataTable();
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
        var subcategory_id = $(this).data("id");
        $('#deleteSubCategory').click(function(){
            $.ajax({
                type: "get",
                url: "admin/subcategory/delete/"+subcategory_id,
                beforeSend: function(){
                    $('.ajax-loader').show();
                },
                success : function(data){
                    toastr.success(data.success, 'Thông báo', {timeOut: 1000});
                    $('#delete').modal('hide');
                    var oTable = $('#subcategory_datatable').dataTable(); 
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

    
   

   