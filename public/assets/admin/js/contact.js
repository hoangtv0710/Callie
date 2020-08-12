$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //show data in table
    $('#contact_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "admin/contact",
            type: 'GET',
        },
        columns: [
                    { data: 'id', name: 'id', 'visible': false},
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'subject', name: 'subject' },
                    { data: 'content', name: 'content' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'status', name: 'status', orderable: false},
                    { data: 'action', name: 'action', orderable: false},
                ],
        order: [[7, 'desc']]
    });

    //after click button edit
    $('body').on('click', '.edit', function () {
        $('#form_result').html('');
        var contact_id = $(this).data('id');
        $.get('admin/contact/' + contact_id + '/reply', function (data) {
        $('#ContactModal').html("Trả lời liên hệ");
            $('#reply').modal('show');
            $('#btn-save').html("Phản hồi");
            $('#contact_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#show_email').html(data.email);
        })
    });

    //submit add or edit
    $('body').on('submit', '#contactForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "admin/contact/post_reply",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $('.ajax-loader').show();
                $('#btn-save').html('Sending...');
            },
            success: (data) => {
                if(data.errors) {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<span>' + data.errors[count] + '</span>';
                    }
                    html += '</div>';
                    $('#form_result').html(html);
                } else {
                    toastr.success('Trả lời thành công', 'Thông báo', {timeOut: 2000});
                    $('#contactForm')[0].reset();
                    CKEDITOR.instances['content_reply'].setData('');
                    $('#form_result').html('');
                    $('#reply').modal('hide');
                    var oTable = $('#contact_datatable').dataTable();
                    oTable.fnDraw(false);
                }
            },
            complete: function(){
                $('.ajax-loader').hide();
            }
        });
    });

    //delete
    var contact;
    $('body').on('click', '.delete', function () {
        contact_id = $(this).data("id");
    });

    $('#deletePost').click(function(){
        $.ajax({
            url: "admin/contact/delete/"+contact_id,
            beforeSend: function(){
                $('.ajax-loader').show();
            },
            success : function(data){
                toastr.success(data.success, 'Thông báo', {timeOut: 1000});
                $('#delete').modal('hide');
                $('#contact_datatable').DataTable().ajax.reload();
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

    
   

   