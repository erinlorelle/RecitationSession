@extends('layouts.master')

@section('content')

<html>
<div class="container">

    @include('layouts.flash')

    <body>
        <h2 style="margin: 20px">List of Majors</h2>
            <table class="table" style="margin: 20px">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Abbr</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                    @foreach($majors as $major)

                <tr>
                    <td>{{$major->id}}</td>
                    <td>{{$major->abbr}}</td>
                    <td>{{$major->name}}</td>
                    <td>{{$major->description}}</td>
                    <td><a href="majors/edit/{{$major->id}}"><i class="fas fa-pencil-alt"></i></td>
                    <td><a href="majors/delete/{{$major->id}}"><i class="far fa-trash-alt"></i></a></td>
                </tr>
                    @endforeach

            </table>

    </body>

    <div class="col-sm-8 blog-main">
        <br>
        <h4>Add a Major</h4>

        <form method="POST" action="/majors">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" class="form-control" id="abbr" name="abbr" placeholder="Major Abbr">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Major Name">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="description" name="description" placeholder="Major Description">
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