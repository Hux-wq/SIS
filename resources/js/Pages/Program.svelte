<script>
    import PageLayout from './layouts/PageLayout.svelte';
    import CreateProgram from './components/program/CreateProgram.svelte';
    import DeleteProgram from './components/program/DeleteProgram.svelte';
    import EditProgram from './components/program/EditProgram.svelte';

    export let programs = [];
    export let departments;
    export let auth;
    export let errors = {};


    const getDepartmentName = (departmentId) => {
        const department = departments.find(dept => dept.id === departmentId);
        return department ? department.name : 'Unknown Department';
    };
    
</script>

<style>
   td,th{
    background: transparent !important;
    text-transform: capitalize;
  }
  

</style>

<PageLayout auth={auth} errors={errors} title={'Program'}>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <h5 class="card-title yellow">Program</h5>
            <CreateProgram depts={departments} />

            <hr>
            <table class="table">
              <thead>
                <tr>
                  <th ><b>N</b>o#</th>
                  <th >Code</th>
                  <th >Name</th>
                  <th >Department</th>
                  <th >Created by</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                {#if programs.length > 0}
                    {#each programs as program}
                    <tr>
                        <td>{program.id}</td>
                        <td class="text-uppercase">{program.code}</td>
                        <td>{program.name}</td>
                        <td>{getDepartmentName(program.department_id)}</td>
                        <td>{program.created_by}</td>
                        <td class="d-flex gap-1">
                        <EditProgram programId={program.id} departments={departments}/>
                        <DeleteProgram programId={program.id} code={program.code} /> 
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

