@extends('layout.app')
@section('title')
Task
@endsection
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Taskprogress</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Taskprogress </li>
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
                    <form class="needs-validation" novalidate="" method="post" action={{ url('task/'.$task->task_id) }}>
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="hidden" name="status" value="0"/>
                                <label class="form-label" for="validationCustom01">Title</label>
                                <input class="form-control" id="validationCustom01" type="text" name="title" value={{ $task->title }} required="" />
                                <div class="invalid-feedback">Please enter task title!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationTextarea">Description</label>
                                <textarea class="form-control" id="validationTextarea" name="description" rows="1" required="">{{ $task->description }}</textarea>
                                <div class="invalid-feedback">Please enter task descriptino!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Start Date</label>
                                <input class="form-control" id="validationCustom01" type="date" name="start_date" value={{ $task->start_date }} required="" />
                                <div class="invalid-feedback">Please enter start date!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Due Date</label>
                                <input class="form-control" id="validationCustom01" type="date" name="due_date" value={{ $task->due_date }} required="" />
                                <div class="invalid-feedback">Please enter due date!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom04">Priority</label>
                                <select class="form-select" id="validationCustom04" name="priority" value={{ $task->priority }} required="">
                                    <option selected="" disabled="" value="0">Select priority...</option>
                                    <option value="Hight" {{ $task->priority == 'Hight' ? 'selected':''}}>Hight</option>
                                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected':''}}>Medium</option>
                                    <option value="Low" {{ $task->priority == 'Low' ? 'selected':''}}>Low</option>
                                </select>
                                <div class="invalid-feedback">Please select priority!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom04">Assign user</label>
                                <select class="form-select" id="validationCustom04" name="developer_id" required="">
                                    <option selected="" disabled="" value="0">Select Developer...</option>
                                    @foreach($developers as $developer)
                                    <option value="{{ $developer->developer_id }}" {{ $task->developer_id ==  $developer->developer_id ? 'selected':''}}>{{ $developer->first_name.' '.$developer->last_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select assign user!</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div> 
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom04">Status</label>
                                <select class="form-select" id="validationCustom04" name="status" required="">
                                
                                    <option value="0" {{ $task->status == 0 ? 'selected':''}}>Todo</option>
                                    <option value="1" {{ $task->status == 1 ? 'selected':''}}>In-Progress</option>
                                    <option value="2" {{ $task->status == 2 ? 'selected':''}}>In-Review</option>
                                    <option value="3" {{ $task->status == 3 ? 'selected':''}}>Completed</option>
                                   
                                </select>
                                <div class="invalid-feedback">Please select assign user!</div>
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