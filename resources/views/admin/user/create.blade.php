@extends('layouts.back_temp')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">User List</a>
                    </li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create User</h3>
                            <a href="{{ route('user.index') }}" class="btn btn-primary">All User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2 ">
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email"
                                            placeholder="Enter your email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password"
                                            placeholder="Enter your password">
                                        @error('password')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" rows="4" class="form-control"
                                            placeholder="Enter Description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script>
    $('#description').summernote({
        placeholder: 'Post Description',
        tabsize: 2,
        height: 200
    });

</script>
@endsection
