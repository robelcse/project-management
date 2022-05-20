@extends('layout.app')
@section('title')
Client
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Clients</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Clients</li>  
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
                                    <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{ url('clients/create') }}"> <i data-feather="plus-square"> </i>Create New Client</a>
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
                                    <th>Company</th>
                                    <th>Company Website</th>
                                    <th>Connect By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->first_name.' '.$client->last_name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->company }}</td>
                                    <td>{{ $client->company_website }}</td>
                                    <td>{{ $client->connect_by }}</td>
                                    <td>
                                        <a class="me-2" href="{{ url('clients/'.$client->client_id.'/show') }}"><i data-feather="link"></i></a>
                                        <a href="{{ url('clients/'.$client->client_id.'/edit') }}"><i data-feather="more-horizontal"></i></a>
                                        <a href="#" onclick="deleteClient('{{$client->client_id}}')"><i data-feather="trash-2"></i></a>
                                        <form id="delete-{{ $client->client_id }}" action="{{ url('clients/'.$client->client_id) }}" method="post" style="display: none;">
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
                                    <th>Company</th>
                                    <th>Company Website</th>
                                    <th>Connect By</th>
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
    function deleteClient(clientId)
    {
       alert('are you sure want to delete this ?')
       document.getElementById("delete-"+clientId).submit();
    }
</script>
@endpush
<!-- Container-fluid Ends-->
@endsection

 