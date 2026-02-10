<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Invoices</h2>
      <BaseButton @click="showForm = true">Create Invoice</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Institute ID" v-model="form.institute_id" type="number" />
        <FormInput label="Student ID" v-model="form.student_id" type="number" />
        <FormInput label="Branch Code" v-model="form.branch_code" />
        <FormInput label="Issue Date" v-model="form.issue_date" type="date" />
        <FormInput label="Due Date" v-model="form.due_date" type="date" />
        <FormInput label="Item Description" v-model="form.item_description" />
        <FormInput label="Item Amount" v-model="form.item_amount" type="number" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Invoice', 'Student', 'Total', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { apiClient } from '../composables/useApi';

const rows = ref([]);
const showForm = ref(false);
const form = ref({
  institute_id: 1,
  student_id: 1,
  branch_code: 'CMB',
  issue_date: '',
  due_date: '',
  item_description: '',
  item_amount: 0
});

const load = async () => {
  const response = await apiClient('/api/invoices');
  if (!response) return;
  rows.value = response.data.map((item) => [
    item.invoice_no,
    item.student_id,
    item.total,
    item.status
  ]);
};

const save = async () => {
  await apiClient('/api/invoices', {
    method: 'POST',
    body: JSON.stringify({
      institute_id: form.value.institute_id,
      student_id: form.value.student_id,
      branch_code: form.value.branch_code,
      issue_date: form.value.issue_date,
      due_date: form.value.due_date,
      items: [
        {
          description: form.value.item_description,
          amount: Number(form.value.item_amount)
        }
      ]
    })
  });
  showForm.value = false;
  await load();
};

onMounted(load);
</script>
