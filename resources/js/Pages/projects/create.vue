<template>
  <div>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          New project
        </h2>
      </template>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end m-2 p-2">Form</div>
        </div>

        <div class="py-12">
          <div class="max-w-md mx-auto bg-white sm:px-6 lg:px-8">
            <form class="p-4" @submit.prevent="submit">
              <div>
                <InputLabel for="skills" value="skills" />
                <select
                  v-model="form.skill_id"
                  id="skill_id"
                  class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                  name="skill_id"
                >
                  <option
                    v-for="skill in skills"
                    :key="skill.id"
                    :value="skill.id"
                  >
                    {{ skill.name }}
                  </option>
                </select>
              </div>
              <div class="">
                <InputLabel for="title" value="title" />

                <TextInput
                  id="title"
                  type="text"
                  class="block w-full mt-1"
                  v-model="form.title"
                  required
                  autofocus
                  autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
              </div>
              <div class="">
                <InputLabel for="project_url" value="project_url" />

                <TextInput
                  id="project_url"
                  type="text"
                  class="block w-full mt-1"
                  v-model="form.project_url"
                  required
                  autofocus
                  autocomplete="projecturl"
                />

                <InputError class="mt-2" :message="form.errors.project_url" />
              </div>
              <div class="mt-2">
                <InputLabel for="image" value="Image" />

                <TextInput
                  id="image"
                  type="file"
                  @input="form.image = $event.target.files[0]"
                />

                <InputError class="mt-2" :message="form.errors.image" />
              </div>

              <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                  class="ms-4"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Store
                </PrimaryButton>
              </div>
            </form>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </div>
</template>

<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, Head, useForm } from "@inertiajs/vue3";
defineProps({
  skills: Array,
});

const form = useForm({
  project_url: "",
  title: "",
  image: null,
  skill_id: "",
  project_url: "",
});
const submit = () => {
  form.post(route("projects.store"));
};
</script>
