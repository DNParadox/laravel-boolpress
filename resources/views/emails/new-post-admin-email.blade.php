<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Email</title>
</head>
<body>
    <h1> Ciao Admin, è stato creato un nuovo topic nel blog</h1>

    <div>Il titolo del post creato è: {{ $new_post->title }} </div>

    <a href="{{ route('admin.posts.show', ['post' => $new_post->id]) }}"> Clicca Qui per visualizzare!</a>
</body>
</html>