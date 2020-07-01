<form class="" id="form" method="get" action="{{ route('createRoom')}}">
  {{ csrf_field() }}
  <div class="container">
    <div class="row">
    <div class="col-3">
      <input class="input-effect" name="title" value="" type="text" placeholder=""><label>Nom de salle</label><span class="focus-border"></span>
    </div>
    <div class="col-3">
      <select name="equipment" class="form-control"  multiple>
        <option>Microphone</option>
        <option>Ecran</option>
        <option>Projecteur</option>
      </select>
    </div>
    <div class="col-3">
      <input class="form-control" class="input-effect" name="capacity" type="text" placeholder=""><label>Capacité</label><span class="focus-border"></span>
    </div>
    <div class="col-3">
      <input class="form-control" class="" type="color" id="eventColor" name="eventColor" value="#e66465"><label>Couleur des événements</label><span class="focus-border"></span>
    </div>
    </div>
  </div>
  <button type="submit" name="button">GO</button>
  <a href="" onClick="navigate('title');" ><button type="button" name="button"></button>del</a>
</form>
