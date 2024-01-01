<html>
    <head>
        <title>RZMOVIE</title>
        @vite('resources/css/app.css')

        <style>
            /* Style untuk scrollbar horizontal */
            body::-webkit-scrollbar {
              height: 8px; 
            }
        
            body::-webkit-scrollbar-thumb {
              background-color:#38B6FF ; 
              border-radius: 8px; 
            }
        
            body::-webkit-scrollbar-track {
              background-color: #F3F4F6; /* Ubah warna track scrollbar sesuai keinginan Anda */
              border-radius: 8px; /* Ubah radius sudut track scrollbar sesuai keinginan Anda */
            }
        
            /* Style tambahan untuk scrollbar di dalam div dengan class 'overflow-x-auto' */
            .overflow-x-auto::-webkit-scrollbar {
              height: 6px; /* Sesuaikan tinggi scrollbar sesuai keinginan Anda */
            }
        
            .overflow-x-auto::-webkit-scrollbar-thumb {
              background-color: #38B6FF; 
              border-radius: 6px; 
              margin-left: 10px;
            }
        
            .overflow-x-auto::-webkit-scrollbar-track {
              background-color: #F3F4F6; /* Sesuaikan warna track scrollbar sesuai keinginan Anda */
              border-radius: 6px; /* Sesuaikan radius sudut track scrollbar sesuai keinginan Anda */
            }
          </style>

    </head>
    <body>
        <div class="w-full h-auto min-h-screen flex flex-col">

            <!--Header-->
            @include('header')
            
            <!-- welcome banner-->
            <div class="w-full h-[512px]  relative bg-black -z-10 ">
            
                <!--Banner Data-->
                @foreach($welcomebanner as $welcomebannerItem)

                @php
                $welcombannerImage = "{$imageBaseURL}/original{$welcomebannerItem['backdrop_path']}"
                @endphp
                
                <div class="flex flex-row items-center w-full h-full ">
                    <!--Image-->
                    <img src="{{$welcombannerImage}}" class="absolute w-full h-full object-cover">
                    <!--overlay-->
                    <div class="w-full h-full absolute bg-black bg-opacity-40"></div>

                    <div class="w-10/12 flex flex-col ml-28 z-10 ">
                        <span class="font-bold font-inter text-4xl text-white">Welcome To RZ MOVIE</span>
                        <span class="font-inter text-xl text-white w-1/2 line-clamp-2">Website For Review Movie And TV Shows, Make It Easy To Find Movies And TV Shows </span>
                    
                    </div>
                </div>
                @endforeach
            </div>
            <!--Trending Movie Today-->
            <div class="mt-12">
                <span class="ml-10 font-inter font-bold text-xl z-10">Trending Movie Today</span>
                
                <div class="w-auto flex flex-row overflow-x-auto pt-6 pb-10">
                    @foreach ($trendingToday as $trendingItemToday)

                    @php
                    $original_dateToday = $trendingItemToday->release_date;
                    $timestampToday = strtotime($original_dateToday);
                    $movieYearToday = date("d F Y",$timestampToday);

                    $movieIDToday = $trendingItemToday->id;
                    $movieTitleToday = $trendingItemToday->title;
                    $movieRatingToday = $trendingItemToday->vote_average * 10;
                    $movieImageToday = "{$imageBaseURL}/w500{$trendingItemToday -> poster_path}";
                    
                    @endphp

                    <a href="movie/{{$movieIDToday}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white shadow-2xl group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{$movieImageToday}}"/>
                            </div>
                           
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$movieTitleToday}}</span>
                            <span class="font-inter text-sm mt-1">{{$movieYearToday}}</span>
                            
                            <div class="flex flex-row mt-1 items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xlmns="http://www.w3.org/2000/svg">
                                    <path d="M18 21H8V8L15 1L16.25 2.25C16.3667 2.36667 16.4627 2.525 16.538 2.725C16.6127 2.925 16.65 3.11667 16.65 3.3V3.65L15.55 8H21C21.5333 8 22 8.2 22.4 8.6C22.8 9 23 9.46667 23 10V12C23 12.1167 22.9873 12.2417 22.962 12.375C22.9373 12.5083 22.9 12.6333 22.85 12.75L19.85 19.8C19.7 20.1333 19.45 20.4167 19.1 20.65C18.75 20.8833 18.3833 21 18 21ZM6 8V21H2V8H6Z" fill="#38B6FF"></path>
                                </svg>
                                
                                <span class="font-inter text-sm ml-1">{{$movieRatingToday}}%</span>
                            </div>
                        </div>
                    </a>
                    @endforeach 
                </div>
            </div>  

            <!--Banner Section-->
            <div class="w-full h-[512px] flex flex-col relative bg-black ">
            
                <!--Banner Data-->
                @foreach($banner as $bannerItem)

                @php
                $bannerImage = "{$imageBaseURL}/original{$bannerItem['backdrop_path']}"
                @endphp
                
                <div class="flex flex-row items-center w-full h-full relative slide">
                    <!--Image-->
                    <img src="{{$bannerImage}}" class="absolute w-full h-full object-cover">
                    <!--overlay-->
                    <div class="w-full h-full absolute bg-black bg-opacity-40"></div>
                
                    <div class="w-10/12 flex flex-col ml-28 z-10 ">
                        <span class="font-bold font-inter text-4xl text-white">{{ $bannerItem['title'] }}</span>
                        <span class="font-inter text-xl text-white w-1/2 line-clamp-2">{{ $bannerItem['overview'] }}</span>
                        
                        <a href="/movie/{{ $bannerItem['id'] }}" class="w-fit bg-develobe-500 text-white pl-2 pr-4 py-2 mt-5 font-inter text-sm flex flex-row rounded-full items-center hover:drop-shadow-lg duration-200">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.525 18.025C9.19167 18.2417 8.854 18.254 8.512 18.062C8.17067 17.8707 8 17.575 8 17.175V6.82499C8 6.42499 8.17067 6.12899 8.512 5.93699C8.854 5.74566 9.19167 5.75832 9.525 5.97499L17.675 11.15C17.975 11.35 18.125 11.6333 18.125 12C18.125 12.3667 17.975 12.65 17.675 12.85L9.525 18.025Z" fill="white"></path>
                            </svg>
                        <span>Detail</span>
                        </a>
                
                    </div>

                </div>
                @endforeach

                 <!--Rev Buttons-->
                 <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center " onclick="moveSlide(-1)">
                    <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-200">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.85 2.9C17.1 3.15 17.225 3.446 17.225 3.788C17.225 4.12933 17.1 4.425 16.85 4.675L9.525 12L16.875 19.35C17.1083 19.5833 17.225 19.875 17.225 20.225C17.225 20.575 17.1 20.875 16.85 21.125C16.6 21.375 16.304 21.5 15.962 21.5C15.6207 21.5 15.325 21.375 15.075 21.125L6.675 12.7C6.575 12.6 6.504 12.4917 6.462 12.375C6.42066 12.2583 6.4 12.1333 6.4 12C6.4 11.8667 6.42066 11.7417 6.462 11.625C6.504 11.5083 6.575 11.4 6.675 11.3L15.1 2.875C15.3333 2.64167 15.6207 2.525 15.962 2.525C16.304 2.525 16.6 2.65 16.85 2.9Z" fill="black"></path>
                          </svg>
                    </button>
                </div>

                 <!--Next Buttons-->
                 <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(+1)">
                    <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-200 rotate-180">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.85 2.9C17.1 3.15 17.225 3.446 17.225 3.788C17.225 4.12933 17.1 4.425 16.85 4.675L9.525 12L16.875 19.35C17.1083 19.5833 17.225 19.875 17.225 20.225C17.225 20.575 17.1 20.875 16.85 21.125C16.6 21.375 16.304 21.5 15.962 21.5C15.6207 21.5 15.325 21.375 15.075 21.125L6.675 12.7C6.575 12.6 6.504 12.4917 6.462 12.375C6.42066 12.2583 6.4 12.1333 6.4 12C6.4 11.8667 6.42066 11.7417 6.462 11.625C6.504 11.5083 6.575 11.4 6.675 11.3L15.1 2.875C15.3333 2.64167 15.6207 2.525 15.962 2.525C16.304 2.525 16.6 2.65 16.85 2.9Z" fill="black"></path>
                          </svg>
                    </button>
                </div>
                
                <!--indicators-->
                <div class="absolute bottom-0 w-full mb-8 ">
                    <div class="w-full flex flex-row items-center justify-center">
                        @for($pos=1;$pos<=count($banner);$pos++)
                        <div class="w-2.5 h-2.5 rounded-full mx-1 cursor-pointer dot"onclick= "currentSlide({$pos})"></div>
                        @endfor
                    </div>
                </div>
                
            </div>

            <!--Trending Movie Week -->
            <div class="mt-2">
                <span class="ml-10 font-inter font-bold text-xl">Trending Movie Week</span>
                
                <div class="w-auto flex flex-row overflow-x-auto  pt-6 pb-10">
                    @foreach ($trendingWeek as $trendingItemWeek)

                    @php
                    $original_dateWeek = $trendingItemWeek->release_date;
                    $timestampWeek = strtotime($original_dateWeek);
                    $movieYearWeek = date("d F Y",$timestampWeek);

                    $movieIDWeek = $trendingItemWeek->id;
                    $movieTitleWeek = $trendingItemWeek->title;
                    $movieRatingWeek = $trendingItemWeek->vote_average * 10;
                    $movieImageWeek = "{$imageBaseURL}/w500{$trendingItemWeek -> poster_path}";
                    
                    @endphp

                    <a href="movie/{{$movieIDWeek}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white shadow-2xl group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{$movieImageWeek}}"/>
                            </div>
                           
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$movieTitleWeek}}</span>
                            <span class="font-inter text-sm mt-1">{{$movieYearWeek}}</span>
                            
                            <div class="flex flex-row mt-1 items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xlmns="http://www.w3.org/2000/svg">
                                    <path d="M18 21H8V8L15 1L16.25 2.25C16.3667 2.36667 16.4627 2.525 16.538 2.725C16.6127 2.925 16.65 3.11667 16.65 3.3V3.65L15.55 8H21C21.5333 8 22 8.2 22.4 8.6C22.8 9 23 9.46667 23 10V12C23 12.1167 22.9873 12.2417 22.962 12.375C22.9373 12.5083 22.9 12.6333 22.85 12.75L19.85 19.8C19.7 20.1333 19.45 20.4167 19.1 20.65C18.75 20.8833 18.3833 21 18 21ZM6 8V21H2V8H6Z" fill="#38B6FF"></path>
                                </svg>
                                
                                <span class="font-inter text-sm ml-1">{{$movieRatingWeek}}%</span>
                            </div>
                        </div>
                    </a>
                    @endforeach 
                </div>
            </div> 

            <!--Trending TV Show Today-->
            <div>
                <span class="ml-28 font-inter font-bold text-xl">Trending TV Shows Today</span>
                
                <div class="w-auto flex flex-row overflow-x-auto pt-6 pb-10">
                    @foreach($trendingtvToday as $tvTodayItem)

                    @php 
                    $original_dateToday = $tvTodayItem->first_air_date;
                    $timestampToday = strtotime($original_dateToday);
                    $tvYearToday = date("d F Y",$timestampToday);

                    $tvIDToday = $tvTodayItem->id;
                    $tvTitleToday = $tvTodayItem->original_name;
                    $tvRatingToday = $tvTodayItem->vote_average * 10;
                    $tvImageToday = "{$imageBaseURL}/w500{$tvTodayItem -> poster_path}";
                    @endphp

                    <a href="tv/{{$tvIDToday}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white shadow-2xl group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{$tvImageToday}}"/>
                            </div>
                           
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$tvTitleToday}}</span>
                            <span class="font-inter text-sm mt-1">{{$tvYearToday}}</span>
                            
                            <div class="flex flex-row mt-1 items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xlmns="http://www.w3.org/2000/svg">
                                    <path d="M18 21H8V8L15 1L16.25 2.25C16.3667 2.36667 16.4627 2.525 16.538 2.725C16.6127 2.925 16.65 3.11667 16.65 3.3V3.65L15.55 8H21C21.5333 8 22 8.2 22.4 8.6C22.8 9 23 9.46667 23 10V12C23 12.1167 22.9873 12.2417 22.962 12.375C22.9373 12.5083 22.9 12.6333 22.85 12.75L19.85 19.8C19.7 20.1333 19.45 20.4167 19.1 20.65C18.75 20.8833 18.3833 21 18 21ZM6 8V21H2V8H6Z" fill="#38B6FF"></path>
                                </svg>
                                
                                <span class="font-inter text-sm ml-1">{{$tvRatingToday}}%</span>
                            </div>
                        </div>
                    </a>
                   @endforeach
                </div>
            </div> 

              <!--Trending TV Show Week-->
              <div>
                <span class="ml-28 font-inter font-bold text-xl">Trending TV Shows Week</span>
                
                <div class="w-auto flex flex-row overflow-x-auto pt-6 pb-10">
                    @foreach($trendingtvWeek as $tvWeekItem)

                    @php 
                    $original_dateWeek = $tvWeekItem->first_air_date;
                    $timestampWeek = strtotime($original_dateWeek);
                    $tvYearWeek = date("d F Y",$timestampWeek);

                    $tvIDWeek = $tvWeekItem->id;
                    $tvTitleWeek = $tvWeekItem->original_name;
                    $tvRatingWeek = $tvWeekItem->vote_average * 10;
                    $tvImageWeek = "{$imageBaseURL}/w500{$tvWeekItem -> poster_path}";
                    @endphp

                    <a href="tv/{{$tvIDWeek}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white shadow-2xl group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{$tvImageWeek}}"/>
                            </div>
                           
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$tvTitleWeek}}</span>
                            <span class="font-inter text-sm mt-1">{{$tvYearWeek}}</span>
                            
                            <div class="flex flex-row mt-1 items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xlmns="http://www.w3.org/2000/svg">
                                    <path d="M18 21H8V8L15 1L16.25 2.25C16.3667 2.36667 16.4627 2.525 16.538 2.725C16.6127 2.925 16.65 3.11667 16.65 3.3V3.65L15.55 8H21C21.5333 8 22 8.2 22.4 8.6C22.8 9 23 9.46667 23 10V12C23 12.1167 22.9873 12.2417 22.962 12.375C22.9373 12.5083 22.9 12.6333 22.85 12.75L19.85 19.8C19.7 20.1333 19.45 20.4167 19.1 20.65C18.75 20.8833 18.3833 21 18 21ZM6 8V21H2V8H6Z" fill="#38B6FF"></path>
                                </svg>
                                
                                <span class="font-inter text-sm ml-1">{{$tvRatingWeek}}%</span>
                            </div>
                        </div>
                    </a>
                   @endforeach
                </div>
            </div> 

            <!--Footer -->
            <div class="w-full bg-develobe-900 h-[320px] text-white flex flex-row pt-12">
                
                <div class="w-6/12 pl-28 flex flex-col">
                    <span class="font-quicksand text-4xl font-bold">RZ MOVIE</span>
                    <span class="font-inter text-lg mt-4">Website ini menyediakan review film dan review TV Series beserta ratingnya dan juga menyediakan trilernya <br> website ini bertujuan untuk menjadi acuan atau saran tontonan untuk pengguna</span>
                    <span class="font-inter text-lg mt-4">&copy; 2023 RZ MOVIE</span>
                </div>

                <div class="w-3/12 flex flex-col">
                    <span class="font-inter font-bold text-lg">Website</span>
                    <a href="/" class="fonr-inter text-lg mt-4 hover:text-develobe-500 duration-200">Home</a>
                    <a href="/movies"class="fonr-inter text-lg mt-4 hover:text-develobe-500 duration-200">Movies</a>
                    <a href="/t-shows"class="fonr-inter text-lg mt-4 hover:text-develobe-500 duration-200">TV shows</a>
                </div>

                <div class="w-3/12 flex flex-col">
                    <span class="font-inter font-bold text-lg">Social</span>
                    <a href="https://github.com/rzkdwiputra" target="_blank" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Git hub</a>
                    <a href="https://www.linkedin.com/in/rizky-dwi-putra-b87585223/" target="_blank" class="font-inter text-lg mt-4 hover:text-develobe-500 duration-200">Linked in</a>
                </div>

            </div>

        <div>
        <script>
            //Default active slide
            let slideIndex=1;
            showSlide(slideIndex);

            function showSlide (position){
            let index;
            const slidesArray = document.getElementsByClassName("slide");
            const dotsArray = document.getElementsByClassName("dot");  
                //looping effect
                if(position>slidesArray.length){
                    slideIndex = 1;
            }
            if(position<1){
                slideIndex = slidesArray.length;
                }

            //hidden all slides
            for (index = 0; index<slidesArray.length; index++) {
                slidesArray[index].classList.add('hidden');
            }

            //show active slide
            slidesArray[slideIndex-1].classList.remove('hidden');
            
            //remove active sstatus
            for (index = 0;index<dotsArray.length;index++){
                dotsArray[index].classList.remove('bg-develobe-500')
                dotsArray[index].classList.add('bg-white');
            }

            //set active status
            dotsArray[slideIndex-1].classList.remove('bg-white');
            dotsArray[slideIndex-1].classList.add('bg-develobe-500');
        }

        function moveSlide (moveStep){
            showSlide(slideIndex += moveStep)
        }

        function currentSlide (position){
            showSlide(slideIndex=position);
        }
        </script>
    </body>
</html>