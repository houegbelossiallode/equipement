<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
</script>
    <h1>Listes des offres</h1>

    <ul>
        @foreach ($offres as $offre)
        <li>{{ $offre->description }}</li>
            <li>
            <a href="{{ route('offres.show', $offre->id) }}">{{ $offre->titre }}</a>
            </li>
            <a href="{{ route('offres.repondre', $offre->id) }}">Répondre à l'offre</a>
            <a href="{{ route('offres.liste') }}">Voir les détails</a>
        @endforeach
    </ul>

</body>
</html>





