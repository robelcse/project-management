@extends('layout.app')
@section('title')
Taskprogress
@endsection

@section('content')
<div id="app">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Taskprogress</li>
                        <li class="breadcrumb-item active">Crate</li>
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
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Task Details</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            <div class="pull-right">
                                @if($task->status == 0)
                                <span class="badge badge-danger">Todo</span>
                                @elseif($task->status == 1)
                                <span class="badge badge-warning">In-Progress</span>
                                @elseif($task->status == 2)
                                <span class="badge badge-info">In-Review</span>
                                @elseif($task->status == 3)
                                <span class="badge badge-success">Completed</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Project</label>
                                        <input class="form-control" type="text" value="{{ $task->project->project_name }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Task</label>
                                        <input class="form-control" value="{{ $task->title }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="5" disabled>{{ $task->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input class="form-control" value="{{ $task->start_date }}" disabled />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Due Date</label>
                                        <input class="form-control" value="{{ $task->due_date }}" disabled />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Priority</label>
                                        <input class="form-control" value="{{ $task->priority }}" disabled />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Developer</label>
                                        <input class="form-control" value="{{ $task->developer->last_name.' '.$task->developer->first_name }}" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Task Progress</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            <div class="pull-right">
                                <div class="card">

                                    <!-- Vertically centered modal-->
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Progress</button>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ url('taskprogress') }}" method="post" ref="form">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Create Taskprogress</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    @if(count($errors) > 0 )
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <ul class="p-0 m-0" style="list-style: none;">
                                                            @foreach($errors->all() as $error)
                                                            <li>{{$error}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="modal-body">
                                                        <div class="card-body">

                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="hidden" name="project_id" value={{ $task->project->project_id }} />
                                                                <input type="hidden" name="task_id" value={{ $task->task_id }} />
                                                                <input type="hidden" name="developer_id" value={{ $task->developer->developer_id }} />
                                                                <h6 class="form-label">Working Description</h6>
                                                                <textarea class="form-control" rows="5" name="work_description" v-model="work_description"></textarea>
                                                                <span class="err_message" id="err_work_description">@{{ taskProgressError.work_description != null ? taskProgressError.work_description:null }}<span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Working Hour</label>
                                                                <input class="form-control" type="number" name="working_hour" v-model="working_hour" />
                                                                <span class="err_message" id="err_working_hour">@{{ taskProgressError.working_hour != null ? taskProgressError.working_hour:null }}<span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Remaining</label>
                                                                <input class="form-control" type="number" name="remaining" v-model="remaining" />
                                                                <span class="err_message" id="err_remaining">@{{ taskProgressError.remaining != null ? taskProgressError.remaining:null }}<span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit" @click="validateTaskProgress">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Working Hour</th>
                                            <th>Remaining</th>
                                            <th>Developer</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($taskprogresses as $taskprogress)
                                        <tr>
                                            <td>{{ $taskprogress->work_description }}</td>
                                            <td>{{ $taskprogress->working_hour }}</td>
                                            <td>{{ $taskprogress->remaining }}%</td>
                                            <td>{{ $taskprogress->developer->first_name.' '.$taskprogress->developer->last_name }}</td>
                                            <td>{{ $taskprogress->created_at }}</td>
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
</div>
@push('js')
<script>
    const {
        createApp
    } = Vue

    createApp({
        data() {
            return {
                work_description: '',
                working_hour: '',
                remaining: '',
                taskProgressError: {
                    work_description: '',
                    working_hour: '',
                    remaining: ''

                }

            }
        },
        methods: {
            validateTaskProgress(event) {

                event.preventDefault();

                this.taskProgressError.work_description = '';
                this.taskProgressError.working_hour = '';
                this.taskProgressError.remaining = '';

                if (this.work_description === '') {
                    this.taskProgressError.work_description = 'Please enter work description!';
                }
                if (this.working_hour === '') {
                    this.taskProgressError.working_hour = 'Please enter working Hour!';
                }
                if (this.remaining === '') {
                    this.taskProgressError.remaining = 'Please enter remaing!';
                }

                if (this.work_description !== '' && this.working_hour !== '' && this.remaining !== '') {
                    this.$refs.form.submit();
                }
            }
        }
    }).mount('#app')
</script>
@endpush

@endsection