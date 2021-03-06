<?php

namespace App\Http\Controllers;

use App\Material;
use App\MaterialGroups;
use App\Measures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class HomeController extends Controller
{

    public function index()
    {


        $measures = Measures::all();
        $material_groups = MaterialGroups::all();

        foreach ($material_groups as $group) {
            $materials = MaterialGroups::find($group->id)->materials->sortBy('name');
            $group->materials = $materials;
        }

        $material_groups_tree = $this->createTree($material_groups);
        $groups_html = $this->recurseTree($material_groups_tree);

        $select_groups = MaterialGroups::pluck('name', 'id');
        $select_measures = Measures::pluck('name', 'id');
        $materials = Material::all();

        foreach ($materials as $material) {
            $material->measure = $material->measures;
            $material->group = $material->material_groups;
        }

        return view('home')->with([
            'measures' => $measures,
            'groups' => $groups_html,
            'select_group' => $select_groups,
            'select_measures' => $select_measures,
            'materials' => $materials,
        ]);
    }

    public function createTree($groups)
    {

        $groupsArray = $groups->toArray();

        $tree = array();
        foreach ($groupsArray as $item) {
            if (!isset($tree[$item['id']])) $tree[$item['id']] = array();
            $tree[$item['id']] = array_merge($tree[$item['id']], $item);
            if (!isset($tree[$item['id_head_group']])) $tree[$item['id_head_group']] = array();
            if (!isset($tree[$item['id_head_group']]['children'])) $tree[$item['id_head_group']]['children'] = array();
            $tree[$item['id_head_group']]['children'][] = &$tree[$item['id']];
        }

        foreach ($tree as $item) {
            if ($item['id'] != $item['id_head_group']) array_forget($tree, $item['id']);
        }


        return $tree;

    }

    function recurseTree($data)
    {
        $array_html = array();

        if (is_array($data)) {
            array_push($array_html, '<ul>');
            foreach ($data as $node) {
                array_push($array_html, '<li id="' . $node['id'] . '" class="group" data-name="'.$node['name'].'">' . '<span class="glyphicon glyphicon-plus expand"></span><a href="#" data-toggle="modal" data-target="#change-group-modal">' .$node['name'] . '</a><span id="'.$node['id'].'" class="glyphicon glyphicon-sort-by-alphabet
"></span>');
                if (isset($node['children']) and isset($node['materials'])) {
                    array_push($array_html, '<ul class="hidden roll-in">');
                    $index = 0;
                    foreach ($node['children'] as $child) {
                        $index++;

                        if ($node['name'] == $child['name']) {

                        } else {

                            if (is_array($child)) {
                                $ht = $this->deepth($child);
                                array_push($array_html, $ht);
                                //dd($ht);
                            }
                        }
                    }
                    //array_push($array_html, '</ul>');

                    if ($node['materials']->count() > 0) {
                        array_push($array_html, '<ul class="hidden roll-in materials">');
                        foreach ($node['materials'] as $material) {
                            array_push($array_html, '<li data-name="'.$material->name.'" data-code="'.$material->code.'" data-measure-id="'.$material->measures_id.'" data-material_group-id="'.$material->material_groups_id.'">' . $material->name . '</li>');
                        }
                        array_push($array_html, '</ul>');
                    }

                    array_push($array_html, '</ul>');
                } elseif (isset($node['children'])) {
                    array_push($array_html, '<ul class="hidden roll-in">');
                    foreach ($node['children'] as $child) {
                        if ($node['name'] == $child['name']) {

                        } else {

                            if (is_array($child)) {
                                $ht = $this->deepth($child);
                                array_push($array_html, $ht);
                                //dd($ht);
                            }
                        }
                    }
                    array_push($array_html, '</ul>');
                }
                array_push($array_html, '</li>');
            }
            array_push($array_html, '</ul>');
        }

        return array_flatten($array_html);

    }

    function deepth($child)
    {
        $array_html = array();

        array_push($array_html, '<li id="' . $child['id'] . '" class="group" data-name="'.$child['name'].'">' . '<span class="glyphicon glyphicon-plus expand"></span><a href="#" data-toggle="modal" data-target="#change-group-modal">' . $child['name'] . '</a><span id="'.$child['id'].'" class="glyphicon glyphicon-sort-by-alphabet
"></span>');

        if (isset($child['children']) and ($child['materials']->count() > 0)) {
            array_push($array_html, '<ul class="hidden roll-in">');
            foreach ($child['children'] as $ch) {

                if ($ch['name'] == $child['name']) {

                } else {
                    if (isset($ch['children'])) {
                        $ht = $this->deepth($ch);
                        array_push($array_html, $ht);
                    }

                }
                array_push($array_html, '<li id="' . $ch['id'] . '" class="group" data-name="'.$ch['name'].'">' . '<span class="glyphicon glyphicon-plus expand"></span><a href="#" data-toggle="modal" data-target="#change-group-modal">' . $ch['name'] . '</a><span id="'.$ch['id'].'" class="glyphicon glyphicon-sort-by-alphabet
                                        "></span></li>');

            }
            array_push($array_html, '<ul class="hidden roll-in materials" style="padding-left: 0">');
            foreach ($child['materials'] as $material) {
                array_push($array_html, '<li data-name="'.$material->name.'" data-code="'.$material->code.'" data-measure-id="'.$material->measures_id.'" data-material_group-id="'.$material->material_groups_id.'">' . $material->name . '</li>');
            }
            array_push($array_html, '</ul>');
            array_push($array_html, '</ul>');

        } elseif (isset($child['children'])) {
            array_push($array_html, '<ul class="hidden roll-in">');
            foreach ($child['children'] as $ch) {

                if ($ch['name'] == $child['name']) {

                } else {
                    if (isset($ch['children'])) {

                        $ht = $this->deepth($ch);
                        array_push($array_html, $ht);
                    }
                    else {
                        array_push($array_html, '<li id="' . $ch['id'] . '" class="group" data-name="'.$ch['name'].'">' . '<span class="glyphicon glyphicon-plus expand"></span><a href="#" data-toggle="modal" data-target="#change-group-modal">' . $ch['name'] . '</a><span id="'.$ch['id'].'" class="glyphicon glyphicon-sort-by-alphabet
"></span>');

                        if ($ch['materials']->count() > 0) {
                            array_push($array_html, '<ul class="hidden roll-in materials">');
                            foreach ($ch['materials'] as $material) {
                                array_push($array_html, '<li data-name="'.$material->name.'" data-code="'.$material->code.'" data-measure-id="'.$material->measures_id.'" data-material_group-id="'.$material->material_groups_id.'">' . $material->name . '</li>');
                            }
                            array_push($array_html, '</ul>');

                        }

                        array_push($array_html, '</li>');
                    }

                }
            }

            array_push($array_html, '</ul>');

        } elseif (isset($child['materials'])) {
            array_push($array_html, '<ul class="hidden roll-in materials">');
            foreach ($child['materials'] as $m) {

                array_push($array_html, '<li data-name="'.$m->name.'" data-code="'.$m->code.'" data-measure-id="'.$m->measures_id.'" data-material_group-id="'.$m->material_groups_id.'">' . $m->name . '</li>');

            }
            array_push($array_html, '</ul>');
        }
        array_push($array_html, '</li>');

        return $array_html;
    }
}
