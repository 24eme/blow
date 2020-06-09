

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
        left: 'today,prev,next',
        center: 'title',
        right: 'resourceTimelineDay'
      },
      locale:'fr',
      defaultView: 'resourceTimelineDay',
      scrollTime: '06:00',
      aspectRatio: 1.5,
      editable: true,
      resourceLabelText: 'Salles',
      resources: 'https://fullcalendar.io/demo-resources.json?with-nesting&with-colors',
      events: 'https://fullcalendar.io/demo-events.json?single-day&for-resource-timeline'
    });

    calendar.render();
  });

</script>
