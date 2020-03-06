@extends('admin.adminLayout')
<style>
        .contentdiv
    {
      float: left;
      width: 100px;
      height: 100px;
      width: 1000px;
      height: 150%;
      margin-left: 30%;
      margin-right: 30%;
      margin-top: 80px;
      padding: 3%;
      position: absolute;
    }
</Style>
@section('content')
  @include('admin.header.header')
  @include('admin.sidebar.sideNavBar')
  
  <div class="contentdiv">
    @yield('adminContent')
  </div>
@endsection