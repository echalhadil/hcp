<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Merci pour votre inscription! Avant de commencer, pourriez-vous
            vérifier votre adresse e-mail en cliquant sur le lien que nous
            venons de vous envoyer par e-mail ? Si vous n'avez pas reçu
            l'e-mail, nous nous ferons un plaisir de vous en envoyer un autre.
        </div>

        <div
            class="mb-4 font-medium text-sm text-green-600"
            v-if="verificationLinkSent"
        >
            Un nouveau lien de vérification a été envoyé à l'adresse e-mail que
            vous avez fournie lors de l'inscription.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <jet-button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Renvoyer l'e-mail de vérification
                </jet-button>

                <inertia-link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="border border-pink-500 capitalize rounded text-pink-500 px-2 py-1 text-sm text-gray-600 hover:text-pink-600"
                    >Déconnecter</inertia-link
                >
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";

export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form(),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("verification.send"));
        },
    },

    computed: {
        verificationLinkSent() {
            return this.status === "verification-link-sent";
        },
    },
};
</script>
