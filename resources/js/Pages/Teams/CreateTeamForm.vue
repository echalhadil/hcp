<template>
    <jet-form-section @submitted="createTeam">
        <template #title> Team Details </template>

        <template #description>
            Créez une nouvelle équipe pour collaborer avec d'autres sur des
            projets.
        </template>

        <template #form>
            <div class="col-span-6 dark:bg-gray-400">
                <jet-label value="Team Owner" />

                <div class="flex items-center mt-2">
                    <div class="ml-4 leading-tight">
                        <div>
                            {{ $page.props.user.fname }}
                            {{ $page.props.user.lname }}
                        </div>
                        <div class="text-gray-700 text-sm">
                            {{ $page.props.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 dark:bg-gray-400 sm:col-span-4">
                <jet-label for="name" value="Team Name" />
                <jet-input
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Create
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";

export default {
    components: {
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
            }),
        };
    },

    methods: {
        createTeam() {
            this.form.post(route("teams.store"), {
                errorBag: "createTeam",
                preserveScroll: true,
            });
        },
    },
};
</script>
