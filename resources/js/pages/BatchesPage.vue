<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Batches</h2>
      <BaseButton @click="showForm = true">Create Batch</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Course ID" v-model="form.course_id" type="number" />
        <FormInput label="Branch ID" v-model="form.branch_id" type="number" />
        <FormInput label="Hall ID" v-model="form.hall_id" type="number" />
        <FormInput label="Name" v-model="form.name" />
        <FormInput label="Capacity" v-model="form.capacity" type="number" />
        <FormInput label="Status" v-model="form.status" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Batch', 'Course', 'Hall']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/batches',
  initialForm: {
    course_id: 1,
    branch_id: 1,
    hall_id: 1,
    name: '',
    capacity: 0,
    status: 'active'
  },
  mapRow: (item) => [item.name, item.course_id, item.hall_id]
});

onMounted(load);
</script>
