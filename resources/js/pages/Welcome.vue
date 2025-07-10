<script setup lang="ts">
import { ref } from 'vue';
import { Link, Head, useForm } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import TextButton from '@/components/TextButton.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { LoaderCircle } from 'lucide-vue-next';

const activeLogin = ref(false);
const activeRegister = ref(true);

const form_login = useForm({
    email: '',
    password: '',
    remember: false,
});

const form_register = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submitLogin = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const submitRegister = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const handlePages = (template) => {
    activeLogin.value = !activeLogin.value;
    activeRegister.value = !activeRegister.value;
};
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex w-full min-h-screen items-center bg-[#FDFDFC] text-[#1b1b18]">
        <div class="w-full h-full">
            <AuthBase 
                :class="{ 'hidden': activeLogin }"
                title="Log-in em sua conta bancaria" 
                description="Entre com seu email e senha abaixo"
            >
                <Head title="Log in"/>

                <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submitLogin" class="flex flex-col gap-6">
                    <div class="grid gap-6">
                        <div class="grid gap-2">
                            <Label for="email">Email</Label>
                            <Input
                                id="email"
                                type="email"
                                required
                                autofocus
                                :tabindex="1"
                                autocomplete="email"
                                v-model="form_login.email"
                                placeholder="email@example.com"
                            />
                            <InputError :message="form_login.errors.email" />
                        </div>

                        <div class="grid gap-2">
                            <div class="flex items-center justify-between">
                                <Label for="password">Senha</Label>
                                <TextLink v-if="canResetPassword" :href="route('password.request')" class="text-sm" :tabindex="5">
                                    Esqueceu sua Senha?
                                </TextLink>
                            </div>
                            <Input
                                id="password"
                                type="password"
                                required
                                :tabindex="2"
                                autocomplete="current-password"
                                v-model="form_login.password"
                                placeholder="Password"
                            />
                            <InputError :message="form_login.errors.password" />
                        </div>

                        <div class="flex items-center justify-between">
                            <Label for="remember" class="flex items-center space-x-3">
                                <Checkbox id="remember" v-model="form_login.remember" :tabindex="3" />
                                <span>Lembre-me</span>
                            </Label>
                        </div>

                        <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form_login.processing">
                            <LoaderCircle v-if="form_login.processing" class="h-4 w-4 animate-spin" />
                            Log in
                        </Button>
                    </div>

                    <div class="text-center text-sm text-muted-foreground">
                        Não tem conta?
                        <TextButton
                            @click.native="handlePages(2)"
                        >
                            Registrar
                        </TextButton>
                    </div>
                </form>
            </AuthBase>

            <AuthBase 
                :class="{ 'hidden': activeRegister }"
                title="Crie sua conta" 
                description="Coloque suas informações e crie sua conta"
            >
                <Head title="Register"/>

                <form @submit.prevent="submitRegister" class="flex flex-col gap-6">
                    <div class="grid gap-6">
                        <div class="grid gap-2">
                            <Label for="name">Nome</Label>
                            <Input id="name" type="text" required autofocus :tabindex="1" autocomplete="name" v-model="form_register.name" placeholder="Nome Completo" />
                            <InputError :message="form_register.errors.name" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="email">Email</Label>
                            <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form_register.email" placeholder="email@example.com" />
                            <InputError :message="form_register.errors.email" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="password">Senha</Label>
                            <Input
                                id="password"
                                type="password"
                                required
                                :tabindex="3"
                                autocomplete="sua-senha"
                                v-model="form_register.password"
                                placeholder="Password"
                            />
                            <InputError :message="form_register.errors.password" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="password_confirmation">Confirme Senha</Label>
                            <Input
                                id="password_confirmation"
                                type="password"
                                required
                                :tabindex="4"
                                autocomplete="new-password"
                                v-model="form_register.password_confirmation"
                                placeholder="Confirm password"
                            />
                            <InputError :message="form_register.errors.password_confirmation" />
                        </div>

                        <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form_register.processing">
                            <LoaderCircle v-if="form_register.processing" class="h-4 w-4 animate-spin" />
                            Criar Conta
                        </Button>
                    </div>

                    <div class="text-center text-sm text-muted-foreground">
                        Já possui conta?
                        <TextButton
                            @click.native="handlePages(1)"
                        >
                            Log in
                        </TextButton>
                    </div>
                </form>
            </AuthBase>
        </div>
        <div class="w-full h-screen flex justify-center items-center bg-[#002954]">
            <img 
                class="w-[200px]"
                src="/imgs/logo_adriano.svg"
            >
        </div>
        <div class="hidden h-14.5 lg:block"></div>
    </div>
</template>
