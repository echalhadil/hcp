<!-- Add Team Member -->




<template>
    <div>
        <div  class="mt-10 mb-4 bg-white text-gray-500 dark:bg-gray-400 dark:text-gray-200 p-6 flex rounded-md shadow sm:mt-0">
            <div class="  my-auto ">Create a new team to collaborate with others on projects.</div>
            
            <div class="text-sm w-28 ml-auto my-auto ">
                <button @click="show = true" class=" flex w-full focus:ring  p-1  py-2 border font-semibold rounded border-green-700  dark:border-gray-700  focus:ring-green-600 dark:focus:ring-gray-600 bg-green-600 dark:bg-gray-600 text-white ">
                    <i class="fal m-auto fa-plus mr-1"></i>
                    <p class="mr-auto">New Team</p> 
                </button>
            </div>
        </div>

        <jet-dialog-modal class=" dark:bg-gray-400 " :show="show" @close="show = false">
            <template #title>
              
            </template>

           
                        
            <template #content>
                 
                <div>
                    <jet-form-section @submitted="createTeam">
                        <template #title>
                            Team Details
                        </template>

                        <template #description>
                            Create a new team to collaborate with others on projects.
                        </template>

                        <template #form>
                            <div class="col-span-6">
                                <jet-label value="Team Owner" />

                                <div class="flex items-center mt-2">
                                    
                                    <div class="ml-4 leading-tight">
                                        <div>{{ $page.props.user.fname }} {{ $page.props.user.lname }}</div>
                                        <div class="text-gray-700 dark:text-gray-200 text-sm">{{ $page.props.user.email }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="name" value="Team Name" />
                                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                                <jet-input-error :message="form.errors.name" class="mt-2" />
                            </div>
                        </template>

                        <template #actions>
                            <jet-secondary-button
                                class="cursor-pointer mr-2"
                                @click="show = false" 
                                >
                                annuler
                            </jet-secondary-button>
                            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Create
                            </jet-button>
                        </template>
                    </jet-form-section>
                </div>
            </template>

            
        </jet-dialog-modal>
    </div>
</template>
<script>
import JetDialogModal from "@/Jetstream/DialogModal";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetFormSection from "@/Jetstream/FormSection";
import JetActionMessage from "@/Jetstream/ActionMessage";
import CreateTeamForm from "./CreateTeamForm";

export default {
    components: {
        JetDialogModal,
        JetLabel,
        JetInput,
        JetInputError,
        JetButton,
        JetDangerButton,
        JetSecondaryButton,
        JetFormSection,
        JetActionMessage,
        CreateTeamForm
    },

        data() {
            return {
                show: false,
                form: this.$inertia.form({
                    name: '',
                })
            }
        },

        methods: {
            createTeam() {
                this.form.post(route('teams.store'), {
                    errorBag: 'createTeam',
                    preserveScroll: true
                });
            },
        },
    }
</script>
