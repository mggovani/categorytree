$(document).ready(function () {
   $("#divi").hide();
   // $("#division").hide();
//    if (jQuery().DataTable) {
//       oTable = $('#data_table').DataTable({
//          oLanguage: {sProcessing: "<div class='loader'><div class='preloader'><div class='spinner-layer pl-deep-purple'><div class='circle-clipper left'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div><p>Please wait...</p></div>"},
//          "processing": true,
//          "serverSide": true,
//          "ajax": "customer_data",
//          "columns": [
//             {data: 'DT_Row_Index', orderable: false, searchable: false},
//             {data: 'profile_pic', name: 'profile_pic',
//                     render: function (data, type, full, meta) {
//                       if(data == ''){return '<a href="#imagemodal" id="pop" data-target="#imagemodal" image-name="user.png" data-toggle="modal"><img id="imageresource_'+full.id+'" src="./profile_pic/user.png"  height="50" width="50"/></a>';}
//                         else{
//                         return '<a href="#imagemodal" id="pop" data-target="#imagemodal" image-name="'+data+'"  data-toggle="modal">'+"<img id='imageresource_"+full.id+"' src=\"./profile_pic/" + data + "\" height=\"50\" width=\"50\"/>"+'</a>';}
                      
//                      }},
//             {data: 'name', name: 'name'},
//             {data: 'firm', name: 'firm'},
//             {data: 'mobile', name: 'mobile'},
//             {data: 'gst_no', name: 'gst_no'},
//             {data: 'state', name: 'state'},
//             {data: 'action', name: 'action', orderable: false, searchable: false}
//          ]
//       });
//    }

if (jQuery().select2) {
      $(".myselect").select2({
         placeholder: 'Select Course',
      });
      $(".myselect_type").select2({
         placeholder: 'Select Question Type',
      });
   }

   var i = 0;
   $('#add_ans').on('click',function(){
      i++;
      $('#answers').prepend('<div id="answer_div'+i+'"><div class="col-sm-6"><div class="form-group"><input type="text" name="answer['+i+']" class="form-control" placeholder="Answer"/></div></div><div class="col-sm-3"><div class="form-group"><input type="checkbox" name="correct_answer['+i+']" value = "'+i+'" class="form-control foo"/></div></div><div class="col-sm-3"><div class="form-group"><center><div class="btn btn-danger" id="rmv_ans" data-id="'+i+'"><i class="fa fa-minus"></i></div></center></div></div></div>');
   });
   $(document).on('click','#rmv_ans',function(){
      var btn_id = $(this).attr('data-id');
      $('#answer_div'+btn_id).remove();
   });
   var selected_type = '';
   $('#question_type').on('change', function(){
      var selected_type = $('#question_type option:selected').text();
      $('#qtype').val(selected_type);
   })

   $(document).on('click','.foo', function(){  
      if($('#qtype').val() == "Single Choice"){
   $('.foo').prop('checked', false);
      $(this).prop('checked', true); 
}
});

   $(document).on('click', '#edit_question', function () {
      var id = $(this).attr('data-id');
      // alert(id);
       $.ajax({
         url: './question_edit/'+id,
         type: "GET",
         dataType: "json",
         success: function (data) {
            // console.log(data.question);
            $('#update_answers').empty();
            $('#question').val(data.question);
            $('#d_course').val(data.course_id).trigger("change");
            $('#question_type').val(data.question_type).trigger("change");
            $('#question_description').val(data.question_description);
            $('#explanation_detail').val(data.explanation_detail);
            var arr = [];
            $.each($.parseJSON(data.correct_answer), function(i,j){
               arr.push(j);
            });

    $.each($.parseJSON(data.answer), function(key,val){
      // console.log(key);
      if(key == 0)
      {
          $('#update_answers').append('<div><div class="col-sm-6"><div class="form-group"><input type="text" name="answer[0]" class="form-control" placeholder="Answer" value="'+val+'"/></div></div><div class="col-sm-3"><div class="form-group"><input type="checkbox" name="correct_answer[0]" value="0" class="form-control foo"/></div></div><div class="col-sm-3"><div class="form-group"><center><div class="btn btn-success" id="update_ans"><i class="fa fa-plus"></i></div></center></div></div></div>')
      }
      else{
         $('#update_answers').prepend('<div id="answer_div'+key+'"><div class="col-sm-6"><div class="form-group"><input type="text" name="answer['+key+']" class="form-control" placeholder="Answer" value="'+val+'"/></div></div><div class="col-sm-3"><div class="form-group"><input type="checkbox" name="correct_answer['+key+']" value = "'+key+'" class="form-control foo"/></div></div><div class="col-sm-3"><div class="form-group"><center><div class="btn btn-danger" id="rmv_ans" data-id="'+key+'"><i class="fa fa-minus"></i></div></center></div></div></div>');
      }

      if($.inArray(key, arr) != -1){
         $('input[name="correct_answer['+key+']"]').prop('checked',true);
      }
      sessionStorage.setItem("key", key);
    });
            $(".GlobalForm").attr("action", "./question_update/" + id);
         }
      });

   });
      var update_key = sessionStorage.getItem("key");
   $('#update_answers').on('click', '#update_ans',function(){
      update_key++;
      $('#update_answers').prepend('<div id="answer_div'+update_key+'"><div class="col-sm-6"><div class="form-group"><input type="text" name="answer['+update_key+']" class="form-control" placeholder="Answer"/></div></div><div class="col-sm-3"><div class="form-group"><input type="checkbox" name="correct_answer['+update_key+']" value = "'+update_key+'" class="form-control foo"/></div></div><div class="col-sm-3"><div class="form-group"><center><div class="btn btn-danger" id="rmv_ans" data-id="'+update_key+'"><i class="fa fa-minus"></i></div></center></div></div></div>');
   });

//    $("#data_table").on("click","#pop",function(){
//    var data =  $(this).attr('image-name');  
//    $('#imagepreview').attr('src','./profile_pic/'+data);
// });

//    $('#data_table').on('click', '#delete_customer', function () {
//       var id = $(this).attr('data-id');
//       var name = $(this).attr('customer-name');
//       $('#myModaldelete').text('DELETE CUSTOMER');
//       // $("#link").attr('href','related?id='+id+'');
//       $('#del_modal').text('want to delete '+name+'?')
//       $('#btn_delete').unbind().click(function (e) {
//          $('.page-loader-wrapper').show();
//          $.ajax({
//             url: './customer_delete/' + id,
//             type: "GET",
//             dataType: "json",
//             success: function (data) {
//                $('.page-loader-wrapper').hide();
//                if (data.status == 'false') {
//                   $('#delete').modal('hide');
//                   $("#division").css("display", 'block');
//                   $("#division").addClass('alert alert-danger');
//                   $('#all_msg').text(data.message);
//                   $("#all_msg").css("color", 'white');
//                   $('#division').delay(3000).fadeOut('slow');
//                   } else {
//                   oTable.draw();
//                   $('#delete').modal('hide');
//                   $("#division").css("display", 'block');
//                   $("#division").addClass('alert alert-danger');
//                   $('#all_msg').text(data.message);
//                   $("#all_msg").css("color", 'white');
//                   $('#division').delay(3000).fadeOut('slow');
//                }
//             }
//          });
//       });
//    });


   
});