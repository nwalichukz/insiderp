/**
* This method handles the autocomplete for 
* the home pages and search page
*
*/
function autocomplet(){
        var keyword = $('#search').val();

    if (keyword != '') {
        $.ajax({
            url: "{{ url('/autosuggest') }}",
            type: 'GET',
            data: {keyword:keyword, type:type},
            success:function(data){
            $('#content').show();
            $('#content').html(data);
            }
  });
       } else {

    $('#content').hide();
 }
     }

/**
* This is the inbuilt method that reads the URL
*  of any image for preview before upload
*/

function readURL(input) {
    var files = input.files;
    var imgPath = files[0].value;
   // var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder").empty();
     
    if (files)/*(extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") */{
        for(var i=0; i<files.length; i++){
        var reader = new FileReader();
        reader.onload = function (e) {
        $("<img />", {
            "src": e.target.result,
            "class": "thumb-image"
            }).appendTo(image_holder);
            }
image_holder.show();
reader.readAsDataURL(files[i]);
            }
      }

 }
//submittin a form with enter key
 $('#commentForm').keydown(function(e) {
var key = e.which;
if (key == 13) {
// As ASCII code for ENTER key is "13"
$('#commentForm').submit(); // Submit form code
}
});




/**
* This function updates an article
*
*/
function getEditForm(event){
event.preventDefault();
var target = event.target || event.srcElement;
var id = event.target.id;
$.ajax({
    url: 'getUpdateForm',
    type: 'GET',
    cache: false,
    data:{id:id,_token:$('input[name=_token]').val()},
    success:function(data){
    $('.status').hide();
    $('#dashbody').html(data);
     },
  });
}



/**
* This function post a like
*
*/
function postLike(event)
{   event.preventDefault();
    var target = event.target || event.srcElement;
    var id = event.target.id;
   $.ajax({
    url: "{{url('ajax-post-like')}}",
    type: 'GET',
    data: {id:id},
    success:function(){
   $('#postBox').load(" #postBox"); 
    },
        error:function(x,e) {
    if (x.status==0) {
        $('.status').hide();
        $('.successMsg').show();
       $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(6000);
    } else if(x.status==404) {
        $('.status').hide();
        $('.successMsg').show();
       $('.successMsg').html('Requested URL not found.').fadeOut(6000);
    } else if(x.status==500) {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Internel Server Error.').fadeOut(6000);
    } else if(e=='parsererror') {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Error.\nParsing JSON Request failed.').fadeOut(6000);
    } else if(e=='timeout'){
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Request Time out.').fadeOut(6000);
    } else {
        $('.status').hide();
        $('.successMsg').show();
        $('.successMsg').html('Unknow Error.\n'+x.responseText).fadeOut(5000);
    }
        },


    });
}