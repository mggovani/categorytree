 $(window).load(function(){
    $('#loader').fadeOut("slow");
 });
$(document).ready(function () {
   $("#divi").hide();
   $("#div_upload").hide();
   $('#division').hide();
   if (jQuery().DataTable) {
      oTable = $('#data_table').DataTable({
        oLanguage: {
        sProcessing: "<img src='assets/images/loader.gif'>"
    },
        "scrollX": true,
         "processing": true,
         "serverSide": true,
         "ajax": "user_data",
         "columns": [
            {data: 'DT_RowIndex', orderable: false, searchable: false,render: function (data, type, full, meta) {
                        return '<a style= "text-decoration: underline; border-bottom: 1px solid;">'+data+'</a>';}
                      },
            {data: 'profile_pic', name: 'profile_pic',
              render: function (data, type, full, meta) {
                      if(data == ''){return '<a href="#imagemodal" id="pop" data-target="#imagemodal" image-name="user.png" data-toggle="modal"><img id="imageresource_'+full.id+'" src="./profile_pic/user.png"  height="50" width="50"/></a>';}
                        else{
                        return '<a href="#imagemodal" id="pop" data-target="#imagemodal" image-name="'+data+'"  data-toggle="modal">'+"<img id='imageresource_"+full.id+"' src=" + data + " height=\"50\" width=\"50\"/>"+'</a>';}
                      
                     }},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'type_login', name: 'type_login'},
            {
               data: 'status', name: 'status',
               searchable: true,
               render: function (data, type, full, meta) {
                  if (full.status == 0)
                  {
                     return '<input type="checkbox" name="'+full.name+'" data-id="' + full.id + '" id="toggle" data-toggle="switch">';
                  } else
                  {
                     return '<input type="checkbox" name="'+full.name+'" data-id="' + full.id + '" id="toggle" data-toggle="switch" checked="">';
                  }
               }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false}
         ]
      });
   }



   $("#data_table").on("click","#pop",function(){
   var data =  $(this).attr('image-name');  
   $('#imagepreview').attr('src',data);
});

   $('#data_table').on('click', '#delete_user', function () {
      var id = $(this).attr('data-id');
      var name = $(this).attr('user-name');
      $('#del_user').text('want to delete '+name+'?');
      $('#btn_delete').unbind().click(function (e) {
        $('#loader').show();
         $.ajax({
            url: './user_delete/' + id,
            type: "GET",
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


   $('#data_table').on('change', '#toggle', function (e) {
         sessionStorage.setItem("id", $(this).attr('data-id'));
         var name = $(this).attr('name');
         $('#active').modal('show');
         if($(this).is(":checked")){
            $('#myModalactive').text('ACTIVE USER');
            $('#active_header').text('Want to active '+name+'?');
         }else{
            $('#myModalactive').text('INACTIVE USER');
            $('#active_header').text('Want to inactive '+name+'?');
         }
   });
   $('#active').on('click','#btn_active',function(){
      $('.page-loader-wrapper').show();
        if ($('[data-id="'+sessionStorage.getItem("id")+'"]').is(":checked")) {
          var id = sessionStorage.getItem("id");
            $.ajax({
                url: './user_active/' + id,
                type: "GET",
                success: function (json) {
                    $('.page-loader-wrapper').hide();
                    $("#division").css("display", 'block');
                    $("#division").removeClass('alert alert-danger');
                    $("#division").addClass('alert alert-success');
                    $('#all_msg').text(json.message);
                    $("#all_msg").css("color", 'white');
                    $('#division').delay(3000).fadeOut('slow');
                    $('#active').modal('hide');
                }
            });

        } else {
            var id = sessionStorage.getItem("id");
            $.ajax({
                url: './user_inactive/' + id,
                type: "GET",
                success: function (json) {
                    $('.page-loader-wrapper').hide();
                    $("#division").css("display", 'block');
                    $("#division").addClass('alert alert-danger');
                    $('#all_msg').text(json.message);
                    $("#all_msg").css("color", 'white');
                    $('#division').delay(3000).fadeOut('slow');
                    $('#active').modal('hide');
                }
            });
        }
    });
   
});