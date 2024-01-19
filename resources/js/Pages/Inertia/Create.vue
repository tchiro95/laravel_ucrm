<script setup>
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

defineProps({
  errors: Object,
});

const form = reactive({
  title: null,
  contents: null,
});

const submitFunction = () => {
  Inertia.post("/inertia", form);
};
</script>
<template>
  <BreezeValidationErrors :errors="errors"></BreezeValidationErrors>
  <form action="" @submit.prevent="submitFunction">
    <input type="text" name="title" v-model="form.title" /><br />
    <div class="text-red-800" v-if="errors.title">{{ errors.title }}</div>
    <br />
    <input type="text" name="contents" v-model="form.contents" /><br />
    <div class="text-red-800" v-if="errors.contents">{{ errors.contents }}</div>
    <br />
    <button>送信</button>
  </form>
</template>
