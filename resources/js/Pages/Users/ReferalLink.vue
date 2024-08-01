<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps({
    uuid: {
        type: String
    }
});
</script>
<template>

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="p-4 sm:ml-64">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">this your referal Link 
                            /register?uuid={{uuid}}
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </AuthenticatedLayout>
</template>
