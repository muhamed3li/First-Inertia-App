<template>
  <div>
    <Component
      :is="link.url ? 'Link' : 'span'"
      v-for="(link, index) in links"
      :href="link.url"
      v-html="link.label"
      :key="index"
      class="px-1"
      preserve-scroll
      :class="{ 'text-gray-500': !link.url, 'font-bold': link.active }"
    />
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
};
</script>