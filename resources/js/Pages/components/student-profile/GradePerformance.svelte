<script>
    import GradeGraph from "./GradeGraph.svelte";
    import GradeSummary from "./GradeSummary.svelte";
    import { Link } from '@inertiajs/svelte';

    export let students;





</script>



<div class="row m-0">

    <div class="col-12 card">

        <h4 class="pt-3 ps-1">Grade Performance <Link href="/Students/Profile/View/{students.id}/AcademicPerformance"><i class="fa-solid fa-arrow-right"></i></Link></h4>

        <div class="row p-3">


            <div class="col-12 col-lg-6">

                <GradeGraph />

            </div>

            <div class="col-12 col-lg-6">

            <GradeSummary  />
              

            </div>
        </div>
    </div>

    
</div>