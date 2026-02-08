<template>
  <div class="min-h-screen flex">
    <aside class="w-64 bg-white border-r border-slate-200 p-6">
      <div class="text-xl font-semibold text-brand-600">SL Tuition</div>
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
        <div class="pt-2 text-xs uppercase text-slate-400">Reports</div>
        <router-link class="sidebar-link" to="/app/reports/collections">Collections</router-link>
        <router-link class="sidebar-link" to="/app/reports/arrears">Arrears</router-link>
        <router-link class="sidebar-link" to="/app/reports/class-performance">Class Performance</router-link>
      </nav>
    </aside>
    <main class="flex-1">
      <header class="bg-white border-b border-slate-200 p-4 flex items-center justify-between">
        <div>
          <h1 class="text-lg font-semibold text-slate-800">Tuition Management</h1>
          <p class="text-sm text-slate-500">Sri Lanka multi-institute platform</p>
        </div>
        <div class="flex items-center gap-2">
          <span class="text-sm text-slate-600">admin@demo.lk</span>
          <button class="btn-secondary">Logout</button>
        </div>
      </header>
      <div class="p-6">
        <router-view />
      </div>
    </main>
  </div>
</template>

<style scoped>
.sidebar-link {
  @apply block rounded px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900;
}
</style>
