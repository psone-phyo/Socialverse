<template>
    <!-- <div class="lg:hidden bg-black">
    <BottomNavigation>
      <v-card
        class="bg-black rounded-md shadow-md mb-1"
        prepend-icon="$vuetify"
        subtitle="The #1 Vue UI Library"
        width="100%"
      >
        <template v-slot:title>
          <span class="font-weight-black">Welcome to Vuetify</span>
        </template>

        <v-card-text class="bg-surface-dark pt-4">
          <v-carousel
            height="400"
            show-arrows="hover"
            cycle
            hide-delimiter-background
          >
            <v-carousel-item @dblclick="like" @touchstart="handleTouchStart">
              <v-sheet color="blue" height="100%">
                <img
                  :src="`/img/bg5.jpg`"
                  alt="Slide Image"
                  class="w-full h-full object-cover"
                />
              </v-sheet>
            </v-carousel-item>
          </v-carousel>
          <p class="my-1" @dblclick="like">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi,
            ratione debitis quis est labore voluptatibus! Eaque cupiditate
            minima, at placeat totam, magni doloremque veniam neque porro libero
            rerum unde voluptatem!
          </p>
          <div class="flex items-center justify-start gap-5 mt-2 mb-1">
            <i
              class="fa-regular fa-heart text-2xl"
              v-show="!liked"
              @click="like"
            ></i>
            <i
              class="fa-solid fa-heart text-2xl text-red-500"
              v-show="liked"
              @click="like"
            ></i>
            <i class="fa-regular fa-comments text-2xl"></i>
            <i class="fa-regular fa-paper-plane text-2xl"></i>
          </div>
        </v-card-text>
      </v-card>
    </BottomNavigation>
  </div> -->

    <div class="hidden lg:block">
        <div
            class="flex justify-center items-center fixed button-10 z-50 left-1/2 transition-all fade-in"
            v-show="flash.success"
        >
            <div class="flex justify-center items-center fixed w-1/2 top-0 alert-animation">
                <v-alert
                    type="success"
                    closable
                    class="py-2"
                >{{flash.success}}</v-alert>
            </div>
        </div>

        <Layout>
                <FriendList :FriendList="this.FriendList"/>
                <div v-for="(post, index) in processedPosts" :key="index">
                <Post
                    :content="post.content"
                    :files="files"
                    :liked="post.liked"
                    :time="formatTimeAgo(post.created_at)"
                    :poster_id="post.poster_id"
                    :poster_name="post.poster_name"
                    :poster_profile="post.poster_profile"
                    :user_id="UserData.id"
                    :post_id="post.post_id"
                />
            </div>
        </Layout>
    </div>
</template>

<script>
import BottomNavigation from "@/Pages/layout/mobile.vue";
import Layout from "@/Pages/layout/desktop.vue";
import Post from "@/Pages/post/post.vue";
import FriendList from "@/Pages/friendlist/list.vue";

import moment from "moment";

export default {
    name: "index",
    props: {
        PostData: Array,
        LikePost: Array,
        UserData: Object,
        FileData: Object,
        flash: Object,
        FriendList: Object
    },
    data() {
        return {
            success: null,
        };
    },
    components: {
        BottomNavigation,
        Layout,
        Post,
        FriendList
    },
    computed: {
        processedPosts() {
            // Map PostData and add a "liked" property
            return this.PostData.map((post) => ({
                ...post,
                liked: this.LikePost.some(
                    (like) => like.post_id === post.post_id
                ),
                files: this.FileData.filter((file) => file.post_id === post.post_id),
                poster_profile: `/img/default-avatar.png`, // Set default profile picture
            }));
        },
    },
    methods: {
        formatTimeAgo(timestamp) {
            return moment(timestamp).fromNow(); // Convert to "time ago"
        },

    },
    // mounted () {
    //     let images =  this.ImageData.some((image) => image.post_id == 25)
    //     console.log(images);

    // }

};
</script>

<style scoped>
@keyframes fadeIn {
    0% {
        opacity: 0; /* Start fully transparent */
    }
    100% {
        opacity: 0.95; /* End at 90% opacity */
    }
}

.alert-animation {
    opacity: 0; /* Initial state */
    animation: fadeIn .8s ease-in-out forwards; /* Apply the animation */
}
</style>
