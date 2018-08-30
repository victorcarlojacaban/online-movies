<div class="wo_filters-toggles wo_hide-desktop">
		<a class="wo_filter--toggles__item wo_filter-toggle-genres" id="myBtn" href="#">
		<span><h1>Genres</h1></span>
		</a>
	</div>

	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    @foreach($genres['genres'] as $genre)
			<a href="?genre={{ $genre['id'] }}" data-genre="action"><h2>{{ $genre['name'] }}</h2></a><br/>
			<hr>
		@endforeach
	  </div>

	</div>


	<div class='wo_genre-filters'>

		<div class='wo_filter-block wo_hide-desktop'>
			<div class='wo_filter-block__title'>Genres</div>
			<a class="wo_filter-close" href="/movies/filter">Save</a>
		</div>
		<div class="genres-list-row">
			<div data-reactroot="" class="wo_genre-filters__wrap ">

			<span class="wo_genre-filter__link selected"><a href="/movies" data-genre="all">ALL GENRES</a></span><span class="genres-separator"></span>
				@foreach($genres['genres'] as $genre)
					<span class="wo_genre-filter__link "><a href="?genre={{ $genre['id'] }}" data-genre="action">{{ $genre['name'] }}</a></span><span class="genres-separator"></span>
				@endforeach
			</div>
		</div>
	</div>