@extends('layouts.app')

@section('content')
<?php 
  $matchtype = $parameters['matchtype'];
  $keyword = $parameters['keyword'];
  $creative = $parameters['creative'];
  $gclid = $parameters['gclid'];
?>
<div class="wo_page-row wo_page-row--expanded">
<div class="wo_container">
<div>
<div class="wo_page-video__row rf_row wo_page-video__row--main">
<div class="wo_page-video__column wo_page-video__left-column wo_page-video__column--poster">
<div class="wo_section wo_section--poster">
<div class="wo_section__content">
<a class="track_event_with_conversion clickout poster-label-wrapper cinemax">
  <?php 
    $posterImage = !empty($movie['poster_path']) ? "https://image.tmdb.org/t/p/w154".$movie['poster_path'] : '/no-poster.jpg';
  ?>
  <div class="wo_poster" style="background-image: url({{ $posterImage }});"></div>
<div class="poster-label poster-label-mob">
<span class="poster-label__text">Watch on</span>
<span class="poster-label__img">CINEMAX</span>
</div>
</a></div>
</div>
<h1 class="wo_movie_title mobile">
{{ $movie['name'] }}
<ul class="wo_video-info">
<li class="wo_video-info__item wo_video-info__item--years">{{ date("Y",strtotime($movie['first_air_date'])) }} </li>
</ul>
</h1>
<ul class="wo_video-details">

<li class="wo_video-details__item wo_video-details__tile-items">
  @foreach ($movie['genres'] as $genre)
  <div class="wo_video-details__tile-item">
    <span itemprop="genre">{{ $genre['name'] }}</span>
  </div>
  @endforeach
</li>
<div class="wo_section__content wo_section--video-main-right rf_visible-xs">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Services
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now hbo clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>

<div class="disclaimer-best-streaming">
<div class="disclaimer-best-streaming__row">
Based on our viewers’ overall rating for each service.
</div>
<div class="disclaimer-best-streaming__row">
Not all titles featured are available in each service.
</div>
</div>

</div>
<li class="wo_video-details__item">
<!-- <span class="wo_video-details__name">
Rated:
</span>
<span class="wo_video-details__value">
-12,SAM 16,18
</span> -->
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Director:
</span>
<span class="wo_video-detailstails__value">
  @foreach($directors as $director)
    {{ $director }},
  @endforeach
</span>
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Writer:
</span>
<span class="wo_video-details__value">
  @foreach($writers as $writer)
    {{ $writer }},
  @endforeach
</span>
</li>
</ul>

<div class="wo_section wo_section--amazon-banner rf_visible-lg rf_visible-md">
<div class="wo_section__content">
<a class="clickout track_event_with_conversion" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')"><img class="img-responsive" src="/img/amazon-banner-01.png">
</a>
</div>
</div>
</div>

<div class="wo_page-video__right-column">
<div class="wo_section rf_visible-xs">
<div class="wo_section--amazon-banner">
<a class="clickout track_event_with_conversion" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')"><img class="img-responsive" src="/img/amazon-banner-02.png">
</a>
</div>
</div>
<div class="tabs mobile">
<div class="tabs__controls">
<div class="tabs__toggle custom_toggle" id="overviewToggle">
<a style="color:white" onclick="toggle('overview', 'overviewToggle')">Synopsis</a>
</div>
<div class="tabs__toggle custom_toggle" id="starringToggle">
<a style="color:white" onclick="toggle('starring', 'starringToggle')">Starring</a>
</div>
<div class="tabs__toggle custom_toggle" id="moreToggle">
<a style="color:white" onclick="toggle('more', 'moreToggle')">More Like</a>
</div>

<div class="tabs__toggle custom_toggle" id="trailerToggle">
<a style="color:white" onclick="toggle('trailer', 'trailerToggle')">Trailer</a>
</div>
</div>
<br/>
<div class="tabs__tab tabs__tab__active custom_tab" id="overview" style="margin-top: 15px;">
<div class="wo_synopsis">{{ $movie['overview'] }}</div>
<br/>

<div class="wo_section__content wo_section--video-main-left">
<ul class="wo_video-details">
<li class="wo_video-details__item wo_video-details__tile-items">
  @foreach ($movie['genres'] as $genre)
  <div class="wo_video-details__tile-item">
    <span itemprop="genre">{{ $genre['name'] }}</span>
  </div>
  @endforeach
