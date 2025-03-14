<script>
  import PageLayout from './layouts/PageLayout.svelte';
    import PageTitle from './layouts/PageTitle.svelte';

    export let auth;
    // export let user;
    export let errors = {};
    export let userEnrolled;
    export let courseCount;
    export let programCount;
    export let departmentCount;

</script>

<PageLayout auth={auth} errors={errors} title={['Dashboard']}>
  <section class="section dashboard">
    <div class="row">

      <div class="col-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">

                <div class="d-flex align-items-center p-3">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h5>Students Enrolled</h5>
                    <h6>{userEnrolled}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                

                <div class="d-flex align-items-center p-3">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h5>Courses</h5>
                    <h6>{courseCount}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">

                <div class="d-flex align-items-center p-3">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5>Department</h5>
                    <h6>{departmentCount}</h6>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">

                <div class="d-flex align-items-center p-3">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5>Program</h5>
                    <h6>{programCount}</h6>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">

                <div class="d-flex align-items-center p-3">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5>Classes</h5>
                    <h6>4</h6>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


              <div class="card-body">

                <div class="d-flex align-items-center p-3">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5>Department</h5>
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
</PageLayout>
