{{-- 
<header class="site-header">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <strong class="text-white"> Home</strong>
                    ads can go here or notifications 
                </p>
            </div>

        </div>
    </div>
</header> --}}
<div id="sticky-wrapper" class="sticky-wrapper" style="height: 110px;">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="">
        <img src="{{ asset('images/logo.png')}}" width="150px" height="100" alt="{{ config('app.name','Zakumpanje') }}"> 
        </a>

        <a href="Search.html">
            <button class="button_1" type="submit">Search</button>
        </a>
    

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="New releases.html">New Releases</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="Hot Songs.html">Hot Songs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="Hot artist.html">Hot Artists</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Get to Know</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_7">contact us</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

