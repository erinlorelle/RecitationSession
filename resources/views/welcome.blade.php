@extends('layouts.master')

@section('content')

        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1>Welcome {{auth()->user()->first_name}} {{auth()->user()->last_name}}</h1>
                    <p class="lead">Enjoy your visit.  This website allows viewers to access the Recitation Session database in a neat, easy to read, organized format:</p>
                    <ul>
                        <li>Itemized list of Majors, Courses, Users, and Roles</li>
                        <li>Includes associations between fields at a quick glance</li>
                        <li>Add, update, and delete data for easy data management</li>
                        <li>Additional reports allow more in-depth viewing</li>
                    </ul><br>
                    <p class="lead">Browse data by clicking on the navigation links at the top.</p>
                    <ul>
                </div>
            </div>
        </div>



@endsection