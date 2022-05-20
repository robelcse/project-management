@extends('layout.app')
@section('title')
Task
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Task</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Task</li>
                    <li class="breadcrumb-item">List</li> 
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>
                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                            <form class="form-inline search-form">
                                <div class="form-group form-control-search">
                                    <input type="text" placeholder="Search..">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <!-- Base styles-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12 project-list">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6 p-0">

                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{ url('tasks/create') }}"> <i data-feather="plus-square"> </i>Create New Task</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="example-style-1">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Priority</th>
                                    <th>Task done</th>
                                    <th>Status</th>
                                    <th>Assign User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->start_date }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>{{ $task->priority }}</td>
                                    <td>{{ $task->task_done == NULL ? 0:$task->task_done }}%</td>
                                    <td>
                                        @if($task->status == 0)
                                        <span class="badge badge-danger">Todo</span>
                                        @elseif($task->status == 1)
                                        <span class="badge badge-warning">In-Progress</span>
                                        @elseif($task->status == 2)
                                        <span class="badge badge-info">In-Review</span>
                                        @elseif($task->status == 3)
                                        <span class="badge badge-success">Completed</span>
                                        @endif
                                    </td>
                                    <td>{{ $task->developer->first_name.' '.$task->developer->last_name }}</td>
                                    <td>
                                        <a class="me-2" href="{{ url('taskprogress/'.$task->task_id.'/show') }}"><i data-feather="link"></i></a>
                                        <a href="{{ url('tasks/'.$task->task_id.'/edit') }}"><i data-feather="more-horizontal"></i></a>

                                        <a href="#" onclick="deleteTask('{{$task->task_id}}')"><i data-feather="trash-2"></i></a>
                                        <form id="delete-{{ $task->task_id }}" action="{{ url('tasks/'.$task->task_id) }}" method="post" style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Assign User</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Base styles Ends-->

    </div>
</div>
<!-- Container-fluid Ends-->

@push('js')
<script>
    function deleteTask(taskId)
    {
       alert('are you sure want to delete this ?')
       document.getElementById("delete-"+taskId).submit();
    }
</script>
@endpush

@endsection