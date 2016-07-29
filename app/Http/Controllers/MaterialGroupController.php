<?php

namespace App\Http\Controllers;

use App\MaterialGroups;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MaterialGroupController extends Controller
{
    /**
     * Show a list of all available flights.
     *
     * @return Response
     */
    public function index()
    {
        $measures = MaterialGroups::all();

        dd($measures->materials);

        return view('flight.index', ['measures' => $measures]);
    }

    /**
     * Store a new user.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $group = Input::get('group');

        if (is_null($group)) {
            $mg = new MaterialGroups();
            $mg->name = Input::get('name');
            $mg->save();

            $setNodeGroup = MaterialGroups::find($mg->id);
            $setNodeGroup->id_head_group = $mg->id;
            $setNodeGroup->save();

        } else {
            $group_head = MaterialGroups::find($group)->id;

            $mg = new MaterialGroups();
            $mg->name = Input::get('name');
            $mg->id_head_group = $group_head;
            $mg->save();
        }

        Session::flash('message', 'Dodano nową grupę materiałów');
        return redirect('/');
    }

    /**
     * @param Request $request
     * @param $old_group
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $old_group)
    {
        if (Input::get('save')) {

            $group = MaterialGroups::find($old_group);
            $group->name = Input::get('name');
            $group->save();

            Session::flash('message', 'Zaaktualizowano nazwę wybranej grupy materiałów');
            return redirect('/');

        } else {

            $g0 = MaterialGroups::find($old_group);
            $g0->id_head_group = Input::get('group');
            $g0->save();


            Session::flash('message', 'Zmieniono nadrzędną grupę dla materiałów z grup ' . $g0->name);
            return redirect('/');
        }


    }

}
