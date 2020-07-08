@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Item') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.addItem.submit') }}" enctype="multipart/form-data">
                        @csrf

                        
                        <div class="form-group row">
                            <label for="section_type" class="col-md-4 col-form-label text-md-right">{{ __('Section Type') }}</label>

                            <div class="col-md-6">
                                <select id="section_type" type="text" name="section_type" class="form-control{{ $errors->has('section_type') ? ' is-invalid' : '' }}" required>
                                    <option disabled selected value>select one</option>
                                    <option value="1" >Section 1</option>
                                    <option value="2" >Section 2</option>
                                </select>
                            </div>
                        </div>
                         <!-- select item type and insert image or video link-->
                        <div class="form-group row">
                            <label for="item_type" class="col-md-4 col-form-label text-md-right">{{ __('Item Type') }}</label>

                            <div class="col-md-6 ">
                                <select id="item_type" type="text" name="item_type" class="form-control{{ $errors->has('item_type') ? ' is-invalid' : '' }}" required>
                                    <option disabled selected value>select one</option>
                                    <option value="video" >video</option>
                                    <option value="post" >post</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="title" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Post Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="details" type="textarea" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" value="{{ old('details') }}" rows="5" placeholder="Details" required> </textarea>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Select file') }}</label>

                            <div class="col-md-6 ">
                                <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file"  required>

                            </div>
                        </div>
                        <input id="status" type="hidden" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="show" required>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                                <button type="cancel" class="btn btn-danger">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
