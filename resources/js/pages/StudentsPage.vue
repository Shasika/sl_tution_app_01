<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Students</h2>
      <BaseButton @click="showForm = true">Register Student</BaseButton>
    </div>

    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <h3 class="text-lg font-semibold">New Student</h3>
      <div class="mt-4 grid gap-4 md:grid-cols-2">
        <FormInput label="Full Name" v-model="form.full_name" />
        <FormInput label="Phone" v-model="form.phone" />
        <FormInput label="Institute Code" v-model="form.institute_code" />
        <FormInput label="Grade Id" v-model="form.grade_id" type="number" />
        <FormInput label="Status" v-model="form.status" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>

    <DataTable :headers="['Reg No', 'Name', 'Grade', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { apiClient } from '../composables/useApi';

const showForm = ref(false);
const rows = ref([]);
const form = ref({
  institute_id: 1,
  institute_code: 'LAKB',
  full_name: '',
  phone: '',
  grade_id: 1,
  status: 'active'
});

const load = async () => {
  const response = await apiClient('/api/students');
  if (!response) return;
  rows.value = response.data.map((item) => [item.reg_no, item.full_name, item.grade_id, item.status]);
};

const save = async () => {
  await apiClient('/api/students', {
    method: 'POST',
    body: JSON.stringify(form.value)
  });
  showForm.value = false;
  await load();
};

onMounted(load);
</script>
