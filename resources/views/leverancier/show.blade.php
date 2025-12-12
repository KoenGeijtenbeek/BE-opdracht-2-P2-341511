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

        <h1>Geleverde producten</h1>

        <h4>Naam leverancier: {{ $data[0]->LeverancierNaam ?? '' }}</h4>
        <h4>Contactpersoon: {{ $data[0]->ContactPersoon ?? '' }}</h4>
        <h4>Leverancier nummer: {{ $data[0]->LeverancierNummer ?? '' }}</h4>
        <h4>Mobiel: {{ $data[0]->Mobiel ?? '' }}</h4>

        <table class='table'>
            <thead>
                <th>Naam product</th>
                <th>Aantal in magazijn</th>
                <th>Verpakkingseenheid</th>
                <th>Laatste levering</th>
                <th>Nieuwe levering</th>
            </thead>
            <tbody>
                @if ($data != [])
                    @foreach ($data as $leverancier)
                        <tr>
                            <td>{{ $leverancier->ProductNaam }}</td>
                            <td>{{ $leverancier->AantalAanwezig ?? '0' }}</td>
                            <td>{{ $leverancier->VerpakkingsEenheid }}</td>
                            <td>{{ $leverancier->DatumLaatsteLevering }}</td>
                            <td>
                                @if ($leverancier->IsActief)
                                    <a href="/leverancier/{{ $leverancier->LeverancierId }}/{{ $leverancier->ProductId }}/create">
                                        <i class="bi bi-plus-lg text-primary"></i>
                                    </a>
                                @else
                                    Dit product wordt niet meer geproduceerd.
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin</td>
                        <?= header("Refresh: 3 ; url=../leverancier"); ?>
                    </tr>
                @endif
            </tbody>
        </table>
        <a href="/leverancier">Terug</a>
    </div>
</body>
</html>