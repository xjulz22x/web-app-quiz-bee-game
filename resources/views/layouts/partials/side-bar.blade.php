<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="/user-profile" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="../assets/img/admin.jfif">
            </div>
   
        </a>
        <a href="/user-profile" class="simple-text logo-normal">
            {{auth()->user()->full_name}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::path()==='dashboard' ? 'active' : ''}}">
                <a href="{{route('teacher.dashboard')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li  class="{{Request::path()==='dashboard-subjects' ? 'active' : ''}}">
                <a href="{{route('dashboard.subjects')}}">
                    <i class="las la-torah"></i>
                    <p>Subjects</p>
                </a>
            </li>
            <li class="{{Request::path()==='dashboard-room' ? 'active' : ''}}">
                <a href="{{route('dashboard.room')}}">
                    <i class="las la-door-open"></i>
                    <p>Room</p>
                </a>
            </li>
            <li class = "{{Request::path()==='dashboard-question' ? 'active' : ''}}">
                <a href="{{route('dashboard.question')}}">
                    <i class="las la-question-circle"></i>
                    <p>Questions</p>
                </a>
            </li>
            <li  class="{{Request::path()==='user-profile' ? 'active' : ''}}">
                <a href="{{route('user.profile')}}">
                    <i class="las la-user-circle"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li  class="{{Request::path()==='user-registration' ? 'active' : ''}}">
                <a href="{{route('user.registration')}}">
                    <i class="las la-user-plus"></i>
                    <p>Register Competitors</p>
                </a>
            </li>
        </ul>
    </div>
</div>