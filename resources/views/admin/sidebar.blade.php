<div class="right-sideabr">
    <div class="inner-box">
        <h4>Overview</h4>
        <ul class="lest item">
            <li><a class="active" href="{{ route('admin', ['user' => str_replace(' ', '-', strtolower(Auth::user()->name))]) }}">Users <span class="notinumber"> @if(!empty($total_user)){{$total_user}} @endif</span></a></li>
            <li><a  href="{{ route('vendors') }}" title="View registered vendors">Vendors<span class="notinumber"> @if(!empty($total_vendor)){{$total_vendor}} @endif</span></a></li>
            <li><a href="{{ route('suspended') }}" title="Get the suspended users">Suspended users <span class="notinumber">0</span></a></li>
            <li><a href="{{ route('administrators') }}" title="View all admins">Administrators</a></li>
             <li><a href="{{ url('get-all-enquiry') }}" title="View all sent enquiries">Enquiry</a></li>
        </ul>
        <h4>Jobs</h4>
        <ul class="lest item">
            <li><a href="{{ url('admin/job-offers') }}">Job Offers</a></li>
            <li><a href="{{ url('admin/jobs-ongoing') }}">Job Ongoing</a></li>
            <li><a href="{{ url('admin/jobs-completed') }}">Jobs Completed</a></li>
        </ul>
        <ul class="lest">
            <li><a href="">Change Password</a></li>
            <li><a href="{{url('/logout')}}">Sing Out</a></li>
        </ul>
    </div>
</div>