import { ref } from 'vue';
import { apiClient } from './useApi';

export const useCrud = ({ endpoint, initialForm, mapRow }) => {
  const rows = ref([]);
  const showForm = ref(false);
  const form = ref({ ...initialForm });

  const load = async () => {
    const response = await apiClient(endpoint);
    if (!response) return;
    rows.value = response.data.map(mapRow);
  };

  const save = async () => {
    await apiClient(endpoint, {
      method: 'POST',
      body: JSON.stringify(form.value)
    });
    showForm.value = false;
    form.value = { ...initialForm };
    await load();
  };

  return { rows, showForm, form, load, save };
};
