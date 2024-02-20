<?php

$users2 = [
    ['profession' => 'fleuriste', 'data' => [ 'age' => 30, 'name' => 'Gégé', 'enfant' => 2]],
    ['profession' => 'développeur','data' => ['age' => 25, 'name' => 'Charlie', 'enfant' => 4]],
    ['profession' => 'développeur','data' => ['age' => 25, 'name' => 'Charlie', 'enfant' => 5]],
    ['profession' => 'Boulanger', 'data' => ['age' => 40, 'name' => 'Flo', 'enfant' => 1]],
    ['profession' => 'agriculteur', 'data' => ['age' => 25, 'name' => 'Bob', 'enfant' => 3]],
    ['profession' => 'Maçon', 'data' => ['age' => 25, 'name' => 'Alice', 'enfant' => 5]],
];

$aCriteria = ['age' => 'desc', 'name' => 'asc', 'enfant' => 'asc'];
try {
    $e = customSort3($users2, $aCriteria);
    dbr($e);
}catch(Exception $err){
    die($err->getMessage());
}


function customSort3($aData, $aCriteria)
{
    $aFinal = [];
    foreach($aData as $k => $v)
    {
        $aKey = [];
        $b = recursifArray3($v, $aCriteria, $aKey);
        if($b !== null) $aFinal[][$b] = $v;
        else {
            throw new Exception('Error criteria missing in array Data key => ' . $k . ' value => <br/>' . var_dump($v) . '<br/><br/> ' . var_dump($aCriteria));
        }
    }
    $aFinal = sortArray($aFinal, $aCriteria);
    return $aFinal;
}


function sortArray(array $aArray, $aCriteria)
{
     $aCriteria = array_values($aCriteria);

    //Création d'un tableau de clés qui permet d'avoir les clés dans l'ordre
    $bWitness = true;
    while($bWitness === true)
    {
        $bWitness = false;
        foreach($aArray as $kLevel1 => $valLevel1)
        {

            if($kLevel1 === 0) continue;

            $aKeys = array_keys($aArray[$kLevel1 - 1]);// > ['30#Gégé#2']
            $sKeyA = $aKeys[0];// > '40#Flo'
            $a = explode('#', $sKeyA);

            $bKeys = array_keys($aArray[$kLevel1]);// > ['25#Charlie#4']
            $sKeyB = $bKeys[0];// > '30#Alice'
            $valLevel2 = $aArray[$kLevel1][$sKeyB];
            $b = explode('#', $sKeyB);

            if($sKeyB === $sKeyA) continue;//if the keys are equal so they are already in order we can skip

            foreach($aCriteria as $i => $sOrder)
            {
                $valACriteria = $a[$i];
                $valBCriteria = $b[$i];

                if($valBCriteria === $valACriteria)  continue;//if the values of the criterias are equal, no need to sort we can skip
                else if($sOrder === 'desc') {
                    if($valBCriteria > $valACriteria){
                        $bWitness = true;
                        $valueDown = $aArray[$kLevel1-1][$sKeyA];
                        $valueUp = $valLevel2;

                        unset($aArray[$kLevel1-1][$sKeyA]);
                        unset($aArray[$kLevel1][$sKeyB]);

                        //Values switch
                        $aArray[$kLevel1-1][$sKeyB] = $valueUp;
                        $aArray[$kLevel1][$sKeyA] = $valueDown;
                    }
                    break;
                }
                else if($sOrder === 'asc'){
                    if($valBCriteria < $valACriteria) {
                        $bWitness = true;
                        $valueDown = $valLevel2;
                        $valueUp = $aArray[$kLevel1 - 1][$sKeyA];

                        unset($aArray[$kLevel1 - 1][$sKeyA]);
                        unset($aArray[$kLevel1][$sKeyB]);

                        //Values switch
                        $aArray[$kLevel1 - 1][$sKeyB] = $valueDown;
                        $aArray[$kLevel1][$sKeyA] = $valueUp;
                    }
                    break;
                }
            }

        }
    }
    /*    $aFinal = [];
        foreach($aArray as $k => $v) {
            foreach ($v as $kk => $vv) {
                $aFinal[] = $vv;
            }
        }
        return $aFinal;*/
    return $aArray;
}

