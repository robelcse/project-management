@extends('layout.app')
@section('title')
Project
@endsection
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Project</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Project </li>
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
                    <form novalidate="" method="post" action={{ url('projects') }}>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Project Name</label>
                                <input class="{{ $errors->has('project_name') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="text" name="project_name" required="" />
                                @if($errors->has('project_name'))
                                <div class="invalid-feedback">{{ $errors->first('project_name') }}</div>
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
                                <label class="form-label" for="validationCustom04">Client</label>
                                <select class="form-select" id="validationCustom04" name="client_id" required="">
                                    <option selected="" disabled="" value="0">Select Client...</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->client_id }}">{{ $client->first_name.' '.$client->last_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('client_id'))
                                <div style="color: red;font-size:0.875em;margin-top:0.25rem;">{{ $errors->first('client_id') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom04">Developer</label>
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
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Budget</label>
                                <input class="{{ $errors->has('budget') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="text" name="budget" required="" />
                                @if($errors->has('budget'))
                                <div class="invalid-feedback">{{ $errors->first('budget') }}</div>
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
                                <label class="form-label" for="validationCustom01">End Date</label>
                                <input class="{{ $errors->has('end_date') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="date" name="end_date" required="" />
                                @if($errors->has('end_date'))
                                <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationTextarea">Technologies</label>
                                <textarea class="{{ $errors->has('technologies') ? 'form-control is-invalid':'form-control' }}" id="validationTextarea" name="technologies" rows="1" required=""></textarea>
                                @if($errors->has('technologies'))
                                <div class="invalid-feedback">{{ $errors->first('technologies') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Live Link</label>
                                <input class="{{ $errors->has('picture') ? 'form-control is-invalid':'form-control' }}" id="validationCustom03" type="text" name="live_link" />
                                @if($errors->has('live_link'))
                                <div class="invalid-feedback">{{ $errors->first('live_link') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Demo Link</label>
                                <input class="{{ $errors->has('demo_link') ? 'form-control is-invalid':'form-control' }}" id="validationCustom03" type="text" name="demo_link" />
                                @if($errors->has('demo_link'))
                                <div class="invalid-feedback">{{ $errors->first('demo_link') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Github Link</label>
                                <input class="{{ $errors->has('git_link') ? 'form-control is-invalid':'form-control' }}" id="validationCustom03" type="text" name="git_link" />
                                @if($errors->has('git_link'))
                                <div class="invalid-feedback">{{ $errors->first('git_link') }}</div>
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