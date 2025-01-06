<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{


    public function create(){

        return view('article.create');
    }

    public function store(Request $request){

         $article = new Article;
         $article->title = new Article;
         $article->subtitle = new Article;
         $article->body = new Article;
         $article->save();

       
        return redirect()->back()->with('success','Articolo creato');
    }

    public function edit (Article $article) {
      
        if(Auth::user()->id == $article->user_id){
            return view('article.edit', compact('article'));

        }
        return redirect()->route('article.home')->with('alert', 'Accesso non consentito');
    }

    public function update(Request $request, Article $article)
    {
      $request->validate([
      'title' => 'required|min:5|unique:articles,title,' . $article->id,
      'subtitle'=> 'required|min:5',
      'body' => 'required|min:10',
      'image' => 'image',
      'category' => 'required',
      'tags' => 'required'
      ]);

      $article->update([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'body' => $request->body,
        'category_id' => $request->category,
      ]);
       if($request->image){
        Storage::delete($article->image);
        $article->update([
            'image'=> $request->file('image')->store('public/images')
        ]);

       }

       $tags = explode(',', $request->tags);

       foreach($tags as $i => $tags){
        $tags[$i] = trim($tag);

       }
       $newTags = [];

       foreach($tags as $tag){
        $newTag = Tag::updateOrCreate([
            'name' => strtolower($tag)
        ]);

        $newTags[] = $newTag->id;

       }

       $article->tags()->sync($newTags);

       return Redirect(route('writer.dashboard'))->with('message', 'Articolo modificato con successo');

    }

    public function destroy( Article $article){
       
        foreach ($article->tags as $tag) {
              $article->tags()->detach($tag);

        }

         $article->delete();

        return redirect()->back()->with('message', 'Articolo cancellato con successo');
    }
}
