<form class="" id="form" method="get" action="{{ route('createRoom')}}">
  {{ csrf_field() }}
  <script type="text/javascript">
  $(document).ready(function(){
$('.js-edit, .js-save').on('click', function(){
  var $form = $(this).closest('form');
  $form.toggleClass('is-readonly is-editing');
  var isReadonly  = $form.hasClass('is-readonly');
  $form.find('input,textarea').prop('disabled', isReadonly);
});
});
  </script>
  <div class="container">
    <div class="row">
    <div class="col-3">
      <label for="name">SALLE :</label>
    </div>
    <div class="col-3">
      <ul>
        <li><label>EQUIPEMENTS :</label></li>
        <input type="text" value="{{ Room::find()->equipment }}" id="firstName" disabled> 
      </ul>
    </div>
    <div class="col-3">
      <label for="capacité">CAPACITE :</label><label class=""></label>
    </div>
    <div class="col-3">
      <label for="Couleur">COULEUR DES EVENEMENTS :</label><span class="focus-border"></span>
    </div>
    </div>
  </div>
  <button type="submit" name="button">GO</button>
  <a href="" onClick="navigate('title');" ><button type="button" name="button"></button>del</a>
</form>
