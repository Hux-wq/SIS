<script>
    import SideBar from './layouts/SideBar.svelte';
    import Header from './layouts/Header.svelte';
    import HeadTitle from './layouts/HeadTitle.svelte';
    import Error from './layouts/Error.svelte';


    export let auth;
    export let errors = {};

</script>

<HeadTitle title={'Students'} />

<div id="main">
  <Header username={auth.user.name} userid={auth.user.id} useremail={auth.user.email}  />
  <SideBar username={auth.user.name} userid={auth.user.id} />
  <Error errors={errors} />

    <x-slot name="header">
        <h2 class="">
            Students Records 
        </h2>
    </x-slot>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title yellow">Find Students</h5>

  
                <!-- Table with stripped rows -->
                <table class="h-txt-theme bg-transparent w-100">
                  <thead>
                    <tr>
                      <th >
                        <b>N</b>ame
                      </th>
                      <th>Ext.</th>
                      <th>City</th>
                      <th  data-type="date" data-format="YYYY/DD/MM">Start Date</th>
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
</div>