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
import axios from "axios";

const hiddenError = ref(true);
const errorMensage = ref("");
const form = useForm({
    id_user_to: 0,
    value: 0
});

const transferir = async (e: Event) => {
    e.preventDefault();
    let valorTotalConta = 0;

    await axios.get(route("user.accountAmount")).then(response => {
        valorTotalConta = response.data;
    });

    if (form.value > valorTotalConta) {
        hiddenError.value = false;
        errorMensage.value = "O valor da transferencia não pode ser maior que o em conta.";
        return false;
    }

    if (form.id_user_to <= 0) {
        hiddenError.value = false;
        errorMensage.value = "A chave não pode ser valor zerado.";
        return false;
    }

    if (form.value <= 0) {
        hiddenError.value = false;
        errorMensage.value = "Não é possivel transferir valor zerado.";
        return false;
    }

    form.post(route('transferir'), {
        preserveScroll: true,
        onSuccess: (response) => closeModal(),
        onFinish: (response) => {
            console.log(response)
            closeModal();
            alert("Transferencia efetuado com sucesso"); 
        }
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
                Transferir
            </Button>
        </DialogTrigger>
        <DialogContent>
            <form @submit="transferir">
                <DialogHeader>
                    <DialogTitle>Transferir</DialogTitle>
                    <DialogDescription>
                        Bem vindo a area de transferencia, aqui você pode transferir dinheiro para outras pessoas.
                    </DialogDescription>
                </DialogHeader>

                <div class="mt-6 mb-6">    
                    <p
                        :class="{ 'hidden' : hiddenError }"
                        class="text-red-600 mb-6"
                    >  
                        {{ errorMensage }}
                    </p>
                    <div class="col-span-2 mb-3">
                        <label 
                            for="chave" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Chave de transferencia (ID do usuario)
                        </label>
                        <input 
                            id="chave_transferencia"
                            v-model="form.id_user_to"
                            type="number"
                            name="name"
                            class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  
                            required=""
                        >
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label 
                            for="price" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Valor
                        </label>
                        <input 
                            id="valor"
                            type="number"
                            v-model="form.value"
                            name="price" 
                            class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            placeholder="R$10"
                            min="0"
                            oninput="this.value = Math.abs(this.value)"
                            required=""
                        >
                    </div>
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
                        Transferir 
                    </Button>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>
</template>
