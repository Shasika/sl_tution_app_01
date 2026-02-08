<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Sessions</h2>
      <BaseButton @click="showForm = true">Create Session</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Batch ID" v-model="form.batch_id" type="number" />
        <FormInput label="Date" v-model="form.date" type="date" />
        <FormInput label="Start Time" v-model="form.start_time" type="time" />
        <FormInput label="End Time" v-model="form.end_time" type="time" />
        <FormInput label="Hall ID" v-model="form.hall_id" type="number" />
        <FormInput label="Status" v-model="form.status" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Date', 'Batch', 'Hall', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/sessions',
  initialForm: {
    batch_id: 1,
    date: '',
    start_time: '',
    end_time: '',
    hall_id: 1,
    status: 'scheduled'
  },
  mapRow: (item) => [item.date, item.batch_id, item.hall_id, item.status]
});

onMounted(load);
</script>
