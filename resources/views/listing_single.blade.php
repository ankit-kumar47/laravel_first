<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $listing['title'] }}</title>
</head>

<body>
    @unless (empty($listing))
        <h1>{{ $listing['title'] }}</h1>
        <p>{{ $listing['description'] }}</p>
    @else
        <p>No data found</p>
    @endunless
</body>

</html>
