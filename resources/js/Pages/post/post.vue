<template>
  <div>
    <v-card
      class="rounded-md shadow-md mb-1 mt-3"
      width="400"
      style="background-color: #0e161b; color: white"
    >
      <template v-slot:title>
        <div
          class="flex items-center justify-start gap-5 border-b-2 border-white pb-3"
        >
          <div>
            <img
              :src="poster_profile"
              alt=""
              width="50px"
              class="rounded-full"
            />
          </div>
          <div class="flex flex-column items-start">
            <h1 class="font-weight-black">{{ poster_name }}</h1>
            <small class="text-sm text-gray-400">{{ time }}</small>
          </div>
        </div>
      </template>

      <v-card-text class="bg-surface-dark pt-2">
        <v-carousel
          height="400"
          show-arrows="hover"
          hide-delimiter-background
          v-show="files.length"
        >
          <v-carousel-item
            @dblclick="like"
            @touchstart="handleTouchStart"
            class="cursor-pointer"
            v-for="(file, index) in files"
            :key="index"
          >
            <v-sheet color="black" height="100%">
              <template v-if="file.file_type == 'image'">
                <img
                  :src="file.file_path"
                  alt="Image Preview"
                  class="w-full h-full object-contain"
                />
              </template>
              <template v-else-if="file.file_type == 'video'">
                <div  class="flex justify-center items-center h-full w-full">
                    <video
                  :src="file.file_path"
                  autoplay
                  controls
                  class="w-full object-contain text-center"
                ></video>
                </div>

              </template>
            </v-sheet>
          </v-carousel-item>
        </v-carousel>
        <p class="my-1">
          {{ content }}
        </p>
        <form
          class="flex items-center justify-start gap-5 mt-2 mb-1"
          @submit.prevent="like"
        >
          <button type="submit" v-show="!isLiked">
            <i class="fa-regular fa-heart text-2xl cursor-pointer"></i>
          </button>
          <button type="submit" v-show="isLiked">
            <i
              class="fa-solid fa-heart text-2xl text-red-500 cursor-pointer"
            ></i>
          </button>

          <i class="fa-regular fa-comments text-2xl cursor-pointer"></i>
          <i class="fa-regular fa-paper-plane text-2xl cursor-pointer"></i>
        </form>
      </v-card-text>
    </v-card>
  </div>
</template>

  <script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";

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
let lastTap = 0;

const myTimeout = ref(null);

function like() {
  if (myTimeout) {
    clearTimeout(myTimeout.value);
  }
  isLiked.value = !isLiked.value;
  const routeName = isLiked.value ? "post.like" : "post.unlike";
  myTimeout.value = setTimeout(() => {
    form.post(route(routeName));
    // console.log('hi');
  }, 2000);
}

function handleTouchStart(event) {
  const currentTime = new Date().getTime();
  const tapThreshold = 300; // Threshold time (in ms) for double-tap detection

  if (currentTime - lastTap <= tapThreshold) {
    like(); // Handle double-tap
  }

  lastTap = currentTime;
}
</script>

  <style scoped></style>
