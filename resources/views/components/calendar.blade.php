

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
      resources:'showRooms',
      datesRender:function(info){
      Currentdate = calendar.getDate().toISOString();
      DateTab = (Currentdate).split("T", 2);
      Currentdate = DateTab[0];
      history.pushState(null,null, "home?date="+Currentdate);
},
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
      eventSources:[{url:'showEvents',textColor: 'black' }],
      //     // resourceRender: function(info) { ResourceModal(info); },
          select: function(info) { modalAddEvent(info);},
          eventClick: function(info) { modalCheckEvent(info); }

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
<!-- <link href='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.css' rel='stylesheet' />
<script src='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.js'></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'today prev,next',
        center: 'title',
        right: 'resourceTimelineDay,resourceTimelineWeek'
      },
      timeZone: 'local',
      locale: 'fr',
      height: 'auto',
      initialView: 'resourceTimelineDay',
      resourceAreaColumns: [{ headerContent: 'Salles'},],
      titleFormat:{year: 'numeric', month: 'long',day:'numeric', weekday: 'long' },
      buttonText:{ today: 'Aujourd\'hui', month: 'mois', week: 'semaine', day: 'jour'},
      schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
      selectable:true,
      select: function(info){
        modalAddEvent(info);
      },
      eventClick: function(info){
        modalCheckEvent(info);
      },
      events:'showEvents',
      resources:'showRooms',
      navLinks: true,
      nowIndicator:true,
navLinkDayClick: function(date, jsEvent) {
  console.log('day', date.toISOString());
  console.log('coords', jsEvent.pageX, jsEvent.pageY);
}

    });

    calendar.render();
  });
  // document.addEventListener('DOMContentLoaded', function() {
  //   var calendarEl = document.getElementById('calendar');
  //
  //   var calendar = new FullCalendar.Calendar(calendarEl, {
  //     // plugins: [ 'interaction', 'resourceTimeline' ],
  //     initialView: 'resourceTimelineDay',
  //     // timeZone: 'UTC',
  //     //
  //     // header: {
  //     //   left: 'today,prev,next calendar',
  //     //   center: 'title',
  //     //   right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
  //     // },
  //     //
  //     // titleFormat:{year: 'numeric', month: 'long',day:'numeric', weekday: 'long' },
  //     //
  //     // locale:'fr',
  //     //
  //     // schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
  //     // defaultView: 'resourceTimelineDay',
  //     // aspectRatio: 1.5,
  //     // lang:'fr',
  //     // buttonText:{
  //     //   today:    'Aujourd\'hui',
  //     //   month:    'mois',
  //     //   week:     'semaine',
  //     //   day:      'jour',
  //     // },
  //     // droppable:true,
  //     // selectable:true,
  //     // navLinks:true,
  //     // height:'auto',
  //     // resourceLabelText: 'Salles',
  //     // resources:'json-list-resources',
  //     // eventSources:[{url:'json-list-events',textColor: 'black' }],
  //     //
  //     // resourceRender: function(info) { ResourceModal(info); },
  //     // select: function(info) { modalAddEvent(info);},
  //     // eventClick: function(info) { modalCheckEvent(info); }
  //   });
  //   calendar.render();
  // });

</script> -->
