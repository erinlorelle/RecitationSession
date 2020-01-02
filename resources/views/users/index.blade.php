@extends('layouts.master')

@section('content')

    <html>
    <div class="container">

        @include('layouts.flash')

        <body>
        <h2 style="margin: 20px">List of Users</h2>
        <table class="table" style="margin: 20px">
            <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($users as $user)

                <tr>
                    <td><a href="users/{{$user->id}}">{{$user->id}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td><a href="users/edit/{{$user->id}}"><i class="fas fa-pencil-alt"></i></td>
                    <td><a href="users/delete/{{$user->id}}"><i class="far fa-trash-alt"></i></a></td>
                </tr>
            @endforeach

        </table>
        </body>
        {{ $users->links() }}

        <div class="col-sm-8 blog-main">
            <br>
            <h4>Add a User</h4>

            <form method="POST" action="/users">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="User Email">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="User's First Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="User's Last Name">
                </div>

                <div class="form-group">
                    <select class="form-control" id="title" name="title">
                        <option value="Student">Student</option>
                        <option value="Professor">Professor</option>
                    </select>
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