

<html>
<head>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <div class="container">
<body>
<h2 style="margin: 20px">Edit {{ $editMajor->name }}</h2>


<div class="col-sm-8 blog-main" style="margin: 20px">
    <br>
    <h4>Make any necessary changes below</h4>

    <form method="POST" action="/majors/{{ $editMajor->id }}">
        {{ csrf_field() }}
        {{method_field('PUT')}}

        <div class="form-group">
            <input type="text" class="form-control" id="abbr" name="abbr" value="{{ $editMajor->abbr }}">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" value="{{ $editMajor->name }}">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" value="{{ $editMajor->description }}">
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
