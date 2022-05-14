@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <h1>Welcome to Dashboard</h1>
    <div class="row">
        <!-- ./col -->
        <div class="col">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h4>Siswa</h4>

                    <h5 id="revenue">{{ $siswa }}</h5>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h4>Pengajar</h4>

                    <h5 id="revenue">{{ $pengajar }}</h5>
                </div>

            </div>
        </div>
    </div>
@endsection