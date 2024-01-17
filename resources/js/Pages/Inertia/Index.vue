<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  blogs: Array,
});
</script>

<template>
  <div class="bg-blue-300" v-if="$page.props.flash.message">
    {{ $page.props.flash.message }}
  </div>
  <ul>
    <li v-for="blog in blogs" :key="blog.id">
      <Link
        class="text-blue-400"
        :href="
          route('inertia.show', {
            id: blog.id,
            title: blog.title,
            contents: blog.contents,
          })
        "
      >
        件名：{{ blog.title }}<br />本文：{{ blog.contents }}
      </Link>
    </li>
  </ul>
</template>
