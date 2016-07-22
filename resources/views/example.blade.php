<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Request JSON Test</title>
  </head>
  <body>
<button id="charger">Charger et traiter les données</button>
<div id="r">Cliquez sur "Charger et traiter les données" pour lancer la lecture et le traitement des données JSON</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
  $(function() {
    $('#charger').click(function() {
        console.log('la');
        $.getJSON('/laravel5/example.json', function(donnees) {
            console.log(donnees);
        $('#r').html('<p><b>Nom</b> : ' + donnees.nom + '</p>');
        $('#r').append('<p><b>Age</b> : ' + donnees.age + '</p>');
        $('#r').append('<p><b>Ville</b> : ' + donnees.ville + '</p>');
        $('#r').append('<p><b>Domaine de compétences</b> : ' + donnees.domaine + '</p>');
      });
        //console.log('yolo');
    });  
  });
</script>
    
  </body>
</html>
