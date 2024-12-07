<template>
    <Layout>
        <div class="mt-10">
            <div>
            <h1 class="font-bold text-3xl my-3 bg-gray-800 p-1 rounded-md">Create Post</h1>
            </div>
        <div style="width: 400px; background-color: #0e161b" class="py-2 rounded-md ">
            <div class="flex justify-start gap-5 border-b-2 border-b-white pb-3 px-5">
                <img
                    src="/img/default-avatar.png"
                    alt=""
                    width="50px"
                    class="rounded-full"
                />
                <div>
                    <p class="text-lg">Teddy</p>
                </div>
            </div>
            <div>
                <form @submit.prevent="post">
                    <div class="w-full flex justify-end items-center mt-2 rounded-md px-5 cursor-pointer">
                        <select name="privacy" id="" class="bg-gray-900">
                            <option value="Public">Public</option>
                            <option value="Private">Friends</option>
                            <option value="Only Me">Only Me</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <v-container fluid class="w-full">
                            <v-textarea
                                label="Description"
                                auto-grow
                                rows="1"
                                v-model="form.description"
                            ></v-textarea>
                        </v-container>
                    </div>

                    <!-- carosuel -->
                    <v-carousel
                        height="300"
                        show-arrows="hover"
                        cycle
                        hide-delimiter-background
                        v-show="form.files.length"
                    >
                        <v-carousel-item
                            v-for="(file, index) in form.files"
                            :key="index"
                        >
                            <v-sheet color="black" style="background-color: #0e161b;" height="100%">
                                <template v-if="file.type === 'image'">
                                    <img :src="file.data" alt="Image Preview" class="w-full h-full object-contain" />
                                </template>
                                <template v-else-if="file.type === 'video'">
                                    <video :src="file.data" controls class="w-full object-contain"></video>
                                </template>
                            </v-sheet>
                        </v-carousel-item>
                    </v-carousel>

                    <div class="px-5 mt-5 mb-2">
                        <!-- Hidden file input with multiple selection enabled -->
                        <input
                            type="file"
                            ref="imageInput"
                            accept="image/*,video/* "
                            multiple
                            style="display: none"
                            @change="previewImages"
                        />

                        <!-- Button to trigger the file input -->
                        <div class="w-full bg-gray-800 p-2 rounded-md">
                            <button
                                type="button"
                                @click="triggerFileInput"
                                class=""
                            >
                                <i class="fa-regular fa-images"></i>
                                Upload Images
                            </button>
                        </div>
                    </div>

                    <div class="w-full flex justify-end items-center px-5 my-3">
                        <button type="submit" class="w-full rounded-md p-2 bg-gray-800 hover:bg-gray-700" style="width:100px">Post</button>
                    </div>
                </form>
            </div>
        </div>
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

const form = useForm({
    description: "",
    files: {},
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
    // form.post(route('post.store'));
    const formData = new FormData();
    formData.append("description", form.description);
    formData.append("privacy", form.privacy);

    form.files.forEach((fileObj, index) => {
        formData.append(`files[${index}]`, fileObj.file); // Append raw file data
    });

    form.post(route('post.store'), {
        data: formData,
        preserveScroll: true, // Keeps scroll position
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    });
}

</script>

<style scoped></style>
