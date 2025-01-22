<script>
    import  DarkMode  from './DarkMode.svelte';
    import  Logout  from './Logout.svelte';


    export let username;
    export let useremail;
    export let userid;
</script>


<ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/" data-bs-toggle="dropdown">
        <img src="img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2 h-txt-theme">{username}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile pt-0">
        <li class="dropdown-header">
            <h6 class="primary-theme">{useremail}</h6>
            <span>{userid}</span>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center header-text-theme" href="/profile">
            <i class="fa-solid fa-user"></i>
            <span>My Profile</span>
            </a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <a class="dropdown-item d-flex align-items-center header-text-theme" href="users-profile.html">
            <i class="fa-solid fa-gear"></i>
            <span>Account Settings</span>
            </a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <DarkMode />

        <li>
            <hr class="dropdown-divider">
        </li>

        <Logout />

        </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

</ul>
