<ul class="list-reset flex-grow sm:flex sm:items-center text-xs pt-3">
    <li class="nav-li"> <a title="The trending posts" href="{{url('/get-add-post')}}">Add Post </a></li>
    <li class="nav-li"> <a title="get sports updates" href="{{url('/category/Sports/index')}}">sports  </a> </li>
    <li class="nav-li"> <a title="Read political posts" href="{{url('/category/Politics/index')}}">politics  </a> </li>
    <li class="nav-li"> <a title="Your education posts" href="{{url('/category/Education/index')}}">education  </a> </li>
    <li class="nav-li"> <a title="click to view posted jobs" href="{{url('/category/Job/index')}}">Jobs </a> </li>

    <!-- Authentication Links -->
    @if (Auth::guest())
        <li class="nav-li"><a href="{{ url('/login') }}">login</a></li>
        <li class="nav-li"><a href="{{ url('/register') }}">sign up</a></li>
    @else
        <dropdown-link>
            <span slot="link" class="appearance-none flex items-center inline-block font-medium" style="color: #777777;">
              <span class="mr-1">{{ Auth::user()->name }}</span>
              <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </span>
            <div slot="dropdown" class="bg-white shadow rounded border overflow-hidden">
                <a class="dropdown-item" href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Dashboard </a>
                <a class="dropdown-item" href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Trending</a>
                
                <a class="dropdown-item" href="{{url('/get-invite-friend')}}" data-toggle="modal" data-target="#inviteFriendModal" data-placement="top" title="invite a friend to join Bido">Invite a friend </a>
                <a class="dropdown-item" href="{{url('/get-change-password')}}" data-toggle="modal" data-target="#changePasswordModal" data-placement="top" title="change your password">change password </a>
                <a class="dropdown-item" href="{{url(str_slug(Auth::user()->name).'/my-post/'.Auth::user()->id)}}">My Posts</a>
                <a class="dropdown-item" href="{{url('/get-edit-profile')}}" data-toggle="modal" data-target="#editProfileModal" data-placement="top" title="Edit your profile">Edit Profile</a>
                <a class="dropdown-item" href="{{url('/get-add-user-img')}}" data-toggle="modal" data-target="#addUserImageModal" data-placement="top" title="Edit your profile">Add Profile Image</a><br/>
                @if(Auth::check())
                    @if(Auth::user()->user_level==='admin' || Auth::user()->user_level ==='editor')
                    <a class="dropdown-item" href="{{url('/get-add-post')}}" title="post to public">Add Post</a>
                        <a class="dropdown-item" href="{{url('/blocked-posts')}}">view blocked post </a>
                         <a class="dropdown-item" href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name).'/get-general-post'))}}">General post </a>
                       <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="post to public">Add Article</a> -->
                    @endif
                    @if(Auth::user()->user_level === 'admin')
                        <a class="dropdown-item" href="{{url('/view-users')}}">View users</a>
                        <a class="dropdown-item" href="{{url('/get-mail')}}" title="post to public">Send Mail</a>
                        <!--<a class="dropdown-item" href="{{url('/view-votes')}}">View votes</a> -->
                        <a class="dropdown-item" href="{{url('/view-blocked-users')}}">View blocked users</a>
                    @endif
                @endif
                <a class="dropdown-item" href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </div>
        </dropdown-link>
    @endif
</ul>