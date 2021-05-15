<template>
    <div class="">
        <div class="p-5 mt-10 bg-white dark:bg-gray-400 w-full rounded shadow">
            <div class="flex mr-auto w-full">
                <!--<p class="my-auto capitalize font-semibold text-gray-600 mr-3"> current Team </p>
                -->
                

                <div class=" my-auto">
                    <input
                        type="text"
                        class=" dark:text-gray-100 bg-transparent focus:border-pink-500 focus:ring-0 pr-8 placeholder-gray-400 dark:placeholder-gray-200 p-1 rounded"
                        placeholder="Search"
                        v-model="searchvalue"
                    />
                    <i class="fal fa-search text-pink-500 dark:text-gray-100 my-auto -ml-6"></i>
                </div>

                <div class="flex ml-auto my-auto">
                    <download-team-list v-if="team.users.length > 0" />
                </div>

                <!-- <team-settings /> -->
            </div>
        </div>

        <div
            class="mt-2 bg-current  rounded shadow overflow-x-auto w-full"
        >
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
                                        class="py-3 cursor-pointer select-none px-5 text-left"
                                    >
                                        #
                                        <i
                                            v-if="sortBy == 'id'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        @click="sortBy = 'nom'"
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                    >
                                        nom
                                        <i
                                            v-if="sortBy == 'nom'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        @click="sortBy = 'prenom'"
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                    >
                                        prenom
                                        <i
                                            v-if="sortBy == 'prenom'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        @click="sortBy = 'cin'"
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                    >
                                        cin
                                        <i
                                            v-if="sortBy == 'cin'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        @click="sortBy = 'email'"
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                    >
                                        email
                                        <i
                                            v-if="sortBy == 'email'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                        @click="sortBy = 'tele'"
                                    >
                                        tele
                                        <i
                                            v-if="sortBy == 'tele'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        @click="sortBy = 'role'"
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                    >
                                        role
                                        <i
                                            v-if="sortBy == 'role'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>
                                    <th
                                        @click="sortBy = 'anquites'"
                                        class="py-3 px-5 cursor-pointer select-none text-left"
                                    >
                                        total d'anquite
                                        <i
                                            v-if="sortBy == 'anquites'"
                                            @click="change"
                                            class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform"
                                            :class="{
                                                ' rotate-180 ':
                                                    sorting === 'desc',
                                                ' rotate-0 ': sorting === 'asc',
                                            }"
                                            aria-hidden="true"
                                        ></i>
                                    </th>

                                    <th class="py-3 px-5 text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                <tr
                                    v-for="user in teamMembers"
                                    :key="user.id"
                                    class="border-b border-gray-200 hover:bg-gray-100"
                                    :class="{ 'bg-gray-50': index % 2 === 0 }"
                                >
                                    <td class="py-3 px-5 text-left">
                                        <span class="font-medium">{{
                                            user.id
                                        }}</span>
                                    </td>
                                    <td class="py-3 px-5 text-left">
                                        <span class="">{{ user.fname }}</span>
                                    </td>
                                    <td class="py-3 px-5 text-left">
                                        <span>{{ user.lname }}</span>
                                    </td>
                                    <td class="py-3 uppercase px-5 text-center">
                                        <span> {{ user.cin }}</span>
                                    </td>
                                    <td class="py-3 px-5 text-center">
                                        <span>{{ user.email }}</span>
                                    </td>
                                    <td class="py-3 px-5 text-center">
                                        <span>{{ user.tele }}</span>
                                    </td>
                                    <td class="py-3 px-5 text-center">
                                        <span
                                            :class="{
                                                'py-1 capitalize px-3 rounded-full text-xs': true,
                                                'bg-blue-200 text-blue-600':
                                                    user.membership.role ===
                                                    'editor',
                                                'bg-green-200 text-green-600':
                                                    user.membership.role ===
                                                    'admin',
                                            }"
                                        >
                                            {{ user.membership.role }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-5 text-center">
                                        <span> {{ user.anquites }}</span>
                                    </td>
                                    <td class="py-3 px-5 text-center">
                                        <div
                                            class="flex item-center justify-center"
                                        >
                                            <div
                                                @click="showRigthSlid(user)"
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                            >
                                                <i class="far fa-eye"></i>
                                            </div>
                                            <div
                                                @click="showRigthSlid(user)"
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                            >
                                                <i
                                                    class="far fa-pencil-alt"
                                                ></i>
                                            </div>
                                            <div
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                            >
                                                <i class="far fa-trash"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    v-if="teamMembers.length == 0"
                                    class="border-b text-lg border-gray-200"
                                >
                                    <td
                                        class="py-3 px-6 text-center capitalize"
                                        colspan="9"
                                    >
                                        aucune membre
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <right-slide
                        :visible="leftside"
                        :user="selectedmember"
                        @hide="hideRigthSlid"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import TeamSettings from "./Settings";
import TeamSort from "./Sort";
import DownloadTeamList from "./DownloadTeamList";
import RightSlide from "./RightSlide";
export default {
    components: {
        JetDropdown,
        TeamSettings,
        TeamSort,
        DownloadTeamList,
        RightSlide,
        JetDropdownLink,
    },
    props: ["team", "availableRoles", "userPermissions"],
    data() {
        return {
            leftside: false,
            selectedmember: {},
            sorting: "asc",
            sortBy: "id",
            searchvalue: "",
        };
    },
    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                route("current-team.update"),
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                }
            );
        },
        showRigthSlid(user) {
            (this.leftside = true), (this.selectedmember = user);
        },
        hideRigthSlid() {
            (this.leftside = false), (this.selectedmember = {});
        },
        change() {
            this.sorting = this.sorting === "asc" ? "desc" : "asc";
        },
    },
    watch: {
        sorting() {
            this.members = _.orderBy(this.members, this.sortBy, this.sorting);
        },
    },

    computed: {
        teamMembers() {
            return this.team.users.filter((user) => {
                return (
                    user.fname
                        .toLowerCase()
                        .match(this.searchvalue.toLowerCase()) ||
                    user.lname
                        .toLowerCase()
                        .match(this.searchvalue.toLowerCase()) ||
                    user.cin
                        .toLowerCase()
                        .match(this.searchvalue.toLowerCase()) ||
                    user.email
                        .toLowerCase()
                        .match(this.searchvalue.toLowerCase()) ||
                    user.tele
                        .toLowerCase()
                        .match(this.searchvalue.toLowerCase()) ||
                    user.membership.role
                        .toLowerCase()
                        .match(this.searchvalue.toLowerCase())
                );
            });
        },
    },
};
</script>
