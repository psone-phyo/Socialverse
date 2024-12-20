<template>

    <Layout class="hidden lg:hidden">
        <div class="mt-5 bg-gray-900 pb-1 main rounded-md" style="width: 600px">
            <div class="flex justify-between items-center gap-1 py-3">
                <div class="ml-10">
                    <img
                        :src="`/img/anime3.png`"
                        alt=""
                        class="w-full rounded-circle"
                    />
                </div>
                <div class="flex justify-evenly items-center">
                    <div
                        style="width: 150px; height: 150px"
                        class="text-center flex flex-column"
                    >
                        <div class="" style="height: 100px">
                            <i
                                class="fa-solid fa-users-line"
                                style="font-size: 70px"
                            ></i>
                        </div>
                        <hr />
                        <div class="mt-2">
                            <p>Friends</p>
                            <p>20</p>
                        </div>
                    </div>

                    <div
                        style="width: 150px; height: 150px"
                        class="text-center flex flex-column"
                    >
                        <div style="height: 100px">
                            <i
                                class="fa-regular fa-id-badge"
                                style="font-size: 80px"
                            ></i>
                        </div>
                        <hr />
                        <div class="mt-2">
                            <p>Posts</p>
                            <p>20</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-10">Biology is the study of living things</div>
            <div class="flex justify-center gap-5 my-5">
                <button class="bg-black rounded-md p-2" style="width: 40%">
                    <i class="fa-solid fa-pen mr-3"></i>Edit Profile
                </button>
                <Link :href="route('post')" class="bg-black rounded-md p-2 text-center" style="width: 40%">
                    <i class="fa-solid fa-plus mr-3"></i>Create Post
                </Link>
            </div>
        </div>

        <v-card>
            <v-tabs bg-color="black" fixed-tabs>
                <v-tab text="My Post" @click="tab1"></v-tab>

                <v-tab text="My Gallery" @click="tab2"></v-tab>
            </v-tabs>

            <v-tabs-window v-model="tab">
                <v-tabs-window-item value="tab-1">
                    <v-card class="">
                        <v-card-text
                            class="text-white bg-black flex flex-column justify-center"
                        >
                            <div
                                v-for="(post, index) in processedPosts"
                                :key="index"
                                class="flex flex-column items-center"
                            >
                                <Post
                                    :content="post.content"
                                    :files="post.files"
                                    :liked="post.liked"
                                    :time="formatTimeAgo(post.created_at)"
                                    :poster_id="post.poster_id"
                                    :poster_name="post.poster_name"
                                    :poster_profile="post.poster_profile"
                                    :user_id="UserData.id"
                                    :post_id="post.post_id"
                                />
                            </div>
                        </v-card-text>
                    </v-card>
                </v-tabs-window-item>

                <v-tabs-window-item value="tab-2">
                    <v-card>
                        <v-card-text class="text-white bg-black"
                            >
                            <div class="grid grid-cols-4 gap-1 " style="width:600px">
                                <a class="col-span-1 cursor-pointer" href="" v-for="(file,index) in FileData" :key="index">
                                    <img :src="file.file_path" alt="anime3" style="height: 125px; width: 100%;">
                                </a>
                            </div>
                            </v-card-text
                        >
                    </v-card>
                </v-tabs-window-item>
            </v-tabs-window>
        </v-card>
    </Layout>
    <div class="card flex justify-center">
        <Button label="Submit" />
    </div>

</template>

<script>
import moment from "moment";
import Layout from "@/Pages/layout/desktop.vue";
import Post from "@/Pages/post/post.vue";
import { Link, Head } from '@inertiajs/vue3'
import Button from "primevue/button"

export default {
    data() {
        return {
            tab: "tab-1",
        };
    },
    components: {
        Layout,
        Post,
        Link,
        Button
    },
    props: {
        PostData: Array,
        LikePost: Array,
        FileData: Object,
        UserData: Object,
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
        tab1() {
            this.tab = "tab-1";
        },
        tab2() {
            this.tab = "tab-2";
        },
        formatTimeAgo(timestamp) {
            return moment(timestamp).fromNow(); // Convert to "time ago"
        },
    },
};
</script>

<style scoped></style>
