<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// Components
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

// const passwordInput = ref<HTMLInputElement | null>(null);

const form = useForm({
    password: '',
});

const deleteUser = (e: Event) => {
    e.preventDefault();
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value?.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    form.clearErrors();
    form.reset();
};
</script>

<template>
    <Dialog>
        <DialogTrigger as-child>
            <Button>
                Depositar
            </Button>
        </DialogTrigger>
        <DialogContent>
            <form>
                <DialogHeader>
                    <DialogTitle>Depositar</DialogTitle>
                    <DialogDescription>
                        Bem vindo a area de deposito, aqui você pode depositar dinheiro para sua conta.
                    </DialogDescription>
                </DialogHeader>

                <div class="col-span-2 sm:col-span-1 mt-6 mb-6">
                    <label 
                        for="price" 
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Valor
                    </label>
                    <input 
                        id="valor"
                        type="number" 
                        name="price" 
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="R$10"
                        min="0"
                        oninput="this.value = Math.abs(this.value)"
                        required=""
                    >
                </div>

                <DialogFooter class="gap-2">
                    <DialogClose as-child>
                        <Button 
                            variant="secondary" 
                            @click="closeModal"
                        > 
                            Cancelar
                        </Button>
                    </DialogClose>
                    <Button 
                        type="submit"
                        class="bg-green-500"
                    > 
                        Depositar 
                    </Button>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>
</template>
