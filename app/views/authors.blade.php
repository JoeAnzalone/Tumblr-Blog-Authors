<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Tumblr Blog Authors</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div class="page-wrap">
	<h1>Authors for <a href="http://{{ $blog }}.tumblr.com" target="_blank">{{ $blog }}</a></h1>
    <ul class="authors">
    @foreach ($authors as $author)
        <li><a href="http://{{ $author }}.tumblr.com" target="_blank">{{ $author }}</a></li>
    @endforeach
    </ul>
</div>
</body>
</html>
