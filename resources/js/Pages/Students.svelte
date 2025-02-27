<script>
    import PageLayout from './layouts/PageLayout.svelte';


    export let auth;
    export let errors = {};
    export let users;


  function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
      weekday: 'long',  
      year: 'numeric', 
      month: 'long',  
      day: 'numeric',
    });
  }

</script>

<style>
  td,th{
   background: transparent !important;
   text-transform: capitalize;
 }
 

</style>

<PageLayout auth={auth} errors={errors} title={'Students'}>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title yellow">Find Students</h5>


            <!-- Table with stripped rows -->
            <table class="table h-txt-theme bg-transparent w-100">
              <thead>
                <tr>
                  <th class="h-txt-theme" >
                    <b>N</b>ame
                  </th>
                  <th class="h-txt-theme">Age</th>
                  <th class="h-txt-theme">Gender</th>
                  <th class="h-txt-theme">Email</th>
                  <th class="h-txt-theme">Updated at</th>
                  <th class="h-txt-theme">Action</th>
                </tr>
              </thead>
              <tbody>
                {#if users.length > 0}
                    {#each users as user}
                    <tr>
                        <td class="sub">{user.name}</td>
                        <td class="sub">{user.user_basic_info.age}</td>
                        <td class="sub text-capitalize">{user.user_basic_info.sex}</td>
                        <td class="sub text-lowercase">{user.email}</td>
                        
                        <td>{formatDate(user.created_at)}</td>
                        <td><a href="/Students/Profile/View/{user.id}" class="btn btn-primary">View Profile</a></td>
                    </tr>
                    {/each}
                {:else}
                  <tr class="w-100 border text-center">
                    <td colspan=6>
                        <h4 class="pt-4 fw-bolder"> Theres no records in the database</h4>
                    </td>
                </tr>
                {/if}
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
</PageLayout>

