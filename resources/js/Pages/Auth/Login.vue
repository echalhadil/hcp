<template>

<second-app-layout />
    <div class="hidden fixed top-0 right-0 ms:px-6 sm:py-4 sm:block">
        <div>
            <inertia-link
                :href="route('login')"
                class="text-sm capitalize m-1 border-pink-700 border font-semibold py-2 px-3 rounded text-pink-700 dark:text-gray-400 dark:border-gray-300"
            >
                connexion
            </inertia-link>

            <inertia-link
                :href="route('register')"
                class="text-sm m-1 border-pink-700 text-gray-100 border font-semibold py-2 px-3 rounded bg-pink-700 dark:border-gray-200 dark:bg-gray-200 dark:text-gray-700"
            >
                S'inscrire
            </inertia-link>
        </div>
    </div>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Mot de passe" />
                <jet-input
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-200"
                        >Remember me</span
                    >
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm dark:text-gray-200 text-gray-600 hover:text-gray-900"
                >
                    Mot de passe oublié?
                </inertia-link>

                <jet-button
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Connexion
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";


import SecondAppLayout from "@/Layouts/SecondAppLayout";


export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        SecondAppLayout
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                });
        },
    },
};
</script>
