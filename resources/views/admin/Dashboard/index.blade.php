@extends('layouts.admin')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count">{{ $client }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Clients</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $pending }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Pending Reports</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-bed"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $room }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Rooms</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-building-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">{{ $cottage }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Cottages</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-bookmark-o"></i>
                    </div>
                    <div class="h4 mb-0">0</div>
                    <small class="text-muted text-uppercase font-weight-bold">Events</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="">{{ \Carbon\Carbon::now()->format('H:i:s') }}</span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Time</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection