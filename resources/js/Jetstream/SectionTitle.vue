<template>
    <div class="md:col-span-1 dark:bg-gray-400 flex justify-between">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">
                <slot name="title"></slot>
            </h3>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                <slot name="description"></slot>
            </p>
        </div>

        <div class="px-4 sm:px-0">
            <slot name="aside"></slot>
        </div>
    </div>
</template>
