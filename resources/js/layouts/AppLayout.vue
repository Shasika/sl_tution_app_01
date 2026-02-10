<template>
  <div :class="{ dark: isDark }">
    <div class="min-h-screen bg-slate-50 text-slate-900 transition dark:bg-slate-950 dark:text-slate-100">
      <div class="flex min-h-screen">
        <div
          v-if="sidebarOpen"
          class="fixed inset-0 z-20 bg-slate-900/50 lg:hidden"
          @click="sidebarOpen = false"
        ></div>
        <aside
          class="fixed inset-y-0 left-0 z-30 w-64 transform border-r border-slate-200 bg-white p-6 transition lg:static lg:translate-x-0 dark:border-slate-800 dark:bg-slate-900"
          :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >
          <div class="flex items-center justify-between">
            <div class="text-xl font-semibold text-brand-600">SL Tuition</div>
            <button class="lg:hidden text-slate-500 hover:text-slate-900 dark:text-slate-300 dark:hover:text-white" @click="sidebarOpen = false">
              ✕
            </button>
          </div>
          <nav class="mt-6 space-y-2 text-sm">
            <router-link class="sidebar-link" to="/app/dashboard">Dashboard</router-link>
            <router-link class="sidebar-link" to="/app/institute">Institute</router-link>
            <router-link class="sidebar-link" to="/app/branches">Branches</router-link>
            <router-link class="sidebar-link" to="/app/halls">Halls</router-link>
            <router-link class="sidebar-link" to="/app/users">Users</router-link>
            <router-link class="sidebar-link" to="/app/grades">Grades</router-link>
            <router-link class="sidebar-link" to="/app/subjects">Subjects</router-link>
            <router-link class="sidebar-link" to="/app/courses">Courses</router-link>
            <router-link class="sidebar-link" to="/app/batches">Batches</router-link>
            <router-link class="sidebar-link" to="/app/sessions">Sessions</router-link>
            <router-link class="sidebar-link" to="/app/students">Students</router-link>
            <router-link class="sidebar-link" to="/app/invoices">Invoices</router-link>
            <router-link class="sidebar-link" to="/app/payments">Payments</router-link>
            <router-link class="sidebar-link" to="/app/exams">Exams</router-link>
            <div class="pt-2 text-xs uppercase text-slate-400 dark:text-slate-500">Reports</div>
            <router-link class="sidebar-link" to="/app/reports/collections">Collections</router-link>
            <router-link class="sidebar-link" to="/app/reports/arrears">Arrears</router-link>
            <router-link class="sidebar-link" to="/app/reports/class-performance">Class Performance</router-link>
          </nav>
        </aside>
        <main class="flex-1 lg:ml-0">
          <header class="border-b border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-slate-900">
            <div class="flex flex-wrap items-center justify-between gap-4">
              <div class="flex items-center gap-3">
                <button class="btn-secondary lg:hidden" @click="sidebarOpen = true">Menu</button>
                <div>
                  <h1 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Tuition Management</h1>
                  <p class="text-sm text-slate-500 dark:text-slate-400">Sri Lanka multi-institute platform</p>
                </div>
              </div>
              <div class="flex flex-wrap items-center gap-2">
                <button class="btn-secondary" @click="toggleTheme">
                  {{ isDark ? 'Light mode' : 'Dark mode' }}
                </button>
                <span class="text-sm text-slate-600 dark:text-slate-300">admin@demo.lk</span>
                <button class="btn-secondary" @click="logout">Logout</button>
              </div>
            </div>
          </header>
          <div class="p-4 sm:p-6">
            <router-view />
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref, watch } from 'vue';
import { apiClient } from '../composables/useApi';

const sidebarOpen = ref(false);
const isDark = ref(false);

const applyTheme = (value) => {
  isDark.value = value;
  localStorage.setItem('theme', value ? 'dark' : 'light');
};

const toggleTheme = () => {
  applyTheme(!isDark.value);
};

onMounted(() => {
  const stored = localStorage.getItem('theme');
  if (stored) {
    applyTheme(stored === 'dark');
    return;
  }

  applyTheme(window.matchMedia('(prefers-color-scheme: dark)').matches);
});

watch(isDark, (value) => {
  document.documentElement.classList.toggle('dark', value);
});

const logout = async () => {
  await apiClient('/logout', { method: 'POST' });
  window.location.href = '/login';
};
</script>

<style scoped>
.sidebar-link {
  @apply block rounded px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white;
}
</style>
