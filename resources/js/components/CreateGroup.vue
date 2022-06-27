<template>
    <div>
        <h3 class="text-center">Criar grupo</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addGroup">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="group.name">
                    </div>
                    <div v-if="cities == ''" class="mt-2">
                        <strong>Tenha ao menos uma cidade para criar algum grupo!</strong>
                    </div>
                    <div v-else class="mt-2">
                        <p>Selecione as cidades do grupo</p>

                        <div v-for="(city, index) in cities" :key="index">
                            <div v-if="city.group == false">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-on:click="addCheck(city.id)"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ city.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            //retornando objeto, com valores manipulados pelo usuario.
            group: {
                cities: []
            },
            cities: [],
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/cities')
            .then(response => {
                this.cities = response.data.citiess;
            })
    },
    methods: {
        addCheck(city) {
            this.group.cities.push(city);
            console.log(this.group.cities);
        },
        addGroup() {
            this.axios
                .post('http://localhost:8000/api/groups', this.group)
                .then(response => (
                    this.$router.push({ name: 'groups' })
                ))
                .catch(error => {
                    let errors = error.response.data.errors;
                    for (let field of Object.keys(errors)) {
                        this.flash(errors[field][0], 'error');
                    }
                })
                .finally(() => this.loading = false)
        }
    }
}
</script>
