<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RelationController extends Controller
{

  public function index(){
    $imgRoot = "img/background/characterImg/";
    $chaInfos = DB::select("select * from characters");
    $tasks = array(
      "imgRoot" => $imgRoot,
      "chaInfos" => $chaInfos
    );
    return view('background/relationship/relationship_view')->with('tasks', $tasks);
  }

}
