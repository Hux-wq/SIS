<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
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

                    <form method="POST" action="{{ route('login') }}" class="row g-3 px-2 needs-validation">
                        @csrf
                
                        <!-- Email Address -->
                        <div class="col-12 mt-2">
                            <x-input-label for="email" :value="__('Email')" style="color:#fff"/>
                            <div class="input-group has-validation">
                                <x-text-input id="email" class="block mt-1 w-full bg-secondary-subtle" 
                                                type="email" 
                                                name="email" 
                                                :value="old('email')" 
                                                autofocus 
                                                autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="m-0 mt-1 py-0 ps-1" style="list-style:none" />
                        </div>
                
                        <!-- Password -->
                        <div class="col-12 mt-2">
                            <x-input-label for="password" :value="__('Password')" style="color:#fff"/>
                            <div class="input-group has-validation">
                                <x-text-input id="password" class="block mt-1 w-full bg-secondary-subtle"
                                                type="password"
                                                name="password"
                                                autocomplete="current-password" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="m-0 mt-1 py-0 ps-1" style="list-style: none" />
                        </div>
                
                        <!-- Remember Me -->
                        <div class="col-12 col-lg-6 mt-2">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="" name="remember">
                                <span style="color:#fff">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                
                        <div class="col-12 col-lg-6 mt-2">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                
                        </div>
                        <div>
                            <x-primary-button class="mt-2">
                                {{ __('Log in') }}
                            </x-primary-button>
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
</x-guest-layout>
