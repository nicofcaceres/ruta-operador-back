@extends('base')

@section('body')
<div class="body-pd-cl" id="body-pd">

  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img"> <i class='bx bxs-user-circle'></i></div>
    {{-- <div class="header_img"> 
      <img src="{{asset('assets/img/user_100px.png')}}" alt=""> 
    </div> --}}
  </header>

  @include('leftmenu')
  <!--Container Main start-->
  <div >

  </div>
  <div id="content-wrapper">
    @yield('content-wrapper')
  </div>
  <!--Container Main end-->
</div>
@endsection