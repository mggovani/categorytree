<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="assets/img/fr-05.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{Auth::User()->name}}</h5>
          
          <li>
            <a class="{{ request()->is('category') ? 'active' : '' }}" href="{{route('category')}}">
              <i class="fa fa-tag"></i>
              <span>Category</span>
              </a>
          </li>
          <li>
            <a class="{{ request()->is('subcategory') ? 'active' : '' }}" href="{{route('subcategory')}}">
              <i class="fa fa-tag"></i>
              <span>Subcategory</span>
              </a>
          </li>
          <li>
            <a class="{{ request()->is('item') ? 'active' : '' }}" href="{{route('item')}}">
              <i class="fa fa-tag"></i>
              <span>Item</span>
              </a>
          </li>
          <li>
            <a class="{{ request()->is('tree') ? 'active' : '' }}" href="{{route('tree')}}">
              <i class="fa fa-tag"></i>
              <span>Treeview</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>