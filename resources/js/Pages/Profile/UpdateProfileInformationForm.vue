<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title> Informations sur le profil </template>

        <template #description>
            Mettez à jour les informations de profil et l'adresse e-mail de
            votre compte.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div
                class="col-span-6 sm:col-span-4"
                v-if="$page.props.jetstream.managesProfilePhotos"
            >
                <!-- Profile Photo File Input -->
                <input
                    type="file"
                    class="hidden"
                    ref="photo"
                    @change="updatePhotoPreview"
                />

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="!photoPreview">
                    <img
                        :src="user.profile_photo_url"
                        :alt="user.name"
                        class="rounded-full h-20 w-20 object-cover"
                    />
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span
                        class="block rounded-full w-20 h-20"
                        :style="
                            'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                            photoPreview +
                            '\');'
                        "
                    >
                    </span>
                </div>

                <jet-secondary-button
                    class="mt-2 mr-2"
                    type="button"
                    @click.prevent="selectNewPhoto"
                >
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                    v-if="user.profile_photo_path"
                >
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Nom -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="nom" value="Nom" />
                <jet-input
                    id="nom"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.fname"
                    autocomplete="name"
                />
                <jet-input-error :message="form.errors.fname" class="mt-2" />
            </div>

            <!-- Prenom -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="prenom" value="Prenom" />
                <jet-input
                    id="prenom"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.lname"
                    autocomplete="name"
                />
                <jet-input-error :message="form.errors.lname" class="mt-2" />
            </div>

            <!-- CIN -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="cin" value="CIN" />
                <jet-input
                    id="cin"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.cin"
                    autocomplete="name"
                />
                <jet-input-error :message="form.errors.cin" class="mt-2" />
            </div>

            <!-- TELE -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="tele" value="Tele" />
                <jet-input
                    id="tele"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.tele"
                    autocomplete="name"
                />
                <jet-input-error :message="form.errors.tele" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Enregistré. 
            </jet-action-message>

            <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Sauvegarder
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
    },

    props: ["user"],

    data() {
        return {
            form: this.$inertia.form({
                _method: "PUT",
                fname: this.user.fname,
                lname: this.user.lname,
                cin: this.user.cin,
                tele: this.user.tele,
                email: this.user.email,
                photo: null,
            }),

            photoPreview: null,
        };
    },

    methods: {
        updateProfileInformation() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0];
            }

            this.form.post(route("user-profile-information.update"), {
                errorBag: "updateProfileInformation",
                preserveScroll: true,
            });
        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(this.$refs.photo.files[0]);
        },

        deletePhoto() {
            this.$inertia.delete(route("current-user-photo.destroy"), {
                preserveScroll: true,
                onSuccess: () => (this.photoPreview = null),
            });
        },
    },
};
</script>
