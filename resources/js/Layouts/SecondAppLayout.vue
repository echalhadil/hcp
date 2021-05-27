<template>
    <div class="bg-gray-100  -mb-3">
        <nav
            class="bg-white  w-full border-b border-gray-100 dark:bg-gray-400 dark:border-gray-400"
        >
            <div
                class="flex justify-end z-50 fixed right-0 items-center pb-7 bg-gray-100 sm:hidden"
            >
                <button
                    @click="
                        showingNavigationDropdown = !showingNavigationDropdown
                    "
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{'hidden': showingNavigationDropdown,'inline-flex': !showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{
                                'hidden': !showingNavigationDropdown,
                                'inline-flex': showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{
                    'block': showingNavigationDropdown,
                    'hidden': !showingNavigationDropdown,
                }"
                class="fixed w-full shadow bg-gray-100  sm:hidden"
            >
                <div class="pt-2 pb-3 space-y-1"></div>

                 <div class=" grid my-12 px-6 text-center ">
            <inertia-link
                :href="route('login')"
                class="text-sm capitalize m-2 border-pink-700 border font-semibold py-2 px-3 rounded text-pink-700 dark:text-gray-400 dark:border-gray-300"
            >
                connexion
            </inertia-link>

            <inertia-link
                :href="route('register')"
                class="text-sm m-2 border-pink-700 text-gray-100 border font-semibold py-2 px-3 rounded bg-pink-700 dark:border-gray-200 dark:bg-gray-200 dark:text-gray-700"
            >
                S'inscrire
            </inertia-link>
        </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showingNavigationDropdown: false,
        };
    },
};
</script>