</li>
<div class="wo_section__content wo_section--video-main-right rf_visible-xs">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Services
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now hbo clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>

<div class="disclaimer-best-streaming">
<div class="disclaimer-best-streaming__row">
Based on our viewers’ overall rating for each service.
</div>
<div class="disclaimer-best-streaming__row">
Not all titles featured are available in each service.
</div>
</div>

</div>
<!-- <li class="wo_video-details__item">
<span class="wo_video-details__name">
Rated:
</span>
<span class="wo_video-details__value">
PG-13, PG,12,M,k12,G
</span>
</li> -->
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Director:
</span>
<span class="wo_video-detailstails__value">
  @foreach($directors as $director)
    {{ $director }},
  @endforeach
</span>
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Writer:
</span>
<span class="wo_video-details__value">
  @foreach($writers as $writer)
    {{ $writer }},
  @endforeach
</span>
</li>
</ul>

</div>
</div>
<!-- end overview -->

<div class="tabs__tab custom_tab" style="margin-top: -20px;" id="starring">
  <div class="wo_section wo_section--video-details rf_no-margin--bottom">
    <h3 class="wo_section__title wo_js_collapse-toggle wo_collapse__toggle wo_collapse--opened rf_text-uppercase">
    <ul class="wo_video-details">
    <li class="wo_video-details__item">
    <div class="actor_posters">
    <div class="actor_posters__slider owl-loaded owl-drag">

    <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2440px;">
        <div class="wo_section wo_section--recomended-videos wo_section--video-details rf_no-margin--bottom">
    <h3 class="wo_section__title wo_collapse__toggle wo_collapse--opened rf_text-uppercase">
    <div class="wo_video-thumbs">

    @foreach ($casts as $cast)
    <?php 
        $castImage = !empty($cast['profile_path']) ? "https://image.tmdb.org/t/p/w154".$cast['profile_path'] : '/img/no-profile.png';
      ?>

    <a class="wo_video-thumb track_event" data-event-category="More Like" data-event-label="Twilight" data-event-name="Movies" href="/movies/twilight-2008-107837">
    <div class="wo_video-thumb__poster" data-content="Watch Online" style="background-image: url({{ $castImage  }})""></div>
    <div class="wo_video-thumb__title">
      {{ $cast['name'] }}
    </div>
    </a>
    @endforeach

    </div>
    </div>


      </div>
    </div>
    </div>
    </div>
    </li>
    
<div class="wo_section__content wo_section--video-main-right rf_visible-xs" style="margin-top: -20px;">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Services
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now hbo clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>


<div class="disclaimer-best-streaming">
<div class="disclaimer-best-streaming__row">
Based on our viewers’ overall rating for each service.
</div>
<div class="disclaimer-best-streaming__row">
Not all titles featured are available in each service.
</div>
</div>

</div>
<li class="wo_video-details__item">
<!-- <span class="wo_video-details__name">
Rated:
</span>
<span class="wo_video-details__value">
-12,SAM 16,18
</span> -->
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Director:
</span>
<span class="wo_video-detailstails__value">
  @foreach($directors as $director)
    {{ $director }},
  @endforeach
</span>
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Writer:
</span>
<span class="wo_video-details__value">
  @foreach($writers as $writer)
    {{ $writer }},
  @endforeach
</span>
</li>

    </ul>

    </h3>
  </div>
</div>
<!-- end of starring -->

<div class="tabs__tab custom_tab" id="trailer">
<div class="wo_section wo_section--trailers">
<div class="wo_section__content">
<ul class="">
<li class="clip" itemprop="trailer">
<div class="info">
<span class="title" itemprop="name">{{ $movie['name'] }}</span>
</div>
<!-- <video class="video-trailer" controls="" data-event-category="Trailer" data-event-label="After Porn Ends 2" data-event-name="Click" height="100%" width="100%">
<source src="//www.youtube.com/embed//{{ $video }}?rel=0&ampc;type=.mp4" type="video/mp4">
</video> -->
 <iframe class="embed-responsive-item" src="//www.youtube.com/embed//{{ $video }}?rel=0" width="100%" height="315" frameborder="0" allowfullscreen=""></iframe>
