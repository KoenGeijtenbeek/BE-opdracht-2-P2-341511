@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leverancier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">

        <h1>{{ $data['title'] }}</h1>

        <table class='table'>
            <thead>
                <th>Naam</th>
                <th>Contactpersoon</th>
                <th>Leveranciernummer</th>
                <th>Mobiel</th>
                <th>Aantal verschillende producten</th>
                <th>Toon producten</th>
            </thead>
            <tbody>
                @forelse ($data['leveranciers'] as $leverancier)
                    <tr>
                        <td>{{ $leverancier->Naam }}</td>
                        <td>{{ $leverancier->ContactPersoon }}</td>
                        <td>{{ $leverancier->LeverancierNummer }}</td>
                        <td>{{ $leverancier->Mobiel }}</td>
                        <td>{{ $leverancier->VerschillendeProducten }}</td>
                        <td>
                            <a href="/leverancier/{{ $leverancier->Id }}">
                                <i class="bi bi-box text-primary"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Geen leveranciers gevonden</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>