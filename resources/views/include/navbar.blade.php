<header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{route('category')}}" class="logo"><b>TREE<span>VIEW</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
                            <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="logout">Logout</a></li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
            </form>
        </ul>
      </div>
    </header>