<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('/css/result.css')}}">

</head>
<body>
    
@include('header')

<section class="containerAll">

<div class="containerItems">


<div class="containerSprite">
<img class="spriteStyle" src="{{$data['sprites']['front_default']}}" alt="">
</div>

<h1 class="titlePokemon">{{$data['forms'][0]['name']}}</h1>

</div>

<div>

</div>

<div class="containerStats">
<h1 class="statsTitle">STATS</h1>
<div class="containerStats2">

<h1 class="stats">TYPE: {{$data['types'][0]['type']['name']}}</h1>
<h1 class="stats">HP: {{$data['stats'][0]['base_stat']}}</h1>
<h1 class="stats">AT: {{$data['stats'][1]['base_stat']}}</h1>
<h1 class="stats">DEF: {{$data['stats'][1]['base_stat']}}</h1>
</div>
</div>

</section>


</body>
</html>