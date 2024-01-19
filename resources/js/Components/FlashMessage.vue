<script setup></script>
<template>
  <div
    class="bg-blue-300 text-white p-4"
    v-if="$page.props.flash.status === 'success'"
  >
    {{ $page.props.flash.message }}
  </div>
  <div
    class="bg-red-500 text-white p-4"
    v-if="$page.props.flash.status === 'danger'"
  >
    {{ $page.props.flash.message }}
  </div>
</template>
