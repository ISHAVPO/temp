<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>
    hello {{$name ?? "guest"}}
</h1>
<h2> wellcome {{$name}}</h2>
<h1>
{{$tag}}
{!!$tag!!}
</h1>
<!-- both used for printing but {{}} will not convert the html tags.....see output

</body>
</html>