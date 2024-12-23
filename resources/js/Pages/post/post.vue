<template>
    <div class="border shadow-lg rounded-md w-[25rem] p-2 mt-2 bg-white">
        <header class="flex justify-start items-center gap-3">
            <div>
                <img
                    :src="props.poster_profile"
                    class="w-[50px] rounded-full"
                    alt=""
                />
            </div>
            <div>
                <div class="font-bold">{{ poster_name }}</div>
                <small>{{ time }}</small>
            </div>
        </header>
        <Divider />
        <div>
            <div class="card bg-gray-100">
                <Gallery :images="files" :fnlike="like"/>
            </div>
            <div class="mt-2">
                {{ content }}
            </div>

            <div class="flex justify-start items-center gap-3 my-3">
                <div v-if="!isLiked" @click="like()">
                    <i class="fa-regular fa-heart text-xl cursor-pointer"></i>
                </div>
                <div v-else @click="like()">
                    <i
                        class="fa-solid fa-heart text-xl cursor-pointer text-red-500"
                    ></i>
                </div>
                <div>
                    <i
                        class="fa-regular fa-comments text-xl cursor-pointer"
                    ></i>
                </div>
                <div>
                    <i
                        class="fa-regular fa-paper-plane text-xl cursor-pointer"
                    ></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import Gallery from '@/Pages/post/ImageDisplay/galleria.vue';
//primevue
import Divider from "primevue/divider";
import Galleria from "primevue/galleria";
import Image from 'primevue/image';

const props = defineProps({
    user_id: Number,
    post_id: Number,
    content: String,
    files: Object,
    liked: {
        type: Boolean,
        required: true,
    },
    comments: Array,
    time: {
        type: String,
        required: true,
    },
    poster_id: {
        type: Number,
        required: true,
    },
    poster_name: {
        type: String,
        required: true,
    },
    poster_profile: {
        type: String,
        required: true,
    },
});

const form = useForm({
    user_id: props.user_id,
    post_id: props.post_id,
    liked: props.liked,
});

const isLiked = ref(form.liked);


const myTimeout = ref(null);

function like() {
    if (myTimeout) {
        clearTimeout(myTimeout.value);
    }
    isLiked.value = !isLiked.value;
    const routeName = isLiked.value ? "post.like" : "post.unlike";
    myTimeout.value = setTimeout(() => {
        form.post(route(routeName), { preserveScroll: true });
    }, 2000);
}


</script>

<style scoped></style>
