{{--Reports: Majors and Courses--}}

<html>
<head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <div class="container">
<body>
<h2 style="margin: 20px">Major Reports: Courses </h2>
<hr>


<div class="col-sm-8 blog-main" style="margin: 20px">
    <br>

    <?php $majors = App\Major::all(); ?>
    @foreach($majors as $major)
        <h4 style="color: dodgerblue">{{$major->abbr}} {{$major->description}}</h4>
        <table class="table" style="margin: 20px">
        <tr>
            <th>Course Abbr</th>
            <th>Course Description</th>
        </tr>
        @foreach($major->courses as $course)
            <tr>
                <td>{{$course->course_number}}</td>
                <td> {{$course->course_name}}</td>
            </tr>
         @endforeach
        </table><br>
    @endforeach



</body>



</div>
</html>
