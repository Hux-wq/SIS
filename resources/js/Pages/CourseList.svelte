<script>
    import PageLayout from './layouts/PageLayout.svelte';


    export let auth;
    export let errors = {};

</script>

<PageLayout auth={auth} errors={errors} title={'Course List'}>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title yellow">Courses</h5>


            <!-- Table with stripped rows -->
            <table class="h-txt-theme bg-transparent w-100">
              <thead>
                <tr>
                  <th >
                    <b>N</b>o#
                  </th>
                  <th>Code</th>
                  <th>Name</th>
                  <th  data-type="date" data-format="YYYY/DD/MM">Date Added</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Unity Pugh</td>
                  <td>9958</td>
                  <td>Curicó</td>
                  <td>2005/02/11</td>
                  <td><button class="btn btn-primary">View Profile</button></td>
                </tr>
                <tr>
                  <td>Theodore Duran</td>
                  <td>8971</td>
                  <td>Dhanbad</td>
                  <td>1999/04/07</td>
                  <td><button class="btn btn-primary">View Profile</button></td>
                </tr>
                <tr>
                  <td>Kylie Bishop</td>
                  <td>3147</td>
                  <td>Norman</td>
                  <td>2005/09/08</td>
                  <td><button class="btn btn-primary">View Profile</button></td>
                </tr>
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
</PageLayout>

