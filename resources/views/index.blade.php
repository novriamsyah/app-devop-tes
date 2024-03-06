<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>dev</title>
</head>
<body>

    <h1>Hello World, {{$title}}</h1>
    <h1>Hostname : {{gethostname()}}</h1>
    <form action="{{route('post.storee')}}" method="GET">
        <div class="">
            <label for="">Full Name</label>
            <input type="text" name="name">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>