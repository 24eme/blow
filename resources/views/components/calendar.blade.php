<link href='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.css' rel='stylesheet' />

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
      timeZone: 'UTC',
      locale: 'fr',
      height: 'auto',
      initialView: 'resourceTimelineDay',
      resourceAreaColumns: [{ headerContent: 'Salles'},],
      titleFormat:{year: 'numeric', month: 'long',day:'numeric', weekday: 'long' },
      buttonText:{ today: 'Aujourd\'hui', month: 'mois', week: 'semaine', day: 'jour'},
      schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
      selectable:true,
      select: function(info){
      $('#reservation-modal').modal('show');

      },
      events:'showEvents',
      resources:'showRooms',

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

</script>