</li>
</ul>
</div>
</div>
</div>


<div class="tabs__tab custom_tab" style="margin-top: -15px;" id="more">
  <div class="wo_section wo_section--video-details rf_no-margin--bottom">
    <h3 class="wo_section__title wo_js_collapse-toggle wo_collapse__toggle wo_collapse--opened rf_text-uppercase">
    <ul class="wo_video-details">
    <li class="wo_video-details__item">
    <div class="actor_posters">
    <div class="actor_posters__slider owl-loaded owl-drag">

    <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2440px;">
        <div class="wo_section wo_section--recomended-videos wo_section--video-details rf_no-margin--bottom">
    <h3 class="wo_section__title wo_collapse__toggle wo_collapse--opened rf_text-uppercase">
    <div class="wo_video-thumbs">

    @foreach($similarMovies as $similarMovie)
      <?php 
        $posterImageSimilar = !empty($similarMovie['poster_path']) ? "https://image.tmdb.org/t/p/w154".$similarMovie['poster_path'] : '/no-poster.jpg';

        $movieId = $similarMovie['id'];
      ?>

    <a class="wo_video-thumb track_event" data-event-category="More Like" data-event-label="Twilight" data-event-name="Movies" href="/tvshows/show/{{ $movieId }}?&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }}">
    <div class="wo_video-thumb__poster" data-content="Watch Online" onclick="window.location.href='/movies/show/{{ $movieId }}?&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }}'" style="background-image: url({{ $posterImageSimilar  }})"></div>
    <div class="wo_video-thumb__title">
    {{ $similarMovie['name'] }}
    </div>
    <div class="wo_video-thumb__additional">
    <div class="wo_video-thumb__year">
    {{ date("Y",strtotime($similarMovie['first_air_date'])) }}
    </div>
    <div class="wo_video-thumb__rating">
    <span>
      <span style="color:#fdc228">☆</span>
   <span style="color:#9a9a9a">{{ $similarMovie['vote_average'] }}</span>
    </span>
    </div>
    </div>
    </a>
    @endforeach

    </div>
    </div>


      </div>
    </div>
    </div>
    </div>
    </li>
  
<div class="wo_section__content wo_section--video-main-right rf_visible-xs" style="margin-top: -20px;">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Services
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime clickout"><div class="label"></div>
<div class="button wo_btn--play" style="font-size: 13px">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now hbo   clickout"><div class="label"></div>
<div class="button wo_btn--play" style="font-size: 13px">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub clickout"><div class="label"></div>
<div class="button wo_btn--play" style="font-size: 13px">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" style="font-size: 13px">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>

<!-- <div class="disclaimer-best-streaming">
<div class="disclaimer-best-streaming__row">
Based on our viewers’ overall rating for each service.
</div>
<div class="disclaimer-best-streaming__row">
Not all titles featured are available in each service.
</div>
</div> -->

</div>
<li class="wo_video-details__item">
<!-- <span class="wo_video-details__name">
Rated:
</span>
<span class="wo_video-details__value">
-12,SAM 16,18
</span> -->
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Director:
</span>
<span class="wo_video-detailstails__value">
  @foreach($directors as $director)
    {{ $director }},
  @endforeach
</span>
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Writer:
</span>
<span class="wo_video-details__value">
  @foreach($writers as $writer)
    {{ $writer }},
  @endforeach
</span>
</li>

    </ul>

    </h3>
  </div>
</div>

<!-- end of more like -->

<div class="tabs__tab">
<div class="wo_section wo_section--recomended-videos wo_section--video-details rf_no-margin--bottom">
<h3 class="wo_section__title wo_collapse__toggle wo_collapse--opened rf_text-uppercase">
</h3>
</div>
<div class="wo_section__content wo_section--video-main-right">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Services
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now hbo   clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub   clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>

