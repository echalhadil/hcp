<template>
    <div>
        <div class="mt-4 select-none">
            <jet-label for="role" value="Role" />
            <div class="flex mt-1 text-center justify-around capitalize">
                <div
                    v-for="(availiblerole, index) in availableRoles"
                    :key="index"
                    @click="(role=='admin')? updateRoleForm.role = availiblerole.key:''"
                    class="cursor-pointer border p-3 text-gray-500 border-gray-500 rounded"
                    :class="{
                        'text-green-500 border-green-500':
                            availiblerole.key == updateRoleForm.role,
                    }"
                >
                    <p>
                        {{ availiblerole.name }}

                        <i
                            class="far fa-check-circle ml-1 text-gray-100"
                            :class="{
                                'text-green-500':
                                    availiblerole.key == updateRoleForm.role,
                            }"
                        ></i>
                    </p>
                </div>
            </div>
        </div>
        <div v-if="usercanEdit" class="mt-4 flex">
            <jet-button
                class=""
                @click="updateRole()"
                :class="{ 'opacity-25': updateRoleForm.processing }"
                :disabled="
                    updateRoleForm.processing || updateRoleForm.role == role
                "
            >
                sauvgarder
            </jet-button>
            <jet-action-message
                :on="updateRoleForm.recentlySuccessful"
                class="my-auto ml-3"
            >
                Enregistré.
            </jet-action-message>
        </div>
    </div>
</template>

<script>
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
    components: {
        JetButton,
        JetLabel,
        JetActionMessage,
    },
    props: ["role", "availableRoles", "team", "user","usercanEdit"],
    data() {
        return {
            updateRoleForm: this.$inertia.form({
                role: null,
            }),
        };
    },
    methods: {
        updateRole() {
            let t = this.team;

            this.updateRoleForm.put(
                route("team-members.update", [t, this.user]),
                {
                    preserveScroll: true,
                    onSuccess: () => (
                        (this.role = this.updateRoleForm.role)
                    ),
                }
            );
        },
    },
    computed: {
        canSubmit() {
            return this.updateRoleForm.role == this.role ? false : true;
        },
    },
    mounted() {
        let r = this.role;
        this.updateRoleForm.role = r;
    },
};
</script>
