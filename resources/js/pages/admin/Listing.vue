<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { listing } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Listing',
                href: listing(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Listing" />


</template>
