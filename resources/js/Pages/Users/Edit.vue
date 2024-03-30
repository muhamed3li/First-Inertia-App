<template>
  <Head title="Edit User" />
  <h1 class="text-3xl">Edit User</h1>

  <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
    <div class="mb-6">
      <label
        for="name"
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
      >
        name
      </label>

      <input
        v-model="form.name"
        type="text"
        class="border border-gray-400 p-2 w-full"
        name="name"
        id="name"
        required
      />
      <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">
        {{ form.errors.name }}
      </div>
    </div>
    <div class="mb-6">
      <label
        for="email"
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
      >
        email
      </label>

      <input
        v-model="form.email"
        type="email"
        class="border border-gray-400 p-2 w-full"
        name="email"
        id="email"
        required
      />
      <div v-if="form.errors.email" class="text-red-500 text-xs mt-1">
        {{ form.errors.email }}
      </div>
    </div>

    <div class="mb-">
      <button
        type="submit"
        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        :disabled="form.processing"
      >
        Update
      </button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

let props = defineProps({ errors: Object, user: Object });

let form = useForm({
  name: props.user.name,
  email: props.user.email,
});

let submit = () => {
  form.post(`/users/${props.user.id}/update`);
};
</script>