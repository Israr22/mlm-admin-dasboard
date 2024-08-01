<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted } from 'vue';
const props = defineProps({
    downlines: {
        type: Array,
    },
    levels: {
        type: Array,
    }
});

const form = useForm({
    level: 0,
    users: []
});

onMounted = () =>{
    form.users = props.downlines
}

const getLevelUser = () => {
    axios.get('api/downlines', form)
    .then(response=>{
        form.users = response.downlines
    })
    .catch(e =>{
        console.log(e);
    })
}
</script>

<template>

    <AuthenticatedLayout>
        
        <div class="py-12">
            <div class="p-4 sm:ml-64">
                <div class="flex justify-start mb-4">
                    <div>
                        <select name="lavel" v-model="form.level" id="lavel" onselect="getLevelUser()">
                            <option v-for="level, index in levels" :value="index">{{ level }}</option>
                        </select>
                    </div> 
                </div>
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
                            <tr v-for="user in form.users" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{user.name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{user.email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{user.parent_id}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </AuthenticatedLayout>
</template>
