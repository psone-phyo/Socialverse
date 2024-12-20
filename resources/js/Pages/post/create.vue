<template>
    <Layout>
        <div class="min-h-screen">
            <form class="mt-5" @submit.prevent="post">
                <h2 class="font-bold text-xl mb-2">
                    Create Post
                </h2>
            <div class="shadow-sm border w-[25rem] p-3 rounded-md bg-white">

                <div class="flex justify-start items-center gap-3">
                    <div>
                    <img :src="`/img/default-avatar.png`" class="w-[50px] rounded-full" alt="">
                </div>
                <div>
                    <div>Pyae Sone</div>
                </div>
                </div>
                <Divider/>
                <!-- description -->
                <div class="mb-2">
                    <div>
                        <Textarea v-model="form.description" autoResize rows="2" class="w-full" placeholder="write something..."/>
                    </div>
                    <div class="card flex justify-end">
                        <Select v-model="selectedPrivacy" :options="privacy" optionLabel="name" optionValue="value" checkmark :highlightOnSelect="false" class="w-1/2" />
                    </div>
                </div>

                <!-- image -->
                <div class="card bg-gray-100">
                    <Galleria :value="form.files" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true" containerStyle="max-width: 640px" >
                        <template #item="slotProps">
                            <img :src="slotProps.item.data" :alt="slotProps.item.data" style="width: 100%;"  class="h-[300px] object-contain"/>
                        </template>
                        <template #thumbnail="slotProps">
                            <img :src="slotProps.item.data" :alt="slotProps.item.data" style="width: 100%;"/>
                        </template>
                    </Galleria>
                </div>
                <div class=" mt-5 mb-2">
                        <!-- Hidden file input with multiple selection enabled -->
                        <input
                            type="file"
                            ref="imageInput"
                            accept="image/*"
                            multiple
                            style="display: none"
                            @change="previewImages"
                        />

                        <!-- Button to trigger the file input -->
                        <div class="w-full p-2 rounded-md hover:bg-gray-300 bg-gray-200 cursor-pointer">
                            <button
                                type="button"
                                @click="triggerFileInput"

                            >
                                <i class="fa-regular fa-images"></i>
                                Upload Images
                            </button>
                        </div>
                    </div>

                    <div class="w-full flex justify-end items-center px-5 my-3">
                        <button type="submit" class="w-full rounded-md p-2 hover:bg-gray-300 bg-gray-200 cursor-pointer" style="width:100px" @submit="post">Post</button>
                    </div>
            </div>
        </form>
        </div>
    </Layout>
</template>

<!-- <script>
import Layout from "@/Pages/layout/desktop.vue";
import { Inertia } from '@inertiajs/inertia';

    export default {
    name: "create",
    data() {
        return {
            form : {
                description: "",
                images: [],
            }

        };
    },
    methods: {
        triggerFileInput() {
            this.$refs.imageInput.click();
        },
        previewImages(event) {
            const files = event.target.files;
            this.form.images = []; // Clear the existing images

            // Loop through the selected files and create previews
            Array.from(files).forEach((file) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    // Push the image data (base64 string) to the images array
                    this.form.images.push(e.target.result);
                };
                reader.readAsDataURL(file);
            });
        },
        post(){
            Inertia.post(route('post.store'), this.form);
        },
    },
    components: {
        Layout,
    },
};
</script> -->
<script setup>
import {ref} from 'vue'
import Layout from "@/Pages/layout/desktop.vue";
import { useForm } from "@inertiajs/vue3";

// import { router } from '@inertiajs/vue3'

//primevue
import Divider from 'primevue/divider'
import Galleria from 'primevue/galleria';
import Textarea from 'primevue/textarea';
import Select from 'primevue/select';

const selectedPrivacy = ref('friends');
const privacy = ref([
    { name: 'Private', value: 'private'},
    { name: 'Friends', value: 'friends'},
    { name: 'Public',  value: 'public'},
]);

const responsiveOptions = ref([
    {
        breakpoint: '1920px',
        numVisible: 5
    },
    {
        breakpoint: '575px',
        numVisible: 1
    }
]);

const form = useForm({
    description: "",
    privacy: selectedPrivacy.value,
    files: [],
});


const imageInput = ref(null);

function triggerFileInput() {
    imageInput.value.click();
}

function previewImages(event) {
    const files = event.target.files;
    form.files = []; // Clear the existing images

    // Loop through the selected files and create previews
    Array.from(files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const fileType = file.type;
            // Push the image data (base64 string) to the images array
            form.files.push({
                type: fileType.startsWith('image') ? 'image' : 'video',
                data: e.target.result
            });
        };
        reader.readAsDataURL(file);

    });
}

const post = () => {
    form.post(route('post.store'));
}

</script>

<style scoped></style>
