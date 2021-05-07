<template>
    <div class="ml-6 my-auto items-center rounded-full shadow bg-gray-50 hover:bg-gray-100">
        <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
            <template  #trigger>
                <div @click="open = !open ">
                    <i  :class="{'fal fa-cog p-2 cursor-pointer  transition-transform duration-500 transform ':true,'rotate-180': open, 'rotate-0': !open}" ></i>
                </div>

            </template>

            <template #content>
                <div class="w-60">
                    <!-- Team Management -->
                    <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">
                                    Team Settings
                                </jet-dropdown-link>

                                <jet-dropdown-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                                    Create New Team
                                </jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>


                            </template>
                </div>
            </template>
        </jet-dropdown>
    </div>
</template>

<script>

    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetDropdown from '@/Jetstream/Dropdown'



    export default {
        components: {
            JetDropdown,
            JetDropdownLink,
        },
        data() {
            return {
                open : false,
            }
        },
}
</script>