</div>
</div>
</div>
<div class="wo_page-video__column wo_page-video__column--details">
<div class="rf_row wo_page-video__row wo_collapse" data-accordion="true">
<div class="wo_page-video__column rf_col-xs-12">
<div class="wo_section--video-details rf_no-margin--bottom">
<h1 class="wo_movie_title desktop">
{{ $movie['name'] }}
<ul class="wo_video-info">
<li class="wo_video-info__item wo_video-info__item--years">{{ date("Y",strtotime($movie['first_air_date'])) }} </li>
</ul>
</h1>
<div class="wo_section--video-main rf_hidden-xs">
<div class="wo_section__content wo_section--video-main-left">
<ul class="wo_video-details">
<li class="wo_video-details__item wo_video-details__tile-items">
  @foreach ($movie['genres'] as $genre)
  <div class="wo_video-details__tile-item">
    <span itemprop="genre">{{ $genre['name'] }}</span>
  </div>
  @endforeach
</li>
<div class="wo_section__content wo_section--video-main-right rf_visible-xs">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Services
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now hbo   clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub   clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>

<div class="disclaimer-best-streaming">
<div class="disclaimer-best-streaming__row">
Based on our viewers’ overall rating for each service.
</div>
<div class="disclaimer-best-streaming__row">
Not all titles featured are available in each service.
</div>
</div>

</div>
<li class="wo_video-details__item">
<!-- <span class="wo_video-details__name">
Rated:
</span>
<span class="wo_video-details__value">
-12,SAM 16,18
</span> -->
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Director:
</span>
<span class="wo_video-detailstails__value">
  @foreach($directors as $director)
    {{ $director }},
  @endforeach
</span>
</li>
<li class="wo_video-details__item">
<span class="wo_video-details__name">
Writer:
</span>
<span class="wo_video-details__value">
  @foreach($writers as $writer)
    {{ $writer }},
  @endforeach
</span>
</li>
</ul>

<ul class="wo_streaming-sites-buttons">
<li class="wo_streaming-sites-buttons__select-box">
<span class="wo_streaming-sites-buttons__select-row">
<label for="availability">Type</label>
<select name="availability" id="availability" class="js-filter-select" data-event-category="CTA Filter" data-event-label="Fifty Shades Darker" data-event-name="Availability Select"><option value="">All</option><option value="trial">Free Trial</option>
<option value="purchase">Purchase</option>
<option value="rent">Rent</option>
<option value="subscription">Subscription</option></select>
</span>
<span class="wo_streaming-sites-buttons__select-row">
<label for="trial_period">Free Trial</label>
<select name="trial_period" id="trial_period" class="js-filter-select" data-event-category="CTA Filter" data-event-label="Fifty Shades Darker" data-event-name="Free Trial Select"><option value="">All</option><option value="30">30 days</option>
<option value="14">14 days</option>
<option value="7">7 days</option></select>
</span>
<span class="wo_streaming-sites-buttons__select-row wo_streaming-sites-buttons__select-quality">
<span class="wo_streaming-sites-buttons__select-quality__item track_event is-active" data-event-category="CTA Filter" data-event-label="Fifty Shades Darker" data-event-name="HD Select" data-quality="hd">
HD
</span>
<span class="wo_streaming-sites-buttons__select-quality__item track_event" data-event-category="CTA Filter" data-event-label="Fifty Shades Darker" data-event-name="4K Select" data-quality="4k">
4K
</span>
</span>
</li>
<ul class="wo_streaming-sites-buttons__out">

<li class="movie-poster-block__amazon-prime-trial wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--amazon_prime amazon_prime_disp_1"  style="display:none" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
<a class="cta-button-partners-row clickout track_event_with_conversion"><div class="wo_streaming-sites-buttons__brand">
<div class="source">Amazon Prime </div>
<div class="image"></div>
</div>
</a><span class="cta-button-partners__text">
Start Your 30-Day Free Trials
<div class="wo_streaming-sites-buttons__description">
</span>
</li>

<li class="movie-poster-block__amazon-prime-trial wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--amazon_prime amazon_prime_disp_2">
<a class="cta-button-partners-row clickout track_event_with_conversion" rel="nofollow noreferrer" data-link-type="amazon_channels" href="#" onclick="redirectAds('avengers:-infinity-war', '{matcht}', '{ad2}', '{556688}')"><div class="wo_streaming-sites-buttons__brand">
<div class="source">Amazon Prime</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Start Your 30-Day Free Trials
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">8,032</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>

