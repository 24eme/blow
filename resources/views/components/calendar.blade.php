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
      buttonText:{ today: 'AUJOURD\'HUI', month: 'MOIS', week: 'SEMAINE', day: 'JOUR'},
      schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
      selectable:true,
      navLinks: true,
      nowIndicator:true,
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
<<<<<<< HEAD
        var elements = document.getElementsByClassName('fc-scrollgrid-sync-inner');
        var capacityNumber = document.createElement('span');
        var capacityIcon = document.createElement('i'); 
        capacityNumber.innerHTML = info.resource.extendedProps.capacity ;
        capacityIcon.className = "fas fa-male";
        for (var i = 0; i < elements.length; i++) {
          elements[i].appendChild(capacityIcon);
          elements[i].appendChild(capacityNumber);
          elements[elements.length-1].classList.add('lol');
        } ;
=======
        resourceCapacity(info);

>>>>>>> c03a493b0843399d2d39b527c59bf011e2b2faf0
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
