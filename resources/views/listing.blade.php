<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>{{ $heading }}</h1>
    @unless (count($listings) == 0)
        @foreach ($listings as $listing)
            <a href="listing/{{ $listing['id'] }}">
                <h2>{{ $listing['title'] }}</h2>
            </a>
            <p>{{ $listing['description'] }}</p>
        @endforeach
    @else
        <p>No data found</p>
    @endunless
</body>

</html>
