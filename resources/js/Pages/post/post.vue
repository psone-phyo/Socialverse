<template>
     <div class="border shadow-sm rounded-md w-[25rem] p-2 mt-2 bg-white">
        <header class="flex justify-start items-center gap-3">
            <div>
                <img :src="`/img/default-avatar.png`" class="w-[50px] rounded-full" alt="">
            </div>
            <div>
                <div>Pyae Sone Phyo</div>
                <small>12:59pm</small>
            </div>
        </header>
        <Divider/>
        <div>
            <Carousel :value="products" :numVisible="1" :numScroll="1" circular>
            <template #item>
                    <div class="mb-4 h-[300px] flex items-center justify-center">
                        <div class="relative mx-auto cursor-pointer">
                            <img :src="`/img/james.jpg`" class="w-full rounded object-contain" />
                        </div>
                    </div>
            </template>
            </Carousel>

            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis saepe deserunt nisi non, unde ut iste, reprehenderit, a reiciendis aliquam ratione sint quibusdam est perspiciatis. Ab quae eligendi sequi ducimus.
            </div>

            <div class="flex justify-start items-center gap-3 my-3">
                <div>
                    <i class="fa-regular fa-heart text-xl cursor-pointer"></i>
                </div>
                <div>
                    <i class="fa-solid fa-heart text-xl cursor-pointer"></i>
                </div>
                <div>
                    <i class="fa-regular fa-comments text-xl cursor-pointer"></i>
                </div>
                <div>
                    <i class="fa-regular fa-paper-plane text-xl cursor-pointer"></i>
                </div>

            </div>
        </div>
     </div>
</template>

  <script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";

//primevue
import { ProductService } from '../../../../public/service/ProductService';
import Carousel from 'primevue/carousel';
import Divider from 'primevue/divider';

onMounted(() => {
    ProductService.getProductsSmall().then((data) => (products.value = data.slice(0, 9)));
})

const products = ref([]);

// const props = defineProps({
//   user_id: Number,
//   post_id: Number,
//   content: String,
//   files: Object,
//   liked: {
//     type: Boolean,
//     required: true,
//   },
//   comments: Array,
//   time: {
//     type: String,
//     required: true,
//   },
//   poster_id: {
//     type: Number,
//     required: true,
//   },
//   poster_name: {
//     type: String,
//     required: true,
//   },
//   poster_profile: {
//     type: String,
//     required: true,
//   },
// });

// const form = useForm({
//   user_id: props.user_id,
//   post_id: props.post_id,
//   liked: props.liked,
// });

// const isLiked = ref(form.liked);
// let lastTap = 0;

// const myTimeout = ref(null);

// function like() {
//   if (myTimeout) {
//     clearTimeout(myTimeout.value);
//   }
//   isLiked.value = !isLiked.value;
//   const routeName = isLiked.value ? "post.like" : "post.unlike";
//   myTimeout.value = setTimeout(() => {
//     form.post(route(routeName));
//     // console.log('hi');
//   }, 2000);
// }

// function handleTouchStart(event) {
//   const currentTime = new Date().getTime();
//   const tapThreshold = 300; // Threshold time (in ms) for double-tap detection

//   if (currentTime - lastTap <= tapThreshold) {
//     like(); // Handle double-tap
//   }

//   lastTap = currentTime;
// }
</script>

  <style scoped></style>
