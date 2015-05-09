<meta charset="UTF-8">

<?php
$name[] = 'UTT';
$name[] = 'UTC';
print_r($name);

$mois = array('fr' => array('salutation' => 'Bonjour', 'remerciement' => 'merci'), "février", "mars");
echo ("<pre>");
print_r($mois);
echo ("</pre>");

echo ("<pre>");
print_r($mois['fr']);
echo ("</pre>");

echo($mois['fr']['remerciement']);
$str = 'J\'aime, le , couscous.';
$tab = explode(',', $str);
print_r($tab);

echo(implode(',', $tab));

$tcbA = array('NF16' => 'Base de Données', 'NF20' => 'Systèmes Complexes');

$tcbA['SY02'] = 'Statistiques';
$tcbA['NF16'] = 'Base de Données Avancées';
echo ("<pre>");
print_r($tcbA);
echo ("</pre>");
?>

<table border=1 bgcolor="green" align="center" width="150">
    <thead>
        <tr>
            <th>Exp1</th>
            <th>Exp2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Preparateur Commande</th>
            <th>Inventaire</th>
        </tr>
    </tbody>
</table>

<?php 
echo '<table border=1 bgcolor="blue" align="center" width="150">';
echo '<thead>';
echo '<tr>';
foreach ($tcbA as $key => $value) {
    echo '<th>'.$key.'</th>';
}
echo'</tr></thead><tbody><tr>';

foreach ($tcbA as $key => $value) {
    echo '<th>'.$value.'</th>';
}
echo '</tr></tbody></table>'
?>

