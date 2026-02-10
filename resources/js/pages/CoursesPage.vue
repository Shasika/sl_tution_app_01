<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Courses</h2>
      <BaseButton @click="showForm = true">Create Course</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Institute ID" v-model="form.institute_id" type="number" />
        <FormInput label="Subject ID" v-model="form.subject_id" type="number" />
        <FormInput label="Grade ID" v-model="form.grade_id" type="number" />
        <FormInput label="Teacher ID" v-model="form.teacher_id" type="number" />
        <FormInput label="Title" v-model="form.title" />
        <FormInput label="Status" v-model="form.status" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Course', 'Teacher', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/courses',
  initialForm: {
    institute_id: 1,
    subject_id: 1,
    grade_id: 1,
    teacher_id: 1,
    title: '',
    status: 'active'
  },
  mapRow: (item) => [item.title, item.teacher_id, item.status]
});

onMounted(load);
</script>
