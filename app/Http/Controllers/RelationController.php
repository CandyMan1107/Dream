<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RelationController extends Controller
{
  public function index(){
    $imgRoot = "img/background/characterImg/";
    $chaInfos = DB::select("select * from characters");
    $relInfos = DB::select("select * from relations");
    $tasks = array(
      "imgRoot"   => $imgRoot,
      "chaInfos"  => $chaInfos,
      "relInfos"  => $relInfos
    );
    return view('background.relationship.relationship_view')->with('tasks', $tasks);
  }
}
