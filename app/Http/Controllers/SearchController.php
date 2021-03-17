<?php


namespace App\Http\Controllers;

use App\Dish;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {

            $data = Dish::where('name', 'LIKE', $request->name . '%')->get();


            $output = '';
            $local = '../storage/';
            //$link = 'http://127.0.0.1:8000/admin/dish/'.$row->slug.'';

            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item"><img width="50px" src=" '.$local.''.$row->cover.' "><a href="">'.$row->name.'</a></li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }

            return $output;
        }
    }
}
