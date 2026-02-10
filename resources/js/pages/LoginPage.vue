<template>
  <div class="min-h-screen flex items-center justify-center bg-slate-100">
    <div class="w-full max-w-md rounded bg-white p-8 shadow">
      <h1 class="text-2xl font-semibold text-slate-800">Sign in</h1>
      <p class="mt-1 text-sm text-slate-500">Access your institute dashboard</p>
      <form class="mt-6 space-y-4" @submit.prevent="submit">
        <FormInput label="Email" v-model="email" type="email" />
        <FormInput label="Password" v-model="password" type="password" />
        <BaseButton class="w-full">Login</BaseButton>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import BaseButton from '../components/ui/BaseButton.vue';
import FormInput from '../components/forms/FormInput.vue';
import { apiClient } from '../composables/useApi';

const email = ref('admin@demo.lk');
const password = ref('password');
const router = useRouter();

const submit = async () => {
  await apiClient('/login', {
    method: 'POST',
    body: JSON.stringify({ email: email.value, password: password.value })
  });
  router.push('/app/dashboard');
};
</script>
