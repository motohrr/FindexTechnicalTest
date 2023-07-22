<template>
    <FullCalendar :options='calendarOptions' />
</template>  

<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import esLocale from '@fullcalendar/core/locales/es'

export default {
  components: {
    FullCalendar
  },
  props: {
    elements: {
      type: Object,
      required: true,
      default: []
    }
  },
  computed: {
    displayInformation(){
      return this.elements.map(item => {
        return {
          title: item.name,
          start: item.created_at
        }
      });
    },
    calendarOptions() {
      return  {
        plugins: [dayGridPlugin],
        initialView: 'dayGridMonth',
        weekends: false,
        events: [
          ...this.displayInformation
        ],
        eventColor: '#ef9fbc',
        locale: esLocale
      }
    }
  },

}
</script>