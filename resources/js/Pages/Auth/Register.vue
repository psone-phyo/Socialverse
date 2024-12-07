<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from 'vue'
const form = useForm({
    email: "",
    password: "",
    password_confirmation : "",
    remember: false,
});

const rules = {
    email: [
        value => !!value || 'E-mail is required.',
        value => /.+@.+\..+/.test(value) || 'E-mail must be valid.',
    ],
    password: [
        value => !!value || 'Password is required.',
    ],
}

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

//password show hide
const passwordSH = ref({
    show: false,
});

const togglePassword = () => {
    passwordSH.value.show = !passwordSH.value.show;
};

</script>

<template>
    <div
        class="bg-gray-800 flex justify-center items-center min-h-screen min-w-screen"
    >
        <div class="text-white w-full mx-5  xl:w-8/12 lg:w-1/2 md:w-3/4">
            <v-sheet class="mx-auto  xl:w-1/2 p-4 rounded-lg" >
                <h1 class="text-center font-bold text-3xl mb-3">Social Verse</h1>
                <form @submit.prevent="submit" class="">
                    <v-text-field
                        v-model="form.email"
                        :rules="rules.email"
                        label="Email"
                        :error-messages="form.errors.email"
                    ></v-text-field>

                    <v-text-field
                        v-model="form.password"
                        :rules="rules.password"
                        label="Password"
                        :error-messages="form.errors.password"
                        :type="passwordSH.show ? 'text' : 'password'"
                    ></v-text-field>

                    <v-text-field
                        v-model="form.password_confirmation"
                        :rules="rules.password_confirmation"
                        label="Password Confirmation"
                        :error-messages="form.errors.password_confirmation"
                        :type="passwordSH.show ? 'text' : 'password'"
                    ></v-text-field>

                    <div class="flex justify-end items-center mr-1">
                            <i class="fa-solid fa-eye text-sky-700 cursor-pointer" v-if="passwordSH.show" @click="togglePassword"></i>
                            <i class="fa-solid fa-eye-slash text-sky-700 cursor-pointer" v-else @click="togglePassword"></i>
                    </div>
                    <v-btn class="my-2" type="submit" block>Log in</v-btn>
                </form>
            </v-sheet>
        </div>

    </div>
</template>


