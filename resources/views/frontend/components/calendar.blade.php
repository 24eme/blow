

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
        left: '',
        center: 'title',
        right: 'today,prev,next'
      },
      locale:'fr',
      schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
      defaultView: 'resourceTimelineDay',
      scrollTime: '06:00',
      aspectRatio: 1.5,
      editable: true,
      droppable:true,
      height:'auto',
      resourceLabelText: 'Salles',
      resources: [
        { id: 'a', title: 'Salle de Réunion 102' },
        { id: 'b', title: 'Salled de Réunion B12' },
        { id: 'c', title: 'Salle de Réunion 295' },
        { id: 'd', title: 'Salled de Réunion C344' },
        { id: 'e', title: 'Salle de Réunion 278' },
        { id: 'f', title: 'Salled de Réunion JH8' },
      ],
      events: [
        { title: 'Event 1', start: '2020-06-09', resourceId: 'a' },
        { title: 'Event 2', start: '2020-06-09', resourceId: 'a' },
        { title: 'Event 3', start: '2020-06-09', resourceId: 'b' }
      ]
    });

    calendar.render();
  });

</script>
