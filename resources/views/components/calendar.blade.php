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
      timeZone: 'Europe/Paris',
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
      navLinks:true,
      resourceLabelDidMount: function(info){
        resourcePopup(info);
      },
      datesSet:function(info){
          Currentdate = calendar.getDate().toISOString();
          DateTab = (Currentdate).split("T", 2);
          Currentdate = DateTab[0];
          var url = new URL(window.location);
        //  alert(Currentdate);
          url.searchParams.set('date', Currentdate);
          //window.location = url.toString();
          history.pushState(null,null, "home?date="+Currentdate);

            // var url = new URL(window.location);
            // alert(url.searchParams.get('date'));
            //
            // if(url.searchParams.get('date')!=null){
            //   var date = url.searchParams.get('date');
            //   //calendar.gotoDate(date);
            // }
            // else{
            //   var Currentdate = calendar.getDate().toLocaleDateString();
            //   url.searchParams.set('date', Currentdate);
            //   alert('ici');
            //   history.pushState(null,null, "home?date="+Currentdate);
            // //  calendar.gotoDate(Currentdate);
            // }


      },
    });

     var parameters = window.location.search;
    const urlParams = new URLSearchParams(parameters);
    //
    // if(urlParams != null){
     var date = urlParams.get('date');
//     alert(date);
    // //  calendar.gotoDate(date);
    //   alert('here');
    // }
    // if(Currentdate !=null){
    // }
    if(date!=null){
      calendar.gotoDate(date);
    }
calendar.render();
    // var parameters = window.location.search;
    // const urlParams = new URLSearchParams(parameters);
    // if(urlParams != null){
    //   var date = urlParams.get('date');
    //   alert('here');
    // }
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
