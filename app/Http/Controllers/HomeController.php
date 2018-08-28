<?php

namespace App\Http\Controllers;

use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Repository\MovieRepository;
use Tmdb\Model\Query\Discover\DiscoverMoviesQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Show popular movies
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $genreData = $request->genre;
        $movieType = $request->type;

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

        } else{
            $movies = Tmdb::getMoviesApi()->getPopular(['page' => 1])['results'];
        }

        $genres = Tmdb::getGenresApi()->getMovieGenres();

        return view('home', compact('movies', 'genres', 'genreData'));
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

        } else{
            $movies = Tmdb::getMoviesApi()->getPopular(['page' => $id])['results'];
        }

        
        
        if ($movies) {

            foreach ($movies as $movie) {
                        
                $posterImage = $movie['poster_path'];
                if (!empty($posterImage))  {
                        $posterImage = "https://image.tmdb.org/t/p/w154".$posterImage;
                } else {
                        $posterImage = '/no-poster.jpg';
                }

                $output .= '
                    <div class="wo_movie-item__link" style="pading:5px;">
                        <div class="wo_movie-item__poster">
                            <div class="wo_movie-item__poster" style="background-image: url(&quot;'. $posterImage .' &quot;);">
                            </div>
                            <div class="wo_movie-item__details">
                                <a href="/movies/fifty-shades-darker" data-event-name="See details click" data-event-label="Fifty Shades Darker" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">'. $movie['title'] .'</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">'. date("Y",strtotime($movie['release_date'])) .' </span><div class="wo_movie-item__info__rating">
                                    <div class="rating">
                                        <span style="color:#fdc228">☆</span>
                                    </div>&nbsp;
                                    '. $movie['vote_average'] .'</div></div><p class="wo_movie-item__description">
                            '. $movie['overview'] .'
                                </p>
                                </a>
                            </div>
                    </div>
                    
                    <div class="wo_movie-item__title">'. $movie['title'] .'</div>
                    
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
                        <button id="btn-more" data-id="'. ($id + 1).'" data-genre="'. $genreData.'" class="btn btn-info"> Load More Movies </button>
                    </div></center><br/>';
            
            echo $output;
        }
    }
 }
