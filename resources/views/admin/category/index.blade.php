@extends('layouts.back_temp')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                <h3 class="card-title">Category List</h3>
                                <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories->count())
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->id}}</td>
                                        <td>
                                                <a href="{{ route('category.show', $category->id) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>

                                            <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick=" alert('Are You Sure TO DELETE!')" class="btn btn-xs btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <td colspan="5">
                                    <p style="text-align: center">No categories available</p>
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
