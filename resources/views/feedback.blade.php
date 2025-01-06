<x-layout>

<div class="container">
    @if(session()->has('success'))
    {{session('success')}}
    @endif

    <form action="{{route('feedback.send')}}" method ="POST">
        @csrf
    <label form="name">Inserisci il tuo nome</label>
    <input type="text" name="" id="name" class="form-control">
    <label form="text">Inserisci il tuO feedback</label>
    <input type="text" name="" id="text" class="form-control">
    <button>Invia</button>
    
    </form>

</div>

</x-layout>