<template>
    <div class="flex mt-1 text-center justify-center capitalize">
        <div
            v-for="(role, index) in availibleRoles"
            @click="$emit('changeRole', r)"
            :key="index"
            class="cursor-pointer mr-2 border p-3 border-gray-300 rounded"
            :class="{ 'text-green-500 border-green-500':(user.membership.membership.role === role) }"
        >
            <p>
                {{ role }}
                <i
                    class="far fa-check-circle ml-1 text-gray-100"
                    :class="{ 'text-green-500': (user.membership.membership.role === role) }"
                ></i>
            </p>
        </div>

        {{}}
    </div>
</template>

<script>
export default {
    props:{
        user:{
            type:Object,
            required:false,
        }
    },
    data() {
        return {
            availibleRoles: ["editor", "admin"],
        };
    },
};
</script>
