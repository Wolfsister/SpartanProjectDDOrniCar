// JavaScript Document
$(document).ready(function() {

	var $Ville_Depart = $('#Ville_Depart');
	var $Ville_Arrivee = $('#Ville_Arrivee');

	// chargement de la liste de localité un
	$Ville_Depart.append('<option value="">Choisir la ville de départ </option>');
	$.ajax({
		url: 'liste.php',
		data: 'go', // on envoie $_GET['go']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$.each(json, function(index, value) {
				// pour chaque noeud JSON
				// on ajoute l option dans la liste
				$('#Ville_Depart').append('<option value="'+ index +'">'+ value +'</option>');
			});
		}
	});

	// à la sélection de la localité un dans la liste
	$Ville_Depart.on('changeunction() {
		var val = $(this).val(); // on récupère la valeur de la localité un
		if(val != '') {
			$Ville_Arrivee.empty(); // on vide la liste de localité deux
			$Ville_Arrivee.append('<option value="">Choisir la villeD\'arrivee</option>');
			$.ajax({
				url: 'liste.php',
				data: 'Ville_Depart='+ val, // on envoie $_GET['localite_un']
				dataType: 'json',
				success: function(json) {
					$.each(json, function(index, value) {
						$Ville_Arrivee.append('<option value="'+ index +'">'+ value +'</option>');
					});
				}
			});
		} else {
			$Ville_Arrivee.empty();
			$Ville_Arrivee.append('<option value="">Choisir la ville d\'arrivee</option>');
		}
	});
});
