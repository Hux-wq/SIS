<script>
    import { onMount } from "svelte";
    import PageLayout from './layouts/PageLayout.svelte';
    import CreateSection from './components/section/CreateSection.svelte';
    import DeleteProgram from './components/program/DeleteProgram.svelte';
    import EditProgram from './components/program/EditProgram.svelte';

    export let sections = [];
    export let departments;
    export let users;
    export let auth;
    export let errors = {};


    const getDepartmentName = (departmentId) => {
        const department = departments.find(dept => dept.id === departmentId);
        return department ? department.name : 'Unknown Department';
    };

    const getTeacherName = (teacherId) => {
        const teacher = users.find(user => user.id === teacherId);
        return teacher ? teacher.name : 'Unknown Teacher';
    };


    onMount(  () => {

        let table = new DataTable('#sectionTable');
    });
    
</script>

<style>
   td,th{
    background: transparent !important;
    text-transform: capitalize;
  }
  

</style>

<PageLayout auth={auth} errors={errors} title={['Section']}>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <h5 class="card-title yellow">Section</h5>
            <CreateSection depts={departments} teachers={users}/>

            <hr>
            <table id="sectionTable">
              <thead>
                <tr>
                  <th class="h-txt-theme"><b>N</b>o#</th>
                  <th class="h-txt-theme">Section</th>
                  <th class="h-txt-theme">Year</th>
                  <th class="h-txt-theme">Adviser</th>
                  <th class="h-txt-theme">Department</th>
                  <th class="h-txt-theme">Created by</th>
                  <th class="h-txt-theme">Action</th>
                </tr>
              </thead>
              <tbody>
                {#if sections.length > 0}
                    {#each sections as sect}
                    <tr>
                        <td class="sub">{sect.id}</td>
                        <td class="text-uppercase sub">{sect.year}{sect.semester}0{'0'+sect.section}</td>
                        <td class="sub">{sect.year}</td>
                        <td class="sub">Prof. {getTeacherName(sect.adviser)}</td>
                        <td class="sub">{getDepartmentName(sect.department_id)}</td>
                        <td class="sub">{sect.created_by}</td>
                        <td class="d-flex gap-1">
                        <EditProgram programId={sect.id} departments={departments}/>
                        <DeleteProgram programId={sect.id} code={sect.code} /> 
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

