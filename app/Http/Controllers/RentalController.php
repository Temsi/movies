<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieOrder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Accepts array of IDs
     * adds up current price based on tags, if any
     * saves order and movie_order pivot data
     * returns order with total
     * @param Request $request
     * @return mixed
     */
    public function createOrder(Request $request)
    {
        $orderTotal = 0;
        DB::beginTransaction();
        try {
            $movies = Movie::whereIn('id', $request->movies)->get();
            $order = Order::create(['total' => 0]);
            foreach ($movies as $movie) {
                $current_price = self::getCurrentPrice($movie);
                $orderTotal += $current_price;
                MovieOrder::create(['movie_id' => $movie->id, 'order_id' => $order->id]);
            }
            $formattedTotal = Number::format($orderTotal, 2);
            $order->total = $formattedTotal;
            $order->save();

            DB::commit();

            return $order;
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
    }

    /**
     *  accepts the $movie object as an input, and uses the
     *  multiplier value from the tag matching the tag_id
     *  to multiply the movie price
     *  the multiplier defaults to 1 if tag id is null
     *  returns the formatted, multiplied price value
     * @param $movie
     * @return float
     */
    public function getCurrentPrice($movie)
    {
        $multiplier = $movie->tag()->first(['multiplier'])->multiplier ?? 1;
        return (double) Number::format($movie->price * $multiplier, 2);
    }

    /**
     * Returns the movie
     * @param $movieId
     * @return mixed
     */
    public function getMovie($movieId)
    {
        $movie = Movie::find($movieId);
        return $movie;
    }

    /**
     * Returns the orders for the movie
     * @param $movieId
     * @return mixed
     */
    public function getMovieOrder($movieId)
    {
        $movie = Movie::find($movieId);
        return $movie->orders;
    }

    /**
     * Returns the order
     * @param $orderId
     * @return mixed
     */
    public function getOrder($orderId)
    {
        $order = Order::find($orderId);
        return $order;
    }

    public function getOrderMovies($orderId)
    {
        $order = Order::find($orderId);
        $movies = $order->movies;
        return $movies;
    }

}
