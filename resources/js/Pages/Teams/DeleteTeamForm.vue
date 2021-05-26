<template>
  
    <div class=" flex bg-white rounded-md shadow p-3">
        <div>
            <p class=" font-semibold text-lg py-1">
            Delete Team
            </p>
            <p class="max-w-xl text-sm text-gray-600  py-1">
                Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain.
            </p>
        </div>

        <div class=" mr-2 m-auto flex-none">
            <jet-danger-button @click="confirmTeamDeletion">
                    Delete Team
                </jet-danger-button>
        </div>

        
            <!-- Delete Team Confirmation Modal -->
            <jet-confirmation-modal :show="confirmingTeamDeletion" @close="confirmingTeamDeletion = false">
                <template #title>
                    Delete Team
                </template>

                <template #content>
                    Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted.
                </template>

                <template #footer>
                    <jet-secondary-button @click="confirmingTeamDeletion = false">
                        Cancel
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="deleteTeam" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Team
                    </jet-danger-button>
                </template>
            </jet-confirmation-modal>
    </div>
</template>

<script>
    // import JetActionSection from '@/Jetstream/ActionSection'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        props: ['team'],

        components: {
            // JetActionSection,
            JetConfirmationModal,
            JetDangerButton,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingTeamDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmTeamDeletion() {
                this.confirmingTeamDeletion = true
            },

            deleteTeam() {
                this.form.delete(route('teams.destroy', this.team), {
                    errorBag: 'deleteTeam'
                });
            },
        },
    }
</script>
