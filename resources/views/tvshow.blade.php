@extends('layouts.app')


@section('content')
	@inject('image', 'Tmdb\Helper\ImageHelper')
		<div class='wo_container wo_listing-page-wrapper' id='js-wo_listing-page-wrapper'>
			<h3 class='wo_listing-title rf_text-center'>Find where to stream all movies on Freemovieswatching.com</h3>
			@include('include.filter')
			<div class='wo_content-wrap'>
			<div class='inside_movies_page wo_main-content'>
			<div class='wo_content_wrapper'>
				<div class='rf_row'>
					@include('include.slide-banner')
				</div>
					<div class="wo_movie-items">
						<div class="wo_tittle-list" id="load-data">
							@foreach ($tvshows as $tv)
								<?php 
									
									$posterImage = !empty($tv['poster_path']) ? "https://image.tmdb.org/t/p/w154".$tv['poster_path'] : '/no-poster.jpg';
								?>

								<div class="wo_movie-item__link">
									<div class="wo_movie-item__poster">
										<div class="wo_movie-item__poster" style="background-image: url(&quot; {{ $posterImage }} &quot;);">
							
										</div>
										<div class="wo_movie-item__details"><a href="#" data-event-name="See details click" data-event-label="Fifty Shades Darker" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">{{ $tv['name'] }}</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">{{ date("Y",strtotime($tv['first_air_date'])) }} </span><div class="wo_movie-item__info__rating"><div class="rating">
										<span style="color:#fdc228">☆</span>
									</div>&nbsp;{{ $tv['vote_average'] }}</div></div><p class="wo_movie-item__description">
											{{ $tv['overview'] }}
										</p></a></div>
									</div>
								<div class="wo_movie-item__title">{{ $tv['name'] }}</div>
								<div class="wo_movie-item__info"><span class="wo_movie-item__info__year">{{ date("Y",strtotime($tv['first_air_date'])) }}</span><div class="wo_movie-item__info__rating">
									<div class="rating">
										<span style="color:#fdc228">☆</span>
									</div>&nbsp;

									{{ $tv['vote_average'] }}
								</div></div>

								</div>

							@endforeach
							<center>
								<div id="remove-row" style="color:black">
		                            <button id="btn-more" data-id="1" class="button"> Load More TV Shows</button>
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
				@include('include.side-search')
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
			           url : '{{ url("loaddatatv") }}',
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

				// Get the modal
				var modal = document.getElementById('myModal');

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks the button, open the modal 
				btn.onclick = function() {
				    modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				    modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				    if (event.target == modal) {
				        modal.style.display = "none";
				    }
				}
			}); 
</script>
@stop