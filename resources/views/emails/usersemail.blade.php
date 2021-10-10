<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Réception Email</h1>

    <p>Salut, {{ $data['nomutilisateur'] }} {{ $data['prenomutilisateur'] }}</p>
    <p>Vous êtes enregistré(e) avec le mail : {{ $data['email'] }}</p> 
    <p>Votre mot de passe est : {{ $data['password'] }}</p>
</body>
</html>