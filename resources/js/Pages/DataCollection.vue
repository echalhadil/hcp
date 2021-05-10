<template>
    <left-layout>
        <div class="p-12 w-full">


             <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4">
                <div class="p-3  bg-white rounded shadow ">
                    <chart  id="resident" type="doughnut" title="sitiation de resident" />                
                </div>
                <div class="p-3 bg-white rounded shadow">     
                    <chart  id="nationalite" type="pie" title="pays de nationalite" />
                </div>

                <div class="p-3 bg-white rounded shadow">
                    <chart id="sexe" type="line" title="sexe" />
                </div>
    
            </div>


             <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4 mt-12">
                <div class="p-3  bg-white rounded shadow ">
                    <chart  id="matrimonial" type="doughnut" title="Etat matrimonial" />                
                </div>
                <div class="p-3 bg-white rounded shadow">     
                    <chart  id="etablisement" type="pie" title="etablisement" />
                </div>

                <div class="p-3 bg-white rounded shadow">
                    <chart id="fonctionnel" type="line" title="etat fonctionnel" />
                </div>
    
            </div>



             <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4 mt-12">
                <div class="p-3  bg-white rounded shadow ">
                    <chart  id="assurance" type="doughnut" title="assurance medical" />                
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
