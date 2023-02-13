$('#adminsearch').on('keyup',function(){
    $value=$(this).val();
    $.ajax(
        {
            type : 'get',
            url : 'admins/search',
            data:{'search':$value},
            success:function(data)
            {
                $('#dataRecords').html(data);
            }
        });
});
$('#usersearch').on('keyup',function(){
  $value=$(this).val();
  $.ajax(
      {
          type : 'get',
          url : 'users/search',
          data:{'search':$value},
          success:function(data)
          {
              $('#dataRecords').html(data);
          }
      });
});
$('#pagesearch').on('keyup',function(){
  $value=$(this).val();
  $.ajax(
      {
          type : 'get',
          url : 'pages/search',
          data:{'search':$value},
          success:function(data)
          {
              $('#dataRecords').html(data);
          }
      });
});
$('#blogsearch').on('keyup',function(){
$value=$(this).val();
$.ajax(
    {
        type : 'get',
        url : 'blogs/search',
        data:{'search':$value},
        success:function(data)
        {
            $('#dataRecords').html(data);
        }
    });
});
$('#testimonialsearch').on('keyup',function(){
  $value=$(this).val();
  $.ajax(
      {
          type : 'get',
          url : 'testimonials/search',
          data:{'search':$value},
          success:function(data)
          {
              $('#dataRecords').html(data);
          }
      });
  });
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}  
$(function(){
    $('body').css('background-color', 'blue !important');
});

// Document Ready function
$(document).ready(function(){
  
  // Set Date picker 
  $('#datepicker').datepicker({
    weekStart: 1,
    daysOfWeekHighlighted: "6,0",
    autoclose: true,
    todayHighlight: true,
  });
  $('#datepicker').datepicker("setDate", new Date());

  // Change Page table Text area to CKEditor rich text Classic Editor
  var myEle = document.getElementById("description");
  if(myEle)
  {
    var myEditor;
    ClassicEditor
      .create( document.querySelector( '#description' ) )
      .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
        myEditor.setData($('#description').val());
      } )
      .catch( error => {
          console.error( error );
      } );
  }
  var myEle2 = document.getElementById("content");
  if(myEle2)
  {
    var myEditor;
    ClassicEditor
      .create( document.querySelector( '#content' ) )
      .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
        myEditor.setData($('#content').val());
      } )
      .catch( error => {
          console.error( error );
      } );
  }  
  // Upload image for Page table when Admin add/edit a page.
  $('#imageUploadForm').on('submit',(function(e) {

    $.ajaxSetup({     
      headers: {     
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
      }     
    });     
    e.preventDefault();     
    var formData = new FormData(this);
     
     
     
    $.ajax({
     
       type:'POST',
     
       url: "{{ url('save-photo')}}",
     
       data:formData,
     
       cache:false,
     
       contentType: false,
     
       processData: false,
     
       success:function(data){
     
           $('#original').attr('src', 'public/images/'+ data.photo_name);
     
       },
     
       error: function(data){
     
           console.log(data);
     
       }
     
    });     
    })); // End of  $('#imageUploadForm').on      
    $("#image").change(function() {
      readURL(this);
    });
});// End of Document.ready

// Preview Image as selected from the image dialog
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#thumbImg').attr('src', e.target.result);
      $("#remove_page_image").show();
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

// Remove page image on Edit form.
function removepageimage(id){   
  $("#remove_page_image").hide();   
  $("#thumbImg").attr('src','#');
  $("#thumbImg").attr('alt','');  
  $("#image").val('');
}

// Remove blog image on Edit form.
function removeblogimage(id){   
  $("#remove_blog_image").hide(); 
  $("#thumbImg").attr('src','#');
  $("#thumbImg").attr('alt','');  
  $("#image").val('');
}





