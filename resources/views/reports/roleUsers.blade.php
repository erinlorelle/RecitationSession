{{--Reports: Users by Role--}}

<html>
<head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <div class="container">
<body>
<h2 style="margin: 20px">User Reports: by Role<small>&nbsp&nbsp(sorted by first name)</small></h2>
<hr>

<div class="col-sm-8 blog-main" style="margin: 20px">

<br>
<h4 style="color: dodgerblue">Admin</h4>
<table class="table" style="margin: 20px">
    <thead>
    <tr>
        <th>Admin First Name</th>
        <th>Admin Last Name</th>
    </tr>
    </thead>

    <?php $usera = App\User::whereHas('roles', function ($query){$query->where('title', 'Admin');})->orderBy('first_name')->get();?>
    @foreach($usera as $usera)
        <tr>
            <td>{{$usera->first_name}}</td><td> {{$usera->last_name}}</td>
        </tr>
    @endforeach

</table>

<br>

    <h4 style="color: dodgerblue">Professors</h4>
    <table class="table" style="margin: 20px">
        <thead>
        <tr>
            <th>Professor First Name</th>
            <th>Professor Last Name</th>
        </tr>
        </thead>

        <?php $users = App\User::whereHas('roles', function ($query){$query->where('title', 'Professor');})->orderBy('first_name')->get();?>
        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td><td> {{$user->last_name}}</td>
            </tr>
        @endforeach

    </table>

    <br>
    <h4 style="color: dodgerblue">Students</h4>
    <table class="table" style="margin: 20px">
        <thead>
        <tr>
            <th>Student First Name</th>
            <th>Student Last Name</th>
        </tr>
        </thead>

        <?php $userst = App\User::whereHas('roles', function ($query){$query->where('title', 'Student');})->orderBy('first_name')->get();?>
        @foreach($userst as $usert)
            <tr>
                <td>{{$usert->first_name}}</td><td> {{$usert->last_name}}</td>
            </tr>
        @endforeach

    </table>

</body>



</div>
</html>
