<template>
    <second-app-layout />

    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
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

        <div class="mb-4 text-sm text-gray-600">
            Mot de passe oublié? Aucun problème. Faites-nous simplement savoir
            votre adresse e-mail et nous vous enverrons par e-mail un lien de
            réinitialisation de mot de passe qui vous permettra d'en choisir un
            nouveau.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="E-mail" />
                <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    envoyer un lien de réinitialisation
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
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import SecondAppLayout from "@/Layouts/SecondAppLayout";

export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors,
        SecondAppLayout,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"));
        },
    },
};
</script>
