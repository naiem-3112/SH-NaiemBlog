@extends('layouts.back_temp')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Post List</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Post</li>
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
                                <h3 class="card-title">Edit Post</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">All Post</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2 ">
                        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Post Title</label>
                                    <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="title">
                                    @error('title')
                                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Post Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option style="display: none" selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == $post->category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div style="max-height: 200px; max-width: 200px; overflow: hidden">
                                                <img src="{{ asset('back_temp/dist/postImages/'. $post->image) }}" class="img-fluid" alt="Post Image">
                                            </div>
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    @foreach($tags as $tag)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                                               @foreach($post->tags as $post_tag)
                                               @if($post_tag->id == $tag->id)
                                                   checked
                                                @endif
                                                @endforeach
                                            >
                                            <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>

                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="4" class="form-control">{{ $post->description }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
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
