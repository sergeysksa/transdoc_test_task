<template>
    <div class="text-center">
        <h1>Page not found</h1>
        <h2>404</h2>
        <p><router-link :to="{ name: 'dashboard' }">
            Dashboard
        </router-link></p>
    </div>
</template>

<script>
export default {
    name: "NotFound"
}
</script>

<style scoped>

</style>
