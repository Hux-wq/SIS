<script>
    import { Link } from '@inertiajs/svelte';

    export let students;

</script>



<div class="row m-0">

    <div class="col-12 card">

        <div class="row   p-3">

            <div class="col-12 col-lg-4">

                <div class="pt-2">

                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        
                        <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2>{students.name}</h2>
                        <h3>{students.email}</h3>
                        <div class="social-links mt-2">
                            <a href="/" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="/" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                            <a href="/" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="/" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                                
                    </div>
        
                </div>

            </div>

            <div class="col-12 col-lg-8">

                <div class="d-flex pt-4">
                    <h5 class="me-1">Profile Details</h5>
                    <Link class="link-offset-2" href="http://127.0.0.1:8000/Students/Profile/View/{students.id}/EditProfile">Edit <i class="fa-solid fa-pen-to-square"></i></Link>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                    <div class="col-lg-9 col-md-8">{students.user_basic_name_info.last_name}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                    <div class="col-lg-9 col-md-8">{students.user_basic_name_info.first_name}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Middle Name</div>
                    <div class="col-lg-9 col-md-8">{students.user_basic_name_info.middle_name}</div>
                </div>

                <div class="row">
                <div class="col-lg-3 col-md-4 label">Age</div>
                <div class="col-lg-9 col-md-8">{students.user_basic_info.age}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{students.user_basic_info.sex}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                </div>

            </div>
        </div>
    </div>

    
</div>