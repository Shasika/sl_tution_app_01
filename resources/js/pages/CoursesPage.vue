<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Courses</h2>
      <BaseButton>Create Course</BaseButton>
    </div>
    <DataTable :headers="['Course', 'Teacher', 'Fee Plan']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Grade 10 Maths', 'Mr. Perera', 'Monthly LKR 3,500'],
  ['A/L Chemistry', 'Ms. Silva', 'Monthly LKR 4,500']
];
</script>
