<template>
  <Head title="Login Page" />

  <main class="grid place-items-center min-h-screen">
    <section class="bg-white p-8 rounded-xl max-w-md mx-auto border w-full">
      <h1 class="text-3xl mb-6">Log In</h1>
      <form @submit.prevent="submit">
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
            class="border rounderd p-2 w-full"
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
            class="border rounderd p-2 w-full"
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
            Login
          </button>
        </div>
      </form>
    </section>
  </main>
</template>

<script>
export default {
  layout: null,
};
</script>

<script setup>
import { useForm } from "@inertiajs/vue3";
let form = useForm({
  email: "",
  password: "",
});

let submit = () => {
  form.post("/login");
};
</script>