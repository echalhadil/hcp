<template>
    <div
        class="mt-16 ml-auto w-full md:w-1/3 fixed top-0 right-0 h-full bg-gray-100 shadow-lg"
        :class="{ hidden: !visible }"
        v-if="visible"
    >
        <div class="w-full p-2">
            <i
                class="fal fa-times cursor-pointer px-2 py-1 hover:bg-gray-50 hover:text-gray-500 shadow rounded-full bg-white"
                @click="$emit('hide')"
            ></i>
        </div>
        <div class="w-full p-2">
            <div class="flex">
                <div class="w-1/2 pr-1">
                    <jet-label for="name" value="Nom" />
                    <jet-input
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="name"
                        v-model="user.fname"
                    />
                </div>
                <div class="w-1/2 pl-1">
                    <jet-label for="prenom" value="Prenom" />
                    <jet-input
                        id="prenom"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="name"
                        v-model="user.lname"
                    />
                </div>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="CIN" />
                <jet-input
                    id="cin"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    v-model="user.cin"
                />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    v-model="user.email"
                    disabled="true"
                />
            </div>

            <div class="mt-4">
                <jet-label for="tele" value="Téléphone" />
                <jet-input
                    id="cin"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    v-model="user.tele"
                />
            </div>

            <member-role
                :user="user"
                :role="role"
                :availableRoles="availableRoles"
                :team="team"
                :usercanEdit="usercanEdit"
            />
        </div>
    </div>
</template>

<script>
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";

import MemberRole from "./MemberRole";
export default {
    components: {
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        MemberRole,
    },
    props: ["visible", "user", "availableRoles", "role", "team","usercanEdit"],
    data() {},
    methods: {
        // changeRole(r) {
        //     $emit("changeRole", r);
        //     // this.user.role = r;
        // },
        displayableRole(role) {
            return this.availableRoles.find((r) => r.key === role).name;
        },
    },
    computed: {},
};
</script>
