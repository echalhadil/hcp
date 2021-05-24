<template>
    <div>
        <!-- Remove Team Member -->
        <button
            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
            @click="confirmTeamMemberRemoval(user)"
            v-if="userPermissions.canRemoveTeamMembers"
        >
            <i class="far fa-trash"></i>
        </button>
        <!-- Remove Team Member Confirmation Modal -->
        <jet-confirmation-modal
            :show="teamMemberBeingRemoved"
            @close="teamMemberBeingRemoved = null"
        >
            <template #title> Supprimer un membre de l'équipe </template>

            <template #content>
                Voulez-vous vraiment supprimer cette personne de l'équipe?
            </template>

            <template #footer>
                <jet-secondary-button @click="teamMemberBeingRemoved = null">
                    Annuler
                </jet-secondary-button>

                <jet-danger-button
                    class="ml-2"
                    @click="removeTeamMember"
                    :class="{ 'opacity-25': removeTeamMemberForm.processing }"
                    :disabled="removeTeamMemberForm.processing"
                >
                    Supprimer
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
    props: ["user", "userPermissions","team"],
    data() {
        return {
            removeTeamMemberForm: this.$inertia.form(),
            teamMemberBeingRemoved: null,
        };
    },
    methods: {
        confirmTeamMemberRemoval(teamMember) {
            this.teamMemberBeingRemoved = teamMember;
        },
        removeTeamMember() {
            this.removeTeamMemberForm.delete(
                route("team-members.destroy", [
                    this.team,
                    this.teamMemberBeingRemoved,
                ]),
                {
                    errorBag: "removeTeamMember",
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.teamMemberBeingRemoved = null),
                }
            );
        },
    },
};
</script>
