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
<div>
<h1>{{$item['name']}}</h1>
<button type="submit"><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$key + 1}}.png" alt=""></button>
<input type="text" name="key" value="{{$key + 1}}" style="display:none">
</div>

</form>
@endforeach



</section>

    
</body>
</html>