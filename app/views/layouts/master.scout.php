@include('header')
    <div class="main-content">
        @yield('content')
    </div>
    <div class="sidebar">
        @section('sidebar')
            <h2>Sidebar:</h2>
        @show
    </div>
@include('footer')