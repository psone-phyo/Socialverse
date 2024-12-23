<template>
    <Layout>
        <div class="card flex justify-center">
            <Toast />
            <button @click="show" class="hidden"></button>
        </div>
        <div v-for="(post, index) in processedPosts()" :key="index">
            <Post
                :content="post.content"
                :files="post.files"
                :liked="post.liked"
                :time="formatTimeAgo(post.created_at)"
                :poster_id="post.poster_id"
                :poster_name="post.poster_name"
                :poster_profile="post.poster_profile"
                :user_id="props.UserData.id"
                :post_id="post.post_id"
            />
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Pages/layout/desktop.vue";
import Post from "@/Pages/post/post.vue";
import moment from 'moment'
import Toast from "primevue/toast";
import { useToast } from "primevue/usetoast";

const toast = useToast();

const show = () => {
    toast.add({
        severity: "success",
        summary: "Post Created",
        detail: "Your Post is successfully posted",
        life: 3000,
    });
};

const props = defineProps({
    flash: Object,
    PostData: Array,
    LikePost: Array,
    UserData: Object,
    FileData: Object,
    flash: Object,
    FriendList: Object,
});

const processedPosts = () => {
    return props.PostData.map((post) => ({
        ...post,
        liked: props.LikePost.some((like) => like.post_id === post.post_id),
        files: props.FileData.filter((file) => file.post_id === post.post_id),
        poster_profile: `/img/default-avatar.png`,
    }));
};

const formatTimeAgo = (timestamp) => moment(timestamp).fromNow(); // Convert to "time ago"

</script>

<style scoped></style>
