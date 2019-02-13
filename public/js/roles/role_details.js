 $(window).load(function(){
    $('#loader').fadeOut("slow");
 });
$(document).ready(function () {

    $("#employee_roles").on("change", '#employee', function (event) {
        $('#loader').show();

        if ($(this).is(":checked")) {
            var rid = $(this).attr('data-role-id');
            var pid = $(this).attr('data-permission-id');
            var data = $(this).val();
            $.ajax({
                type: "GET",
                url: 'role_permission/' + pid,
                data: {data: data},
                success: function (data) {
                    $('#loader').hide();
                    if (data.status == 'false') {

                        $("#divi").css("display", 'block');
                        $("#divi").addClass('alert alert-danger');
                        $('#msg').text(data.message);
                        $("#msg").css("color", 'red');
                        $('#divi').delay(3000).fadeOut('slow');

                    } else {

                        $("#divi").css("display", 'block');
                        $("#divi").addClass('alert alert-success');
                        $('#msg').text(data.message);
                        $("#msg").css("color", 'green');
                        $('#divi').delay(3000).fadeOut('slow');
                    }
                }
            });
        } else {
            
            var rid = $(this).attr('data-role-id');
            var pid = $(this).attr('data-permission-id');
            var data = $(this).val();
            
            $.ajax({
                type: "GET",
                url: 'role_permission_revoke/' + pid,
                data: {data: data},
                success: function (data) {
                    $('#loader').hide();
                    if (data.status == 'false') {

                        $("#divi").css("display", 'block');
                        $("#divi").addClass('alert alert-danger');
                        $('#msg').text(data.message);
                        $("#msg").css("color", 'red');
                        $('#divi').delay(3000).fadeOut('slow');

                    } else {

                        $("#divi").css("display", 'block');
                        $("#divi").addClass('alert alert-success');
                        $('#msg').text(data.message);
                        $("#msg").css("color", 'green');
                        $('#divi').delay(3000).fadeOut('slow');
                    }
                }
            });
        }

    });

});
