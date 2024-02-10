<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Exercice : Algorithme de tri personnalisé | Tout Simplement Digital</title>
    <meta name="author" content="Tout Simplement Digital">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://www.toutsimplement-digital.com/wp-content/uploads/2022/11/Logo_TSD-150x150.png" sizes="32x32" />
    <link rel="icon" href="https://www.toutsimplement-digital.com/wp-content/uploads/2022/11/Logo_TSD-300x300.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://www.toutsimplement-digital.com/wp-content/uploads/2022/11/Logo_TSD-300x300.png" />
    <meta name="msapplication-TileImage" content="https://www.toutsimplement-digital.com/wp-content/uploads/2022/11/Logo_TSD-300x300.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
</head>
<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-12 mb-3 text-center">
                <img class="img-fluid" width="130" src="https://www.toutsimplement-digital.com/wp-content/uploads/2022/11/Logo_TSD.png" alt="Tout Simplement Digital">
            </div>
            <div class="col-12">
                <h1 class="text-center">Exercice : Algorithme de tri personnalisé</h1>
                <hr>
                <p>L'objectif de cet exercice est de créer une fonction de tri personnalisée en PHP. Vous devez implémenter un algorithme de tri qui prend en compte non seulement la valeur numérique des éléments d'un tableau, mais aussi d'autres critères personnalisés définis par l'utilisateur.</p>
                <p>Voici les fonctionnalités attendues :</p>
                <ul>
                    <li>Fonction de tri personnalisée : Écrivez une fonction PHP nommée customSort qui prendra un tableau multidimensionnel en entrée et le triera selon les critères spécifiés.</li>
                    <li>Critères de tri personnalisés : La fonction devrait accepter un ou plusieurs critères de tri personnalisés, tels que le nom, l'âge, ou tout autre critère spécifique aux données contenues dans le tableau.</li>
                    <li>Flexibilité : La fonction devrait être suffisamment flexible pour permettre le tri ascendant ou descendant en fonction des critères spécifiés.</li>
                </ul>            
            </div>
            <div class="col-md-12">
                <p class="mb-0">Voici un exemple de tableau d'entrée :</p>
                <xmp class="mt-0">
$users = [
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25],
    ['name' => 'Charlie', 'age' => 35],
];
                </xmp>
            </div>
            <div class="col-md-12">
                <p><strong>Instructions supplémentaires :</strong></p>
                <ul>
                    <li>Vous devez implémenter l'algorithme de tri vous-même, <u><b>sans utiliser</b></u> les fonctions de tri intégrées de PHP telles que <b>sort()</b> ou <b>usort()</b>.</li>
                    <li>La fonction de tri doit être capable de gérer des tableaux de différentes tailles et de différentes structures.</li>
                    <li>Assurez-vous de commenter votre code pour expliquer la logique derrière chaque étape de l'algorithme de tri.</li>
                    <li>Vous pouvez faire votre travail dans ce fichier directement ou dans un autre fichier PHP. (Nous irons regarder le code que vous nous enverrez)</li>
                </ul>
                <br>
                <p><strong>Critères d'évaluation :</strong></p>
                <ul>
                    <li>Implémentation correcte de la fonction de tri personnalisée. <u>(Même si le travail n'est pas finalisé, ce n'est pas grave !)</u></li>
                    <li>Capacité à comprendre et à implémenter des algorithmes de tri.</li>
                    <li>Flexibilité de la solution pour prendre en compte différents critères de tri et des tableaux de différentes tailles.</li>
                    <li>Clarté du code et commentaires appropriés pour expliquer la logique de l'algorithme.</li>
                </ul>
            </div>
            <hr>
            <div class="col-md-12 text-center">
                <img class="img-fluid" src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExaDR3ZDZ0a285M2dxanNyOXdmMTNrdXBnb2VsYWtxcTBqNXU1a254ZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/BpGWitbFZflfSUYuZ9/giphy.gif" alt="Let's do this!" />
            </div>
        </div>
    </div>
</body>

</html>
