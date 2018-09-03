<?php

namespace App\Http\Controllers;

use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Repository\MovieRepository;
use Tmdb\Model\Query\Discover\DiscoverMoviesQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class TvController extends Controller
{
    /**
     * Show popular movies
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tvshows = Tmdb::getTvApi()->getPopular(['page' => 1])['results'];
        $search    = $request->search;

        if ($search) {
            $tvshows = Tmdb::getSearchApi()->searchTv($search)['results'];
        }

         // adword parameters
        $keyword = $request->keyword;
        $matchtype = $request->matchtype ?? '{matcht}';
        $creative = $request->creative ?? '{ad2}';
        $gclid = $request->gclid ?? '{556688}';

        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];

        $genres = Tmdb::getGenresApi()->getMovieGenres();

        return view('tvshows.index', compact('tvshows', 'genres', 'parameters'));
    }

    /**
     * Load movie on button click
     * 
     * @param  Request $request request
     * 
     * @return string
     */
    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id + 1;
        
        $tvshows = Tmdb::getTvApi()->getPopular(['page' => $id])['results'];

        $keyword = $request->keyword;
        $matchtype = $request->matchtype ?? '{matcht}';
        $creative = $request->creative ?? '{ad2}';
        $gclid = $request->gclid ?? '{556688}';

        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];


        if ($tvshows) {

            foreach ($tvshows as $movie) {
                        
                $posterImage = $movie['poster_path'];
                if (!empty($posterImage))  {
                        $posterImage = "https://image.tmdb.org/t/p/w154".$posterImage;
                } else {
                        $posterImage = '/no-poster.jpg';
                }

                $movieId = $movie['id'];
                $movieTitle= str_replace(' ', '-',strtolower($movie['name']));
                $movieTitle = str_replace("'", "", "$movieTitle");
                $movieTitleAdwordUrl = '&keyword='. $movieTitle.'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];

                $link = "/movies/show/".$movieId."?".$movieTitleAdwordUrl;

                $output .= '
                    <div class="wo_movie-item__link" style="pading:5px;">
                        <div class="wo_movie-item__poster" onclick="window.location.href='.$link.'">
                            <div class="wo_movie-item__poster" style="background-image: url(&quot;'. $posterImage .' &quot;);">
                            </div>
                            <div class="wo_movie-item__details">
                                <a href="'. $link .'" data-event-name="See details click" data-event-label="Fifty Shades Darker" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">'. $movie['name'] .'</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">'. date("Y",strtotime($movie['first_air_date'])) .' </span><div class="wo_movie-item__info__rating">
                                    <div class="rating">
                                        <span style="color:#fdc228">☆</span>
                                    </div>&nbsp;
                                    '. $movie['vote_average'] .'</div></div><p class="wo_movie-item__description">
                            '. $movie['overview'] .'
                                </p>
                                </a>
                            </div>
                    </div>
                    
                    <a style="color:white" href="'. $link .'">
                       '. $movie['name'] .'
                    </a>
                    
                    <div class="wo_movie-item__info"><span class="wo_movie-item__info__year">'. date("Y",strtotime($movie['first_air_date'])) .'</span><div class="wo_movie-item__info__rating">
                        <div class="rating">
                            <span style="color:#fdc228">☆</span>
                        </div>&nbsp;
                    '. $movie["vote_average"] .'
                    </div>
                    </div>

                </div>';
            }

            $output .= '<center><div id="remove-row" style="color:black">
                        <button id="btn-more" data-id="'. ($id + 1).'" class="button-load"> Load More TV Shows </button>
                    </div></center><br/>';
            
            echo $output;
        }
    }

    public function show(Request $request, $id)
    {
        $movie = Tmdb::getTvApi()->getTvshow($id);

        // adword parameters
        $keyword = $request->keyword;
        $matchtype = $request->matchtype;
        $creative = $request->creative;
        $gclid = $request->gclid;

        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];


        $similarMovies = Tmdb::getTvApi()->getSimilar($id)['results'];

        $casts = Tmdb::getTvApi()->getCredits($id)['cast'];

        $crews = Tmdb::getTvApi()->getCredits($id)['crew'];

        $video =  Tmdb::getTvApi()->getVideos($id)['results'][0]['key'] ?? null;

        $directors = [];
        $writers = [];

        foreach ($crews as $crew) {
            if ($crew['job'] == 'Director') {
                $directors[] = $crew['name'];
            } 

            if ($crew['department'] == 'Writing') {
                $writers[] = $crew['name'];
            } 
        }

        return view('tvshows.show', compact('movie', 'similarMovies', 'directors', 'writers', 'casts', 'video', 'parameters'));
    }
 }
