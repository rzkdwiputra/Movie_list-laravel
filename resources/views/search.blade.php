<html>
    <head>
        <title>RZMOVIE</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-fulll h-auto min-h-screen flex flex-col">
            <!--Header Section-->
            @include ('header')

            <!--SEARCH wrapper-->
            <div class="w-full h-auto min-h-screen">
                <!--search input-->
                <div class="w-full pl-10 lg:pl-20 pr-10 lg:pr-0">
                    <div class="relative w-full lg:w-80 mt-10 mb-5 bg-white drop-shadow-[0_0px_4px_rgba(0,0,0,0.25)]">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M28.5248 27.475L22.9623 21.9C24.8884 19.6983 25.8833 16.8343 25.7371 13.9127C25.5908 10.9911 24.3149 8.24072 22.1786 6.24237C20.0423 4.24402 17.213 3.15414 14.2882 3.20291C11.3634 3.25167 8.572 4.43526 6.50355 6.50371C4.43509 8.57217 3.2515 11.3636 3.20274 14.2884C3.15398 17.2132 4.24385 20.0425 6.2422 22.1788C8.24055 24.315 10.9909 25.591 13.9125 25.7372C16.8341 25.8835 19.6981 24.8885 21.8998 22.9625L27.4748 28.525C27.6141 28.6642 27.8029 28.7425 27.9998 28.7425C28.1967 28.7425 28.3856 28.6642 28.5248 28.525C28.6641 28.3858 28.7423 28.1969 28.7423 28C28.7423 27.8031 28.6641 27.6142 28.5248 27.475ZM4.74983 14.5C4.74983 12.5716 5.32166 10.6866 6.393 9.08319C7.46435 7.47981 8.98709 6.23013 10.7687 5.49218C12.5503 4.75422 14.5106 4.56114 16.402 4.93734C18.2933 5.31355 20.0306 6.24215 21.3941 7.60571C22.7577 8.96927 23.6863 10.7066 24.0625 12.5979C24.4387 14.4892 24.2456 16.4496 23.5077 18.2312C22.7697 20.0127 21.52 21.5355 19.9166 22.6068C18.3133 23.6782 16.4282 24.25 14.4998 24.25C11.915 24.2467 9.43696 23.2184 7.6092 21.3906C5.78143 19.5629 4.75314 17.0848 4.74983 14.5Z" fill="black"></path>
                            </svg>
                          </div>
                        <input id="searchInput" type="search" class="block w-full p-8 lg:p-4 pl-12 lg:pl-10 text-2xl lg:text-sm text-black focus:outline-none" placeholder="Search..."required>
                    </div>
                </div>
             
            
                <!--conten section-->
                <div class="w-auto pl-28 pr-10 pt-6 pb-10 grid grid-cols-3 lg:grid-cols-5 gap-5" id="dataWrapper">
                    <!--Wait from AJAX-->

                </div>
                <!--data loader-->
                <div class="w-full pl-28 pr-10 flex justify-center mb-5" id="autoLoad">
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#000" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                        </path>
                    </svg>
                </div>

                <!--Eror Notification-->
                <div id ="notification" class="min-w-[250px] p-4 bg-red-700 text-white text-center rounded-lg fixed z-index-10 top-0 right-0 mr-10 mt-5 drop-shadow-lg"> 
                    <span id="notificationMessage">Contoh</span>
                </div>
                </div>   

                
                <!--Footer Section-->
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
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
        crossorigin="anonymous"></script>

        <script>
            let baseURL = "<?php echo $baseURL; ?>";
            let imageBaseURL = "<?php echo $imageBaseURL; ?>";
            let apiKey = "<?php echo $apiKey; ?>";
            let searchKeyword = "<?php echo $apiKey; ?>";

             //Hide loader
             $("#autoLoad").hide();
        
            //Hide notification
            $("#notification").hide();

            $('#searchInput').keypress(function (event){
                var key =event.which;
                if (key==13){
                    searchKeyword = $('#searchInput'). val ();
                    if (searchKeyword){
                        search();
                    }
                    return false;
                }
            });

            function search(){
                $.ajax({
                    url: `${baseURL}/search/multi?page=1&api_key=${apiKey}&query=${searchKeyword}`,
                    type: "GET",
                    beforeSend: function () {
                        // Show loader
                        $("#autoLoad").show();

                        // Clear Content
                        $("#dataWrapper").html("");
                    }
                })
                .done(function (response) {
                    // Hide loader 
                    $("#autoLoad").hide();

                    if (response.results) {
                        var htmlData = [];
                        response.results.forEach(item => {
                            if (item.media_type == 'movie' || item.media_type == 'tv') {
                                let searchTitle = "";
                                let originalDate = ""; // Corrected variable name
                                let detailsURL = "";

                                if (item.media_type == 'movie') {
                                    detailsURL = `/movie/${item.id}`;
                                    originalDate = item.release_date; // Corrected variable name
                                    searchTitle = item.title;
                                } else {
                                    detailsURL = `/tv/${item.id}`;
                                    originalDate = item.first_air_date;
                                    searchTitle = item.name;
                                }
                            
                                let date = new Date(originalDate);
                                let day = date.getDate();
                                let month = date.toLocaleString('default', { month: 'long' }); // Mengambil nama bulan
                                let year = date.getFullYear();
                                let searchYear = `${day} ${month} ${year}`;
                            
                                let searchImage = item.poster_path ? `${imageBaseURL}/w500${item.poster_path}` : 'https://via.placeholder.com/300x400';
                                let searchRating = item.vote_average * 10; // Corrected variable name
                            
                                htmlData.push(`
                                    <a href="${detailsURL}" class="group">
                                        <div class="min-w-[232px] min-h-[428px] bg-white shadow-2xl group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                                            <div class="overflow-hidden rounded-[32px]">
                                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="${searchImage}" alt="${searchTitle} Poster"/>
                                            </div>
                                        
                                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">${searchTitle}</span>
                                            <span class="font-inter text-sm mt-1">${searchYear}</span>
                                        
                                            <div class="flex flex-row mt-1 items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18 21H8V8L15 1L16.25 2.25C16.3667 2.36667 16.4627 2.525 16.538 2.725C16.6127 2.925 16.65 3.11667 16.65 3.3V3.65L15.55 8H21C21.5333 8 22 8.2 22.4 8.6C22.8 9 23 9.46667 23 10V12C23 12.1167 22.9873 12.2417 22.962 12.375C22.9373 12.5083 22.9 12.6333 22.85 12.75L19.85 19.8C19.7 20.1333 19.45 20.4167 19.1 20.65C18.75 20.8833 18.3833 21 18 21ZM6 8V21H2V8H6Z" fill="#38B6FF"></path>
                                                </svg>
                                            
                                                <span class="font-inter text-sm ml-1">${searchRating}%</span> <!-- Corrected variable name -->
                                            </div>
                                        </div>
                                    </a>`);
                            }
                        });
                    
                            $("#dataWrapper").append(htmlData.join(""));
                    }

                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    // Mengatasi kegagalan, misalnya menampilkan pesan kesalahan
                    console.error("AJAX request failed:", errorThrown);
                                
                    // Menyembunyikan loader
                    $("#autoLoad").hide();
                                
                    // Menampilkan notifikasi 
                    $("#notificationMessage").text("Film tidak ditemukan"); 
                    $("#notification").show();
                                
                    // Mengatur waktu timeout 
                    setTimeout(function () {
                        $("#notification").hide();
                    }, 3000);
                });

            }
        </script>
    </body>
</html>