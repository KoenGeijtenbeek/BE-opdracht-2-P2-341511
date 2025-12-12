@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazijn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">

        <h1>Leerancier Overzicht</h1>

        <h4>Naam leverancier: {{ $data[0]->LeverancierNaam ?? '' }}</h4>
        <h4>Contactpersoon leverancier: {{ $data[0]->ContactPersoon ?? '' }}</h4>
        <h4>Leverancier nummer: {{ $data[0]->LeverancierNummer ?? '' }}</h4>
        <h4>Mobiel: {{ $data[0]->Mobiel ?? '' }}</h4>

        <table class='table'>
            <thead>
                <th>Naam product</th>
                <th>Datum laatste levering</th>
                <th>Aantal</th>
                <th>Eerstvolgende levering</th>
            </thead>
            <tbody>
                @if (!is_null($data[0]->AantalAanwezig))
                    @foreach ($data as $leverancier)
                        <tr>
                            <td>{{ $leverancier->ProductNaam }}</td>
                            <td>{{ $leverancier->DatumLevering }}</td>
                            <td>{{ $leverancier->Aantal }}</td>
                            <td>{{ $leverancier->DatumEerstvolgendeLevering }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: {{ $data[0]->DatumEerstvolgendeLevering ?? 'onbekend' }}</td>
                        <?= header("Refresh: 4 ; url=../magazijn"); ?>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>