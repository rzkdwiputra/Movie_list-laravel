<div class="w-full bg-white h-[96px] drop-shadow-lg flex items-center">
  <div class="w-1/3 pl-5">
      <a href="/movies" class="uppercase text-base mx-5 text-black hover:text-develobe-500 duration-200 font-inter">Movies</a>
      <a href="/tv-shows" class="uppercase text-base mx-5 text-black hover:text-develobe-500 duration-200 font-inter">TV Shows</a>
  </div>

  <div class="w-1/3 flex items-center justify-center">
      <a href="/" class="font-bold text-5xl font-quicksand text-black hover:text-develobe-500 duration-200">RZ MOVIES</a>
  </div>

  <div class="w-1/3 flex justify-end pr-5">
    @if(auth()->check())
    <!-- Jika pengguna sudah masuk, tampilkan avatar -->
    <div class="relative inline-block text-left pr-5">
        <div>
            @php
                $emailHash = md5(strtolower(trim(auth()->user()->email)));
                $gravatarUrl = "https://www.gravatar.com/avatar/{$emailHash}?s=40&d=mp"; // Ganti ukuran (s) dan default (d) sesuai kebutuhan
            @endphp
            <img src="{{ $gravatarUrl }}" alt="Avatar" class="rounded-full h-10 w-10 cursor-pointer" id="profileDropdownButton">
        </div>
        
        <!-- Dropdown Menu -->
        <div class="hidden origin-top-right z-10 absolute  right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class="py-1" role="none">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200" role="menuitem">Profile</a>
                <hr>
                <form action="{{ route('logout') }}" method="post" role="none">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-red-500 hover:bg-gray-200" role="menuitem">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!--JavaScript untuk menangani dropdown -->
    <script>
        document.getElementById('profileDropdownButton').addEventListener('click', function() {
            var dropdownMenu = document.querySelector('.origin-top-right');
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown menu when clicking outside
        document.addEventListener('click', function(event) {
            var dropdownMenu = document.querySelector('.origin-top-right');
            if (event.target !== document.getElementById('profileDropdownButton') && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
@else
    <!-- Placeholder jika pengguna belum masuk -->
      <a href="/register">    
        <button  class="w-32 h-8 bg-gradient-to-r from-develobe-500 to-blue-900  rounded-md  text-white mr-2 shadow-md shadow-black/50  hover:rounded-full duration-200" >
     Sign Up</button>
      </a>
@endif

      <a href="/search" class="group">
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M28.525 27.475L22.9625 21.9C24.8885 19.6983 25.8834 16.8343 25.7372 13.9127C25.591 10.9911 24.315 8.24072 22.1787 6.24237C20.0425 4.24402 17.2132 3.15414 14.2883 3.20291C11.3635 3.25167 8.57212 4.43526 6.50367 6.50371C4.43521 8.57217 3.25163 11.3636 3.20286 14.2884C3.1541 17.2132 4.24397 20.0425 6.24233 22.1788C8.24068 24.315 10.9911 25.591 13.9126 25.7372C16.8342 25.8835 19.6983 24.8885 21.9 22.9625L27.475 28.525C27.6142 28.6642 27.803 28.7425 28 28.7425C28.1969 28.7425 28.3857 28.6642 28.525 28.525C28.6642 28.3858 28.7424 28.1969 28.7424 28C28.7424 27.8031 28.6642 27.6142 28.525 27.475ZM4.74996 14.5C4.74996 12.5716 5.32178 10.6866 6.39313 9.08319C7.46447 7.47981 8.98721 6.23013 10.7688 5.49218C12.5504 4.75422 14.5108 4.56114 16.4021 4.93734C18.2934 5.31355 20.0307 6.24215 21.3942 7.60571C22.7578 8.96927 23.6864 10.7066 24.0626 12.5979C24.4388 14.4892 24.2457 16.4496 23.5078 18.2312C22.7698 20.0127 21.5201 21.5355 19.9168 22.6068C18.3134 23.6782 16.4283 24.25 14.5 24.25C11.9151 24.2467 9.43708 23.2184 7.60932 21.3906C5.78155 19.5629 4.75326 17.0848 4.74996 14.5Z"
                  class="fill-black group-hover:fill-develobe-500 duration-200"></path>
          </svg>
      </a>
  </div>
</div>

