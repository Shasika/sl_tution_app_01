<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Users</h2>
      <BaseButton @click="showForm = true">Add User</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Institute ID" v-model="form.institute_id" type="number" />
        <FormInput label="Branch ID" v-model="form.branch_id" type="number" />
        <FormInput label="Name" v-model="form.name" />
        <FormInput label="Email" v-model="form.email" type="email" />
        <FormInput label="Phone" v-model="form.phone" />
        <FormInput label="Password" v-model="form.password" type="password" />
        <FormInput label="Role" v-model="form.role" />
        <FormInput label="Status" v-model="form.status" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Name', 'Role', 'Branch']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/users',
  initialForm: {
    institute_id: 1,
    branch_id: 1,
    name: '',
    email: '',
    phone: '',
    password: '',
    role: 'teacher',
    status: 'active'
  },
  mapRow: (item) => [item.name, item.role, item.branch_id]
});

onMounted(load);
</script>
