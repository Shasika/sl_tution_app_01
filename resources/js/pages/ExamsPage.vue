<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Exams</h2>
      <BaseButton @click="showForm = true">Create Exam</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Institute ID" v-model="form.institute_id" type="number" />
        <FormInput label="Batch ID" v-model="form.batch_id" type="number" />
        <FormInput label="Title" v-model="form.title" />
        <FormInput label="Exam Date" v-model="form.exam_date" type="date" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Exam', 'Batch', 'Date']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/exams',
  initialForm: {
    institute_id: 1,
    batch_id: 1,
    title: '',
    exam_date: ''
  },
  mapRow: (item) => [item.title, item.batch_id, item.exam_date]
});

onMounted(load);
</script>
