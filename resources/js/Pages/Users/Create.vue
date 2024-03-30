<template>
  <Head title="Create User" />
  <h1 class="text-3xl">Create New User</h1>

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
    <div class="mb-6">
      <label
        for="password"
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
      >
        password
      </label>

      <input
        v-model="form.password"
        type="password"
        class="border border-gray-400 p-2 w-full"
        name="password"
        id="password"
      />
      <div v-if="form.errors.password" class="text-red-500 text-xs mt-1">
        {{ form.errors.password }}
      </div>
    </div>

    <div class="mb-">
      <button
        type="submit"
        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        :disabled="form.processing"
      >
        Create
      </button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

defineProps({ errors: Object });

let form = useForm({
  name: "",
  email: "",
  password: "",
});

let submit = () => {
  form.post("/users");
};
</script>