<template>
  <Layout>
    <div class="card flex justify-center">
        <Toast />
        <button @click="show" class="hidden"></button>
    </div>
    <div v-for="(item, index) in 3" :key="index">
      <Post />
    </div>
  </Layout>
</template>


<script setup>
import Layout from "@/Pages/layout/desktop.vue";
import Post from "@/Pages/post/post.vue";
import { onMounted } from "vue";

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";


const toast = useToast();

const show = () => {
    toast.add({ severity: 'success', summary: 'Post Created', detail: 'Your Post is successfully posted', life: 3000 });
};

const props = defineProps({
    flash: Object,
    PostData: Array,
    LikePost: Array,
    UserData: Object,
    FileData: Object,
    flash: Object,
    FriendList: Object
});

const processedPosts = () => {
    return this.PostData.map((post) => ({
        ...post,
        liked: this.LikePost.some(
            (like) => like.post_id === post.post_id
        ),
        files: this.FileData.filter((file) => file.post_id === post.post_id),
        poster_profile: `/img/default-avatar.png`,
    }));
}

const formatTimeAgo = (timestamp) => moment(timestamp).fromNow(); // Convert to "time ago"

onMounted(() => {
  props.flash.success? show(): '';
})
</script>

<style scoped>
</style>
