<template>
    <left-layout>
        <div class="p-12 w-full">
            <div class=" p-5 bg-white w-full  rounded shadow ">
                <div class="flex mr-auto w-full">
                    <!--<p class="my-auto capitalize font-semibold text-gray-600 mr-3"> current Team </p>
                    -->
                    <div class=" my-auto ">   
                        <!-- Teams Dropdown -->
                        <jet-dropdown align="left" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ $page.props.user.current_team.name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <template v-if="$page.props.jetstream.hasTeamFeatures">
                                      
                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Switch Teams
                                        </div>

                                        <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                            <form @submit.prevent="switchToTeam(team)">
                                                <jet-dropdown-link as="button">
                                                    <div class="flex items-center">
                                                        <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <div>{{ team.name }}</div>
                                                    </div>
                                                </jet-dropdown-link>
                                            </form>
                                        </template>
                                    </template>
                                </div>
                            </template>
                        </jet-dropdown>

                    </div>

                    <div class="flex relative ml-9 my-auto">
                        <input type="text" class=" focus:border-pink-500 focus:ring-0 pr-8 placeholder-gray-400 p-1 rounded  " placeholder="Search" />
                        <i class="fal fa-search text-pink-500 my-auto -ml-6"></i>
                    </div>

                    <div class="flex ml-auto my-auto">
                        
                        <download-team-list />
                        
                    </div>

                    <team-settings />
                </div>

            </div>

            <div class=" mt-2  bg-current w-full rounded shadow overflow-x-auto w-full">
                <div class=" w-full bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-x-auto">
                    <div class="w-full">
                        <div class="bg-white shadow-md rounded ">
                            <table class="min-w-max w-full table-auto ">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm py-6 leading-normal">
                                        <th @click="sortBy ='id'" class="py-3 cursor-pointer select-none px-6 text-left">#
                                            <i v-if="sortBy =='id'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th @click="sortBy ='nom'" class="py-3 px-6  cursor-pointer select-none text-left">nom
                                            <i v-if="sortBy =='nom'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th @click="sortBy ='prenom'" class="py-3 px-6  cursor-pointer select-none text-left">prenom
                                            <i v-if="sortBy =='prenom'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th @click="sortBy ='cin'" class="py-3 px-6  cursor-pointer select-none text-left">cin
                                            <i v-if="sortBy =='cin'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th  @click="sortBy ='email'" class="py-3 px-6  cursor-pointer select-none text-left">email
                                            <i v-if="sortBy =='email'" @click="change " class="fa text-xs text-gray-400 pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th @click="sortBy ='tele'" class="py-3 px-6  cursor-pointer select-none text-left">tele
                                            <i v-if="sortBy =='tele'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th @click="sortBy ='role'" class="py-3 px-6  cursor-pointer select-none text-left">role
                                            <i v-if="sortBy =='role'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                        <th @click="sortBy ='anquites'" class="py-3 px-6  cursor-pointer select-none text-left">total d'anquite
                                            <i v-if="sortBy =='anquites'" @click="change " class="fa text-xs text-gray-400  pl-1 fa-arrow-up transition-transform duration-500 transform  "
                                                :class="{' rotate-180 ' :(sorting === 'desc'), ' rotate-0 ':(sorting ==='asc')  }"
                                             aria-hidden="true"></i>

                                        </th>
                                       
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    <tr v-for="(member, index) in members" :key="index" class="border-b border-gray-200 hover:bg-gray-100"
                                    :class=" {'bg-gray-50':(index % 2 === 0)} ">
                                        <td class="py-3 px-6 text-left">
                                            <span class="font-medium">{{ member.id }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span class="">{{member.nom}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{member.prenom}}</span>
                                        </td>
                                        <td class="py-3 uppercase px-6 text-center">
                                            <span> {{member.cin}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span >{{member.email}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span >{{member.tele}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class=" py-1 px-3 rounded-full text-xs"
                                            :class="{'bg-blue-200 text-blue-600':(member.role === 'Editor'),'bg-green-200 text-green-600':(member.role === 'Admin')}">
                                            {{member.role}}
                                            </span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span> {{member.anquites}}</span>                                        
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <div @click="showRigthSlid(member)" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class="far fa-eye"></i>
                                                </div>
                                                <div @click="showRigthSlid(member)" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class="far fa-pencil-alt"></i>
                                                </div>
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class="far fa-trash"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            
            <right-slide :visible='leftside' :member='selectedmember' @hide="hideRigthSlid"  />


        </div>
    </left-layout>
</template>

<script>
    import LeftLayout from '@/Layouts/LeftLayout'
    import Welcome from '@/Jetstream/Welcome'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetDropdown from '@/Jetstream/Dropdown'

    import TeamSettings from '@/Pages/Teams/Settings'
    import TeamSort from '@/Pages/Teams/Sort'
    import DownloadTeamList from '@/Pages/Teams/DownloadTeamList'
    import RightSlide from '@/Pages/Teams/RightSlide'


    import TeamInvitations from '@/Pages/Teams/TeamInvitations'


    import JetDangerButton from '@/Jetstream/DangerButton'

    export default {
        components: {
            LeftLayout,
            Welcome,
            JetDropdown,
            JetDropdownLink,
            TeamSettings,
            TeamSort,
            DownloadTeamList,
            RightSlide,
            TeamInvitations,
            JetDangerButton
        },
        props: ['team'],

        data() {
            return {
                leftside:false,
                selectedmember:{},
                sorting:'asc', 
                sortBy:'id',   
                members:[
                    {
                        id:'233',
                        nom:'Anita',
                        prenom:'Rodriquez',
                        cin:'FH110',
                        email:'Editor@hcp.com',
                        tele:'0654535678',
                        role:'Admin',
                        anquites:'210'
                    },
                    {
                        id:'344',
                        nom:'echlah',
                        prenom:'adil',
                        cin:'jh45059',
                        email:'Editor@hcp.com',
                        tele:'0654535678',
                        role:'Editor',
                        anquites:'10'

                    }
                ],
            }
        },
        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },
            showRigthSlid(member){
                this.leftside = true,
                this.selectedmember = member
            },
            hideRigthSlid(){
                this.leftside = false,
                this.selectedmember = {}
            },
            change(){
                 this.sorting  = (this.sorting === "asc") ? "desc" : "asc";
            }
            
        },
        watch: {
            sorting(){
                this.members = _.orderBy(this.members,this.sortBy,this.sorting);
            },

        },
    }
</script>
