<template>
    <second-app-layout />

    <div
        class="hidden invisible md:visible fixed top-0 right-0 px-6 py-4 sm:block"
    >
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

        <form @submit.prevent="submit">
            <div class="flex w-full">
                <div class="pr-1 w-1/2">
                    <jet-label for="fname" value="Nom" />
                    <jet-input
                        id="fname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.fname"
                        required
                        autofocus
                        autocomplete="fname"
                    />
                </div>
                <div class="pl-1 w-1/2">
                    <jet-label for="lname" value="Prenom" />
                    <jet-input
                        id="lname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.lname"
                        required
                        autofocus
                        autocomplete="lname"
                    />
                </div>
            </div>

            <div class="mt-4 w-full">
                <jet-label for="email" value="E-mail" />
                <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                />
            </div>

            <div class="mt-4 flex w-full">
                <div class="pr-1 w-1/2">
                    <jet-label for="cin" value="CIN" />
                    <jet-input
                        id="cin"
                        type="text"
                        max="10"
                        class="mt-1 block w-full"
                        v-model="form.cin"
                        required
                    />
                </div>
                <div class="pl-1 w-1/2">
                    <jet-label for="tele" value="Téléphone" />
                    <jet-input
                        id="tele"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.tele"
                        required
                        
                    />
                </div>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Mot de passe" />
                <jet-input
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <jet-label
                    for="password_confirmation"
                    value="Confirmez le mot de passe"
                />
                <jet-input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div
                class="mt-4"
                v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
            >
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox
                            name="terms"
                            id="terms"
                            v-model:checked="form.terms"
                        />

                        <div class="ml-2">
                            I agree to the
                            <a
                                target="_blank"
                                :href="route('terms.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                >Terms of Service</a
                            >
                            and
                            <a
                                target="_blank"
                                :href="route('policy.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                >Privacy Policy</a
                            >
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-100"
                    >Déjà inscrit(e)?
                </inertia-link>

                <jet-button
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
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
        SecondAppLayout,
    },

    data() {
        return {
            form: this.$inertia.form({
                fname: "",
                lname: "",
                email: "",
                cin: "",
                tele: "",
                password: "",
                password_confirmation: "",
                terms: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>
