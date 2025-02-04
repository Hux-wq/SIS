<script>
    import CreateDepartment from './components/department/CreateDepartment.svelte';
    import DeleteDepartment from './components/department/DeleteDepartment.svelte';
    import EditDepartment from './components/department/EditDepartment.svelte';
    import PageLayout from './layouts/PageLayout.svelte';

    export let departments;
    export let auth;
    export let errors = {};

</script>

<style>
   td,th{
    background: transparent !important;
    text-transform: capitalize;
  }
  

</style>

<PageLayout auth={auth} errors={errors} title={'Department'}>
  <section class="section  ">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <h5 class="card-title yellow">Department</h5>
            <CreateDepartment />

            <hr>
            <table class="table">
              <thead>
                <tr>
                  <th ><b>N</b>o#</th>
                  <th >Code</th>
                  <th >Name</th>
                  <th >Head</th>
                  <th >Created by</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                {#if departments.length > 0}
                  {#each departments as department}
                    <tr>
                      <td>{department.id}</td>
                      <td class="text-uppercase">{department.code}</td>
                      <td>{department.name}</td>
                      <td>{department.head}</td>
                      <td>{department.created_by}</td>
                      <td class="d-flex gap-1">
                        <EditDepartment departmentId={department.id} />
                        <DeleteDepartment departmentId={department.id} />
                      </td>
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

