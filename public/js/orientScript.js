$('#flash-overlay-modal').modal();

$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
( function( $ ) {

    $( '.swipebox' ).swipebox();

} )( jQuery );


function postComment(event){
    event.preventDefault();
    var form = document.getElementById('commentForm');
    var formData = new FormData(form);
    var post_id = $('#postid').val();
    var comment = $('#commentarea').val();
    $.ajax({
        url: "{{ url('/ajax-post-comment') }}",
        method: 'GET',
        data: {post_id:post_id, comment:comment},
        success:function(data){
            $('#commentID').load(" #commentID");
        },
        error:function(x,e) {
            if (x.status==0) {
                $('.status').hide();
                $('.successMsg').show();
                $('.successMsg').html('You are offline!!\n Please Check Your Network.').fadeOut(600);
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
                $('.successMsg').html('Unknow Error.\n'+x.responseText).fadeOut(50000);
            }
        },

    });
}


function postLike(event)
{   event.preventDefault();
    var target = event.target || event.srcElement;
    var id = event.target.id;
    $.ajax({
        url: "{{url('ajax-post-like')}}",
        type: 'GET',
        data: {id:id},
        success:function(){
            $('#mainContent').load(" #mainContent");
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

/**
 * This method handles the autocomplete for
 * the home pages and search page
 *
 */
function autocomplet(){
    // get the input value
    var keyword = $('#search').val();
    //var type = $('#frent').val();

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
 * This function handles the set item for the autosuggest
 *  when clicked it sets the item to the input text used for the search
 */
function set_item(item) {
    // change input value
    $("#search").val(item);
    // hide proposition list
    $("#content").hide();
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
$('#imgcaption').show();
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
* This function loads the add articles form through ajax
*/
function getArticleForm(event){
	event.preventDefault();
	$('.status').show()
	$('.status').html('Wait loading add article form');
	$.ajax({
		type:'GET',
		cahe: false,
		url:'getArticleForm',
		success:function(data){
			$('.status').hide();
			$('#dashbody').html(data);
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

/**
* This function submits the article to the database
*
*/
function addArticle(event){
event.preventDefault();
var form = document.getElementById('articleForm');
var formData = new FormData(form);
$('.status').show();
$('.status').html('Wait adding article...');
$.ajax({
    url: 'addArticle',
    type: 'POST',
     processData: false,
    contentType: false,
    data: formData,
    success:function(){
    $('.status').hide();
    $('.successMsg').show();
    $('.successMsg').html('Article added successfully...').fadeOut(6000, function(){
        window.location.reload();
    }); 

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
* This function updates an article
*
*/
function updateArticle(event){
event.preventDefault();
var form = document.getElementById('updateForm');
var formData = new FormData(form);
$('.status').show();
$('.status').html('Wait updating article...');
$.ajax({
    url: 'addArticle',
    type: 'POST',
     processData: false,
    contentType: false,
    data: formData,
    success:function(){
    $('.status').hide();
    $('.successMsg').show();
    $('.successMsg').html('Article updated successfully...').fadeOut(8000); 
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



CKEDITOR.replace( 'textPost' );

$.fn.modal.Constructor.prototype.enforceFocus = function() {
  modal_this = this;
  $(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
        && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
        && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
        modal_this.$element.focus();
    }
  })
};