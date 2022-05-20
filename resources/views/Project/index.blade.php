@extends('layout.app')
@section('title')
Project
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>project list</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Project</li>
                    <li class="breadcrumb-item active">List</li>
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
    <div class="row project-cards">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>All</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Doing</a></li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Done</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{ url('projects/create') }}"> <i data-feather="plus-square"> </i>Create New Project</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <div class="row">
                                @foreach($projects as $project)
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                        @if(count($project->tasks) >0 && (count($project->tasks) == $project->completed_task))
                                        <span class="badge badge-primary">Completed</span>
                                        @else
                                        <span class="badge badge-danger">In-Progress</span>
                                        @endif
                                        <a href="{{ route('task.projectWiseTask', $project->project_id) }}">
                                            <h6>{{ $project->project_name }}</h6>
                                        </a>
                                        <div class="media"><img class="img-20 me-2 rounded-circle" src="{{ asset('public/assets/images/user/3.jpg') }}" alt="" data-original-title="" title="">
                                            <div class="media-body">
                                                <p>{{ $project->client->first_name.' '.$project->client->last_name }}</p>
                                            </div>
                                        </div>
                                        <p>{{ $project->description }}</p>
                                        <div class="row details">
                                            <div class="col-6"><span>Task </span></div>
                                            <div class="col-6 font-primary">{{ count($project->tasks) }} </div>
                                            <div class="col-6"> <span>Completed Task</span></div>
                                            <div class="col-6 font-primary">{{ $project->completed_task }}</div>
                                        </div>
                                        <div class="customers">
                                            <ul>
                                                <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{ asset('public/assets/images/user/1.jpg') }}" alt="" data-original-title="" title=""></li>
                                                <li class="d-inline-block ms-2">
                                                    <p class="f-12">{{ $project->developer->first_name.' '.$project->developer->last_name }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-status mt-4">
                                            <div class="media mb-0">
                                                <p>{{ $project->total_done }} %</p>
                                                <div class="media-body text-end"><span>Done</span></div>
                                            </div>
                                            <div class="progress" style="height: 5px">

                                                <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{{ $project->total_done }}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection