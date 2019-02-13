$(document).ready(function () {
   $("#divi").hide();
   $("#division").hide();
    if (jQuery().DataTable) {
        oTable = $('#data_table').DataTable({
          "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": "category_data",
            "columns": [
                {data: 'DT_RowIndex', orderable: false, searchable: false,render: function (data, type, full, meta) {
                        return '<a style= "text-decoration: underline; border-bottom: 1px solid;">'+data+'</a>';}},
                {data: 'category', name: 'category'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    }

   
   $('#data_table').on('click', '#edit_category', function () {
     var id = $(this).attr('data-id');
        $.ajax({
            url: './category_edit/'+ id ,
            type: "GET",
            dataType: "json",
            success: function (data) {
             $('#c_name').val(data.category);
                $(".GlobalForm").attr("action", "./category_update/" + id);
            }
        });

    });

    $('#data_table').on('click', '#delete_category', function () {
        var id = $(this).attr('data-id');
        var name = $(this).attr('category-name');
        $('#del_category').text('want to delete category '+name+'?');
       $('#btn_delete').unbind().click(function (e) {
          $.ajax({
                url: './category_delete/' + id,
                type: "GET",
                data:{"data":id},
                dataType: "json",
                success: function (data) {
                  $('#loader').hide();
                    if (data.status == 'false') {

                        $('#delete').modal('hide');
                        $("#division").css("display", 'block');
                        $("#division").addClass('alert alert-danger');
                        $('#all_msg').text(data.message);
                        $("#all_msg").css("color", 'red');
                        $('#division').delay(3000).fadeOut('slow');

                    } else {
                        oTable.draw();
                        $('#delete').modal('hide');
                        $("#division").css("display", 'block');
                        $("#division").addClass('alert alert-danger');
                        $('#all_msg').text(data.message);
                        $("#all_msg").css("color", 'red');
                        $('#division').delay(3000).fadeOut('slow');
                    }
                }
            });
        });
    });

    
});
