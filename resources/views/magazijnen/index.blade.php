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

        <h1>{{ $data['title'] }}</h1>

        <table class='table'>
            <thead>
                <th>Product</th>
                <th>Barcode</th>
                <th>Verpakkings eenheid (kg)</th>
                <th>Aantal aanwezig</th>
                <th>Leverantie info</th>
                <th>Allergeen info</th>
            </thead>
            <tbody>
                @forelse ($data['magazijnen'] as $magazijn)
                    <tr>
                        <td>{{ $magazijn->Naam }}</td>
                        <td>{{ $magazijn->Barcode }}</td>
                        <td>{{ $magazijn->VerpakkingsEenheid }}</td>
                        <td>{{ $magazijn->AantalAanwezig }}</td>
                        <td>
                            <a href="/magazijn/{{ $magazijn->ProductId }}">
                                <i class="bi bi-question-circle-fill text-primary"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/allergeen/{{ $magazijn->ProductId }}">
                                <i class="bi bi-shield-fill-x text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Geen magazijn gevonden</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>