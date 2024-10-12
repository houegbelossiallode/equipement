<form action="{{ route('tarifs.update', $produit->id) }}" method="POST">
    @csrf
    @method('post')
    <!-- Afficher le nom du produit -->
    @php
    $informations = json_decode($produit->informations, true);
@endphp
    <div>
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" value="{{ $produit->nom }}" required>
    </div>

    <!-- Afficher les informations existantes du produit à modifier -->
    <div>
        <label for="type_vehicule">Type de véhicule</label>
        <input type="text" name="type_vehicule" id="type_vehicule" value="{{ $informations['type_vehicule'] }}" required>
    </div>

    <div>
        <label for="carburant">Carburant</label>
        <select name="carburant" id="carburant" required>
            <option value="essence" {{ $informations['carburant'] == 'essence' ? 'selected' : '' }}>Essence</option>
            <option value="diesel" {{ $informations['carburant'] == 'diesel' ? 'selected' : '' }}>Diesel</option>
        </select>
    </div>

    <!-- Afficher les tarifs existants pour chaque durée -->
    <div>
        <h3>Tarifs pour 1 an</h3>
        <label for="tarif_1an_100">100%: </label>
        <input type="number" name="tarif_1an_100" value="{{ $informations['tarifs']['1 an']['100%'] }}" required>
        <label for="tarif_1an_10">-10%: </label>
        <input type="number" name="tarif_1an_10" value="{{ $informations['tarifs']['1 an']['-10%'] }}">
        <label for="tarif_1an_15">-15%: </label>
        <input type="number" name="tarif_1an_15" value="{{ $informations['tarifs']['1 an']['-15%'] }}">
        <label for="tarif_1an_20">-20%: </label>
        <input type="number" name="tarif_1an_20" value="{{ $informations['tarifs']['1 an']['-20%'] }}">
    </div>

    <!-- Afficher des champs dynamiques déjà existants -->
    <div id="dynamic-fields">
        <h3>Champs dynamiques existants</h3>
        @foreach ($informations as $key => $value)
            @if (!in_array($key, ['type_vehicule', 'carburant', 'tarifs']))
                <div>
                    <label>{{ $key }}:</label>
                    <input type="text" name="existing_fields[{{ $key }}]" value="{{ $value }}">
                </div>
            @endif
        @endforeach
    </div>

    <!-- Ajout de nouveaux champs dynamiques -->
    <div>
        <label for="field_type">Type de champ à ajouter</label>
        <select id="field_type">
            <option value="text">Texte</option>
            <option value="number">Nombre</option>
        </select>
    </div>

    <button type="button" id="add-field">Ajouter un champ</button>

    <button type="submit">Mettre à jour</button>
</form>
