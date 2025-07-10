<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import Depositar from '@/components/Depositar.vue';
import Transferir from '@/components/Transferir.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const getValorEmConta = () => {
    let valor = 0;

    return valor.toLocaleString('pt-br', {minimumFractionDigits: 2});
}

const valorEmConta = getValorEmConta();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div 
                    class="flex items-center justify-center relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <Depositar></Depositar>
                </div>
                <div class="flex items-center justify-center relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <Transferir></Transferir>
                </div>
                <div class="flex items-center justify-center relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <p class="text-[30px]">
                        R$ {{ valorEmConta }}
                    </p>
                </div>
            </div>
            <div class="flex justify-between p-2 relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <div class="w-full">
                    <h3 class="w-full text-center">
                        Lista de Contatos
                    </h3>
                </div>

                <div class="w-full">
                    <h3 class="w-full text-center">
                        Historico
                    </h3>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
