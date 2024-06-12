@extends('layouts.admin')

@section('title', 'Admin Dashboard ')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Dashboard</h2>
            <p>Selamat Datang Admin!</p>
        </div>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
                <div class="col-sm-12">
                    <div class="card-group hk-dash-type-2">
                        
                        <div class="card card-sm">
                            <div class="card-body">
                                {!! $calendar->calendar() !!}
                            </div>
                        </div>

                        
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection