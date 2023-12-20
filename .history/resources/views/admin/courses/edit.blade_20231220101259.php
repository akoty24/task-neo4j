@extends('admin.layouts.master')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title"> edit Course</h2>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('Courses.update', $Course) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Course</label>
                                        <input type="text" name="name" id="simpleinput" class="form-control"
                                            value="{{ $Course->name }}">
                                        <span class="help-block">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div> <!-- /.col -->
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn mb-2 btn-primary">edit </button>
                            </div>
                        </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection
