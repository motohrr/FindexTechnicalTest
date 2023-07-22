<template>
  <BaseLayout>
      <Head title="Homepage"></Head>

      <div class="p-8 w-full flex justify-center">
        <Fullcalendar :elements="users" class="w-full"/>
      </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue';
import Fullcalendar from '@/Components/Homepage/Fullcalendar.vue';
import { Head } from '@inertiajs/vue3';

export default {
  components: {
    BaseLayout,
    Head,
    Fullcalendar
  },
  props: {
    users: {
      type: Object,
      required: true
    }
  }
}
</script>

<style>

</style>