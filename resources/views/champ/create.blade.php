<h1>Ajouter un Champ à l'Offre : {{ $offre->titre }}</h1>

<form action="{{ route('champ.store', $offre->id) }}" method="POST">
    @csrf
    @method('POST')
    <div>
        <label for="type">Type de Champ</label>
        <select name="type" id="type">
            <option value="text">Texte</option>
            <option value="number">Nombre</option>
            <option value="date">Date</option>
            <option value="file">file</option>
            <option value="range">range</option>
            <option value="textarea">text long</option>
            <option value="select">Select</option>
            <!-- Ajoutez d'autres types de champs selon vos besoins -->
        </select>
    </div>
    <div>
        <label for="label">Label du Champ</label>
        <input type="text" name="label" id="label" value="{{ old('label') }}" required>
    </div>


    <div id="options" style="display:none;">
        <label for="options">Options pour le champ Select (séparées par des virgules)</label>
        <textarea name="options" id="options"></textarea>
    </div>


    <button type="submit">Ajouter le Champ</button>
</form>

<a href="{{ route('offres.show', $offre->id) }}">Retour à l'Offre</a>

<script>
document.getElementById('type').addEventListener('change', function() {
    var optionsField = document.getElementById('options');
    if (this.value === 'select') {
        optionsField.style.display = 'block';
    } else {
        optionsField.style.display = 'none';
    }
});

</script>


<script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
