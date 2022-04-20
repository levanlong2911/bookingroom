<body>
    <div class="sidebar-container">
      <div class="sidebar-logo">
        <img class="logo" src="/home/img/logo.png" alt="">
      </div>
      <div>
        <div class="hello">
          Xin chào: <strong>{{ Auth::user()->name }}</strong>
          <a href="{{ route('logout.user') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-decoration: none; text-align: center; margin-left: 31%;">Logout</a>
          <form action="{{ route('logout.user') }}" method="post" class="d-none" id="logout-form">@csrf</form>
        </div>
      </div>
      <ul class="sidebar-navigation">
        <li class="header"></i>FACILITIES</li>
        <li>
          <a href="#">
            <i class="fa fa-home" aria-hidden="true"></i> Meeting rooms
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Help guide
          </a>
        </li>
        <li class="header">COMMUNITY</li>
        <li>
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> Members
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-cog" aria-hidden="true"></i> Newsfeed
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Local area guide
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Benefits
          </a>
        </li>
      </ul>
    </div>
    
    <div class="content-container">
      
      <div class="row ml-5" id="mtr">
        <div >Meeting rooms</div>
      </div>

      