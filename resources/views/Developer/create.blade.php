@extends('layout.app')
@section('title')
Developer
@endsection

@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Developer Create</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Developer </li>
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
                    <form novalidate="" method="post" action={{ url('developers') }}>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}" />
                                <label class="form-label" for="validationCustom01">First name</label>
                                <input class="{{ $errors->has('first_name') ? 'form-control is-invalid':'form-control' }}" id="validationCustom01" type="text" name="first_name" required="" />
                                @if($errors->has('first_name'))
                                <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Last name</label>
                                <input class="{{ $errors->has('last_name') ? 'form-control is-invalid':'form-control' }}" id="validationCustom02" type="text" name="last_name" required="">
                                @if($errors->has('last_name'))
                                <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustomUsername">Email</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input class="{{ $errors->has('email') ? 'form-control is-invalid':'form-control' }}" id="validationCustomUsername" type="email" name="email" aria-describedby="inputGroupPrepend" required="">
                                    @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationTextarea">Skills</label>
                                <textarea class="{{ $errors->has('skills') ? 'form-control is-invalid':'form-control' }}" id="validationTextarea" name="skills" required=""></textarea>
                                @if($errors->has('skills'))
                                <div class="invalid-feedback">{{ $errors->first('skills') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationTextarea">Socail Profile</label>
                                <textarea class="{{ $errors->has('social_profile') ? 'form-control is-invalid':'form-control' }}" id="validationTextarea" name="social_profile" required=""></textarea>
                                @if($errors->has('social_profile'))
                                <div class="invalid-feedback">{{ $errors->first('social_profile') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationTextarea">Market Place Profile</label>
                                <textarea class="{{ $errors->has('market_place_profile') ? 'form-control is-invalid':'form-control' }}" id="validationTextarea" name="market_place_profile" required=""></textarea>
                                @if($errors->has('market_place_profile'))
                                <div class="invalid-feedback">{{ $errors->first('market_place_profile') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Picture</label>
                                <input class="{{ $errors->has('picture') ? 'form-control is-invalid':'form-control' }}" type="file" name="picture" aria-label="file example" required="">
                                @if($errors->has('picture'))
                                <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationTextarea">Communucation Medium</label>
                                <textarea class="{{ $errors->has('communication_medium') ? 'form-control is-invalid':'form-control' }}" id="validationTextarea" name="communication_medium" required=""></textarea>
                                @if($errors->has('communication_medium'))
                                <div class="invalid-feedback">{{ $errors->first('communication_medium') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Date of Birth</label>
                                <input class="{{ $errors->has('date_of_birth') ? 'form-control is-invalid':'form-control' }}" id="validationCustom03" type="date" name="date_of_birth" required="">
                                @if($errors->has('date_of_birth'))
                                <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom04">Gender</label>
                                <select class="form-select" id="validationCustom04" name="gender" required="">
                                    <option selected="" disabled="" value="0">Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Others</option>
                                </select>
                                @if($errors->has('gender'))
                                <div style="color: red;font-size:0.875em;margin-top:0.25rem;">{{ $errors->first('gender') }}</div>
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