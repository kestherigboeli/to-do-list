@extends('includes.master')
@section('title', 'MLP To-Do')

@section('content')
    <div class="fixed-header">
    </div>
    <div class="container">
        <div class="design_image">
            <img class="image" src="{{ asset('assets/logo.png') }}">
        </div>
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="col-md-5">
                <form method="POST" action="{{route('task.create')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert task name">
                    </div>
                    <button type="submit" id="add_button"  class="btn btn-primary">Add</button>
                </form>
            </div>

            <div class="col-md-7" id="customers_details">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col">Task</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <th scope="row">{{$task->id}}</th>
                                <td style="width: 100%" class="{{$task->status === 'completed' ? 'line_through' : ''}}">{{$task->name}}</td>
                                <td style="width: 100%">
                                    <div class="mr-3" style="display: inline-flex ">
                                        @if($task->status === 'active')
                                            <a class="btn btn-primary btn-success" href="{{route('task.complete', $task->id)}}">
                                                <li class="fa fa-check"></li>
                                            </a>
                                            <a class="btn btn-primary btn-danger" href="{{route('task.delete', $task->id)}}">
                                                <li class="fa fa-times"></li>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <p class="copyright">Copyright &copy; 2020 All Rights Reserved.</p>
    </div>
    <div class="fixed-footer"></div>
@endsection
