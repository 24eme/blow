<link href='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.css' rel='stylesheet' />
<script src='https://unpkg.com/fullcalendar-scheduler@5.1.0/main.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  
    var currentdate = new Date();
    var time =""+currentdate.getHours() + ":"+ currentdate.getMinutes() + ":"+ currentdate.getSeconds()+"";

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
      buttonText:{ today: 'AUJOURD\'HUI', month: 'MOIS', week: 'SEMAINE', day: 'JOUR'},
      schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
      selectable:true,
      navLinks: true,
      nowIndicator:true,
      scrollTime:time,
      events:'showEvents',

      resources:'showRooms',
      themeSystem: 'bootstrap',
      bootstrapFontAwesome:{
        close: 'fa-times',
        prev: 'fa-chevron-left',
        next: 'fa-chevron-right',
        prevYear: 'fa-angle-double-left',
        nextYear: 'fa-angle-double-right'
        },




      select: function(info){
        modalAddEvent(info);
      },
      eventClick: function(info){

        var userid= <?php echo Auth::id() ?>;

        if (userid!= info.event.extendedProps.user_id) {
           NotYourEvent();
          }
         else {
            modalCheckEvent(info);
         }
      },
      resourceLabelDidMount: function(info){
        resourcePopup(info);
      },
      resourceLabelContent: function(info){
        // resourceCapacity(info);  //ne fonctionne pas

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
