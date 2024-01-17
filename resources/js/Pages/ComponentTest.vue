<script setup>
// @/はresource/jsになる
let inputValue = "";
import Guestlayaout from "@/Layouts/GuestLayout.vue";
import Label from "@/Components/InputLabel.vue";
import inputTxt from "@/Components/TextInput.vue";
const emitTest = (e) => console.log(e);
</script>
<template>
  <div></div>
  <Guestlayaout>
    <Label value="件名">こんにちわんこ</Label>

    <inputTxt
      @update:modelValue="emitTest"
      modelValue="記入してください"
    ></inputTxt>
    <!-- emitは子供の@emit名でうけて、＝で任意の値にする -->
    <div v-if="inputValue">{{ inputValue }}</div>
  </Guestlayaout>
</template>
