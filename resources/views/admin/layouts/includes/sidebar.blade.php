<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('dashboard')}}">
            <div class="avatar avatar-md" >
                <img src="{{ asset('logo.png') }}" alt="logo">
            </div>
          </a>
      </div>

      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
            <a class="nav-link d-flex align-items-center" href="#dashboard">
                <i class="fe fe-home fe-16" style="font-size: 1.0rem"></i>
                <span class="ml-3 item-text" style="font-size: 2rem; padding-top:4px">لوحة التحكم</span>
            </a>
          </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>المكونات</span>
      </p>

      <ul class="navbar-nav flex-fill w-100 mb-2">

        <li class="nav-item dropdown">
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-box fe-16" style="font-size: 1.0rem"></i>
              <span class="ml-3 item-text" style="font-size: 1.5rem">students</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
              <li class="nav-item">
                <a class="nav-link pl-3" style="font-size: 1.0rem" href="{{route('students.index')}}"><span class="ml-1 item-text">students</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" style="font-size: 1.0rem" href="{{route('students.create')}}"><span class="ml-1 item-text">add</span></a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-box fe-16" style="font-size: 1.0rem"></i>
              <span class="ml-3 item-text" style="font-size: 1.5rem">courses</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
              <li class="nav-item">
                <a class="nav-link pl-3" style="font-size: 1.0rem" href="{{route('courses.index')}}"><span class="ml-1 item-text">courses</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" style="font-size: 1.0rem" href="{{route('courses.create')}}"><span class="ml-1 item-text">add</span></a>
              </li>
            </ul>
          </li>




        </ul>

    </nav>
  </aside>
