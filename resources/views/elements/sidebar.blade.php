
    <div class="sidebar close">
      {{-- <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">LOGO</span>
  
      </div> --}}
      <div class="image mt-5">
        <img   src="{{session()->get('staffImg')}}"  width="60px" height="60px" style="border-radius: 50%;">  
          
        <p>{{session()->get('staffName')}}</p>
      </div>
      <ul class="nav-links">
        <!-- <li>
          <a href="#">
            <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Dashboard</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Dashboard</a></li>
          </ul>
        </li> -->
        <li>
            <a href="{{route('member.view')}}">
              <i class="fa-regular fa-user"></i>
              <span class="link_name">Members</span>
            </a>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{route('member.view')}}">Members</a></li>
          </ul>
        </li>
        <li>
        <li>
            <a href="{{route('book.view')}}">
              <i class="fa-solid fa-book"></i>
              <span class="link_name">Books</span>
            </a>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{route('book.view')}}">Books</a></li>
          </ul>
        </li>
        <li>
            <a href="{{route('rental.view')}}">
              <i class="fa-solid fa-truck-ramp-box"></i>
              <span class="link_name">Rental</span>
            </a>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{route('rental.view')}}">Rentals</a></li>
          </ul>
        </li>
        <li>
            <a href="{{route('category.view')}}">
              <i class="fa-solid fa-list"></i>
              <span class="link_name">Categories</span>
            </a>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{route('category.view')}}">Categories</a></li>
          </ul>
        </li>
        <li>
            <a href="{{route('staff.view')}}">
              <i class="fa-solid fa-clipboard-user"></i>
              <span class="link_name">Staff</span>
            </a>
          <ul class="sub-menu">
            <li><a class="link_name" href="{{route('staff.view')}}">Staff</a></li>
          </ul>
        </li>
    
        
        <li>
          <a href="{{route('Board.view')}}">
            <i class='bx bx-line-chart'></i>
            <span class="link_name">Charts</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{route('Board.view')}}">Charts</a></li>
          </ul>
        </li>
        
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="link_name">About Me</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">About Me</a></li>
          </ul>
        </li>
        <li>
      <div class="profile-details justify-content-center">
       
       
       <a href="{{route('auth.logout')}}" style="color: white">Log Out</a> <i class='bx bx-log-out' ></i>
      </div>
    </li>
  </ul>
    </div>
