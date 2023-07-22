<template>
  <div class="w-full">

    <!-- Navbar section -->
    <div class="navbar bg-base-100 w-full">
        <div class="flex-1">
            <Link :href="route('homepage')" class="btn btn-ghost normal-case text-xl">Findex</Link>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><Link :href="route('homepage')">Calendario</Link></li>
                <li><Link :href="route('users')">Usuarios</Link></li>
                <li><Link :href="route('about')">Acerca de</Link></li>
            </ul>
        </div>
    </div>

    <!-- Page content -->
    <div>
        <slot />
    </div>
  </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<style>

</style>