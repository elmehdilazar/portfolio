<template>
    <div>
     <Head title="Dashboard" />
             <AuthenticatedLayout>
                <template #header>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">projects</h2>
                </template>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-end m-2 p-2">
                        <Link :href="route('projects.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md" >New project</Link>
                    </div>
                    </div>
                </div>
            </AuthenticatedLayout>
    </div>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, Head } from '@inertiajs/vue3';
</script>
