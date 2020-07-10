
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
$( "#datepicker" ).datepicker({
      onSelect: function(){
        gotoDate();
      },
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      dayNames: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
      dayNamesMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
      dayNamesShort:[ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
      gotoCurrent: true,
      monthNames: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre" ],
      monthNamesShort: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
      prevText: "Préc",
      nextText: "Suiv",
    });
    $('.fa-calendar').click(function() {
      $("#datepicker").focus();
    });
      });
</script>
