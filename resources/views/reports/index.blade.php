@extends('layouts.master')

@section('content')

    <html>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
        <h1 style="margin: 20px">Reports</h1>
        <hr>
        <h4 class="lead">General</h4>
        <ul>
            <li style="margin: 20px"><a href="reports/permissions">Permissions Guide</a></li>
        </ul>
        <h4 class="lead">Users Reports</h4>
            <ul>
                <li style="margin: 20px"><a href="reports/attended">Courses Attended</a></li>
                <li style="margin: 20px"><a href="reports/areTeaching">Currently Teaching</a></li>
                <li style="margin: 20px"><a href="reports/canTeach">Who Can Teach What</a></li>
                <li style="margin: 20px"><a href="reports/roleUsers">Users by Role</a></li>
            </ul>
        <h4 class="lead">Majors Reports</h4>
            <ul>
                <li style="margin: 20px"><a href="reports/majorCourses">Courses by Major</a></li>
            </ul>
            <br>
        </body>

            </div>
        </div>
    </div>
    </html>
@endsection