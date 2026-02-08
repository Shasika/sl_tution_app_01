<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Halls</h2>
      <BaseButton @click="showForm = true">Add Hall</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Branch ID" v-model="form.branch_id" type="number" />
        <FormInput label="Name" v-model="form.name" />
        <FormInput label="Capacity" v-model="form.capacity" type="number" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Hall', 'Branch', 'Capacity']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/halls',
  initialForm: {
    branch_id: 1,
    name: '',
    capacity: 0
  },
  mapRow: (item) => [item.name, item.branch_id, item.capacity]
});

onMounted(load);
</script>
