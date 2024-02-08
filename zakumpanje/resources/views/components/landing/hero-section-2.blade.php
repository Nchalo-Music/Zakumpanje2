

{{-- <br> --}}
    <div class="navt mt-5">
{{-- <br>   --}}
        <h2 class="text-center text-white mt-5">  
            New releases 
        </h2>
                
            <div class="row mt-5 ml-2">
                    @forelse($tracks as $track)
                        <article class="col-lg-3 col-md-4 col-sm-12 col-12" style="width: 150px !important;height: 100px !important;">
                            <figure>
                                {{-- <a href="play.html"> --}}
                                    <img src="{{ asset('storage/'.$track->artwork) }}" alt="{{ $track->name }}" class="img-fluid w-md-50 h-md-50"  />
                                {{-- </a>	 --}}
                                <figcaption class="">
                                    <a class="">{{ $track->name }}</a>
                                    <p class="">{{ $track->artist->stage_name }}</p>
                                </figcaption>
                            </figure>
                        </article>
                    @empty
                        <h1>No Songs At the Moment Yet</h1>
                    @endforelse

            </div>

            {{-- <center>
                <a href="New releases.html"><button class="button_1" type="submit">See all</button></a>   
            </center> --}}
            
</div>
