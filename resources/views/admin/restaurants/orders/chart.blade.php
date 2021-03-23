@extends('layouts.backend')

@section("main")
  <div id="chart_box" class="container" style="width: 100%; height: 100%">
    <select name="" id="" v-model="year" @change="filterByYear">
      <option value="2021">2021</option>
      <option value="2020">2020</option>
      <option value="2019">2019</option>
    </select>
    <canvas id="myChart"></canvas>
  </div>
@endsection
