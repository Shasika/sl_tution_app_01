<template>
  <label class="block text-sm">
    <span class="text-slate-600">{{ label }}</span>
    <input
      :type="type"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="mt-1 w-full rounded border border-slate-300 px-3 py-2 text-sm"
    />
  </label>
</template>

<script setup>
defineProps({
  label: String,
  modelValue: [String, Number],
  type: {
    type: String,
    default: 'text'
  }
});

defineEmits(['update:modelValue']);
</script>
