

<html>


<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<!-- Custom styles for this template -->
<link href="css/album.css" rel="stylesheet">

<div class="container">
    <body>
    <h2 style="margin: 20px">Registration Page</h2>

    <div class="col-sm-8 blog-main" style="margin: 20px">
        <br>
        <h4>Enter your information below:</h4>
        <hr>

        <form method="POST" action="/register">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>

            <div class="form-group">
                <label for="title">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>

            <div class="form-group">
                <label for="title">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            @include('layouts.errors')
            <br>
        </form>
    </div>
    </body>


</div>
</html>