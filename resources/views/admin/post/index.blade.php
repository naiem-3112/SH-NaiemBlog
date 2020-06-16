@extends('layouts.back_temp')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post</li>
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
                                <h3 class="card-title">Post List</h3>
                                <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count())
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <div style="max-width: 70px; max-height: 70px">
                                                <img src="{{ asset('back_temp/dist/postImages/'.$post->image) }}" class="img-fluid" alt="">
                                            </div>
                                        </td>
                                        <td>{{$post->user_id}}</td>
                                        <td>{{$post->category_id}}</td>
                                        <td>
                                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>

                                            <form action="{{ route('post.destroy', $post->id) }}" method="post" style="display: inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick=" alert('Are You Sure TO DELETE!')" class="btn btn-xs btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <td colspan="6">
                                        <p style="text-align: center;">No post available</p>
                                    </td>
                                    @endif
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
