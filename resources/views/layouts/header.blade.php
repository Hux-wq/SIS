<header id="header" class="header fixed-top d-flex align-items-center bg-box-theme">

    <div class="d-flex align-items-center justify-content-between">
      <i class="fa-solid fa-bars fs-5 toggle-sidebar-btn header-text-theme"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto" id="MenuOptions">
      {{-- <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 header-user-name">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile ">
            <li class="dropdown-header">
              <h6 class="h-txt-theme">Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider border border-secondary">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center header-text-theme" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center header-text-theme" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            

            <li>
              <a id="toggleDarkMode" class="dropdown-item d-flex align-items-center" style="cursor: pointer">
                <i class="bi bi-question-circle"></i>
                <span id="toggleDarkModeText"></span>
              </a>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  
                  <button type="submit" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-box-arrow-right"></i>
                      <span>Log Out</span>
                  </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul> --}}
    </nav><!-- End Icons Navigation -->

  </header>