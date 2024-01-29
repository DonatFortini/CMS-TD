<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is the back office</h1>
    @if (Auth::check())
    <!-- Contenu accessible uniquement aux utilisateurs connectés -->
    <p>Bienvenue dans le back-office, {{ Auth::user()->name }}!</p>
    <!-- Autres éléments du back-office ici -->
    @else
        <!-- Contenu pour les utilisateurs non connectés -->
        <p>Vous devez être connecté pour accéder au back-office.</p>
        <!-- Vous pouvez ajouter ici un lien vers la page de connexion -->
    @endif
</body>
</html>