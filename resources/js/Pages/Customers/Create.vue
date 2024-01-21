<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import {Core as YubinBangoCore} from "yubinbango-core2";

defineProps({
  errors: Object,
});

const form = reactive({
  name: null,
  kana: null,
  tel: null,
  email: null,
  postcode: null,
  address: null,
  birthday: null,
  gender: null,
  memo: null,
});

const fetchAddress = ()=>{
    new YubinBangoCore(String(form.postcode),(value)=>{ form.address = value.region + value.locality + value.street})
};
// 第二引数でObjを渡す。
const storeCustomer = () => {
  Inertia.post("/customers", form);
};
</script>

<template>
  <Head title="顧客登録" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        顧客登録
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <section class="text-gray-600 body-font relative">
            <BreezeValidationErrors
              class="mx-2"
              :errors="errors"
            ></BreezeValidationErrors>
            <form @submit.prevent="storeCustomer" method="get">
              <div class="container px-5 py-12 mx-auto">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                  <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="name"
                          class="leading-7 text-sm text-gray-600"
                          >名前</label
                        >
                        <input
                          type="text"
                          id="name"
                          name="name"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.name"
                        />
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="kana"
                          class="leading-7 text-sm text-gray-600"
                          >顧客カナ</label
                        >
                        <input
                          type="text"
                          id="kana"
                          name="kana"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.kana"
                        />
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="tel" class="leading-7 text-sm text-gray-600"
                          >TEL</label
                        >
                        <input
                          type="tel"
                          id="tel"
                          name="tel"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.tel"
                        />
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="price"
                          class="leading-7 text-sm text-gray-600"
                          >メールアドレス</label
                        >
                        <input
                          type="email"
                          id="email"
                          name="email"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.email"
                        />
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="postcode"
                          class="leading-7 text-sm text-gray-600"
                          >郵便番号</label
                        >
                        <input
                          type="number"
                          id="postcode"
                          name="postcode"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.postcode"
                          @change="fetchAddress"
                        />
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="address"
                          class="leading-7 text-sm text-gray-600"
                          >住所</label
                        >
                        <input
                          type="text"
                          id="address"
                          name="address"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.address"
                        />
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="birthday"
                          class="leading-7 text-sm text-gray-600"
                          >誕生日</label
                        >
                        <input
                          type="date"
                          id="birthday"
                          name="birthday"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                          v-model="form.birthday"
                        />
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="gender"
                          class="leading-7 text-sm text-gray-600"
                          >性別</label
                        >
                        <input
                          type="radio"
                          id="gender"
                          name="male"
                          class="mr-2 ml-4"
                          v-model="form.gender"
                          value="0"
                        />
                        <label for="male" class="my-2">男性</label>
                        <input
                          type="radio"
                          id="gender"
                          name="female"
                          class="mr-2 ml-4"
                          v-model="form.gender"
                          value="1"
                        />
                        <label for="female" class="my-2">女性</label>
                        <input
                          type="radio"
                          id="gender"
                          name="other"
                          class="mr-2 ml-4"
                          v-model="form.gender"
                          value="2"
                        />
                        <label for="other" class="my-2">そのほか</label>
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label
                          for="memo"
                          class="leading-7 text-sm text-gray-600"
                          >メモ</label
                        >
                        <textarea
                          id="memo"
                          name="memo"
                          class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                          v-model="form.memo"
                        ></textarea>
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <button
                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                      >
                        顧客登録
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
