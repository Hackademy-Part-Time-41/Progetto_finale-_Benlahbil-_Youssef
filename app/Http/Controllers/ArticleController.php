<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function edit () {
      
        if(Auth::user()->id == $article->user_id){
            return view('article.edit', compact('article'));

        }
        return redirect()->route('homepage')->with('alert', 'Access non consentito');
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
        'category_id' => $request->category
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
        $newTag = Tag::update0rCreate([
            'name' => strtolower($tag)
        ]);
        $newTags[] = $newTag->id;

       }
       $article->tags()->sync($newTags);

       return Redirect(route('writer,dashboard'))->with('message', 'Articolo modificato con successo');

    }
}
