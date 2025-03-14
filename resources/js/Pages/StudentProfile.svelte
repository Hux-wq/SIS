<script>
    import Attendance from './components/student-profile/Attendance.svelte';
import GradeGraph from './components/student-profile/GradeGraph.svelte';
    import GradePerformance from './components/student-profile/GradePerformance.svelte';
    import GradeSummary from './components/student-profile/GradeSummary.svelte';
    import ProfileSection from './components/student-profile/ProfileSection.svelte';
    import PageLayout from './layouts/PageLayout.svelte';
    import PageTitle from './layouts/PageTitle.svelte';


    export let auth;
    export let errors = {};
    export let students;
    export let grades;
    console.log(grades);
      

</script>


<PageLayout auth={auth} errors={errors} title={['Student',students.name]}>
    
      <section class="section profile">
        
        <ProfileSection  students={students}/>

      </section>

      <section class="section profile">
        
        <Attendance />

      </section>

      <section class="section profile">
        
        <GradePerformance students={students} grades={grades}/>

      </section>
      
</PageLayout>

