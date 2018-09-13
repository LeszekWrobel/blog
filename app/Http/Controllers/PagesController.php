<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $title = "Witaj na Blogu !";
      // return view ('pages.index', compact('title'));
      return view ('pages.index')->with('title',$title);

    }
    public function about()
    {
      $title = "O Blogu";
      return view ('pages.about')->with('title',$title);
    }
    public function services()
    {
      $data = array(
      'title' => 'Usługi',
      'services' => ['Komis','Przeróbki','Dopasowanie']
      );
      return view ('pages.services')->with($data);
    }

  
}
