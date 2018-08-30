
@extends('layouts.app')

@section('content')
<div class='wo_page-row wo_page-row--expanded'>
	<div class='wo_container wo_listing-page-wrapper' id='js-wo_listing-page-wrapper'>
		<h3 class='wo_listing-title rf_text-center'>Find where to stream all movies on Freemovieswatching.com</h3>
	<div class='wo_filters-toggles wo_hide-desktop'>
		<a class="wo_filter--toggles__item wo_filter-toggle-genres" id="myBtn" href="#">
			<img src="img/video-icon.svg" />
			<span>Genres</span>
		</a>
		<!-- <a class="wo_filter--toggles__item wo_filter-toggle-filters" href="#"><img src="/img/filter-icon.svg" />
			<span>Filters</span>
		</a> -->
	</div>

	<div id="wo_genre-filters_mobile" class="wo_genre-filters">
		<div class="wo_filter-block wo_hide-desktop">
		<div class="wo_filter-block__title">Genres</div>
		<a class="wo_filter-close">CLOSE</a>
		</div>
		<div class="genres-list-row">
			<div data-reactroot="" class="wo_genre-filters__wrap ">
				<span class="wo_genre-filter__link selected">
					<a href="#" data-genre="all">ALL GENRES</a>
				</span>
				<span class="genres-separator"></span>
				@foreach($genres['genres'] as $genre)
					<span class="wo_genre-filter__link ">
						<a href="?genre={{ $genre['id'] }}" data-genre="action">{{ $genre['name'] }}</a>
					</span>
					<span class="genres-separator"></span>
				@endforeach
			</div>
		</div>
	</div>

	<div class='wo_content-wrap'>
		<div class='inside_movies_page wo_main-content'>
			<div class='wo_content_wrapper'>
				<div class='rf_row'>

	<div class='rf_col-sm-12'>
		@include('include.slide-banner')
	</div>
</div>
<div class="wo_movie-items">
	<div class="wo_tittle-list" id="load-data">
			@foreach ($tvshows as $movie)
				<?php 
					
					$posterImage = !empty($movie['poster_path']) ? "https://image.tmdb.org/t/p/w154".$movie['poster_path'] : '/no-poster.jpg';
				?>

				<div class="wo_movie-item__link">
					<div class="wo_movie-item__poster">
						<div class="wo_movie-item__poster" style="background-image: url(&quot; {{ $posterImage }} &quot;);">
			
						</div>
						<div class="wo_movie-item__details"><a href="#" data-event-name="See details click" data-event-label="Fifty Shades Darker" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">{{ $movie['name'] }}</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">{{ date("Y",strtotime($movie['first_air_date'])) }} </span><div class="wo_movie-item__info__rating"><div class="rating">
						<span style="color:#fdc228">☆</span>
					</div>&nbsp;{{ $movie['vote_average'] }}</div></div><p class="wo_movie-item__description">
							{{ $movie['overview'] }}
						</p></a></div>
					</div>
				<div class="wo_movie-item__title">{{ $movie['name'] }}</div>
				<div class="wo_movie-item__info"><span class="wo_movie-item__info__year">{{ date("Y",strtotime($movie['first_air_date'])) }}</span><div class="wo_movie-item__info__rating">
					<div class="rating">
						<span style="color:#fdc228">☆</span>
					</div>&nbsp;

					{{ $movie['vote_average'] }}
				</div></div>

				</div>

			@endforeach
			<center>
				<div id="remove-row" style="color:black">
                    <button id="btn-more" data-id="1" class="button">Load More TV Shows</button>
                </div>
        	</center>
        	<br/>
		</div>
</div>
<div class='rf_clearfix'></div>

</div>
</div>
@include('include.side-bar-home')
</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	let slideIndex = 0;
	showSlides();

	function showSlides() {
	    let i;
	    let slides = document.getElementsByClassName("slider-amazon__item clickout");
	    // let dots = document.getElementsByClassName("dot");
	    for (i = 0; i < slides.length; i++) {
	       slides[i].style.display = "none";  
	    }
	    slideIndex++;
	    if (slideIndex > slides.length) {slideIndex = 1}    
	    // for (i = 0; i < dots.length; i++) {
	    //     dots[i].className = dots[i].className.replace(" active", "");
	    // }
	    slides[slideIndex-1].style.display = "block";  
	    // dots[slideIndex-1].className += " active";
	    setTimeout(showSlides, 5000); // Change image every 5 seconds
	} 

	$(document).on('click','#btn-more',function(){
      	let id = $(this).data('id');

       	$("#btn-more").html("Loading....");

       	$.ajax({
           url : '{{ url("loaddatatv") }}',
           method : "POST",
           data : { id: id , _token:" {{csrf_token()}} "},
           dataType : "text",
           success : function (data) {
              if (data != '') {
                  $('#remove-row').remove();
                  $('#load-data').append(data);
              } else {
                  $('#btn-more').html("No Data");
              }
           }
       });
   }); 

	// Get the modal
		let modal = document.getElementById('myModal');

		// Get the button that opens the modal
		let btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		let span = document.getElementsByClassName("wo_filter-close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    //modal.style.display = "block";
		    $('#wo_genre-filters_mobile').addClass('open');
		}	

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    $('#wo_genre-filters_mobile').removeClass('open');
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	}); 
</script>

@endsection
