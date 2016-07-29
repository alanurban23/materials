<?php

namespace App\Http\Controllers;

use App\Material;
use App\MaterialGroups;
use App\Measures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class MaterialController extends Controller
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
        $m = new Material();
        $m->code = Input::get('code');
        $m->name = Input::get('name');
        $m->measures_id = Input::get('measure');
        $m->material_groups_id = Input::get('group');
        $m->save();

        Session::flash('message', 'Dodano nowy materiał');
        return redirect('/');
    }

    /**
     * Update the specified measure.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $code)
    {

        Material::where('code', $code)
            ->update([
                'code' => Input::get('code'),
                'name' => Input::get('name'),
                'measures_id' => Input::get('measure'),
                'material_groups_id' => Input::get('group'),
            ]);

        Session::flash('message', 'Zaaktualizowano materiał o kodzie '.$code);
        return redirect('/');
    }
}
