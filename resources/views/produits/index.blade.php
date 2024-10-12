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

<table>
    <thead>
        <th>Produit</th>
        <th>Type de véhicule</th>
        <th>Carburant</th>
        <th>Profession</th>
        <th>Tarifs</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($produits as $produit)
        @php
            $informations = json_decode($produit->informations, true);
        @endphp
        <tr>
            <td><h2>{{ $produit->nom }}</h2></td>
            <td><p>Type de véhicule: {{ $informations['type_vehicule'] }}</p></td>
            <td><p>Carburant: {{ $informations['carburant'] }}</p></td>
            <td><p>Profession: {{ $informations['profession'] }}</p></td>
            <td>
                <ul>
                    <li>1 an: 100%: {{ $informations['tarifs']['1 an']['100%'] }}</li>
                    <li>6 mois: 100%: {{ $informations['tarifs']['6 mois']['100%'] }}</li>
                    <!-- Afficher les autres durées et tarifs -->
                </ul>

            </td>
            <td><a href="{{ route('tarifs.edit',$produit->id) }}">Modifier</a></td>
        </tr>



        @endforeach
    </tbody>
</table>






    <h3>Tarifs:</h3>


    <!-- Afficher les champs dynamiques -->
    <h3>Champs supplémentaires:</h3>
    @foreach ($informations as $key => $value)
        @if (!in_array($key, ['type_vehicule', 'carburant', 'tarifs']))
            <p>{{ $key }}: {{ $value }}</p>
        @endif
    @endforeach



 <!-- jQuery (Toastr dépend de jQuery) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- Toastr JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

     @if (Session::has('message'))
     <script>
         toastr.options = {
             "progressBar" : true,
         }
         toastr.success("{{ Session::get('message') }}"  );
     </script>
     @endif



</body>
</html>
