<script>
    import { onMount } from 'svelte';

  
    let email = '';
    let password = '';
    let rememberMe = false;
    let errors = {
      email: null,
      password: null,
      inactivity: null
    };
  
    let csrfToken;
  
    // On mount, grab the CSRF token from the meta tag
    onMount(() => {
      csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    });
  
    const submitForm = async (event) => {
      event.preventDefault();
  
      // Reset errors before submission
      errors = { email: null, password: null };
  
      const formData = new FormData();
      formData.append('email', email);
      formData.append('password', password);
      formData.append('remember', rememberMe ? 'on' : '');
      formData.append('_token', csrfToken); // Add CSRF token to the request
  
      try {

          const response = await fetch('/login', {
            method: 'POST',
            headers: {
              'Accept': 'application/json',
            },
            body: formData,
          });
    
          if (!response.ok) 
          {
              if (response.status === 500)
              {
                  errors.internal = "An internal server error occurred. Please try again later.";
              }
              else if(response.status === 419)
              {
                  errors.internal = "The session expired. Please refresh the page.";
              } 
              else 
              {
                  const data = await response.json();
                  errors.email = data.errors?.email || null;
                  errors.password = data.errors?.password || null;
              }
          }
          else 
          {
            window.location.href = '/dashboard'; 
          }
          
      } 
      catch (error) 
      {
        console.error('An error occurred:', error);
      }
    };


</script>
  


<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex flex-column align-items-center py-4">
              <a href="/" class="p-2">
                <img class="" style="height: 150px" src="https://elc-public-images.s3.ap-southeast-1.amazonaws.com/bcp-olp-logo-mini2.png" alt="Logo">
              </a>
              <div class="d-none d-lg-block">
                <h5 style="color:#fff;">Student Information System</h5>
            </div>
            </div><!-- End Logo -->

            <div class="card mb-3" style="background: linear-gradient(to bottom right, #18212f, #0c1e42);">

              <div class="card-body">

                <div class="pt-3 pb-2">
                  <h5 class="text-center pb-0 fs-4" style="color:#fff;">Login to Your Account</h5>
                </div>

                <form on:submit={submitForm} class="row g-3 px-2 needs-validation">
                    <!-- Email Address -->
                    <div class="col-12 mt-2">
                      <label for="email" class="form-label" style="color:#fff">Email</label>
                      <div class="input-group has-validation">
                        <input
                          id="email"
                          class="form-control block mt-1 w-full bg-secondary-subtle"
                          type="email"
                          bind:value={email}
                          name="email"
                          autocomplete="username"
                        />
                      </div>
                      {#if errors.email}
                        <div class="alert alert-danger mt-1 py-2 text-light w-100" style="background-color: red;" >
                          {errors.email}
                        </div>
                      {/if}
                    </div>
                  
                    <!-- Password -->
                    <div class="col-12 mt-2">
                      <label for="password" class="form-label" style="color:#fff">Password</label>
                      <div class="input-group has-validation">
                        <input
                          id="password"
                          class="form-control block mt-1 w-full bg-secondary-subtle"
                          type="password"
                          bind:value={password}
                          name="password"
                          autocomplete="current-password"
                        />
                      </div>
                      {#if errors.password}
                      <div class="alert alert-danger mt-1 py-2 text-light w-100" style="background-color: red;" >
                        {errors.password}
                      </div>
                      {/if}
                      {#if errors.internal}
                      <div class="alert alert-danger mt-1 py-2 text-light w-100" style="background-color: red;" >
                        {errors.internal}
                      </div>
                      {/if}
                    </div>
                  
                    <!-- Remember Me -->
                    <div class="col-12 col-lg-6 mt-2">
                      <label for="remember_me" class="inline-flex items-center">
                        <input
                          id="remember_me"
                          type="checkbox"
                          bind:checked={rememberMe}
                          name="remember"
                        />
                        <span style="color:#fff">Remember me</span>
                      </label>
                    </div>
                  
                    <!-- Forgot Password -->
                    <div class="col-12 col-lg-6 mt-2">
                      <a
                        class=""
                        href="/forgot-password"
                      >
                        Forgot your password?
                      </a>
                    </div>
                  
                    <!-- Submit Button -->
                    <div>
                      <button type="submit" class="btn btn-primary mt-2 w-100">Log in</button>
                    </div>
                  </form>

              </div>
            </div>

            <div class="credits">
              BCP SIS Team Cluster-N 
            </div>

          </div>
        </div>
      </div>

    </section>

</div>