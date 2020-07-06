@extends('layouts.back_temp')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('user.profile') }}">User Profile</a>
                    </li>
                    <li class="breadcrumb-item active">User Profile</li>
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
                            <h3 class="card-title">User Profile</h3>
                            <a href="{{ route('user.index') }}" class="btn btn-primary">All User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                        <div class="col-12 col-lg-10">
                            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">User Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                   value="{{ $user->name }}">
                                                @error('name')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="email" name="email" id="email"
                                                value="{{ $user->email }}">
                                                @error('email')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <small class="text-info">(Enter password If you want to change)</small></label>
                                                <input class="form-control" type="password" name="password"
                                                    id="password" placeholder="********">
                                                @error('password')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="image">User Avatar</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" id="image">
                                                    <label class="custom-file-label" for="image">{{ $user->image?$user->image:'Choose image' }}</label>
                                                </div>
                                                @error('avatar')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" rows="4"
                                                    class="form-control">{{ $user->description }}</textarea>
                                                @error('description')
                                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <img class="img-fluid img-rounded" src="{{ asset($user->image) }}"  alt="">
                                    <h5>{{ $user->name }}</h5>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
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
        placeholder: 'Enter your profile description!',
        tabsize: 2,
        height: 100
    });

</script>
@endsection
