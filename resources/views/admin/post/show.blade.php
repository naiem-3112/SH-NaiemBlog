@extends('layouts.back_temp')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">View Post</a>
                        </li>
                        <li class="breadcrumb-item active">View Post</li>
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
                                <h3 class="card-title">View Post</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">All Post</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 200px">Title</th>
                        <td>{{ strtoupper($post->title) }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Image</th>
                        <td>
                            <div style="max-height: 300px; max-width: 300px; overflow: hidden">
                                <img class="img-fluid" src="{{ asset('back_temp/dist/postImages/'. $post->image ) }}" alt="post image">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Published At</th>
                        <td>{{ $post->published_at }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Slug</th>
                        <td>{{ $post->slug }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Author Name</th>
                        <td style="text-transform: capitalize">{{ $post->user->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Category</th>
                        <td>{{ $post->category->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Post Tags</th>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-info">{{ $tag->name }}</span>
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Description</th>
                        <td>{!! $post->description !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
