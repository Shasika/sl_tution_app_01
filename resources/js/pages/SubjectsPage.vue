<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Subjects</h2>
      <BaseButton @click="showForm = true">Add Subject</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <FormInput label="Name" v-model="form.name" />
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Subject']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/subjects',
  initialForm: {
    name: ''
  },
  mapRow: (item) => [item.name]
});

onMounted(load);
</script>
