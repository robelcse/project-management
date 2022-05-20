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
                    <form class="needs-validation" novalidate="" method="post" action={{ url('projects') }}>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Project Name</label>
                                <input class="form-control" id="validationCustom01" type="text" name="project_name" required="" />
                                <div class="invalid-feedback">Please enter project name!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationTextarea">Description</label>
                                <textarea class="form-control" id="validationTextarea" name="description" rows="1" required=""></textarea>
                                <div class="invalid-feedback">Please enter project descriptino!</div>
                                <div class="valid-feedback">Looks good!</div>
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
                                <div class="invalid-feedback">Please select client!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom04">Developer</label>
                                <select class="form-select" id="validationCustom04" name="developer_id" required="">
                                    <option selected="" disabled="" value="0">Select Developer...</option>
                                    @foreach($developers as $developer)
                                    <option value="{{ $developer->developer_id }}">{{ $developer->first_name.' '.$developer->last_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select developer!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Budget</label>
                                <input class="form-control" id="validationCustom01" type="text" name="budget" required="" />
                                <div class="invalid-feedback">Please enter budget!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Start Date</label>
                                <input class="form-control" id="validationCustom01" type="date" name="start_date" required="" />
                                <div class="invalid-feedback">Please enter start date!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">End Date</label>
                                <input class="form-control" id="validationCustom01" type="date" name="end_date" required="" />
                                <div class="invalid-feedback">Please enter end date!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationTextarea">Technologies</label>
                                <textarea class="form-control" id="validationTextarea" name="technologies" rows="1" required=""></textarea>
                                <div class="invalid-feedback">Please enter project technologors!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Live Link</label>
                                <input class="form-control" id="validationCustom03" type="text" name="live_link" />
                                <div class="invalid-feedback">Please provide a valid date of birth!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Demo Link</label>
                                <input class="form-control" id="validationCustom03" type="text" name="demo_link" />
                                <div class="invalid-feedback">Please provide a valid date of birth!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Github Link</label>
                                <input class="form-control" id="validationCustom03" type="text" name="git_link" />
                                <div class="invalid-feedback">Please provide a valid date of birth!</div>
                                <div class="valid-feedback">Looks good!</div>
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