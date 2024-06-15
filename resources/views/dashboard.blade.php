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
<div class="containerItems">

<div>


<h1>{{$item['name']}}</h1>
<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$key + 1}}.png" alt="">
</div>
</div>
@endforeach



</section>

    
</body>
</html>