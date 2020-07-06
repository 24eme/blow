<link href='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.css' rel='stylesheet' />
<script src='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'today prev,next',
        center: 'title',
        right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
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
      navLinks: true,
      nowIndicator:true,
      events:'showEvents',
      resources:'showRooms',

      select: function(info){
        modalAddEvent(info);
      },
      eventClick: function(info){

        var userid= <?php echo Auth::id() ?>;

        if (userid!= info.event.extendedProps.user_id) {
           alert('Ce n\'est pas votre évenement');
          }
         else {
               modalCheckEvent(info);

         }
      },
      resourceLabelDidMount: function(info){
        resourcePopup(info);

      },
      datesSet:function(info){
          Currentdate = calendar.getDate().toISOString();
          DateTab = (Currentdate).split("T", 2);
          Currentdate = DateTab[0];
          var url = new URL(window.location);
          url.searchParams.set('date', Currentdate);
          if(window.location.href.includes('home')){
            history.pushState(null,null, "home?date="+Currentdate);
          };
      },
    });

    var parameters = window.location.search;
    const urlParams = new URLSearchParams(parameters);
    var date = urlParams.get('date');
    if(date!=null){
      calendar.gotoDate(date);
    }
    calendar.render();
  });
</script>
