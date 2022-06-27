<template>
    <div>
        <h3 class="text-center">Adicionar Cidade</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCity">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="city.name">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                city: {}
            }
        },
        methods: {
            addCity() {
                this.axios
                    .post('http://localhost:8000/api/cities', this.city)
                    .then(response => (
                        this.$router.push({ name: 'cities' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
