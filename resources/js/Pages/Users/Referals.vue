<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps({
    referals: {
        type: Array,
    }
});
</script>

<template>

    <AuthenticatedLayout>

        <div class="py-12">
            <div class="p-4 sm:ml-64">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Parent
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="referal in referals" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{referal.name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{referal.email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{referal.parent_id}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </AuthenticatedLayout>
</template>
