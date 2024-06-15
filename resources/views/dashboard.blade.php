<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">

</head>
<body>

@include('header')



<section class="containerAll">
    

@foreach ($name as $key => $item)
<form method="POST" action="/result" class="containerItems">
@csrf
<div class="containerItems2">

<div class="containerItems22">

<button type="submit" class="buttonDashboard"><img class="spriteStyle" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$key + 1}}.png" alt=""></button>
<input type="text" name="key" value="{{$key + 1}}" style="display:none">

<div>
<h1 class="pokemonTitle">{{$item['name']}}</h1>
</div>

</div>

</div>

</form>
@endforeach



</section>

@include('footer')
    
</body>
</html>