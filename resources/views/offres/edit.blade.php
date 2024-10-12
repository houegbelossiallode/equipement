<div class="container">
    <h1>Modifier la Réponse</h1>

    <form action="{{ route('offres.update', $reponse->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>{{ $reponse->offre->titre }}</h1>
        @php
            // Décoder les valeurs JSON pour obtenir un tableau associatif
            $valeurs = json_decode($reponse->valeurs, true);
        @endphp

        @foreach($valeurs as $champ => $valeur)
            <div class="form-group">
                <input type="text" name="valeurs[{{ $champ }}]" value="{{ $valeur }}" placeholder="{{ $champ }}" class="form-control">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
