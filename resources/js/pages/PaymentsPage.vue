<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Payments</h2>
      <BaseButton @click="showForm = true">Record Payment</BaseButton>
    </div>
    <div v-if="showForm" class="rounded bg-white p-4 shadow">
      <div class="grid gap-4 md:grid-cols-2">
        <FormInput label="Invoice ID" v-model="form.invoice_id" type="number" />
        <FormInput label="Amount" v-model="form.amount" type="number" />
        <FormInput label="Method" v-model="form.method" />
        <FormInput label="Received By" v-model="form.received_by" type="number" />
      </div>
      <div class="mt-4 flex gap-2">
        <BaseButton @click="save">Save</BaseButton>
        <BaseButton variant="secondary" @click="showForm = false">Cancel</BaseButton>
      </div>
    </div>
    <DataTable :headers="['Invoice', 'Amount', 'Method', 'Paid At']" :rows="rows" />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import DataTable from '../components/tables/DataTable.vue';
import { useCrud } from '../composables/useCrud';

const { rows, showForm, form, load, save } = useCrud({
  endpoint: '/api/payments',
  initialForm: {
    invoice_id: 1,
    amount: 0,
    method: 'cash',
    received_by: 1
  },
  mapRow: (item) => [item.invoice_id, item.amount, item.method, item.paid_at]
});

onMounted(load);
</script>
