@extends('layouts.master')

@section('content')

    <html>
    <div class="container">

        @include('layouts.flash')

        <body>
        <h2 style="margin: 20px">List of Courses</h2>
        <table class="table" style="margin: 20px">
            <thead>
            <tr>
                <th>Id</th>
                <th>Major Id</th>
                <th>Course Number</th>
                <th>Course Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($courses as $course)

                <tr>
                    <td><a href="courses/{{$course->id}}">{{$course->id}}</a></td>
                    <td><a href="majors">{{$course->major_id}}</td>
                    <td>{{$course->course_number}}</td>
                    <td>{{$course->course_name}}</td>
                    <td><a href="courses/edit/{{$course->id}}"><i class="fas fa-pencil-alt"></i></td>
                    <td><a href="courses/delete/{{$course->id}}"><i class="far fa-trash-alt"></i></a></td>

                </tr>
            @endforeach

        </table>


        </body>

        <div class="col-sm-8 blog-main">
            <br>
            <h6>Click the "Update" links to attend a course or assign a teacher to a course</h6>
            <br>
            <h4>Add a Course</h4>

            <form method="POST" action="/courses">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" id="course_number" name="course_number" placeholder="Course Number">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name">
                </div>

                <div class="form-group">
                    <select class="form-control" id="major" name="major">
                        <?=$majors = App\Major::all()?>
                        @foreach($majors as $major)
                            <option value="{{$major->description}}">{{$major->description}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                @include('layouts.errors')
                <br>
            </form>

        </div>

    </div>
    </html>
@endsection