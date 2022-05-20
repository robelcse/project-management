@extends('layout.app')
@section('title')
Developer
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Developer List</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Developer</li>
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
                                    <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{ url('developers/create') }}"> <i data-feather="plus-square"> </i>Create New Developer</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Social link</th>
                                    <th>Market place link</th>
                                    <th>Date of birth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($developers as $developer)
                                <tr>
                                    <td>{{ $developer->first_name.' '.$developer->last_name }}</td>
                                    <td>{{ $developer->email }}</td>
                                    <td>{{ $developer->social_profile }}</td>
                                    <td>{{ $developer->market_place_profile }}</td>
                                    <td>{{ $developer->date_of_birth }}</td>
                                    <td>
                                        <a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a>
                                        <a href="{{ url('developers/'.$developer->developer_id.'/edit') }}"><i data-feather="more-horizontal"></i></a>

                                    <a href="#" onclick="deleteDeveloper('{{$developer->developer_id}}')"><i data-feather="trash-2"></i></a>
                                        <form id="delete-{{ $developer->developer_id }}" action="{{ url('developers/'.$developer->developer_id) }}" method="post" style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Social link</th>
                                    <th>Market place link</th>
                                    <th>Date of birth</th>
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
@push('js')
<script>
    function deleteDeveloper(developerId)
    {
       alert('are you sure want to delete this ?')
       document.getElementById("delete-"+developerId).submit();
    }
</script>
@endpush
<!-- Container-fluid Ends-->
@endsection