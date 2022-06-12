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
                    <li class="breadcrumb-item">Task </li>
                    <li class="breadcrumb-item">Create</li> 
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
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <form novalidate="" method="post" action={{ route('projectWiseTaskStore') }}>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="hidden" name="project_id" value="{{ $project_id }}" />
                                <input type="hidden" name="status" value="0" />
                                <label class="form-label" for="validationCustom01">Title</label>
                                <input class="{{ $errors->has('title') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="text" name="title" required="" />
                                @if($errors->has('title'))
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationTextarea">Description</label>
                                <textarea class="{{ $errors->has('description') ? 'form-control is-invalid':'form-control' }}" id="validationTextarea" name="description" rows="1" required=""></textarea>
                                @if($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Start Date</label>
                                <input class="{{ $errors->has('start_date') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="date" name="start_date" required="" />
                                @if($errors->has('start_date'))
                                <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Due Date</label>
                                <input class="{{ $errors->has('due_date') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="date" name="due_date" required="" />
                                @if($errors->has('due_date'))
                                <div class="invalid-feedback">{{ $errors->first('due_date') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom04">Priority</label>
                                <select class="form-select" id="validationCustom04" name="priority" required="">
                                    <option selected="" disabled="" value="0">Select priority...</option>
                                    <option value="Hight">Hight</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                                @if($errors->has('priority'))
                                <div style="color: red;font-size:0.875em;margin-top:0.25rem;">{{ $errors->first('priority') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom04">Assign user</label>
                                <select class="form-select" id="validationCustom04" name="developer_id" required="">
                                    <option selected="" disabled="" value="0">Select Developer...</option>
                                    @foreach($developers as $developer)
                                    <option value="{{ $developer->developer_id }}">{{ $developer->first_name.' '.$developer->last_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('developer_id'))
                                <div style="color: red;font-size:0.875em;margin-top:0.25rem;">{{ $errors->first('developer_id') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <div class="checkbox p-0">
                                    <input class="form-check-input" id="invalidCheck" type="checkbox" checked required="">
                                    <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                </div>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection