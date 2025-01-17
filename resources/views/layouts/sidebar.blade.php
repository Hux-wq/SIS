
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <div class="flex items-center w-full p-1 pl-6" style="display: flex; align-items: center; padding: 3px; width: 40px; background-color: transparent; height: 4rem;">
        <div class="flex items-center justify-center" style="display: flex; align-items: center; justify-content: center;">
            <img src="https://elc-public-images.s3.ap-southeast-1.amazonaws.com/bcp-olp-logo-mini2.png" alt="Logo" style="width: 30px; height: auto;">
        </div>
      </div>

      <div style="display: flex; flex-direction: column; align-items: center; padding: 16px;">
        <div style="display: flex; align-items: center; justify-content: center; width: 96px; height: 96px; border-radius: 50%; background-color: #334155; color: #e2e8f0; font-size: 48px; font-weight: bold; text-transform: uppercase; line-height: 1;">
            <img src="{{asset('img/profile-img.jpg')}}" style="border-radius: 100%" alt="">
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 24px; text-align: center;">
            <div class="h-txt-theme" style="font-weight: 500; color: #fff;">
                {{auth()->user()->name}}
            </div>
            <div class="h-txt-theme" style="margin-top: 4px; font-size: 14px; color: #fff;">
                {{auth()->user()->id}}
            </div>
        </div>
    </div>

    <hr class="sidebar-divider">

      <div id="sidebarlayout">
        
      </div>

    </ul>

</aside><!-- End Sidebar-->