
<header class="header dark-bg" style="height:5%">

  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
      <i class="icon_menu">
      </i>
    </div>
  </div>

  
  <a href="/HousingSociety/public/" class="logo">
    <!--logo start-->
      Housing Society <span class="lite">App Builder </span>
    <!--logo end-->
  </a>
  
  
  <div class="nav search-row" id="top_menu">
    <!--  search form start -->
      <ul class="nav top-menu">
        
        <li>
          <form class="navbar-form">
            <input class="form-control" placeholder="Search" type="text">
          </form>
        </li>
      </ul>
    <!--  search form end -->
  </div>
  
  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">
        <li class="dropdown">

          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="profile-ava">
                <img alt="" src="img/avatar1_small.jpg">
            </span>
            <span class="username"> {{ session()->get('adminEmail', 'default') }} </span>
            <b class="caret"></b>
          </a>
          
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
              
            <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
            </li>

            <li>
              <a href="/HousingSociety/public/"><i class="icon_key_alt"></i> Log Out</a>
            </li>

          </ul>
      </ul>

    <!-- notificatoin dropdown end-->

  </div>

</header>
