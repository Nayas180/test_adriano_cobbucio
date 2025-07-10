<script setup lang="ts">
import { Method } from '@inertiajs/core';
import { Link } from '@inertiajs/vue3';

interface Props {
    method?: Method;
}

defineProps<Props>();
</script>

<template>
    <p
        :method="method"
        class="text-foreground cursor-pointer decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:decoration-current! dark:decoration-neutral-500"
    >
        <slot />
    </p>
</template>
