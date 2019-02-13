 $(window).load(function(){
    $('#loader').fadeOut("slow");
 });
$(document).ready(function () {
    $('#loader').hide();
    $('.GlobalFormValidation')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                }
            })
            .on('success.form.fv', function (e) {
                $('#loader').show();
                var form = $(this);
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                form.find('#success').addClass('hidden');
                form.find('#error').addClass('hidden');
                form.find('#please-wait').removeClass('hidden');

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: form.attr('action'),
                    data: form.serialize(),
                    processData: true,
                    success: function (json) {
                        form.find('#please-wait').addClass('hidden');
                        if (json.status == 'success') {
                            var success = form.find('#success');
                            success.find('.message').text(json.message);
                            success.removeClass('hidden');
                            if (json.url != 0) {

                                // var oTable = $('#data_table').DataTable();

                                setTimeout(function () {
                                    window.location.href = json.url;
                                    $('#loader').hide();
                                }, 2000);
                            } else {
                                $('button.disabled').removeAttr('disabled');
                                setTimeout(function () {
                                    form.find('#success').addClass('hidden');
                                }, 3000);
                            }
                        }
                        // oTable.draw();
                    },
                    error: function (err) {
                        $('#loader').hide();
//                        var error = form.find('#error');
//                        error.find('.message').text(err.responseJSON.errors.designation_name);
//                        error.removeClass('hidden');

//                        setTimeout(function () {
//                            form.find('input[type=submit]').prop('disabled', false).removeClass('disabled');
//                            form.find('#error').addClass('hidden');
//                        }, 3000);
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>'));
                        });


                    },
                    dataType: "json"
                });


            });
});