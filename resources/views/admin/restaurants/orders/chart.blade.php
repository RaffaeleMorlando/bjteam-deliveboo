@extends('layouts.backend')

@section("main")
  <div id="chart_container" class="container">
    <canvas id="myChart"></canvas>
  </div>
@endsection

@section("backend-script")
  <script src="{{ asset("js/partials/admin/chart-script.js") }}" charset="utf-8"></script>
@endsection
