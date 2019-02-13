 $(window).load(function(){
    $('#loader').fadeOut("slow");
 });
$(document).ready(function () {
    $("#divi").hide();

    //datatable
    if (jQuery().DataTable) {
        oTable = $('#data_table').DataTable({
            oLanguage: {
        sProcessing: "<img src='assets/images/loader.gif'>"
    },
            "processing": true,
            "serverSide": true,
            "ajax": 'role_get',
            "columns": [
                {data: 'DT_RowIndex', orderable: false, searchable: false,render: function (data, type, full, meta) {
                        return '<a style= "text-decoration: underline; border-bottom: 1px solid;">'+data+'</a>';}},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    }

    //select 2
    if (jQuery().select2) {
        $('#level').select2({
            placeholder: "Select a level"
        });
        $('#scope').select2({
            placeholder: "Select a scope"
        });

        $('#role_scope').select2({
            placeholder: "Select a scope"
        });

        $('#role_level').select2({
            placeholder: "Select a level"
        });
    }

//Edit role
    $('#data_table').on('click', '#editrole', function (e) {
        var id = $(this).attr('data-id');

        $.ajax({
            url: 'role_edit/' + id,
            success: function (res) {

                $('#role_name').val(res.name);
                $('#role_title').val(res.title);
                $('#role_level').val(res.level).trigger("change");
                $('#role_scope').val(res.scope).trigger("change");

                $(".GlobalFormValidation").attr("action", "role_update/" + id);

            }
        });
    });

    // Delete role
    $('#data_table').on('click', '#deleterole', function () {

        var id = $(this).attr('data-id');
        var name = $(this).attr('role-name');
        $('#del_role').text('want to delete role '+name+'?');

        $('#btn_delete').unbind().click(function (e) {
            $('#loader').show();

            $.ajax({
                url: 'role_delete/' + id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#loader').hide();
                    if (data.status)
                    {
                        oTable.draw();
                        $('#delete').modal('hide');
                        $("#divi").css("display", 'block');
                        $("#divi").addClass('alert alert-danger');
                        $('#msg').text(data.message);
                        $("#msg").css("color", 'red');
                        $('#divi').delay(3000).fadeOut('slow');

//                    } else {
//                        oTable.draw();
//                        $('#delete').modal('hide');
//                        $("#divi").css("display", 'block');
//                        $("#divi").addClass('alert alert-danger');
//                        $('#msg').text(data.message);
//                        $("#msg").css("color", 'red');
//                        $('#divi').delay(3000).fadeOut('slow');

                    }



                }
            });
        });
    });

});


