@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Item\'s Status') }}</div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif 

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    
                    <table class="table table-hover table-bordered" style="text-align: center; ">
                      <tbody>
                        <tr><th>Section</th><th>Item</th><th>Title</th><th>File</th><th>Status</th> <th>Action</th></tr>

                        @foreach($results as $data)
                          
                          <tr><td>{{$data->section_type}}</td><td>{{$data->item_type}}</td><td>{{$data->title}}</td><td><?php  $ext = explode(".", $data->file); $value = explode("_", $data->file); echo $value[0] . '.' . $ext[1]; ?></td><td>{{$data->status}}</td><td>

                          <a href="{{ route('admin.item.status.update',[ $data->id, $data->status]) }}"><button type="button" style="float: right " class="btn btn-primary">Change</button></td></tr>
                         
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
