<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">

        <a class="navbar-brand js-scroll-trigger" href="https://www.etsu.edu" target="_blank"
           title="East Tennessee State University" onmouseover="this.style.color='#d3d3d3'"
           onmouseout="this.style.color='white'">CSCI 2910 Server Side Web Management</a>

        @if(Auth::user()->roles()->where('title', 'Admin')->first())
            <div class="container" style="text-align: left;color: lawngreen;font-size: smaller">
                *Admin</div>
        @endif

        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container" style="text-align: right;color: gold;font-size: smaller">
            Hello, {{auth()->user()->first_name}}

        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="home">Home</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="majors">Majors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="roles">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="reports">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" style="color: dodgerblue" onmouseover="this.style.color='lightgray'"
                       onmouseout="this.style.color='dodgerblue'" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>