<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--cinemax">
<a class="cta-button-partners-row clickout track_event_with_conversion" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')" data-link-type="amazon_channels" href="#"><div class="wo_streaming-sites-buttons__brand">
<div class="source">CINEMAX</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Watch 7 days free trial
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">8,032</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--hbo">
<a class="cta-button-partners-row clickout track_event_with_conversion" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')" data-link-type="amazon_channels" href="#"><div class="wo_streaming-sites-buttons__brand">
<div class="source">HBO</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Watch 7 days free trial
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">7,337</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--cbs">
<a class="cta-button-partners-row clickout track_event_with_conversion" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')" data-link-type="cbs" href="#"><div class="wo_streaming-sites-buttons__brand">
<div class="source">CBS</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Watch 7 days free trial
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">6,924</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--fubo">
<a class="cta-button-partners-row clickout track_event_with_conversion" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')"><div class="wo_streaming-sites-buttons__brand">
<div class="source">Fubo</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Watch 7 days free trial
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">6,749</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--amazon_title">
<a class="cta-button-partners-row clickout track_event_with_conversion" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')" data-link-type="amazon_title" href="#"><div class="wo_streaming-sites-buttons__brand">
<div class="source">AMAZON</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Rent/Buy video
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">5,768</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--youtube">
<a class="cta-button-partners-row clickout track_event" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')" data-event-category="Title Page" data-event-label="Fifty Shades Darker" data-event-name="youtube CTA Click" data-locale="us" data-link-type="youtube"><div class="wo_streaming-sites-buttons__brand">
<div class="source">YouTube</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Rent/Buy video
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">5,344</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--itunes">
<a class="cta-button-partners-row clickout track_event" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')"><div class="wo_streaming-sites-buttons__brand">
<div class="source">Itunes Store</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Rent/Buy video
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">4,767</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
<li class="wo_streaming-sites-buttons__item wo_streaming-sites-buttons__item--vudu">
<a class="cta-button-partners-row clickout track_event" rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')" data-event-category="Title Page"><div class="wo_streaming-sites-buttons__brand">
<div class="source">Vudu</div>
<div class="image"></div>
</div>
<div class="wo_streaming-sites-buttons__description">
Rent/Buy video
</div>
</a><div class="cta-like js-cta-like">
<i class="cta-like__icon fa-thumbs-up"></i>
<span class="cta-like__num">4,715</span>
<span class="cta-like__text cta-like__text__off">
Users Like It
</span>
<span class="cta-like__text cta-like__text__on">
Users and You Like It
</span>
</div>

</li>
</ul>
</ul>

</div>
<div class="wo_section__content wo_section--video-main-right">
<div class="cta-buttons cta-buttons-static">
<div class="cta-button-title">
Best Streaming Servicess
</div>
<a class="cta-button track_event_with_conversion watch-now amazon_prime   clickout" ><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>

</a><a class="cta-button track_event_with_conversion watch-now hbo   clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now showtimesub   clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now starzsub not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cinemax not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now acorn not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now discovery not_visible btn-more  clickout" ><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now masterpiece not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now cbs not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a><a class="cta-button track_event_with_conversion watch-now fubo not_visible btn-more  clickout"><div class="label"></div>
<div class="button wo_btn--play" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')">
Free Trial
</div>
</a>
<span class="js-cta-buttons-toggle cta-buttons-toggle">
<span class="cta-buttons-toggle-open cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="showBestStreaming()">Show More</a>
</span>
<span class="cta-buttons-toggle-close cta-buttons-toggle-btn">
<a style="color:#9a9a9a" onclick="hideBestStreaming()">Hide</a>
</span>
</span>
</div>

<div class="disclaimer-best-streaming">
<div class="disclaimer-best-streaming__row">
Based on our viewers’ overall rating for each service.
</div>
<div class="disclaimer-best-streaming__row">
Not all titles featured are available in each service.
</div>
</div>

</div>
</div>
</div>
<div class="wo_section wo_section--synopsis rf_no-margin--bottom rf_hidden-xs">
<h3 class="wo_section__title wo_js_collapse-toggle wo_collapse__toggle wo_collapse--opened rf_text-uppercase">

