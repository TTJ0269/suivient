@extends('layouts.appbarchart')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Information du suivi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Bar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                <div class="container px-4 mx-auto">      

                    <!-- BAR CHART -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Temps passé par fonction / Minute</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="chart">
                          <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                        </div>
                        <p> F1: {{$tabvaleurfonction[0]}} </p>
                        <p> F2: {{$tabvaleurfonction[1]}} </p>
                        <p> F3: {{$tabvaleurfonction[2]}} </p>
                        <p> F4: {{$tabvaleurfonction[3]}} </p>
                        <p> F5: {{$tabvaleurfonction[4]}} </p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
