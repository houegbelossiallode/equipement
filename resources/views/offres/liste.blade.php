<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Document</title>
</head>
<body>

    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>

    <div class="container">
        <h1>Toutes les Réponses</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Offre ID</th>
                    <th>Valeurs</th>
                    <th>Créé le</th>
                    <th>Mis à jour le</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reponses as $reponse)
                    <tr>
                        <td>{{ $reponse->id }}</td>
                        <td>{{ $reponse->offre_id }}</td>
                        <td>
                            @if ($reponse->valeurs)
                                {{ json_encode(json_decode($reponse->valeurs), JSON_PRETTY_PRINT) }}
                            @else
                                Aucune valeur
                            @endif
                        </td>
                        <td>{{ $reponse->created_at }}</td>
                        <td>{{ $reponse->updated_at }}</td>
                        <td><a href="{{ route('offres.edit', $reponse->id) }}">Modifier</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <!-- JS Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        }
    </script>

</body>
</html>





