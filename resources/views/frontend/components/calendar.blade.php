

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
      timeZone: 'UTC',
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
      navLinks:true,
      height:'auto',
      customButtons: {
        calendar: {
          icon: 'fa-calendar',
          click: function() {

          }
        }
      },
      resourceLabelText: 'Salles',
      resources:'json-list-resources',
      resourceRender: function(info) {
        // var numberOfResources = 9;
        // var imgResources = new Array(numberOfResources);

        var popup = document.createElement('div');
        var br = document.createElement('br');
        var br1 = br.cloneNode(true);
        var br2 = br.cloneNode(true);
        var br3 = br.cloneNode(true);
        var surface = document.createElement('label');
        var capacite = document.createElement('label');
        var equipement = document.createElement('label');
        var img = document.createElement('img');


        popup.className = "pop-up";
        popup.innerHTML = info.resource.title;
        img.src = "img/"+info.resource.id+'.jpg';
        img.style.width = "70%";
        img.style.height = "50%"
        equipement.innerHTML = "Chaise,TV";
        capacite.innerHTML = "30 personnes";
        surface.innerHTML = "20m";
        popup.appendChild(br);
        popup.appendChild(equipement);
        popup.appendChild(br1);
        popup.appendChild(capacite);
        popup.appendChild(br2);
        popup.appendChild(surface);
        popup.appendChild(br3);
        // for (var i = 0; i <= imgResources.length; i++) {
        //   imgArray[i] = new Image(100, 200);
        //   imgArray[i].src = 'img/'+ info.resource.id +'.jpg';
        //
        // }
        popup.appendChild(img);

        info.el.appendChild(popup);
        function popupDisplay(){
          if (popup.style.display === "none") {
                popup.style.display = "block";
          }
          else{
            popup.style.display = "none  ";
          }
        };
        function popupHide(){
          popup.style.display ="none";
        }
        info.el.addEventListener("mouseover", popupDisplay);
        info.el.addEventListener("mouseout", popupHide);

      },
      eventSources:[{url:'json-list-events',textColor: 'black' }],
      select: function(info) {
              //On recupere les input à modifier dans le modal

              var Datedebut = document.getElementById('datededebut');
              var Heuredebut = document.getElementById('heurededebut');
              var Datefin = document.getElementById('datedefin');
              var Heurefin = document.getElementById('heuredefin');
              var nomdesalle = document.getElementById('nomdesalle');
              var salleID = document.getElementById('salleId');
              var capacite = document.getElementById('capacite');
              var surface = document.getElementById('surface');
              nomdesalle.innerHTML = info.resource.title ;
              salleID.value = info.resource.id;

              const dateDebut = (info.startStr).split("T", 2);
              dateDebut[2] = dateDebut[1].split("Z").join("");

              const dateFin = (info.endStr).split("T", 2);
              dateFin[2]= dateFin[1].split("Z").join("");

              Datedebut.value = dateDebut[0] ;
              Heuredebut.value = dateDebut[2] ;
              Datefin.value = dateFin[0] ;
              Heurefin.value = dateFin[2] ;
      },
      // eventClick: function(info) {
      //           var eventObj = info.event;
      //
      //           if (eventObj.url) {
      //             alert(
      //               'Clicked ' + eventObj.title + '.\n' +
      //               'Will open ' + eventObj.url + ' in a new tab'
      //             );
      //
      //             window.open(eventObj.url);
      //
      //             info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
      //           } else {
      //             alert('Clicked ' + eventObj.title);
      //           }
      // },
      eventClick: function(info) {
              var eventObj = info.event;
              var startStr = eventObj.start.toISOString();
              var endStr = eventObj.end.toISOString();

              var Datedebut = document.getElementById('datededebut');
              var Heuredebut = document.getElementById('heurededebut');
              var Datefin = document.getElementById('datedefin');
              var Heurefin = document.getElementById('heuredefin');

              var nomdesalle = document.getElementById('nomdesalle');
              var salleID = document.getElementById('salleId');
              var capacite = document.getElementById('capacite');
              var surface = document.getElementById('surface');

              var nom_evenement = document.getElementById('nom');
              nom_evenement.value = eventObj.title;

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

    calendar.render();
  });

</script>
