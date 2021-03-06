<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recitation Session</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">

</head>

<body id="page-top">



<header class="bg-primary text-white">
    <div class="container text-center">
        <h1>Recitation Session</h1>
        <p class="lead">by Erin Lorelle</p>
    </div>
</header>
<div style="container"></div>
<br>
<div class="container">
<form method="POST" action="/login">
    {{ csrf_field() }}

    @include('layouts.flash')

    <h5>Login</h5>
    <br>
    <div class="form-group" style="width: 250px;" style="text-align: center">
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
    </div>

    <div class="form-group" style="width: 250px;" style="text-align: center">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
    </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    @include('layouts.errors')

</form>
    <a href="register">Click to Register</a>
<br><br>
</div>

</div>


@include('layouts.footer')

</body>

</html>



