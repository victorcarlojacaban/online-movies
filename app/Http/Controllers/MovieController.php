<?php

namespace App\Http\Controllers;

use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Repository\MovieRepository;
use Tmdb\Model\Query\Discover\DiscoverMoviesQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
    /* Show popular movies
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $genreData = $request->genre;
        $movieType = $request->type;
        $movieTv   = $request->tvshow;
        $search    = $request->search;

         // adword parameters
        $keyword = $request->keyword ?? '{money}';
        $matchtype = $request->matchtype ?? '{matcht}';
        $creative = $request->creative ?? '{ad2}';
        $gclid = $request->gclid ?? '{556688}';

        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];

        if ($genreData) {
            $movies = Tmdb::getGenresApi()->getMovies($genreData, ['page' => 1])['results'];
        } elseif ($movieType) {
            switch ($movieType) {
                case 'toprated':
                    $movies = Tmdb::getMoviesApi()->getTopRated(['page' => 1])['results'];
                    break;
                case 'upcoming':
                    $movies = Tmdb::getMoviesApi()->getUpcoming(['page' => 1])['results'];
                    break;
                case 'nowplaying':
                    $movies = Tmdb::getMoviesApi()->getNowPlaying(['page' => 1])['results'];
                    break;
                default :
                    $movies = Tmdb::getMoviesApi()->getPopular(['page' => 1])['results'];
                    break;
            }

        } elseif($movieTv) {
            $movies = Tmdb::getTvApi()->getPopular(['page' => 1])['results'];
        } elseif($search) {
            $movies = Tmdb::getSearchApi()->searchMovies($search)['results'];
        } else {
            $movies = Tmdb::getMoviesApi()->getPopular(['page' => 1])['results'];
        }

        $genres = Tmdb::getGenresApi()->getMovieGenres();

        return view('movies.index', compact('movies', 'genres', 'genreData', 'movieType', 'parameters'));
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
        
        $popularMovies = [];
        $nowPlayingMovies = [];
        $genreData = $request->genre;
        $movieType = $request->type;
       
        if ($genreData) {
            $movies = Tmdb::getGenresApi()->getMovies($genreData, ['page' => $id])['results'];
        } elseif ($movieType) {
            switch ($movieType) {
                case 'toprated':
                    $movies = Tmdb::getMoviesApi()->getTopRated(['page' => $id])['results'];
                    break;
                case 'upcoming':
                    $movies = Tmdb::getMoviesApi()->getUpcoming(['page' => $id])['results'];
                    break;
                case 'nowplaying':
                    $movies = Tmdb::getMoviesApi()->getNowPlaying(['page' => $id])['results'];
                    break;
                default :
                    $movies = Tmdb::getMoviesApi()->getPopular(['page' => $id])['results'];
                     break;
            }

        } else {
            $movies = Tmdb::getMoviesApi()->getPopular(['page' => $id])['results'];
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

        if ($movies) {
            foreach ($movies as $movie) {
                        
                $posterImage = $movie['poster_path'];
                if (!empty($posterImage))  {
                        $posterImage = "https://image.tmdb.org/t/p/w154".$posterImage;
                } else {
                        $posterImage = '/no-poster.jpg';
                }

                $movieId = $movie['id'];
                $movieTitle= str_replace(' ', '-',strtolower($movie['title']));
                $movieTitle = str_replace("'", "", "$movieTitle");
                $movieTitleAdwordUrl = '&keyword='. $movieTitle.'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];

                $link = "'/movies/show/".$movieId."?".$movieTitleAdwordUrl."'";

                $output .= '
                    <div class="wo_movie-item__link" style="pading:5px;">
                        <div class="wo_movie-item__poster">
                            <div class="wo_movie-item__poster" onclick="window.location.href='.$link.'" style="background-image: url(&quot;'. $posterImage .' &quot;);">
                            </div>
                            <div class="wo_movie-item__details">
                                <a href="/movies/show/'.$movieId.'?'.$movieTitleAdwordUrl.'" data-event-name="See details click" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">'. $movie['title'] .'</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">'. date("Y",strtotime($movie['release_date'])) .' </span><div class="wo_movie-item__info__rating">
                                    <div class="rating">
                                        <span style="color:#fdc228">☆</span>
                                    </div>&nbsp;
                                    '. $movie['vote_average'] .'</div></div><p class="wo_movie-item__description">
                            '. $movie['overview'] .'
                                </p>
                                </a>
                            </div>
                    </div>

                    <a style="color:white" href="/movies/show/'.$movieId.'?'.$movieTitleAdwordUrl.'">
                       '. $movie['title'] .'
                    </a>
                    
                    <div class="wo_movie-item__info"><span class="wo_movie-item__info__year">'. date("Y",strtotime($movie['release_date'])) .'</span><div class="wo_movie-item__info__rating">
                        <div class="rating">
                            <span style="color:#fdc228">☆</span>
                        </div>&nbsp;
                    '. $movie["vote_average"] .'
                    </div>
                    </div>

                </div>';
            }

            $output .= '<center><div id="remove-row" style="color:black">
                        <button id="btn-more" data-id="'. ($id + 1).'" data-genre="'. $genreData.'" data-type="'. $movieType.'" class="button-load"> Load More Movies </button>
                    </div></center><br/>';
            
            echo $output;
        }
    }

    /**
     * Show Specific Data for Movie
     * @param  int $id id of movie
     * 
     * @return Resource
     */
    public function show(Request $request, $id)
    {
        $movie = Tmdb::getMoviesApi()->getMovie($id);
        $similarMovies = Tmdb::getMoviesApi()->getSimilar($id)['results'];

        $casts = Tmdb::getMoviesApi()->getCredits($id)['cast'];

        $crews = Tmdb::getMoviesApi()->getCredits($id)['crew'];

        $video =  Tmdb::getMoviesApi()->getVideos($id)['results'][0]['key'] ?? null;

        $directors = [];
        $writers = [];


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

        foreach ($crews as $crew) {
            if ($crew['job'] == 'Director') {
                $directors[] = $crew['name'];
            } 

            if ($crew['department'] == 'Writing') {
                $writers[] = $crew['name'];
            } 
        }

        return view('movies.show', compact('movie', 'similarMovies', 'directors', 'writers', 'casts', 'video', 'parameters'));

    }
 }
