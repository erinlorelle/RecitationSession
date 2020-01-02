

<html>
<head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">

    <div class="container">
<body>
<h2 style="margin: 20px">Edit {{ $editCourse->course_number }} {{ $editCourse->course_name }}</h2>


<div class="col-sm-8 blog-main" style="margin: 20px">
    <br>
    <h4>Make any necessary changes below</h4>

    <form method="POST" action="/courses/{{ $editCourse->id }}">
        {{ csrf_field() }}
        {{method_field('PUT')}}

        <div class="form-group">
            <input type="text" class="form-control" id="course_number" name="course_number" value="{{ $editCourse->course_number }}">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $editCourse->course_name }}">
        </div>

        <div class="form-group">
            <select class="form-control" id="major" name="major">
                <?=$majors = App\Major::all()?>
                @foreach($majors as $major)
                    <option value="{{$editCourse->major->description}}">{{$major->description}}</option>
                @endforeach
            </select>
        </div>

        <br>
        <hr>
        <h4>Assign a teacher to this course</h4>

        <select name="teacher">
            <?=$users = App\User::whereHas('roles', function ($query){$query->where('title', 'Professor');})->get();?>
            @foreach($users as $user)
                <option value="{{$user->first_name}}">{{$user->first_name}} {{$user->last_name}}</option>
            @endforeach
        </select>
        <br><br>
        <hr>
        <h4>Student attending this course</h4>

        <select name="student">
            <?=$userst = App\User::whereHas('roles', function ($query){$query->where('title', 'Student');})->get();?>
            @foreach($userst as $usert)
                <option value="{{$usert->first_name}}">{{$usert->first_name}} {{$usert->last_name}}</option>
            @endforeach
        </select>
        <br><br>
        <label for="title">Date Attending</label>
        <div class="form-group">
            <input type="text" class="form-control" id="date" name="date" value="2018-04-19">
        </div>

        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>



        @include('layouts.errors')
        <br>
    </form>

</div>

</div>
</html>