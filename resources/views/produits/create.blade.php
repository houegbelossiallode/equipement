<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#33b5e5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
    <link rel='stylesheet' id='roboto-subset.css-css'  href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5' type='text/css' media='all' />
    <meta charset="utf-8">


<form action="{{ route('tarifs.store') }}" method="POST">
    @csrf
    @method('post')
    <div>
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" required>
    </div>

    <div>
        <label for="type_vehicule">Type de véhicule</label>
        <input type="text" name="type_vehicule" id="type_vehicule" required>
    </div>

    <div>
        <label for="type_vehicule">Profession</label>
        <input type="text" name="profession" id="profession" required>
    </div>

    <div>
        <label for="carburant">Carburant</label>
        <select name="carburant" id="carburant" required>
            <option value="essence">Essence</option>
            <option value="diesel">Diesel</option>
        </select>
    </div>

    <!-- Tarifs pour chaque durée -->
    <div>
        <h3>Tarifs pour 1 an</h3>
        <label for="tarif_1an_100">100%: </label>
        <input type="number" name="tarif_1an_100" id="tarif_1an_100" required>
        <label for="tarif_1an_10">-10%: </label>
        <input type="number" name="tarif_1an_10" id="tarif_1an_10">
        <label for="tarif_1an_15">-15%: </label>
        <input type="number" name="tarif_1an_15" id="tarif_1an_15">
        <label for="tarif_1an_20">-20%: </label>
        <input type="number" name="tarif_1an_20" id="tarif_1an_20">
    </div>

    <div>
        <h3>Tarifs pour 6 mois</h3>
        <label for="tarif_6mois_100">100%: </label>
        <input type="number" name="tarif_6mois_100" id="tarif_6mois_100" required>
        <label for="tarif_6mois_10">-10%: </label>
        <input type="number" name="tarif_6mois_10" id="tarif_6mois_10">
        <label for="tarif_6mois_15">-15%: </label>
        <input type="number" name="tarif_6mois_15" id="tarif_6mois_15">
        <label for="tarif_6mois_20">-20%: </label>
        <input type="number" name="tarif_6mois_20" id="tarif_6mois_20">
    </div>

    <!-- Section pour les champs dynamiques -->
    <div id="dynamic-fields">
        <h3>Champs supplémentaires</h3>
    </div>

    <!-- Sélection du type de champ dynamique -->
    <div>
        <label for="field_type">Type de champ</label>
        <select id="field_type">
            <option value="text">Texte</option>
            <option value="number">Nombre</option>
        </select>
    </div>

    <button type="button" id="add-field">Ajouter un champ</button>

    <button type="submit">Enregistrer</button>
</form>


 <!-- jQuery (Toastr dépend de jQuery) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- Toastr JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

     @if (Session::has('success'))
     <script>
         toastr.options = {
             "progressBar" : true,
         }
         toastr.success("{{ Session::get('success') }}"  );
     </script>
     @endif


     <script>

$(document).ready(function() {
    var fieldIndex = 0;

    // Ajoute un champ dynamique quand on clique sur le bouton
    $('#add-field').click(function() {
        fieldIndex++;
        var fieldType = $('#field_type').val(); // Récupère le type de champ sélectionné

        var newField = '';

        // Génère un champ texte ou nombre selon la sélection de l'utilisateur
        if (fieldType === 'text') {
            newField = `
                <div id="field_${fieldIndex}">
                    <label for="dynamic_field_${fieldIndex}_text">Nouveau champ texte ${fieldIndex}</label>
                    <input type="text" name="dynamic_fields[${fieldIndex}][name]" placeholder="Nom du champ">
                    <input type="text" name="dynamic_fields[${fieldIndex}][value]" placeholder="Valeur du champ">
                    <button type="button" onclick="removeField(${fieldIndex})">Supprimer</button>
                </div>
            `;
        } else if (fieldType === 'number') {
            newField = `
                <div id="field_${fieldIndex}">
                    <label for="dynamic_field_${fieldIndex}_number">Nouveau champ nombre ${fieldIndex}</label>
                    <input type="text" name="dynamic_fields[${fieldIndex}][name]" placeholder="Nom du champ">
                    <input type="number" name="dynamic_fields[${fieldIndex}][value]" placeholder="Valeur du champ">
                    <button type="button" onclick="removeField(${fieldIndex})">Supprimer</button>
                </div>
            `;
        }

        $('#dynamic-fields').append(newField);
    });
});

// Fonction pour supprimer un champ dynamique
function removeField(index) {
    $('#field_' + index).remove();
}


     </script>



</body>
</html>
