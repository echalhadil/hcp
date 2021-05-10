<template>
    <left-layout>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <create-team-modal
                    v-if="$page.props.jetstream.canCreateTeams"
                />
                <update-team-name-form
                    :team="team"
                    :permissions="permissions"
                />
                <team-members
                    class="mt-10 sm:mt-0"
                    :team="team"
                    :available-roles="availableRoles"
                    :user-permissions="permissions"
                />

                <!--
                <team-member-manager class="mt-10 sm:mt-0"
                            :team="team"
                            :available-roles="availableRoles"
                            :user-permissions="permissions" />
                -->

                <team-invitations
                    :team="team"
                    :available-roles="availableRoles"
                    :user-permissions="permissions"
                />

                <template
                    v-if="permissions.canDeleteTeam && !team.personal_team"
                >
                    <jet-section-border />

                    <delete-team-form class="mt-10 sm:mt-0" :team="team" />
                </template>
            </div>
        </div>
    </left-layout>
</template>

<script>
// import TeamMemberManager from "./TeamMemberManager";
import LeftLayout from "@/Layouts/LeftLayout";
import DeleteTeamForm from "./DeleteTeamForm";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import UpdateTeamNameForm from "./UpdateTeamNameForm";

import TeamInvitations from "./TeamInvitations";
import TeamMembers from "./TeamMembers";
import CreateTeamModal from "./CreateTeamModal";

export default {
    props: ["team", "availableRoles", "permissions"],

    components: {
        LeftLayout,
        DeleteTeamForm,
        JetSectionBorder,
        // TeamMemberManager,
        UpdateTeamNameForm,
        TeamInvitations,
        TeamMembers,
        CreateTeamModal,
    },
};
</script>
