@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
</head>
<body>
    <div class="container">

        <h2>{{ $title }}</h2>

        <form method="POST" action="{{ route('leverancier.store') }}">
            @csrf
            <input name="leverancierId" type="hidden"  value={{ $leverancierId }}>
            <input name="productId" type="hidden"  value={{ $productId }}>
            <div class="mb-3">
                <label for="InputAantal" class="form-label">Aantal:</label>
                <input name="aantal" type="number" class="form-control" id="InputAantal">
            </div>
            <div class="mb-3">
                <label for="InputDatumEerstvolgendeLevering" class="form-label">Datum eerstvolgende levering:</label>
                <input name="datumEerstvolgendeLevering" type="Date" class="form-control" id="InputDatumEerstvolgendeLevering">
            </div>
            <button type="submit" class="btn btn-primary">Verzend</button>
        </form>

    </div>
</body>
</html>
