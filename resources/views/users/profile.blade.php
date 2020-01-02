

<html>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">

    <div class="container">
    <body>
    <h2 style="margin: 20px; color: dodgerblue">Profile for {{ $user->first_name }} {{ $user->last_name }}</h2>


        <div class="col-sm-8 blog-main" style="margin: 20px">
            <hr>

            <h4>First Name:&nbsp&nbsp&nbsp{{ $user->first_name }}</h4>
            <h4>Last Name:&nbsp&nbsp&nbsp{{ $user->last_name }}</h4>
            <h4>Email:&nbsp&nbsp&nbsp{{ $user->email }}</h4>
            <br>
            <h4 style="color: dodgerblue">Roles:</h4>
            <table class="table" style="margin: 20px">
                @foreach($user->roles as $role)
                    <tr>
                        <td>{{$role->title}}</td>
                    </tr>
                @endforeach
            </table>

            <br>

            @if($user->roles->where('title', 'Student')->first())
                <h4 style="color: dodgerblue">Courses Attended and Date: </h4>
                <table class="table" style="margin: 20px">

                @if(count($user->attended) > 0 || count($user->teaching))
                    @foreach($user->attended as $class)
                        <tr>
                            <td>{{$class->course_number}}</td>
                            <td>{{$class->course_name}}</td>
                            <td>{{$class->pivot->date}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No Classes Attended</td>
                    </tr>
                @endif
            @endif
            </table>

            @if($user->roles->where('title', 'Professor')->first())
                <h4 style="color: dodgerblue">Courses Can Teach: </h4>
                <table class="table" style="margin: 20px">

                    @if(count($user->teaches) > 0)
                        @foreach($user->teaches as $class)
                            <tr>
                                <td>{{$class->course_number}}</td>
                                <td>{{$class->course_name}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>User is not teaching a course</td>
                        </tr>
                    @endif
                </table>

                <br>

                <h4 style="color: dodgerblue">Courses Currently Teaching: </h4>
                <table class="table" style="margin: 20px">

                    @if(count($user->teaching) > 0)
                        @foreach($user->teaching as $class)
                            <tr>
                                <td>{{$class->course_number}}</td>
                                <td>{{$class->course_name}}</td>
                                <td>{{$class->pivot->start_date}}</td>
                                <td>{{$class->pivot->end_date}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>User is currently not teaching a course</td>
                        </tr>
                    @endif
            @endif

            </table>
            <br>

            {{--@foreach($user->roles() as $role)
            <h4>{{ $role->title }}</h4>
            @endforeach--}}

        <br>


        </div>
    </body>

    </div>
</html>
