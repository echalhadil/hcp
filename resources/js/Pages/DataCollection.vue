<template>
    <left-layout>
        <div class="p-12 w-full">


             <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4">
                <div class="p-3  bg-white rounded shadow ">
                    <chart  id="fd" type="doughnut" title="le chomage" />                
                </div>
                <div class="p-3 bg-white rounded shadow">     
                    <chart  id="chomage" type="pie" title="le chomage" />
                </div>

                <div class="p-3 bg-white rounded shadow">
                    <chart id="genre" type="line" title="le genre" />
                </div>
    
            </div>


           
            <div class=" p-5 bg-white w-full my-12 rounded shadow ">
                <div class="flex mr-auto w-full">
                    <!--<p class="my-auto capitalize font-semibold text-gray-600 mr-3"> current Team </p>
                    -->
                    

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
        </div>
    </left-layout>
</template>

<script>
    import LeftLayout from '@/Layouts/LeftLayout'
    import Welcome from '@/Jetstream/Welcome'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetDropdown from '@/Jetstream/Dropdown'

    import TeamSettings from '@/Pages/Teams/Settings'
    import DownloadTeamList from '@/Pages/Teams/DownloadTeamList'
    import RightSlide from '@/Pages/Teams/RightSlide'

    import StatisticsCardPie from '@/StatisticsCards/StatisticsCardPie'
    import GenrePie from '@/StatisticsCards/GenrePie'
    import ChomageCard from '@/StatisticsCards/ChomageCard'
    import Chart from '@/StatisticsCards/Chart'



    export default {
        components: {
            LeftLayout,
            Welcome,
            JetDropdown,
            JetDropdownLink,
            TeamSettings,
            
            DownloadTeamList,
            RightSlide,
            StatisticsCardPie,
            GenrePie,
            ChomageCard,
            Chart
        },
        data() {
            return {
                leftside:false,
                selectedmember:{},
                sorting:'asc',            }
        },
       
    }
</script>
