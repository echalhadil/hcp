<template>
    <app-layout>
        <div class="flex w-full pt-16">
            <div
                class="text-lg w-1/6 min-h-screen fixed  bg-white  text-gray-700 dark:bg-gray-400  dark:text-gray-300 shadow"
            >
               

                <inertia-link
                    :href="route('dashboard')"
                    class="flex hover:scale-105 transform duration-200 mx-6 my-3"
                    :class="{
                        ' text-pink-700 dark:text-gray-50': route().current('dashboard'),
                    }"
                >
                    <i class="fal fa-home mx-auto md:m-0 w-10 p-3"></i>
                    <p class="w-0 md:w-auto invisible md:my-auto md:visible">
                       <!-- Dashboard -->
                       Tableau de bord
                    </p>
                </inertia-link>

                <inertia-link
                    :href="route('teams.show', $page.props.user.current_team)"
                    class="flex hover:scale-105 transform duration-200 mx-6 my-3"
                    :class="{
                        'text-pink-700 dark:text-gray-50': route().current('teams.show'),
                    }"
                >
                    <i class="fal fa-users mx-auto md:m-0 w-10 p-3"></i>

                    <p class="w-0 md:w-auto invisible md:my-auto md:visible">
                        <!--Team-->
                        Équipe
                    </p>
                </inertia-link>

                <inertia-link
                    :href="route('data')"
                    class="flex hover:scale-105 transform duration-200 mx-6 my-3 rounded-md"
                    :class="{
                        'text-pink-700 dark:text-gray-50': route().current('data'),
                    }"
                >
                    <i class="fal fa-database mx-auto md:m-0 w-10 p-3"></i>

                    <p class="w-0 md:w-auto invisible md:my-auto md:visible">
                       <!-- Data-->
                       Les données
                    </p>
                </inertia-link>
            </div>

            <div class="w-5/6 ml-auto dark:bg-gray-700 ">
                <slot></slot>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./AppLayout";
export default {
    components: {
        AppLayout,
    },
};
</script>
