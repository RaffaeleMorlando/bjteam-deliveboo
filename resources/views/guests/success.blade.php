@extends('layouts.guest')

@section('guest-main')
<div id="loading_container">
   <div class="checking_container" v-if="checking">
      <div id="loadingIndicator">
         <div class="loadingBar" id="loadingBar1"></div>
         <div class="loadingBar" id="loadingBar2"></div>
         <div class="loadingBar" id="loadingBar3"></div>
         <div class="loadingBar" id="loadingBar4"></div>
      </div>
      <h1 id="description">
         Checking your order...
      </h1>
   </div>
   

   <div class="circle_container" v-if="checking == false">
      <div class="circle-border">

      </div>
      <div class="circle">
          <div class="success">

          </div>
      </div>
      <h3 class="completed_order">Order completed successfully</h3>
   </div>
   
</div>
   
@endsection

@section('page-guest-script')
    <script src="js/partials/guest/success.js"></script>
@endsection