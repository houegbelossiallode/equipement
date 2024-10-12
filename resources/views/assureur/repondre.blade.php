<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Répondre à l'Offre : {{ $offre->titre }}</h1>

    <form action="{{ route('reponses.store', $offre->id) }}" method="POST">
        @csrf

        @foreach($offre->champs as $champ)
            <div>
                <label for="champ_{{ $champ->id }}">{{ $champ->label }}</label>
                @if($champ->type == 'text')
                    <input type="text" name="{{ $champ->label }}" id="champ_{{ $champ->id }}" placeholder="{{ $champ->label }}" required>
                @elseif($champ->type == 'number')
                    <input type="number" name="{{ $champ->label }}" id="champ_{{ $champ->id }}" placeholder="{{ $champ->label }}" required>
                @elseif($champ->type == 'date')
                    <input type="date" name="{{ $champ->label }}" id="champ_{{ $champ->id }}" placeholder="{{ $champ->label }}" required>
                @elseif($champ->type == 'file')
                    <input type="file" name="{{ $champ->label }}" id="champ_{{ $champ->id }}" placeholder="{{ $champ->label }}" required>
                @elseif($champ->type == 'range')
                    <input type="range" name="{{ $champ->label }}" id="champ_{{ $champ->id }}" placeholder="{{ $champ->label }}" required>
                @elseif($champ->type == 'textarea')
                    <input type="textarea" name="{{ $champ->label }}" id="champ_{{ $champ->id }}" placeholder="{{ $champ->label }}" required>
                @elseif($champ->type == 'select')
                    <label for="{{ $champ->id }}">{{ $champ->label }}</label>
                    <select name="{{ $champ->id }}" id="{{ $champ->id }}">
                        @foreach($champ->options as $option)
                            <div>
                                <input type="checkbox" name="options[]" value="{{ $option }}" id="option-{{ $loop->index }}">
                                <label for="option-{{  $loop->index }}">{{ $option }}</label>
                            </div>
                        @endforeach
                    </select>
                @endif
                <!-- Vous pouvez ajouter d'autres types de champs ici -->
            </div>
        @endforeach

        <button type="submit">Soumettre</button>
    </form>

</body>
</html>



