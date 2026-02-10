<template>
  <button :class="buttonClass" v-bind="$attrs">
    <slot />
  </button>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  variant: {
    type: String,
    default: 'primary'
  }
});

const buttonClass = computed(() => {
  const base = 'inline-flex items-center gap-2 rounded px-4 py-2 text-sm font-semibold transition';
  if (props.variant === 'secondary') {
    return `${base} bg-slate-100 text-slate-700 hover:bg-slate-200`;
  }
  if (props.variant === 'outline') {
    return `${base} border border-slate-300 text-slate-700 hover:bg-slate-50`;
  }
  return `${base} bg-brand-600 text-white hover:bg-brand-500`;
});
</script>
