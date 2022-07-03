@extends('layouts.app')
@section('title')
Tutoring Tube | Timetable Manage
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item custom-bread"><a href="{{ route('timetable.create') }}">Create</a></li>
                    <li class="breadcrumb-item active custom-bread" aria-current="page">View</li>
                </ol>
            </nav>
            <a href="{{ route('timetable.report') }}" class="btn btn-success float-right btn-green"><i
                    class="fa fa-plus"></i> Generate a report</a>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            @include('include.message')
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card green-card mb-5">
                <div class="card-header green-header">
                    <h4 class="fw-400 f-20">Timetable View</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="timetable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Lecture Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timetables as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->lecturer }}</td>
                                <td><span class="badge badge-primary">{{ $value->date }}</span></td>
                                <td>{{ $value->time }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($value->description, 100, $end='...') }}</td>
                                <td>
                                    <a href="{{ route('timetable.edit', $value->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#{{ $value->id }}"><button class="btn btn-danger btn-sm delete" type="button" data-id="{{ $value->id }}"><i class="fa fa-trash"></i></button></a>
                                </td>

                                <div class="modal fade" id="{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form action="{{ route('timetable.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirm to delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                <div class="modal-body">
                                                  <h6>Do you want to delete this ?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                  <button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</button>
                                                </div>
                                              </div>
                                        </form>
                                    </div>
                                  </div>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#timetable').DataTable();
    });

    $('.delete').click(function(){
        var modalId = $(this).data('id');

        $('#'+modalId).modal('show')
    });
    

</script>
@endsection
