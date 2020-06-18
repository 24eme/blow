

<link href='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.css' rel='stylesheet' />
  <link href='https://unpkg.com/@fullcalendar/timeline@4.4.2/main.min.css' rel='stylesheet' />
  <link href='https://unpkg.com/@fullcalendar/resource-timeline@4.4.2/main.min.css' rel='stylesheet' />
<script src='https://unpkg.com/@fullcalendar/core@4.4.2/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/interaction@4.4.2/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/timeline@4.4.2/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/resource-common@4.4.2/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/resource-timeline@4.4.2/main.min.js'></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'resourceTimeline' ],
      timeZone: 'locale',
      header: {
        left: 'today,prev,next calendar',
        center: 'title',
        right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
      },
      titleFormat:{year: 'numeric', month: 'long',day:'numeric', weekday: 'long' },
      locale:'fr',
      schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
      defaultView: 'resourceTimelineDay',
      aspectRatio: 1.5,
      lang:'fr',
      buttonText:{
        today:    'Aujourd\'hui',
        month:    'mois',
        week:     'semaine',
        day:      'jour',
      },
      droppable:true,
      selectable:true,
      height:'auto',
      resourceLabelText: 'Salles',
      resources:'json-list-resources',
      resourceRender: function(info) {

          var elements = document.getElementsByClassName('fc-cell-text');
          var capacityNumber = document.createElement('span');
          var capacityIcon = document.createElement('i');
          capacityNumber.innerHTML = info.resource.extendedProps.capacity ;
          capacityIcon.className = "fas fa-male";

          for (var i = 0; i < elements.length; i++) {
            elements[i].appendChild(capacityIcon);
            elements[i].appendChild(capacityNumber);
          } ;

          var popup = document.createElement('div');
          var br = document.createElement('br');
          var br1 = br.cloneNode(true);
          var br2 = br.cloneNode(true);
          var capacite = document.createElement('label');
          var equipement = document.createElement('label');
          var img = document.createElement('img');

          popup.className = "pop-up";
          popup.innerHTML = info.resource.title;
          img.src = "img/"+info.resource.id+'.jpg';
          img.style.width = "70%";
          img.style.height = "50%"
          equipement.innerHTML = info.resource.extendedProps.equipment;
          capacite.innerHTML = info.resource.extendedProps.capacity ;
          capacite.innerHTML +=  ' personnes';
          popup.appendChild(br);
          popup.appendChild(img);
          popup.appendChild(br1);
          popup.appendChild(equipement);
          popup.appendChild(br2);
          popup.appendChild(capacite);


          info.el.appendChild(popup);
          function popupDisplay(){
            if (popup.style.display === "none")popup.style.display = "block";
            else popup.style.display = "none  ";
          };
          function popupHide(){ popup.style.display ="none";};
          info.el.addEventListener("mouseover", popupDisplay);
          info.el.addEventListener("mouseout", popupHide);

      },
      eventSources:[{url:'json-list-events',textColor: 'black' }],
      select: function(info) {

              var Datedebut = document.getElementById('start_date');
              var Heuredebut = document.getElementById('start_hour');
              var Datefin = document.getElementById('end_date');
              var Heurefin = document.getElementById('end_hour');
              var nomdesalle = document.getElementById('room_name');
              var salleID = document.getElementById('room_id');
              var capacite = document.getElementById('capacity');
              var equipment = document.getElementById('equipment');
              var eventID = document.getElementById('event_id');
              eventID.value = null;
              nomdesalle.innerHTML = info.resource.title ;
              salleID.value = info.resource.id;
              equipment.innerHTML = info.resource.extendedProps.equipment;
              capacite.innerHTML = info.resource.extendedProps.capacity;
              const dateDebut = (info.startStr).split("T", 2);
              dateDebut[2] = dateDebut[1].split("Z").join("");

              const dateFin = (info.endStr).split("T", 2);
              dateFin[2]= dateFin[1].split("Z").join("");

              Datedebut.value = dateDebut[0] ;
              Heuredebut.value = dateDebut[2] ;
              Datefin.value = dateFin[0] ;
              Heurefin.value = dateFin[2] ;
      },
      datesRender:function(info){
            Currentdate = calendar.getDate().toISOString();
            DateTab = (Currentdate).split("T", 2);
            Currentdate = DateTab[0];
            history.pushState(null,null, "home?date="+Currentdate);
      },
      eventClick: function(info) {
              var eventObj = info.event;
              var startStr = eventObj.start.toISOString();
              var endStr = eventObj.end.toISOString();
              var equipment = document.getElementById('equipment');
              var capacite = document.getElementById('capacity');

              var Datedebut = document.getElementById('start_date');
              var Heuredebut = document.getElementById('start_hour');
              var Datefin = document.getElementById('end_date');
              var Heurefin = document.getElementById('end_hour');
              var nomdesalle = document.getElementById('room_name');
              nomdesalle.innerHTML = eventObj.getResources()[0]._resource.title;
              var salleID = document.getElementById('room_id');
              salleID.value = eventObj.getResources()[0]._resource.id;
              var eventID = document.getElementById('event_id');
              eventID.value = eventObj.id ;
              var nom_evenement = document.getElementById('event_name');
              nom_evenement.value = eventObj.title;
              var salleID = document.getElementById('room_id');
              var capacite = document.getElementById('capacity');

              equipment.innerHTML =  eventObj.getResources()[0]._resource.extendedProps.equipment ;
              capacite.innerHTML =  eventObj.getResources()[0]._resource.extendedProps.capacity ;


               document.getElementById('methode').setAttribute('action', (window.location.origin+'/ManagedEvent/'+eventObj.id));


              const dateDebutEvent = (startStr).split("T", 2);
              dateDebutEvent[2] = dateDebutEvent[1].split("Z").join("");

              const dateFinEvent = (endStr).split("T", 2);
              dateFinEvent[2]= dateFinEvent[1].split("Z").join("");

              Datedebut.value = dateDebutEvent[0] ;
              Heuredebut.value = dateDebutEvent[2] ;
              Datefin.value = dateFinEvent[0] ;
              Heurefin.value = dateFinEvent[2] ;
      }
    });

    // var Currentdate = calendar.getDate().toISOString();
    // var DateTab = (Currentdate).split("T", 2);
    // Currentdate = DateTab[0];
    //
    // var url_string = window.location.href
    // var url = new URL(url_string);
    // var date = url.searchParams.get("date");
    //
    //
    // if (date != null) {
    //   window.location.replace('/home?date='+date+'#reserver');
    //   calendar.gotoDate(date);
    // }
    // else{
    //   window.location.replace('/home?date='+Currentdate+'#reserver');
    //   calendar.gotoDate(Currentdate);
    // }

    calendar.render();



  });

</script>
