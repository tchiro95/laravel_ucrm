<script setup>
import { Inertia } from "@inertiajs/inertia";

defineProps({
  id: String,
  blog: Object,
});

const deleteConfirm = (id) => {
  Inertia.delete(`/inertia/${id}`, {
    onBefore: () => confirm("本当に削除しても良いですか"),
  });
};
</script>

<template>
  <div>これはID: {{ id }}です</div>
  <br />
  <div>タイトル: {{ blog.title }}です</div>
  <br />
  <button @click="deleteConfirm(blog.id)">削除</button>
</template>
