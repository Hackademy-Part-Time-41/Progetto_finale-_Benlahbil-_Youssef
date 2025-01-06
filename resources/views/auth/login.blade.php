<x-layout>
<div class="container">
   <form action="/login" method="post">
     @csrf
              
    <label for="email">email</label>
    <input type="text" name="email" id="email" class="form-control"> 
    <label for="pwd1">password</label>
    <input type="text" name="password" id="pwd1" class="form-control"> 
              
    <button>Invia</button>
   </form>
</div>


</x-layout>