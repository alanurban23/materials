<?php

namespace App\Http\Controllers;

use App\Measures;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class MeasureController extends Controller
{

    /**
     * Show a list of all available flights.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $measure = new Measures();
        $measure->short_name = Input::get('short_name');
        $measure->name = Input::get('name');
        $measure->save();

        Session::flash('message', 'Dodano nową jednostkę');
        return redirect('/');
    }

    /**
     * Update the specified measure.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Measures::where('short_name', $id)
            ->update([
                'short_name' => Input::get('short_name'),
                'name' => Input::get('name'),
            ]);

        Session::flash('message', 'Zaaktualizowano jednostkę miary');
        return redirect('/');
    }
}
