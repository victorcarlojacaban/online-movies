<div class='wo_filter-wrapper rf_col-lg-3 rf_col-sm-3 wo_filters-movies'>
	<div class='wo_filters-panel'>
	<div class='wo_filter-block wo_only_mob wo_hide-desktop'>
	<div class='wo_filter-block__title'>Filters</div>
	<a class="wo_filter-close" href="/movies/filter">Save</a>
	</div>



	<div class='wo_filter-block'>
	<div class='wo_filter-block__title'>Popular Searches</div>
	<div class='wo_popular-searches'>
		<a class="wo_popular__item" href="/movies?type=toprated&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }} ">Top Rated Movies</a>
		<a class="wo_popular__item" href="/movies?type=upcoming&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }} ">Top Upcoming Movies</a>
		<a class="wo_popular__item" href="/movies?type=popular&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }} ">Most Popular Movies</a>
		<a class="wo_popular__item" href="/movies?type=nowplaying&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }} ">Now Playing Movies</a>
		
	</div>
	</div>
	</div>
	<div class='wo_amazon-banner'>
		<a class="clickout track_event_with_conversion" href="#" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')"><img width="100%" src="/img/amazon-banner-01.png"></a>
	</div>
</div>