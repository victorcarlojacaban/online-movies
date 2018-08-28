@extends('layouts.app')


@section('content')
	@inject('image', 'Tmdb\Helper\ImageHelper')
		<div class='wo_container wo_listing-page-wrapper' id='js-wo_listing-page-wrapper'>
			<h3 class='wo_listing-title rf_text-center'>Find where to stream all movies on Freemovieswatching.com</h3>
			<!-- <div class='wo_filters-toggles wo_hide-desktop'></div> -->
			<!-- <div class='wo_filters-toggles wo_hide-desktop'>
					<div class='wo_filter-block__title'>Genres</div>
					<a class="wo_filter-close" href="/movies/filter">Save</a>
				</div> -->
			<div class='wo_genre-filters'>

				<!-- <div class='wo_filter-block wo_hide-desktop'>
					<div class='wo_filter-block__title'>Genres</div>
					<a class="wo_filter-close" href="/movies/filter">Save</a>
				</div> -->
			<!-- 	<div class="genres-list-row"> -->
					<div data-reactroot="" class="wo_genre-filters__wrap ">

					<span class="wo_genre-filter__link selected"><a href="#" data-genre="all">ALL GENRES</a></span><span class="genres-separator"></span>
						@foreach($genres['genres'] as $genre)
							<span class="wo_genre-filter__link "><a href="?genre={{ $genre['id'] }}" data-genre="action">{{ $genre['name'] }}</a></span><span class="genres-separator"></span>
						@endforeach
					</div>
				<!-- </div> -->
			</div>
			<div class='wo_content-wrap'>
			<div class='inside_movies_page wo_main-content'>
			<div class='wo_content_wrapper'>
				<div class='rf_row'>
					<div class='rf_col-sm-12'>
						<div class='wo_movies-slider'>
							<div class='slider-amazon__container'>
									<div class="slideshow-container">

									<div class="mySlides fade">
									  <div class="numbertext">1 / 4</div>
									  <img src="/img/jack-reacher.jpeg" class="img-res" style="width:100%;height: 240px;">
									 <!--  <div class="text">Jack Reacher</div> -->
									</div>

									<div class="mySlides fade">
									  <div class="numbertext">2 / 4</div>
									  <img src="/img/star-trek.jpg" class="img-res" style="width:100%;height: 240px;">
									  <!-- <div class="text">Star Trek Beyond</div> -->
									</div>
									<div class="mySlides fade">
									  <div class="numbertext">3 / 4</div>
									  <img src="/img/magnificent-seven.jpg" class="img-res" style="width:100%;height: 240px;">
									 
									</div>
									<div class="mySlides fade">
									  <div class="numbertext">4 / 4</div>
									  <img src="/img/xander-cage.jpg" class="img-res" style="width:100%;height: 240px;">
									 
									</div>

									</div>
									<br>
							</div>


						</div>
					</div>
				</div>
					<div class="wo_movie-items">
						<div class="wo_tittle-list" id="load-data">
							@foreach ($movies as $movie)
								<?php 
									
									$posterImage = !empty($movie['poster_path']) ? "https://image.tmdb.org/t/p/w154".$movie['poster_path'] : '/no-poster.jpg';
								?>

								<div class="wo_movie-item__link">
									<div class="wo_movie-item__poster">
										<div class="wo_movie-item__poster" style="background-image: url(&quot; {{ $posterImage }} &quot;);">
							
										</div>
										<div class="wo_movie-item__details"><a href="/movies/fifty-shades-darker" data-event-name="See details click" data-event-label="Fifty Shades Darker" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">{{ $movie['title'] }}</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">{{ date("Y",strtotime($movie['release_date'])) }} </span><div class="wo_movie-item__info__rating"><div class="rating">
										<span style="color:#fdc228">☆</span>
									</div>&nbsp;{{ $movie['vote_average'] }}</div></div><p class="wo_movie-item__description">
											{{ $movie['overview'] }}
										</p></a></div>
									</div>
								<div class="wo_movie-item__title">{{ $movie['title'] }}</div>
								<div class="wo_movie-item__info"><span class="wo_movie-item__info__year">{{ date("Y",strtotime($movie['release_date'])) }}</span><div class="wo_movie-item__info__rating">
									<div class="rating">
										<span style="color:#fdc228">☆</span>
									</div>&nbsp;

									{{ $movie['vote_average'] }}
								</div></div>

								</div>

							@endforeach
							<center>
								<div id="remove-row" style="color:black">
		                            <button id="btn-more" data-id="1" data-genre="{{ $genreData }}" class="btn btn-info"> Load More Movies</button>
		                        </div>
	                    	</center>
	                    	<br/>
						</div>

						<!-- <div id="remove-row" style="float:right">
                            <button id="btn-more" data-id="1" class="btn btn-info"> Load More </button>
                        </div> -->
						
					</div>
				<div class='rf_clearfix'></div>
				<!-- <div data-react-class="LoadMore" data-react-props="{&quot;params&quot;:{&quot;page&quot;:null,&quot;controller_name&quot;:&quot;Movies&quot;},&quot;movie&quot;:true}" class="wo_load-more-button-wrap">
					
				</div> -->
			</div>
			</div>
			<div class='wo_filter-wrapper rf_col-lg-3 rf_col-sm-3 wo_filters-movies'>
			<div class='wo_filters-panel'>
			<div class='wo_filter-block wo_only_mob wo_hide-desktop'>
			<div class='wo_filter-block__title'>Filters</div>
			<!-- <a class="wo_filter-close" href="/movies/filter">Save</a> -->
			</div>
			<div class='wo_filter-block'>
				<div class='wo_filter-block__title'>Popular Searches</div>
				<div class='wo_popular-searches'>
					<a class="wo_popular__item" href="/home?type=toprated">Top Rated Movies</a>
					<a class="wo_popular__item" href="/home?type=upcoming">Top Upcoming Movies</a>
					<a class="wo_popular__item" href="/home?type=popular">Most Popular Movies</a>
					<a class="wo_popular__item" href="/home?type=nowplaying">Now Playing Movies</a>
					
				</div>
			</div>
			</div>
			<div class="wo_amazon-banner">
				<a class="clickout track_event_with_conversion" href="#"><img width="100%" src="/img/amazon-banner-01.png">
				</a></div>
			</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {

			   $(document).on('click','#btn-more',function(){
			       let id = $(this).data('id');
			       let genre = $(this).data('genre');

			       $("#btn-more").html("Loading....");

			       $.ajax({
			           url : '{{ url("loaddata") }}',
			           method : "POST",
			           data : { id: id, genre:genre , _token:" {{csrf_token()}} "},
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

			   var slideIndex = 0;
				showSlides();

				function showSlides() {
				    var i;
				    var slides = document.getElementsByClassName("mySlides");
				    // var dots = document.getElementsByClassName("dot");
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
			}); 
</script>
@stop