<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.head')
<body class="">
<div class="wrapper ">
    {{--    side-bar    --}}
        @include('layouts.partials.side-bar')
        <div class="main-panel">
    {{--    nav-bar     --}}
            @include('layouts.partials.nav-bar')
            <div class="content">
                {{ $slot }}
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('layouts.partials.script')
</body>
</html>
