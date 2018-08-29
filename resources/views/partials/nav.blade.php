      <ul class="nav navbar-nav navbar-right">
                  <li class="login"> <a href="{{url("/trending-posts")}}" title="view trending posts">Trending  </a></li>
                   <li class="login"> <a href="{{url("/page/Story")}}" title="read inspiring stories of people">stories </a> </li>
                  <li class="login"> <a href="{{url("/page/Sports")}}" title="view posts on sports">sports  </a> </li>
                 <li class="login"> <a href="{{url("/page/Politics")}}" title="view posts on politics">politics  </a> </li>
                 <li class="login"> <a href="{{url("/page/Romance")}}" title="check out relationship/romance posts"> romance </a> </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="login"><a title="click to login" href="{{ url('/login') }}">login</a></li>
                        <li class="login"><a title=="click to create account" href="{{ url('/register') }}">sign up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li> <a href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}" title="go back to dashboard">Dashboard </a> </li>
                                <li>  <a href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}" title="view trending posts">Trending</a> </li>
                                <li> <a href="#" data-toggle="modal" data-target="#addPostStoryModal" data-placement="top" title="share a story">Share story</a> </li>
                                 <li> <a href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="post to public">Add Post</a> </li>
                                 <li><a href="#" data-toggle="modal" data-target="#inviteFriendModal" data-placement="top" title="invite a friend to join pentalk">Invite a friend </a> </li>
                                 <li><a href="#" data-toggle="modal" data-target="#changePasswordModal" data-placement="top" title="change your password">change password </a> </li>
                                <li> <a href="{{url(Auth::user()->name.'/my-post/'.Auth::user()->id)}}" title="view posts by you">My Posts</a> </li>
                                <li> <a href="#" data-toggle="modal" data-target="#editProfileModal" data-placement="top" title="Edit your profile">Edit Profile</a> </li>
                                <li> <a href="#" data-toggle="modal" data-target="#addUserImageModal" data-placement="top" title="Edit your profile">Add Profile Image</a> </li> 
                               @if(Auth::check())
                                @if(Auth::user()->user_level==='admin' || Auth::user()->user_level ==='editor')
                                <li><a href="{{url('/blocked-posts')}}">view blocked post </a> </li>
                                 <li> <a href="#" data-toggle="modal" data-target="#addPostModal" data-placement="top" title="add post to community">Add Article</a> </li>
                                @endif
                                 @if(Auth::user()->user_level === 'admin')
                                  <li> <a href="{{url('/view-users')}}" title="view all users">View users</a> </li>
                                  <li> <a href="{{url('/view-votes')}}" title="view all votes">View votes</a> </li>
                                 <li> <a href="{{url('/view-blocked-users')}}" title="view all blocked users">View blocked users</a> </li>
                                @endif
                                @endif
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" title="logout">
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