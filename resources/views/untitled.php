<div data-react-class="GenresList" data-react-props="{&quot;genres&quot;:[&quot;action&quot;,&quot;adventure&quot;,&quot;animation&quot;,&quot;comedy&quot;,&quot;crime&quot;,&quot;drama&quot;,&quot;fantasy&quot;,&quot;horror&quot;,&quot;reality&quot;,&quot;romance&quot;,&quot;family&quot;,&quot;mystery&quot;,&quot;anime&quot;,&quot;children&quot;,&quot;news&quot;,&quot;talk \u0026 interview&quot;,&quot;documentary \u0026 biography&quot;,&quot;game Show&quot;,&quot;sports&quot;,&quot;music&quot;,&quot;science fiction&quot;,&quot;celebrity \u0026 entertainment&quot;,&quot;food&quot;,&quot;latino&quot;,&quot;history&quot;,&quot;korean drama&quot;,&quot;home \u0026 garden&quot;,&quot;animals&quot;,&quot;science \u0026 technology&quot;],&quot;params&quot;:{&quot;genres&quot;:null},&quot;tv_show&quot;:true,&quot;single&quot;:true}" class="genres-list-row"><div data-reactroot="" class="wo_genre-filters__wrap ">
	<span class="wo_genre-filter__link selected"><a href="#" data-genre="all">ALL GENRES</a></span>
	<span class="genres-separator"></span>

	@foreach($genres as $genre)
		<span class="wo_genre-filter__link "><a href="#" data-genre="action">{{ $genre }}</a></span><span class="genres-separator"></span>
	@endforeach

	<!-- <span class="wo_genre-filter__link "><a href="#" data-genre="action">action</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="adventure">adventure</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="animation">animation</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="comedy">comedy</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="crime">crime</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="drama">drama</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="fantasy">fantasy</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="horror">horror</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="reality">reality</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="romance">romance</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="family">family</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="mystery">mystery</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="anime">anime</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="children">children</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="news">news</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="talk &amp; interview">talk &amp; interview</a></span>
	<span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="documentary &amp; biography">documentary &amp; biography</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="game Show">game Show</a></span>
	<span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="sports">sports</a></span>
	<span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="music">music</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="science fiction">science fiction</a></span><span class="genres-separator"></span>
	<span class="wo_genre-filter__link "><a href="#" data-genre="celebrity &amp; entertainment">celebrity &amp; entertainment</a></span>
	<span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="food">food</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="latino">latino</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="history">history</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="korean drama">korean drama</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="home &amp; garden">home &amp; garden</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="animals">animals</a></span><span class="genres-separator"></span><span class="wo_genre-filter__link "><a href="#" data-genre="science &amp; technology">science &amp; technology</a></span> --></div>
</div>