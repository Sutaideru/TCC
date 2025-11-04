document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        locale: "pt-br",

        initialDate: '2025-11-04',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function (arg) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
        },
        eventClick: function (arg) {
            if (confirm('Tem certeza que quer excluir esse evento?')) {
                arg.event.remove()
            }
        },
        editable: true,
        dayMaxEvents: true,
        events: [{
            title: 'TCC',
            start: '2025-11-12T07:15:00'
        }
        ]
    });

    calendar.render();
});