<template>
    <div class="my-auto mr-6 cursor-pointer" @click="$emit('change')">
        <i 
        class="fal"
        :class=" { 'fa-sort-size-down' : (sorting === 'desc'), 'fa-sort-size-down-alt' : (sorting === 'asc') } "
         aria-hidden="true"></i>
       
    </div>
</template>

<script>
export default {
    props:{
        sorting:{
            type:String,
            required:true,
            default:'asc',
        }
    },
    
    methods: {
       
    },
}
</script>