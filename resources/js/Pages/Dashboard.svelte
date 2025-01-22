<script>
  import SideBar from './layouts/SideBar.svelte';
  import Header from './layouts/Header.svelte';
  import Error from './layouts/Error.svelte';
  import HeadTitle from './layouts/HeadTitle.svelte';


  export let user;
  export let auth;
  export let errors = {};
  
</script>

<HeadTitle title={'Dashboard'} />

<div id="main">
  <Header username={auth.user.name} userid={auth.user.id} useremail={auth.user.email} />
  <SideBar username={auth.user.name} userid={auth.user.id} />
  <Error errors={errors} />
  
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      welcome {user.name}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    <x-slot name="header">
        <h2 class="">
          {auth.user.name} Dashboard  
        </h2>
    </x-slot>

    <section class="section dashboard">
        <div class="row">

          <div class="col-12">
            <div class="row">
  
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="filter">
                    <a class="icon" href="/" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="/">Today</a></li>
                      <li><a class="dropdown-item" href="/">This Month</a></li>
                      <li><a class="dropdown-item" href="/">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title yellow">Students</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                      </div>
                      <div class="ps-3">
                        <h6>30,000</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->
  
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
  
                  <div class="filter">
                    <a class="icon" href="/" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="/">Today</a></li>
                      <li><a class="dropdown-item" href="/">This Month</a></li>
                      <li><a class="dropdown-item" href="/">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title primary-theme yellow">Class</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>45</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->
  
              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">
  
                <div class="card info-card customers-card">
  
                  <div class="filter">
                    <a class="icon" href="/" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
  
                      <li><a class="dropdown-item" href="/">Today</a></li>
                      <li><a class="dropdown-item" href="/">This Month</a></li>
                      <li><a class="dropdown-item" href="/">This Year</a></li>
                    </ul>
                  </div>
  
                  <div class="card-body">
                    <h5 class="card-title primary-theme yellow">Department</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>4</h6>
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div>

            </div>
          </div>
  
        </div>
      </section>
</div>