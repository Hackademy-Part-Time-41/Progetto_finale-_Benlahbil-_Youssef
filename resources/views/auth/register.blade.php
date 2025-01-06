<x-layout>
<div class="container">
<form action="/register" method="post">
@csrf
              <label for="name">Inserisci il tuo nome</label>
              <input type="text" name="name" id="name" class="form-control">    

              <label for="email">email</label>
              <input type="text" name="email" id="email" class="form-control"> 

              <label for="pwd1">password</label>
              <input type="text" name="password" id="pwd1" class="form-control"> 

              <label for="pwd2">conferma password</label>
              <input type="text" name="password_confirmation" id="pwd2" class="form-control">  

              <button>Invia</button>
</form>
</div>


</x-layout>