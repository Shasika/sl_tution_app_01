<template>
  <div class="space-y-6">
    <div class="grid gap-4 md:grid-cols-4">
      <div class="rounded bg-white p-4 shadow">
        <p class="text-sm text-slate-500">Active Students</p>
        <p class="text-2xl font-semibold">1,245</p>
      </div>
      <div class="rounded bg-white p-4 shadow">
        <p class="text-sm text-slate-500">Today's Sessions</p>
        <p class="text-2xl font-semibold">18</p>
      </div>
      <div class="rounded bg-white p-4 shadow">
        <p class="text-sm text-slate-500">Pending Invoices</p>
        <p class="text-2xl font-semibold">246</p>
      </div>
      <div class="rounded bg-white p-4 shadow">
        <p class="text-sm text-slate-500">Monthly Collection</p>
        <p class="text-2xl font-semibold">LKR 2.8M</p>
      </div>
    </div>
    <div class="grid gap-4 lg:grid-cols-2">
      <div class="rounded bg-white p-4 shadow">
        <h2 class="text-lg font-semibold">Upcoming Sessions</h2>
        <ul class="mt-4 space-y-3 text-sm text-slate-600">
          <li>Grade 10 Maths - Sunday 2:00 PM - Hall A</li>
          <li>Grade 11 Science - Sunday 3:00 PM - Hall C</li>
          <li>A/L Chemistry - Monday 6:00 PM - Hall B</li>
        </ul>
      </div>
      <div class="rounded bg-white p-4 shadow">
        <h2 class="text-lg font-semibold">Collection Snapshot</h2>
        <p class="mt-4 text-sm text-slate-600">Cash: LKR 650,000 · Online: LKR 210,000</p>
        <div class="mt-4 rounded bg-slate-100 p-4 text-sm text-slate-600">
          35 invoices are due within the next 7 days. Automated reminders are queued.
        </div>
      </div>
    </div>
  </div>
</template>
