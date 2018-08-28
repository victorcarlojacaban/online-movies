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

        $genres = Tmdb::getGenresApi()->getMovieGenres();

        return view('tvshow', compact('tvshows', 'genres'));
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

        if ($tvshows) {

            foreach ($tvshows as $movie) {
                        
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
                                <a href="#" data-event-name="See details click" data-event-label="Fifty Shades Darker" data-event-category="List Page" class="wo_movie-item__wrap track_event"><div class="wo_movie-item__title">'. $movie['name'] .'</div><div class="wo_movie-item__info"><span class="wo_movie-item__info__year">'. date("Y",strtotime($movie['first_air_date'])) .' </span><div class="wo_movie-item__info__rating">
                                    <div class="rating">
                                        <span style="color:#fdc228">☆</span>
                                    </div>&nbsp;
                                    '. $movie['vote_average'] .'</div></div><p class="wo_movie-item__description">
                            '. $movie['overview'] .'
                                </p>
                                </a>
                            </div>
                    </div>
                    
                    <div class="wo_movie-item__title">'. $movie['name'] .'</div>
                    
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
                        <button id="btn-more" data-id="'. ($id + 1).'" class="button"> Load More TV Shows </button>
                    </div></center><br/>';
            
            echo $output;
        }
    }
 }
