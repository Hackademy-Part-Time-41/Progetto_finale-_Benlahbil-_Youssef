<x-layout>
<div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-1">Crea il tuo Articolo</h1>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form action="{{ route('articles.store')}}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="from-label">Titolo</label>
                    <input type="text" name="title" class="from-control" id="title" value="{{$article->title}}">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="from-label">Sottotitle</label>
                    <input type="text" name="subtitle" class="from-control" id="subtitle" value="{{$article->subtitle}}">
                    @error('subtitle')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="from-label">Inserisci un Immagine</label>
                    <input type="file" name="image" class="from-control" id="image">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                     <label for="category" class="from-label">Categoria</label>
                     <select name="category" id="category" class="from-control">
                     <option selected disabled>Seleziona categria</option>
                     @foreach ($categories as $category)
                     <option value="{{$category->id}}" @if($article->category->id == $category->id) selected @endif>{{$category->name}}</option>
                     @endforeach
                     </select>
                     @error('category')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>     

                <div class="mb-3">
                     <label for="tags" class="from-label">Tags</label>
                     <input type="text" name="tags" class="from-control" id="tags" value="{{$article->tags->implode('name', ', ')}}">
                     span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                     @error('tags')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>     

                <div class="mb-3">
                     <label for="body" class="from-label">Corpo del testo</label>
                     <textarea name="body" class="from-control" id="body" cols="30" rows="7">{{$article->body}}</textarea>
                     @error('body')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>

                <div class="mb-3 d-flex justify-content-center flex-comun align-items-center">
                     <a href="{{route('home'}}" class="text-secondary mt-2">Torna alla home</a>
                </div>

            </form>
        </div>
     </div>
    </div>

</x-layout>
           
