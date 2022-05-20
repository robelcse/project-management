@extends('layout.app')
@section('title')
Client
@endsection

@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Client Profile</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Client</li>
                    <li class="breadcrumb-item active"> Profile</li>
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
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media"> <img class="img-70 rounded-circle" alt="" src="../assets/images/user/7.jpg">
                                        <div class="media-body">
                                            <h3 class="mb-1 f-20 txt-primary">{{ $client->first_name.' '.$client->last_name }}</h3>
                                            <p class="f-12">{{ $client->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email-Address</label>
                                <input class="form-control" value={{ $client->email }} readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Compant Website</label>
                                <input class="form-control" value={{ $client->company_website }} readonly />
                            </div>
                            <!-- <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <form class="card" action="{{ url('client/'.$client->client_id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">Client Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" type="text" name="first_name" value="{{ $client->first_name }}" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" value="{{ $client->last_name }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" value="{{ $client->email }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company</label>
                                    <input class="form-control" type="text" name="company" value="{{ $client->company }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">Company Website</label>
                                    <input class="form-control" type="text" name="company_website" value="{{ $client->company_website }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input class="form-control" type="date" name="date_of_birth" value="{{ $client->date_of_birth }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" id="validationCustom04" name="gender" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="Male" {{ $client->gender == 'Male' ? 'selected':''}}>Male</option>
                                        <option value="Female" {{ $client->gender == 'Female' ? 'selected':''}}>Female</option>
                                        <option value="Other" {{ $client->gender == 'Other' ? 'selected':''}}>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Connect By</label>
                                    <input class="form-control" type="text" name="connect_by" value="{{ $client->connect_by }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Communication Medium</label>
                                    <input class="form-control" type="text" name="communication_medium" value="{{ $client->communication_medium }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Communication Link</label>
                                    <input class="form-control" type="text" name="communication_link" value="{{ $client->communication_link }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">Social Profile</label>
                                    <textarea class="form-control" rows="5" name="social_profile">{{ $client->social_profile }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">Market Plcae Profile</label>
                                    <textarea class="form-control" rows="5" name="market_place_profile">{{ $client->market_place_profile }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--project list-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>projects</h3>
            </div>

        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row project-cards">

        <div class="col-sm-12">
            @if(count($client->projects) > 0)
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <div class="row">
                                @foreach($client->projects as $project)
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                        @if($project->status == 0)
                                        <span class="badge badge-danger">In-Progress</span>
                                        @elseif($project->status == 1)
                                        <span class="badge badge-warning">In-Review</span>
                                        @elseif($project->status == 2)
                                        <span class="badge badge-primary">Completed</span>
                                        @endif
                                        <h6>{{ $project->project_name }}</h6>
                                        <div class="media"><img class="img-20 me-2 rounded-circle" src="{{ asset('public/assets/images/user/3.jpg') }}" alt="" data-original-title="" title="">
                                            <div class="media-body">
                                                <p>{{ $project->client->first_name.' '.$project->client->last_name }}</p>
                                            </div>
                                        </div>
                                        <p>{{ $project->description }}</p>
                                        <div class="row details">
                                            <div class="col-6"><span>Issues </span></div>
                                            <div class="col-6 font-primary">12 </div>
                                            <div class="col-6"> <span>Resolved</span></div>
                                            <div class="col-6 font-primary">5</div>
                                            <div class="col-6"> <span>Comment</span></div>
                                            <div class="col-6 font-primary">7</div>
                                        </div>
                                        <div class="customers">
                                            <ul>
                                                <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{ asset('public/assets/images/user/3.jpg') }}" alt="" data-original-title="" title=""></li>
                                                <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{ asset('public/assets/images/user/5.jpg') }}" alt="" data-original-title="" title=""></li>
                                                <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{ asset('public/assets/images/user/1.jpg') }}" alt="" data-original-title="" title=""></li>
                                                <li class="d-inline-block ms-2">
                                                    <p class="f-12">+10 More</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-status mt-4">
                                            <div class="media mb-0">
                                                <p>70% </p>
                                                <div class="media-body text-end"><span>Done</span></div>
                                            </div>
                                            <div class="progress" style="height: 5px">
                                                <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
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
            @else
            <div class="card">
                <div class="card-body">
                     <h5>Project not available!</h5>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection