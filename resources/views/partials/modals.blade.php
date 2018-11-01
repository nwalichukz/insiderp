
<!-- modal for adding post -->
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header border-b p-3">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Post</h3>
                </div>
                <form action="{{url('add-post')}}" method="post" enctype="multipart/form-data" id="">
                
                    <div class="mb-3">
                        <input type="text" name="title" class="modal-input" placeholder="Enter the title of the post max of ten words" required>
                    </div>
                    
                    <div class="mb-3">
                    <textarea name="post" rows="3" id="textPost" class="modal-input" placeholder="Share your thought on anything you care about" required></textarea>
                </div>
                 <script type="text/javascript">
                     CKEDITOR.replace( 'textPost' );

$.fn.modal.Constructor.prototype.enforceFocus = function() {
  modal_this = this
  $(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
      modal_this.$element.focus()
    }
  })
};
                </script>
                     <div class="mb-3">
                    <select name="category" class="modal-select">
                        <option value="">Select Category</option>
                        <option >Politics</option>
                        <option >Education</option>
                        <option >Sports</option>
                        <option >Religion</option>
                        <option >Romance</option>
                        <option >Technology</option>
                        <option >Entertainment</option>
                        <option >Culture</option>
                          <option >Job</option>
                          <option >NYSC</option>
                         <option >Foreign</option>
                         <option >Fashion</option>
                         <option >CarTalk</option>
                        <option >Entrepreneurship</option>
                         <option >Health</option>
                        <option >Literature</option>
                        

                    </select>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                        <div class="">
                            <label for="attachment">Post with image:</label>
                            <input type="file" name="image" onchange="readURL(this);" id="images" multiple="true" class="p-1 bg-white text-black" />
                            <div id="image-holder" class="w-full"></div>
                            <img class="showimg" src="#" alt="" class="rounded shadow" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Post</button>
                </div>
                </form>

            </div>
        </div>
    </div>


    <!-- modal for sharing a story -->

    <div class="modal fade" id="addPostStoryModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Share a story</h3>
                </div>
                <form action="{{url('add-post')}}" method="post" enctype="multipart/form-data" id="">
                
                    <div class="mb-3">
                        <input type="text" name="title" class="modal-input" placeholder="Enter the title of the story max of ten words" required>
                    </div>
                    
                    <div class="mb-3">
                    <textarea name="post" rows="3" id="shareStory" class="modal-input" placeholder="Stories inspire, encourage, teach and unite us. Share a story !!!" required></textarea>
                </div>
                 <script type="text/javascript">
                     CKEDITOR.replace( '' );

