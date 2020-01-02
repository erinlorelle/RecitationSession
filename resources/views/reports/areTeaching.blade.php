

<html>
<head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <div class="container">
<body>
<h2 style="margin: 20px">User Reports: Currently Teaching </h2>
<hr>


<div class="col-sm-8 blog-main" style="margin: 20px">
    <br>
    <h4>Professors</h4>
    <table class="table" style="margin: 20px">

        <?php $users = App\User::has('teaching')->orderBy('first_name')->get();?>
        @foreach($users as $user)
            <tr>
                <th>{{$user->first_name}}</th>
                <th> {{$user->last_name}}</th>
                <td style="color: darkgray; font-style: italic">Start Date</td>
                <td style="color: darkgray; font-style: italic">End Date</td>
            </tr>
            @foreach($user->teaching as $class)
                <tr>
                    <td>{{$class->course_number}}</td>
                    <td>{{$class->course_name}}</td>
                    <td>{{$class->pivot->start_date}}</td>
                    <td>{{$class->pivot->end_date}}</td>
                </tr>
            @endforeach
        @endforeach



    </table>
</div>
</body>
</html>