//Fonction récursive pour les tableaux
function recursifArray3(array $aArray, $aCriteria, &$aKey) {
    foreach ($aArray as $k => $val) {
        if(array_key_exists($k, $aCriteria))
        {
            $aKey[$k] = $val;
            if(count($aKey) === count($aCriteria)) {
                //Reordering criteria to cast them as a string
                $aOrderCriteria = [];
                foreach($aCriteria as $j => $s)
                {
                    $aOrderCriteria[] = $aKey[$j];
                }
                return implode('#', $aOrderCriteria);
            }
        }
        else if (is_array($val)){
            $r = recursifArray3($val, $aCriteria, $aKey);
            if($r !== null) return $r;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

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
                <pre class="mt-0">
$users = [
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25],
    ['name' => 'Charlie', 'age' => 35],
];
                </pre>
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

        </div>
    </div>
</body>

</html>
<?php

//TOOLS
function dbr($var) {
    echo '<pre>'.print_r($var, true).'</pre>';
}

function dbrdie($var) {
    dbr($var);
    die('end of dbrdie function');
}


//*****Ancienne fonctions ayant servi au raisonnement*****

$users = [
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25],
    ['name' => 'Charlie', 'age' => 35],
    ['name' => 'Flo', 'age' => 40],
];

$a = customSort($users, ['age'=>'asc']); //FONCTION de tri pour un tableau connu à l'avance
$d = customSort2($users2, ['age' => 'desc']);
//dbrdie($d);
//TEST
$a = [5 => 5, 8 => 8, 10 => 10, 12 => 12];
$c = sortArrayByIntKeyAsc($a);

//Fonction récursive pour les tableaux
function recursifArray2(array $aArray, $sCriteria) {
    foreach ($aArray as $k => $val) {

        if($k === $sCriteria) return $val;
        else if (is_array($val)){
            $r = recursifArray2($val, $sCriteria);
            if($r !== null) return $r;
        }
    }
}

function customSort2($aData, $aCriteria)
{
    $aFinal = [];
    foreach($aCriteria as $sCriteria => $dir)
    {
        foreach($aData as $k => $v)
        {
            $b = recursifArray2($v, $sCriteria);
            if($b !== null) $aFinal[][$b] = $v;
        }
    }
    return sortArrayByIntKey($aFinal, $dir);
}

/*
 * @Param $aData array
 * @param $aCriteria array
 */
function customSort(array $aData, $aCriteria)
{
    //La fonction doit accepter en entrée un tableau multidimentionnel => oui => $aData
    //La fonction doit pouvoir prendre un ou plusieurs critères de tri => oui  => $aCriteria
    //Pour chaque critère il faut pouvoir définir si le tri doit être ascendant ou descendant =>
    //Le tableau $aCriteria doit être composé de la façon suivant : [$sCriteria1 => 'asc', $sCriteria2 => 'asc']
    //TODO Le tri doit se faire à tous les niveaux du tableau pour chaque critère => certainement faire du récursif
    //TODO décomposer l'algorithme en plusieurs parties ou fonctions
    //La fonction doit renvoyer un tableau avec les données triés comme demandé => Oui => voir le return de la fonction
    //TODO faire des fonctions de test pour test avec différents jeux de données
    $aFinalArray = [];

    //Boucle sur les criteres en 1er
    foreach($aCriteria as $sCritere => $valCritere)
    {
        foreach($aData as $kData => $aSubData)
        {
            foreach($aSubData as $k => $val)
            {
                if($k === $sCritere)
                {
                    $aFinalArray[$val] = $aSubData;
                }
            }
            $aFinalArray = sortArrayByIntKeyAsc($aFinalArray);//il ne faudrait pas l'exécuter à chaque fois...
        }
    }
    return $aFinalArray;
}

//Fonction récursive type pour les tableaux
function recursifArray(array $aArray) {
    foreach ($aArray as $k => $val) {
        if (is_array($val)) {

            recursifArray($val);
        } else {

        }
    }
}

function sortArrayByIntKey(array $aArray, $sOrder='asc')
{
    //Création d'un tableau de clés qui permet d'avoir les clés dans l'ordre
    $b = true;
    while($b === true)
    {
        $b = false;
        foreach($aArray as $k => $v)
        {
            if($k === 0) continue;
            $aKeys = array_keys($aArray[$k - 1]);

            foreach($v as $kk => $vv)
            {
                switch($sOrder)
                {
                    case 'desc':
                        if($kk > $aKeys[0]){
                            $b = true;
                            //On doit inverser les valeurs
                            $valueDown = $aArray[$k-1][$aKeys[0]];
                            $valueUp = $vv;

                            unset($aArray[$k-1][$aKeys[0]]);
                            $aArray[$k-1][$kk] = $valueUp;

                            unset($aArray[$k][$kk]);
                            $aArray[$k][$aKeys[0]] = $valueDown;
                        }
                        break;
                    default:
                        if($kk < $aKeys[0]){
                            $b = true;
                            //On doit inverser les valeurs
                            $valueUp = $aArray[$k-1][$aKeys[0]];
                            $valueDown = $vv;

                            unset($aArray[$k-1][$aKeys[0]]);
                            $aArray[$k-1][$kk] = $valueDown;

                            unset($aArray[$k][$kk]);
                            $aArray[$k][$aKeys[0]] = $valueUp;
                        }
                        break;
                }
            }
        }
    }

    /*    $aFinal = [];
        foreach($aArray as $k => $v) {
            foreach ($v as $kk => $vv) {
                $aFinal[] = $vv;
            }
        }
        return $aFinal;*/
    return $aArray;
}

//TRI d'un tableau par critère entier dans l'ordre
function sortArrayByIntKeyAsc(array $aArray)
{
    $aData = [];

    //Création d'un tableau de clés qui permet d'avoir les clés dans l'ordre
    $aKey = array_keys($aArray);
    $iMax = count($aKey) - 1;
    for($i=1; $i < $iMax; $i++){

        //Si la clé courante est inférieure à la précédente
        if($aKey[$i] < $aKey[$i-1]){
            //On doit inverser les valeurs
            $valKey = $aKey[$i-1];
            $aKey[$i-1] = $aKey[$i];
            $aKey[$i] = $valKey;
        }
    }

    foreach($aKey as $k)
    {
        $aData[$k] = $aArray[$k];
    }
    return $aData;
}