$.fn.modal.Constructor.prototype.enforceFocus = function() {
  modal_this = this
  $(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
      modal_this.$element.focus()
    }
  })
};
</script>
<input type="hidden" name="category" value="Story">
            
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="attachment">Share with image:</label>
                            <input type="file" name="image" onchange="readURL(this);" id="images" multiple="true" class="p-1 bg-white text-black" />
                            <div id="image-holder" class="w-full"></div>
                            <img class="showimg" src="#" alt="" class="rounded shadow" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Share story</button>
                </div>
                </form>

            </div>
        </div>
    </div>


    <!-- modal for inviting friends -->

    <div class="modal fade" id="inviteFriendModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Invite a friend to Join Bido</h3>
                </div>
                <form action="{{ url('/invite-friends') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="email1" class="modal-input" placeholder="Enter email address of the person" required>
                </div>
                <div class="mb-3">

                    <input type="text" name="email2" class="modal-input" placeholder="Enter email address of the person">
                </div>
                <div class="mb-3">
                    <input type="text" name="email3" class="modal-input" placeholder="Enter email address of the person">
                </div>
               
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Invite</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<!-- change password goes here -->

    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Change Password</h3>
                </div>
                <form action="{{url('/change-password')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="oldpassword" class="modal-input" placeholder="Enter old password" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="newpassword" class="modal-input" placeholder="Enter new password" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="newpassword_confirmation" class="modal-input" placeholder="Re-type new password" required>
                </div>

                    <div class="modal-footer">
                        <button type="submit" class="modal-button">Change password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal for edit profile goes here -->

    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Edit Profile</h3>
                </div>
                <form action="{{url('/update-profile')}}" method="post" enctype="multipart/form-data" id="editprofile">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="editname" class="modal-input" value="@if(!empty(Auth::check())){{Auth::user()->name}}@endif">
                     <input type="hidden" name="id" value="@if(!empty(Auth::check())){{Auth::user()->id}}@endif">
                </div>
                <div class="mb-3">
                    <input type="text" name="email" class="modal-input" value="@if(!empty(Auth::check())){{Auth::user()->email}}@endif" >
                </div>
                <div class="mb-3">
                    <input type="text" name="user_name" class="modal-input" value="@if(!empty(Auth::check())){{Auth::user()->user_name}}@endif" >
                </div>
                @if(Auth::check())
                 @if(Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')
                    <div class="mb-3">
                    <textarea name="description" class="modal-input" rows="2">{{Auth::user()->description}} </textarea>
                </div>
                @endif
                @endif

            @if(Auth::check())
             @if(Auth::user()->user_level === 'admin')
                    <div class="mb-3">
                    <select name="category" class="modal-select">
                        <option value="{{Auth::user()->user_level}}">{{Auth::user()->user_level}}</option>
                        <option value="user" >User</option>
                        <option value="editor" >Editor</option>
                        <option value="suspended" >suspend</option>
                        <option value="admin" >Admin</option>
                        <option value="banned" >Banned</option>                        
                    </select>
                </div>
                @endif
                @endif
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>


<!-- modal for adding profile image-->

    <div class="modal fade" id="addUserImageModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Add User Image</h3>
                </div>
                <form action="{{url('add-user-image')}}" method="post" enctype="multipart/form-data">
    
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="attachment">Add image:</label>
                            <input type="file" name="avatar" onchange="readURL(this);" id="images" multiple="true" required/>
                            <div id="image-holder" class="w-full"></div>
                            <img class="showimg" src="#" alt="" class="rounded-full shadow" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  <!-- modal for signupAnyWhere -->

    <div class="modal fade" id="signupModalAny" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Signup</h3>
                </div>
                <form action="{{url('register-user-any')}}" method="post" enctype="multipart/form-data" id="">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">

                    <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                 <div class="mb-3">
                    <input type="text" name="user_name" class="form-control" placeholder="Enter a user name must be unique" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter password min of 6 characters" required>
                </div>
                 <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type the password above" required>
                </div>
               
                <div class="modal-footer">
                    <button type="submit" class="pull-left btn btn-common">Signup</button>
                </div>
                </form>
            </div>
        </div>
    </div>

        <!-- modal for loginAnyWhere -->

    <div class="modal fade" id="loginModalAny" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Login</h3>
                </div>
                <form action="{{url('post-login-any')}}" method="post" enctype="multipart/form-data" id="">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Enter emaiil address">
                </div>
                <div class="mb-3">

                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>

                <div class="modal-footer">
                    <a href="#">Forgot password </a>
                    <button type="submit" class="pull-left btn btn-common">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal for signup -->

    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Signup</h3>
                </div>
                <form action="{{url('register-user')}}" method="post" enctype="multipart/form-data" id="">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">

                    <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                 <div class="mb-3">
                    <input type="text" name="user_name" class="form-control" placeholder="Enter a user name (optional)" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter password min of 6 characters" required>
                </div>
                 <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type the password above" required>
                </div>
               
                <div class="modal-footer">
                    <button type="submit" class="pull-left btn btn-common">Signup</button>
                </div>
                </form>
            </div>
        </div>
    </div>

        <!-- modal for login -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Login</h3>
                </div>
                <form action="{{url('post-login')}}" method="post" enctype="multipart/form-data" id="">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Enter emaiil address">
                </div>
                <div class="mb-3">

                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
               
                <div class="modal-footer">
                    <a href="#">Forgot password </a>
                    <button type="submit" class="pull-left btn btn-common">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>