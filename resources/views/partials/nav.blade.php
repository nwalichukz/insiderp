      <ul class="nav navbar-nav navbar-right">
                  <li class="login"> <a href="{{url("/trending-posts")}}">Trending  </a></li>
                  <li class="login"> <a href="{{url("/page/Sports")}}">sports  </a> </li>
                 <li class="login"> <a href="{{url("/page/Politics")}}">politics  </a> </li>
                 <li class="login"> <a href="{{url("/page/Education")}}">education  </a> </li>
                 <li class="login"> <a href="{{url("/page/Romance")}}">romance </a> </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="login"><a href="{{ url('/login') }}">Login</a></li>
                        <li class="login"><a href="{{ url('/register') }}">Sign up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li> <a href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Dashboard </a> </li>
                                <li>  <a href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Trending</a> </li>
                                 <li> <a href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="post to public">Add Post</a> </li>
                                 <li><a href="#" data-toggle="modal" data-target="#inviteFriendModal" data-placement="top" title="invite a friend to join pentalk">Invite a friend </a> </li>
                                 <li><a href="#" data-toggle="modal" data-target="#changePasswordModal" data-placement="top" title="change your password">change password </a> </li>
                                <li> <a href="{{url(Auth::user()->name.'/my-post/'.Auth::user()->id)}}">My Posts</a> </li>
                                <li> <a href="#" data-toggle="modal" data-target="#editProfileModal" data-placement="top" title="Edit your profile">Edit Profile</a> </li>
                                <li> <a href="#" data-toggle="modal" data-target="#addUserImageModal" data-placement="top" title="Edit your profile">Add Profile Image</a> </li> <br/>
                               @if(Auth::check())
                                @if(Auth::user()->user_level==='admin' || Auth::user()->user_level ==='editor')
                                <li><a href="{{url('/blocked-posts')}}">view blocked post </a> </li>
                                 <li> <a href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="post to public">Add Article</a> </li>
                                @endif
                                 @if(Auth::user()->user_level === 'admin')
                                  <li> <a href="{{url('/view-users')}}">View users</a> </li>
                                  <li> <a href="{{url('/view-votes')}}">View votes</a> </li>
                                 <li> <a href="{{url('/view-blocked-users')}}">View blocked users</a> </li>
                                @endif
                                @endif
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>
                        </li>
                    @endif
                
                </ul>