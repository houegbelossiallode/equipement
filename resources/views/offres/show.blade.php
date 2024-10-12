<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Détails de l'offre : {{ $offre->titre }}</h1>

    <ul>
        @foreach ($offre->champs as $champ)
            <li>
            {{ $champ->label }}  ({{ $champ->type }})
            </li>
        @endforeach
    </ul>
   <a href="{{ route('champ.create', $offre->id) }}">Ajouter un champ</a>
</body>
</html>





