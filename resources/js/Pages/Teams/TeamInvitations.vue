<template>
    <div class="p-5 mt-10 bg-white dark:bg-gray-400 w-full rounded shadow">
        <div class="md:flex mr-auto w-full">
            <div class="my-auto text-sm text-gray-500 dark:text-gray-100 capitalize">
                <p class="text-gray-800 dark:text-gray-200 font-semibold text-lg pb-1">
                    Pending Team Invitations
                </p>

                <p>
                    These people have been invited to your team and have been
                    sent an invitation email. They may join the team by
                    accepting the email invitation
                </p>
            </div>
            <div class="ml-auto mt-1 md:mt-0 my-auto text-sm">
                <add-team-member-modal />
            </div>
        </div>
    </div>

    <div class="mt-2 mb-6 bg-current rounded shadow overflow-x-auto w-full">
        <div
            class="w-full flex items-center justify-center bg-gray-100 font-sans overflow-x-auto"
        >
            <div class="w-full">
                <div class="bg-white shadow-md rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr
                                class="bg-gray-200 text-gray-600 uppercase text-sm py-6 leading-normal"
                            >
                                <th
                                    @click="sortBy = 'id'"
                                    class="py-3 cursor-pointer select-none px-6 text-left"
                                >
                                    #
                                    <i
                                        v-if="sortBy == 'id'"
                                        @click="change"
                                        class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                        :class="{
                                            ' rotate-180 ': sorting === 'desc',
                                            ' rotate-0 ': sorting === 'asc',
                                        }"
                                        aria-hidden="true"
                                    ></i>
                                </th>

                                <th
                                    @click="sortBy = 'email'"
                                    class="py-3 px-6 cursor-pointer select-none text-left"
                                >
                                    email
                                    <i
                                        v-if="sortBy == 'email'"
                                        @click="change"
                                        class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                        :class="{
                                            ' rotate-180 ': sorting === 'desc',
                                            ' rotate-0 ': sorting === 'asc',
                                        }"
                                        aria-hidden="true"
                                    ></i>
                                </th>

                                <th
                                    @click="sortBy = 'role'"
                                    class="py-3 px-6 cursor-pointer select-none text-left"
                                >
                                    role
                                    <i
                                        v-if="sortBy == 'role'"
                                        @click="change"
                                        class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                        :class="{
                                            ' rotate-180 ': sorting === 'desc',
                                            ' rotate-0 ': sorting === 'asc',
                                        }"
                                        aria-hidden="true"
                                    ></i>
                                </th>

                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr
                                v-if="team.team_invitations.length === 0"
                                class="border-b text-lg border-gray-200"
                            >
                                <td
                                    class="py-3 px-6 text-center capitalize"
                                    colspan="4"
                                >
                                    aucune membre
                                </td>
                            </tr>
                            <tr
                                v-for="(invitation,
                                index) in team.team_invitations"
                                :key="index"
                                class="border-b border-gray-200 hover:bg-gray-100"
                            >
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">
                                        {{ invitation.id }}</span
                                    >
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span> {{ invitation.email }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span
                                        class="capitalize py-1 px-3 rounded-full text-xs"
                                        :class="{
                                            'bg-green-200 text-green-600':
                                                invitation.role === 'editor',
                                            'bg-blue-200 text-blue-600':
                                                invitation.role === 'admin',
                                        }"
                                    >
                                        {{ invitation.role }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div
                                        class="flex item-center justify-center"
                                    >
                                        <button
                                            v-if="
                                                userPermissions.canRemoveTeamMembers
                                            "
                                            @click="
                                                cancelTeamInvitation(invitation)
                                            "
                                            class="w-4 mr-2 cursor-pointer transform hover:text-red-500 hover:scale-110"
                                        >
                                            Annuler
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AddTeamMemberModal from "./AddTeamMemberModal";
export default {
    components: {
        AddTeamMemberModal,
    },
    props: [
        "team",
        // 'availableRoles',
        "userPermissions",
    ],
    data() {
        return {
            sorting: "asc",
            sortBy: "id",
        };
    },

    methods: {
        cancelTeamInvitation(invitation) {
            this.$inertia.delete(
                route("team-invitations.destroy", invitation),
                {
                    preserveScroll: true,
                }
            );
        },
        change() {
            this.sorting = this.sorting === "asc" ? "desc" : "asc";
        },
    },
    watch: {
        sorting() {
            this.team.team_invitations = _.orderBy(this.team.team_invitations, this.sortBy, this.sorting);
        },
    },
};
</script>
