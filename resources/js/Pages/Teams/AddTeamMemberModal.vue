<!-- Add Team Member -->

<template>
    <div>
        <button
            @click="show = true"
            class="font-semibold bg-pink-700 focus:ring-0 py-2 px-1 w-28 rounded text-gray-100 capitalize"
        >
            Inviter membre
        </button>
        <jet-dialog-modal :show="show" @close="show = false">
            <template #title> Add Team Member </template>

            <template #content>
                <div class="text-sm text-gray-500">
                    Add a new team member to your team, allowing them to
                    collaborate with you.
                </div>
                <div>
                    <jet-form-section @submitted="addTeamMember">
                        <template #form>
                            <div class="col-span-6">
                                <div class="max-w-xl text-sm text-gray-600">
                                    Please provide the email address of the
                                    person you would like to add to this team.
                                </div>
                            </div>

                            <!-- Member Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="email" value="Email" />
                                <jet-input
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="addTeamMemberForm.email"
                                />
                                <jet-input-error
                                    :message="addTeamMemberForm.errors.email"
                                    class="mt-2"
                                />
                            </div>

                            <!-- Role -->
                            <div
                                class="col-span-6 lg:col-span-4"
                                v-if="$page.props.availableRoles.length > 0"
                            >
                                <jet-label for="roles" value="Role" />
                                <jet-input-error
                                    :message="addTeamMemberForm.errors.role"
                                    class="mt-2"
                                />

                                <div
                                    class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer"
                                >
                                    <button
                                        type="button"
                                        class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue"
                                        :class="{
                                            'border-t border-gray-200 rounded-t-none':
                                                i > 0,
                                            'rounded-b-none':
                                                i !=
                                                Object.keys(
                                                    $page.props.availableRoles
                                                ).length -
                                                    1,
                                        }"
                                        @click="
                                            addTeamMemberForm.role = role.key
                                        "
                                        v-for="(role, i) in $page.props
                                            .availableRoles"
                                        :key="role.key"
                                    >
                                        <div
                                            :class="{
                                                'opacity-50':
                                                    addTeamMemberForm.role &&
                                                    addTeamMemberForm.role !=
                                                        role.key,
                                            }"
                                        >
                                            <!-- Role Name -->
                                            <div class="flex items-center">
                                                <div
                                                    class="text-sm text-gray-600"
                                                    :class="{
                                                        'font-semibold':
                                                            addTeamMemberForm.role ==
                                                            role.key,
                                                    }"
                                                >
                                                    {{ role.name }}
                                                </div>

                                                <svg
                                                    v-if="
                                                        addTeamMemberForm.role ==
                                                        role.key
                                                    "
                                                    class="ml-2 h-5 w-5 text-green-400"
                                                    fill="none"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    ></path>
                                                </svg>
                                            </div>

                                            <!-- Role Description -->
                                            <div
                                                class="mt-2 text-xs text-gray-600"
                                            >
                                                {{ role.description }}
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <template #actions>
                            <jet-action-message
                                :on="addTeamMemberForm.recentlySuccessful"
                                class="mr-3"
                            >
                                Added.
                            </jet-action-message>
                            <jet-secondary-button
                                class="cursor-pointer mr-2"
                                @click="show = false"
                            >
                                annuler
                            </jet-secondary-button>

                            <jet-button
                                :class="{
                                    'opacity-25': addTeamMemberForm.processing,
                                }"
                                :disabled="addTeamMemberForm.processing"
                            >
                                Add
                            </jet-button>
                        </template>
                    </jet-form-section>
                </div>
            </template>
        </jet-dialog-modal>
    </div>
</template>
<script>
import JetDialogModal from "@/Jetstream/DialogModal";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetFormSection from "@/Jetstream/FormSection";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
    components: {
        JetDialogModal,
        JetLabel,
        JetInput,
        JetInputError,
        JetButton,
        JetDangerButton,
        JetSecondaryButton,
        JetFormSection,
        JetActionMessage,
    },

    data() {
        return {
            show: false,
            fileformat: "",
            addTeamMemberForm: this.$inertia.form({
                email: "",
                role: null,
            }),

            updateRoleForm: this.$inertia.form({
                role: null,
            }),

            leaveTeamForm: this.$inertia.form(),
            removeTeamMemberForm: this.$inertia.form(),

            currentlyManagingRole: false,
            managingRoleFor: null,
            confirmingLeavingTeam: false,
            teamMemberBeingRemoved: null,
        };
    },

    methods: {
        selectFormat(format) {
            this.fileformat = this.fileformat === format ? "" : format;
        },
        addTeamMember() {
            this.addTeamMemberForm.post(
                route("team-members.store", this.$page.props.team),
                {
                    errorBag: "addTeamMember",
                    preserveScroll: true,
                    onSuccess: () => this.addTeamMemberForm.reset(),
                }
            );
        },

        cancelTeamInvitation(invitation) {
            this.$inertia.delete(
                route("team-invitations.destroy", invitation),
                {
                    preserveScroll: true,
                }
            );
        },

        manageRole(teamMember) {
            this.managingRoleFor = teamMember;
            this.updateRoleForm.role = teamMember.membership.role;
            this.currentlyManagingRole = true;
        },

        updateRole() {
            this.updateRoleForm.put(
                route("team-members.update", [this.team, this.managingRoleFor]),
                {
                    preserveScroll: true,
                    onSuccess: () => (this.currentlyManagingRole = false),
                }
            );
        },

        confirmLeavingTeam() {
            this.confirmingLeavingTeam = true;
        },

        leaveTeam() {
            this.leaveTeamForm.delete(
                route("team-members.destroy", [
                    this.team,
                    this.$page.props.user,
                ])
            );
        },

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

        displayableRole(role) {
            return this.$page.props.availableRoles.find((r) => r.key === role)
                .name;
        },
    },
};
</script>
