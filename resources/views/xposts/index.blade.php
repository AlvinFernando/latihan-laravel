<!-- views -> siswa -> index.blade.php -->
@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Posts</h3>
                                <div class="right">
                                    <a href="{{ route('xposts.add') }}" class="btn btn-sm btn-primary">Add New Posts</a>
                                   
                                </div>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>TITLE</td>
                                            <td>USER</td>
                                            <td>ACTIONS</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($xposts as $xpost)
                                        <tr>
                                            <td>{{$xpost->id}}</td> 
                                            <td>{{$xpost->title}}</td> 
                                            <td>{{$xpost->user->name}}</td> 
                                            <td>
                                                <a target="_blank" href="{{route('xsite.single.xpost', $xpost->slug)}}" class="btn btn-info btn-sm">View</a>
                                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
@stop

@section('footer')
    <script>

    </script>
@endsection
