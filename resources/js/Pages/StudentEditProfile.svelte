<script>
    
    import EditPersonalInformation from './components/student-edit-profile/EditPersonalInformation.svelte';
import ProfileSection from './components/student-profile/ProfileSection.svelte';
    import PageLayout from './layouts/PageLayout.svelte';


    export let auth;
    export let errors = {};
    export let students;
    console.log('student: '+ students);
      

</script>


<PageLayout auth={auth} errors={errors} title={['Student',students.name,'Edit Profile']}>

        <section class="section profile">
        
            <EditPersonalInformation students={students} />

        </section>

</PageLayout>

