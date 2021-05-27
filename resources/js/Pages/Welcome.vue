<template>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <div
            v-if="canLogin"
            class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
        >
            <inertia-link
                v-if="$page.props.user"
                href="/dashboard"
                class="text-sm text-gray-700 underline"
            >
                Dashboard
            </inertia-link>

            <template v-else>
                <inertia-link
                    :href="route('login')"
                    class="text-sm capitalize m-1 border-pink-700 border font-semibold py-2 px-3 rounded text-pink-700 dark:text-gray-400 dark:border-gray-300"
                >
                    connexion
                </inertia-link>

                <inertia-link
                    v-if="canRegister"
                    :href="route('register')"
                    class="text-sm m-1 border-pink-700 text-gray-100 border font-semibold py-2 px-3 rounded bg-pink-700 dark:border-gray-200 dark:bg-gray-200 dark:text-gray-700"
                >
                    S'inscrire
                </inertia-link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <div class="w-1/3">
                    <img src="/img/logo.png" />
                </div>
            </div>

            <div
                class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
            >
                <div class="grid grid-cols-2 md:grid-cols-2">
                    <div
                        class="p-6 border-t border-gray-200 dark:border-gray-700"
                    >
                        <div class="flex items-center">
                            <img
                                class="h-8 filter grayscale opacity-60 object-cover"
                                src="https://www.logopik.com/wp-content/uploads/edd/2018/09/Royaume-du-maroc-Kingdom-of-morocco-Vector-Logo.png"
                            />
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <p class="text-gray-900 dark:text-white">
                                    Royaume du Maroc
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l"
                    >
                        <div
                            class="flex flex-row-reverse text-right items-center"
                        >
                            <img
                                class="h-8 filter grayscale opacity-60 object-cover"
                                src="https://www.logopik.com/wp-content/uploads/edd/2018/09/Royaume-du-maroc-Kingdom-of-morocco-Vector-Logo.png"
                            />
                            <div
                                class="ml-4  leading-7 font-semibold text-gray-900 dark:text-white"
                            >
                                الــمــمـلــكــة الــمــغــربــيـة
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="ml-12"></div>
                        <div
                            class="mt-2 text-gray-600 dark:text-gray-400 text-lg md:text-2xl "
                        >
                            Recensement Général de la Population et de l'Habitat
                        </div>
                    </div>

                    <div
                        class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l"
                    >
                        <div class="ml-12">
                            <div
                                class="mt-2 text-lg md:text-2xl text-gray-600 dark:text-gray-400  text-right"
                            >
                                الإحــــصــــاء الــــعــــام
                                لـلـــــســـــكــــان والـــــســــكـــــنــــى
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="flex justify-center mt-4 sm:items-center sm:justify-between"
            >
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center"></div>
                </div>

                <div
                    class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"
                >

                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>

<script>
export default {
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>
