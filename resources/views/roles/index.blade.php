@extends('layouts.master')

@section('content')

        <html>
    <div class="container">

        @include('layouts.flash')

        <body>
        <h2 style="margin: 20px">List of Roles</h2>
        <table class="table" style="margin: 20px">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($roles as $role)

                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->title}}</td>
                    <td>{{$role->description}}</td>
                    <td><a href="roles/edit/{{$role->id}}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><a href="roles/delete/{{$role->id}}"><i class="far fa-trash-alt"></i></a></td>
                </tr>
            @endforeach

        </table>


        </body>

        <div class="col-sm-8 blog-main">
            <br>
            <h4>Add a Role</h4>

            <form method="POST" action="/roles">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Role Title">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Role Description">
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