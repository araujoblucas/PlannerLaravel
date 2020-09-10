<template>
  <modal name="new-mensal-debt" classes="p-10 bg-card rounded-lg" height="auto">
    <h1 class="font-normal mb-16 text-center text-2xl">Mais uma? Manera ai parça!</h1>

    <form @submit.prevent="submit">
      <div class="flex">
        <div class="flex-1 mr-4">
          <div class="mb-4">
            <label for="description" class="text-sm block mb-2">Descrição</label>

            <input
                type="text"
                id="description"
                required
                class="border p-2 text-xs block w-full rounded"
                :class="form.errors.description ? 'border-error' : 'border-muted-light'"
                v-model="form.description">

            <span class="text-xs italic text-error" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
          </div>

          <div class="mb-4">
            <label for="day" class="text-sm block mb-2">Dia</label>

            <input
                type="number"
                id="day"
                required
                class="border p-2 text-xs block w-full rounded"
                :class="form.errors.day ? 'border-error' : 'border-muted-light'"
                v-model="form.day">

            <span class="text-xs italic text-error" v-if="form.errors.day" v-text="form.errors.day[0]"></span>
          </div>

        </div>

        <div class="flex-1 ml-4">
          <div class="mb-4">
            <label for="price" class="text-sm block mb-2">Preço</label>

            <input
                type="text"
                id="price"
                required
                class="border p-2 text-xs block w-full rounded"
                :class="form.errors.price ? 'border-error' : 'border-muted-light'"
                v-model="form.price">

            <span class="text-xs italic text-error" v-if="form.errors.price" v-text="form.errors.price[0]"></span>
          </div>

          <div class="mb-4">
            <label for="month" class="text-sm block mb-2">Mês</label>

            <input
                type="month"
                id="month"
                required
                class="border p-2 text-xs block w-full rounded"
                :class="form.errors.month ? 'border-error' : 'border-muted-light'"
                v-model="form.month">

            <span class="text-xs italic text-error" v-if="form.errors.month" v-text="form.errors.month[0]"></span>
          </div>

        </div>
      </div>

      <footer class="flex justify-end">
        <button type="button" class="button is-outlined mr-4" @click="$modal.hide('new-mensal-debt')">Cancelar</button>
        <button class="button">Criar dívida mensal</button>
      </footer>
    </form>
  </modal>
</template>

<script>
import BirdboardForm from './BirdboardForm';
export default {
  data() {
    return {
      form: new BirdboardForm({
        title: '',
        description: '',
        tasks: [
          { body: ''},
        ]
      })
    };
  },
  methods: {
    addTask() {
      this.form.tasks.push({ body: '' });
    },
    async submit() {
      if (! this.form.tasks[0].body) {
        delete this.form.originalData.tasks;
      }
      this.form.submit('/mensal_debt/create/')
          .then(response => location = response.data.message);
    }
  }
}
</script>