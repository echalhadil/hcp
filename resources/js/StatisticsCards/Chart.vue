<template>
    <div>
        <div class="flex">
            
            <jet-dropdown
                align="left"
                width="60"
                
            >
                <template #trigger>
                    <div @click="open = !open">
                        <i
                            :class="{
                                'fal fa-cog p-2 cursor-pointer text-gray-400 text-sm float-right transition-transform duration-500 transform ': true,
                                'rotate-180': open,
                                'rotate-0': !open,
                            }"
                        ></i>
                    </div>
                </template>

                <template #content>
                    <div class="w-32">
                        <!-- Team Management -->
                        <template v-if="true">
                            <div class="block px-4 py-2 text-xs  text-gray-400">
                                    Chart Type
                            </div>
                            
                               <button
                                  class=" py-2 px-3 text-xs capitalize hover:bg-gray-50 w-full"
                                  v-for="(type, index) in avalibleTypes"
                                  :key="index"
                                  :class="{
                                    ' text-pink-600 bg-gray-50 ':(type === chartType )
                                  }"
                                  @click="changeChart(type)"
                              >
                                  {{ type }}
                              </button>
                            
                        </template>
                    </div>
                </template>
            </jet-dropdown>
        </div>
        <div
            class="text-center py-2 capitalize font-light text-sm text-gray-500"
        >
            {{title}}
        </div>
        <canvas :id="id" class="w-full"></canvas>
    </div>
</template>
<script>
import ChomageData from "./chomage-data.js";
import JetDropdown from "@/Jetstream/Dropdown";
import Chart from 'chart.js/auto';
export default {
    props:{
        id:{},
        chartdata:{},
        title:{
            type:String,
            required:true,
        },
        type:{
            type:String,
            required:false,
            default:''
        },
    },
    components: {
        JetDropdown,
    },
    data() {
        return {
            ChomageData: ChomageData,
            chartType: "pie",
            avalibleTypes: ["line", "pie", "doughnut"],
            open: false,
        };
    },
    methods: {
        changeChart(type) {
            const ctx = document.getElementById(this.id);
            this.chartType = type;
            new Chart(ctx, 
            {
                type: type,
                data: this.ChomageData.data,
            }
            );
        }

    },
    mounted() {
        this.chartType  = (this.type!="" )? this.type : this.chartType
        this.changeChart(this.chartType);
    },
};
</script>
