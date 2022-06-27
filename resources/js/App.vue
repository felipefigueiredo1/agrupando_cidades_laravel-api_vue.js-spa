<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/create-city" class="nav-item nav-link">Adicionar cidade</router-link>
                    <router-link to="/" class="nav-item nav-link">Lista de cidades</router-link>
                    <router-link to="/create-group" class="nav-item nav-link">Criar grupo</router-link>
                    <router-link to="/groups" class="nav-item nav-link">Lista de grupos</router-link>
                    <router-link to="/create-campaign" class="nav-item nav-link">Criar campanhas</router-link>
                    <router-link to="/campaigns" class="nav-item nav-link">Lista de campanhas</router-link>
                    <router-link to="/create" class="nav-item nav-link">Criar Produto</router-link>
                    <router-link to="/products" class="nav-item nav-link">Lista de produtos</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>

<script>
    export default {}
</script>
