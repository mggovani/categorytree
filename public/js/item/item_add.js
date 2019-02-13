 $(document).ready(function () {
    $('#loader').hide();
    $('.GlobalForm')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                }
            })
            .on('success.form.fv', function (e) {
                e.preventDefault();
                 var url = $(".GlobalForm").attr("action"),
                        parts = url.split("/"),
                        last_part = parts[parts.length - 1];
                if (last_part == 'item_add')
                {
                    var form = $('.GlobalForm')[0];
                } else {
                    var form = $('.GlobalForm')[1];
                }
                var form1 = $(this);
                var formData = new FormData(form);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: form1.attr('action'),
                    type: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    encode: true,
                    dataType: 'json',
                    processData: false,
                    success: function (data) {
                        if (last_part == 'item_add'){
                            $("#divi_add").css("display", 'block');
                            $("#divi_add").addClass('alert alert-success');
                            $('#msg_add').text(data.message);
                            $("#msg_add").css("color", 'green');
                        } else {
                            $("#divi").css("display", 'block');
                            $("#divi").addClass('alert alert-success');
                            $('#msg').text(data.message);
                            $("#msg").css("color", 'green');
                        }
                        if (data.url != 0) {
                            setTimeout(function () {
                                window.location.href = data.url;
                                $('#loader').hide();
                            }, 1000);

                        } else {
                                $('button.disabled').removeAttr('disabled');
                                setTimeout(function () {
                                    form.find('#success').addClass('hidden');
                                }, 1000);
                            }
                    },
                    error: function (err) {
                        $('#loader').hide();
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        // $('#divi').text(err.responseJSON.message);
                        $.each(err.responseJSON.errors, function (i, error) {
                            if (last_part == 'item_add'){
                            var el = $(document).find('[name="'+i+'"]');
                        }else{
                            var el = $("#edit").find('[name="'+i+'"]');
                            }
                            el.after($('<span style="color: red;">'+error[0]+'</span>'));
                        });
                    }   
                }
      });
            });
            
});
