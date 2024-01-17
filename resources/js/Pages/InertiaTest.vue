<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
const newTitle = ref("");
const newContent = ref("");
</script>
<template lang="">
  Inertiaテストです。<br />
  <a href="/">aタグ経由です</a><br />
  <Link href="/">Link経由です</Link><br />
  <Link :href="route('inertia.index')">名前付きです</Link><br />
  <Link :href="route('inertia.show', { id: 1 })">ルートパラメータのテスト</Link
  ><br />

  <div>タイトル：{{ newTitle }}</div>
  <br />
  <div>内容：{{ newContent }}</div>

  <div class="mb-8"></div>
  <input type="text" name="newTitle" v-model="newTitle" /><br />
  <input type="text" name="newContent" v-model="newContent" /><br />
  <Link
    as="button"
    :href="route('inertia.store')"
    :data="{
      title: newTitle,
      contents: newContent,
    }"
    method="post"
    >DB保存テスト</Link
  >
</template>
<style lang=""></style>
