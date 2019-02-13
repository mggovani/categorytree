$(document).ready(function () {
    $('.page-loader-wrapper').hide();
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
               $('.page-loader-wrapper').show();
                e.preventDefault();
                var form = $('.GlobalForm')[0];
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
                        $("#divi").css("display", 'block');
                        $("#divi").addClass('alert alert-success');
                        $('#msg').text(data.message);
                        $("#msg").css("color", 'white');
                        if (data.url != 0) {
                            setTimeout(function () {
                                window.location.href = data.url;
                                $('.page-loader-wrapper').hide();
                            }, 1000);

                        } else {
                                $('button.disabled').removeAttr('disabled');
                                setTimeout(function () {
                                    form.find('#success').addClass('hidden');
                                }, 1000);
                            }
                    },
                    error: function (err) {
                        $('.page-loader-wrapper').hide();
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        // $('#divi').text(err.responseJSON.message);
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>'));
                        });
                    }   
                }
                    
      });
            });
            
});
