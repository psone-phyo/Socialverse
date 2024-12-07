<template>
    <div>
        <v-card class="">
            <v-layout>
                <v-navigation-drawer
                    expand-on-hover
                    permanent
                    class="bg-black"
                >
                    <div>
                        <h1 class="text-3xl font-bold py-4 px-4">Social Verse</h1>
                    </div>
                    <v-list class="bg-black border-r-2 border-r-white">
                        <Link :href="route('profile')">
                            <v-list-item
                            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
                            subtitle="sandra_a88@gmailcom"
                            title="Sandra Adams"
                        ></v-list-item>
                        </Link>

                    </v-list>

                    <v-divider></v-divider>

                    <div class="flex flex-column justify-between items-start">
                        <div>
                            <v-list density="compact" nav >
                                <v-list-item
                                    prepend-icon="mdi-folder"
                                    title="My Files"
                                    value="myfiles"
                                ></v-list-item>
                                <v-list-item
                                    prepend-icon="mdi-account-multiple"
                                    title="Shared with me"
                                    value="shared"
                                ></v-list-item>
                                <v-list-item
                                    prepend-icon="mdi-star"
                                    title="Starred"
                                    value="starred"
                                ></v-list-item>
                                <form @submit.prevent="logout" class="flex justify-start items-center">
                                    <button type="submit" class="rounded-md p-1 bg-gray-800 text-xl ">Log out</button>
                                </form>
                            </v-list>
                        </div>
                    </div>
                </v-navigation-drawer>

                <v-main class="flex justify-between bg-black">
                    <div
                        class="flex justify-center bg-black w-3/4 max-h-screen overflow-auto border-l border-l-gray-900"
                    >
                        <div class="flex-column justify-start">
                            <slot></slot>
                        </div>
                    </div>

                    <div>
                        <v-card>
                            <v-layout>
                                <v-navigation-drawer
                                    floating
                                    permanent
                                    class="bg-black"

                                >
                                    <v-list density="compact" nav>
                                        <v-list-item
                                            prepend-icon="mdi-view-dashboard"
                                            title="Home"
                                            value="home"
                                            @click="home"
                                        ></v-list-item>
                                        <v-list-item
                                            prepend-icon="mdi-view-dashboard"
                                            title="Create Post"
                                            value="createpost"
                                            @click="createPage"
                                        ></v-list-item>
                                        <v-list-item
                                            prepend-icon="mdi-view-dashboard"
                                            title="Profile"
                                            value="profile"
                                            @click="profile"
                                        ></v-list-item>
                                    </v-list>
                                </v-navigation-drawer>
                                <v-main style="" class="min-h-screen"></v-main>
                            </v-layout>
                        </v-card>
                    </div>
                </v-main>
            </v-layout>
        </v-card>
    </div>
</template>

<script setup>
import { useForm , Link } from "@inertiajs/vue3";
const form = useForm({
    content: ""
})

const logout = () => {
    form.post(route('logout'))
}

const createPage = () => {
    form.get(route('post'))
}

const home = () => {
    form.get(route('home'))
}

const profile = () => {
    form.get(route('profile'))
}

</script>

<style scoped>
/* Style the scrollbar container */
::-webkit-scrollbar {
    width: 5px; /* Width of the vertical scrollbar */
    height: 8px; /* Height of the horizontal scrollbar */
}

/* Style the scrollbar track */
::-webkit-scrollbar-track {
    background-color: black; /* Light gray background */
    border-radius: 5px;
}

/* Style the scrollbar thumb (the part you drag) */
::-webkit-scrollbar-thumb {
    background-color: grey; /* Gray thumb */
    border-radius: 10px;
    border: 1px solid black; /* Optional border for contrast */
}

/* Style the scrollbar thumb on hover */

/* Optional: Style the scrollbar corner (where horizontal and vertical scrollbars meet) */
::-webkit-scrollbar-corner {
    background-color: #f0f0f0;
}
</style>