</h3>
<div class="wo_section__content wo_collapse__content wo_collapse--expanded">
<div class="wo_synopsis">{{ $movie['overview'] }}</div>
</div>
</div>
<div class="wo_section rf_visible-lg rf_visible-md banner-out">
<div class="wo_section--amazon-banner">
<a class="clickout track_event_with_conversion " rel="nofollow noreferrer" onclick="redirectAds('{{ $keyword }}', '{{ $matchtype }}', '{{ $creative }}', '{{ $gclid }}')"><img class="img-responsive" src="/img/amazon-banner-02.png">
</a>
</div>
</div>
<div class="wo_section wo_section--video-details rf_no-margin--bottom rf_hidden-xs">
<h3 class="wo_section__title wo_js_collapse-toggle wo_collapse__toggle wo_collapse--opened rf_text-uppercase">
Starring
<ul class="wo_video-details">
<li class="wo_video-details__item">
<div class="actor_posters">
<div class="actor_posters__slider owl-loaded owl-drag">

<div class="wo_video-thumbs">
  @foreach ($casts as $cast)
    <?php 
      $castImage = !empty($cast['profile_path']) ? "https://image.tmdb.org/t/p/w154".$cast['profile_path'] : '/img/no-profile.png';
    ?>

    <a class="wo_video-thumb track_event" data-event-category="More Like" data-event-label="Twilight" data-event-name="Movies">
    <div class="wo_video-thumb__poster" data-content="Watch Online" style="background-image: url({{ $castImage  }})"></div>
    <div class="wo_video-thumb__title">
    {{ $cast['name'] }}
    </div>

    </a>
  @endforeach
</div>

</div>
</li>
</ul>

</h3>
</div>
</div>
</div>
</div>
<div class="wo_page-video__column">
<div class="wo_section--recomended-videos rf_hidden-xs">
<h3 class="wo_section__title rf_text-uppercase">
More Like {{ $movie['name'] }}
</h3>
<div class="wo_section__content">
<div class="wo_video-thumbs">

@foreach($similarMovies as $similarMovie)

  <?php 
    $posterImageSimilar = !empty($similarMovie['poster_path']) ? "https://image.tmdb.org/t/p/w154".$similarMovie['poster_path'] : '/no-poster.jpg';

    $movieId = $similarMovie['id'];
  ?>

<a class="wo_video-thumb track_event" data-event-category="More Like" data-event-label="Twilight" data-event-name="Movies" href="/tvshows/show/{{ $movieId }}?&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }}">
<div class="wo_video-thumb__poster" data-content="Watch Online"  onclick="window.location.href='/movies/show/{{ $movieId }}?&keyword={{ $parameters['keyword'] }}&matchtype={{ $parameters['matchtype'] }}&creative={{ $parameters['creative']}}&gclid={{ $parameters['gclid'] }}'"  style="background-image: url({{ $posterImageSimilar  }})"></div>
<div class="wo_video-thumb__title">
{{ $similarMovie['name'] }}
</div>
<div class="wo_video-thumb__additional">
<div class="wo_video-thumb__year">
{{ date("Y",strtotime($similarMovie['first_air_date'])) }}
</div>
<div class="wo_video-thumb__rating">
<span>
  <span style="color:#fdc228">☆</span>
{{ $similarMovie['vote_average'] }}
</span>
</div>
</div>
</a>
@endforeach

</div>

</div>
</div>
<div class="rf_hidden-xs rf_hidden-sm">

</div>
<div class="rf_hidden-xs rf_hidden-sm">

</div>
</div>
<div class="wo_page-video__column rf_col-xs-12 rf_visible-sm rf_visible-xs">

<div class="wo_section wo_section--links rf_hidden-xs">
<h3 class="wo_section__title rf_text-uppercase">
Links
</h3>
<div class="wo_section__content">
<ul class="wo_video-links">
<li class="wo_video-links__item">
<a class="wo_video-links__link" href="http://www.imdb.com/title/tt4465564" target="_blank">
IMDb
</a>
</li>
</ul>
</div>
</div>
</div>
<div class="wo_page-video__column rf_col-xs-12 rf_visible-sm rf_visible-xs">

</div>
</div>

</div>
</div>
</div>


</div>
  @include('include.common_js')
@endsection