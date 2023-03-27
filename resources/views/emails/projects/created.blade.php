<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Ptoject</title>
</head>
<body>
    <h1>
        New Project published
    </h1>
    
    <ul>
        <li>
            {{ $project->title }}
        </li>
        <li>
            {{ $project->type }}
        </li>
    </ul>
</body>
</html>
