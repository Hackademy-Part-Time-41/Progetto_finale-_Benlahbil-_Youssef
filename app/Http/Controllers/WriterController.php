<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class WriterController extends Controller
{
  public function dashboard(){
 $articles = Auth::user()->articles()->orderBy('created_at','desc')->get();
 $acceptedAarticles =$articles->where('is_accepted',true);
 $rejectedArticles =$articles->where('is_accepted' , false);
 $unrevisionedArticles = $articles->where('is_accepted',NULL);


return view('ertiter.dashboard', compact('acceptedArticles', 'rejectedArticles','unrevisionedArticles'));
  }
}
