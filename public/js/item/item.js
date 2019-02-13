$(document).ready(function () {
   $("#divi").hide();
   $("#division").hide();
    if (jQuery().DataTable) {
        oTable = $('#data_table').DataTable({
          "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": "item_data",
            "columns": [
                {data: 'DT_RowIndex', orderable: false, searchable: false,render: function (data, type, full, meta) {
                        return '<a style= "text-decoration: underline; border-bottom: 1px solid;">'+data+'</a>';}},
                {data: 'item', name: 'item'},
                {data: 'subcategory', name: 'subcategory'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    }

   
   $('#data_table').on('click', '#edit_item', function () {
     var id = $(this).attr('data-id');
        $.ajax({
            url: './item_edit/'+ id ,
            type: "GET",
            dataType: "json",
            success: function (data) {
             $('#c_name').val(data.item);
             $('#d_category').val(data.subcategory_id).trigger("change");
                $(".GlobalForm").attr("action", "./item_update/" + id);
            }
        });

    });

   if (jQuery().select2) {
      $(".myselect").select2({
         placeholder: 'Select Subcategory',
      });
   }

    $('#data_table').on('click', '#delete_item', function () {
        var id = $(this).attr('data-id');
        var name = $(this).attr('item-name');
        $('#del_item').text('want to delete item '+name+'?');
       $('#btn_delete').unbind().click(function (e) {
          $.ajax({
                url: './item_delete/' + id,
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
