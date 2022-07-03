@extends('layouts.app')
@section('title')
Tutoring Tube | Timetable Manage
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item custom-bread"><a href="#">Timetable</a></li>
                    <li class="breadcrumb-item custom-bread"><a href="/timetable">View</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Timetable</li>
                </ol>
                <a href="/timetable" class="btn btn-success float-right btn-green"><i class="fa fa-arrow-left"></i> View all</a>
            </nav>
        </div>
        {{-- <div class="col-md-4">
            
        </div> --}}
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            @include('include.message')
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-md-12">
            <div class="card green-card">
                <div class="card-header green-header">
                    <h4 class="fw-400 f-20">Shedule new lecture time</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('timetable.store') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lecture">Lecturer Name <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lecturer" value="{{ old('lecturer') }}" placeholder="Enter name" required>
                                    @error('lecturer')
                                        <span class="badge badge-danger text-capital">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title" required>
                                    @error('title')
                                        <span class="badge badge-danger text-capital">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date <span class="text text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                        <span class="badge badge-danger text-capital">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Time <span class="text text-danger">*</span></label>
                                    <input type="time" class="form-control" name="time" value="{{ old('time') }}" required>
                                    @error('time')
                                        <span class="badge badge-danger text-capital">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image File</label>
                                    <input type="file" class="form-control-file">
                                  </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description <span class="text text-danger">*</span></label>
                                    <textarea class="form-control text-capital" name="description" required>
                                        {{ old('description') }}
                                    </textarea>
                                    @error('description')
                                        <span class="badge badge-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
