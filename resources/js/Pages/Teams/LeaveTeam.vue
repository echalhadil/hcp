<template>
    <div>
        <!-- Leave Team -->
        <button
            class="cursor-pointer w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
            @click="confirmLeavingTeam"
        >
            <i class="far fa-sign-out"></i>
        </button>
        <jet-confirmation-modal
            :show="confirmingLeavingTeam"
            @close="confirmingLeavingTeam = false"
        >
            <template #title> Quitter l'équipe</template>

            <template #content>
                Etes-vous sûr de vouloir quitter cette équipe?
            </template>

            <template #footer>
                <jet-secondary-button @click="confirmingLeavingTeam = false">
                    Annuler
                </jet-secondary-button>

                <jet-danger-button
                    class="ml-2"
                    @click="leaveTeam"
                    :class="{ 'opacity-25': leaveTeamForm.processing }"
                    :disabled="leaveTeamForm.processing"
                >
                    quitter
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </div>
</template>

<script>
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    components: {
        JetConfirmationModal,
        JetSecondaryButton,
        JetDangerButton,
    },
    props: ["team"],

    data() {
        return {
            leaveTeamForm: this.$inertia.form(),
            confirmingLeavingTeam: false,
        };
    },
    methods: {
        leaveTeam() {
            this.leaveTeamForm.delete(
                route("team-members.destroy", [
                    this.team,
                    this.$page.props.user,
                ])
            );
        },
        confirmLeavingTeam() {
            this.confirmingLeavingTeam = true;
        },
    },
};
</script>
