@extends('layouts.homeLayout')
@section('homecontent')

<Style>
.headerImg
{
  border-style: solid;
  border-color: red;
  width: 10%;
  height: 100px;
  float: left;
  margin-top: 0%;
  background-image: url("/images/logo.png")
}
.mission
{
  background-color: white;
  padding: 5px;
  text-justify: auto;
  color: darkslategrey;
  box-shadow: 10px green; 
  border: 2px;
}
</Style>
<div class="jumbotron text-center" style="margin-bottom:0">
  
  <h1>Housing Society App Builder</h1>
</div>
      
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <a class="navbar-brand" href="#">Navbar</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">

    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="/HousingSociety/public/adminReg/create">Sign Up</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/HousingSociety/public/login/create">Sign In</a>
      </li>   
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">

    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>

      <ul class="nav nav-pills flex-column">

        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>

      </ul>

      <hr class="d-sm-none">
    </div>

    <div class="col-sm-8">
      <h2>Our Mission</h2>
      <div class="fakeimg mission">
        <h4>
            <p></p>
            <p>Build the software solution to eliminate management crisis and to</p>
            <p>provide an exceptional assisted living lifestyle through a dedicated </p>
            <p>and compassionate team, innovative communities and enriched </p>
            <p>services that promote dignity, choice and independence.</p> 
        </h4>
          
      </div>
      <br>
      <h2>Our Vision</h2>

      <div class="fakeimg mission">
        <h4>
          <p></p>
          <p>Understand and Respond to the evolving needs and desires of society</p>
          <p>residents. Be innovative and lead the industry in change in community</p>
          <p>design, resident services, resident satisfaction and administrative</p>
          <p>management efficiency.</p> 
        </h4>
      </div>
    </div>
  </div>
</div>
      
  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
  </div>
</div>
@endsection



