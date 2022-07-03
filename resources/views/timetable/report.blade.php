@extends('layouts.app')
@section('title')
Tutoring Tube | Timetable Manage
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item custom-bread"><a href="#">Timetable</a></li>
                    <li class="breadcrumb-item custom-bread"><a href="/timetable">View</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Timetable Report</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="col-md-4">
            
        </div> --}}
    </div>

    <div class="row mt-3">
        @foreach ($timetables as $value)
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card card-margin">
                    <div class="card-header no-border">
                        <h5 class="card-title">{{ $value->title }}</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-primary">
                                    <span class="widget-49-date-day">@php $time = strtotime($value->date); $date = date('d',$time); echo($date); @endphp</span>
                                    <span class="widget-49-date-month">@php $time = strtotime($value->date); $date = date('M',$time); echo($date); @endphp</span>
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title">Lecturer : {{ $value->lecturer }}</span>
                                    <span class="widget-49-meeting-time">{{ $value->time }}</span>
                                </div>
                            </div>
                            <span class="widget-49-meeting-item mt-4">
                                <p class="mt-3 text-secondary fz-15">{{ $value->description }}</p>
                            </span>
                            {{-- <div class="widget-49-meeting-action">
                                <a href="#" class="btn btn-sm btn-flash-border-primary">View All</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {{ $timetables->links() }} --}}
    </div>
</div>

@endsection

@section('script')

@endsection
