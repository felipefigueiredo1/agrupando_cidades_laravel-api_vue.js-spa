<template>
    <div>
        <h3 class="text-center">Criar campanha</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCampaign">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="campaign.name">
                        <label>Desconto</label>
                        <input type="number" class="form-control" v-model="campaign.descount">
                    </div>
                    <div v-for="(group, index) in groups" :key="index">
                        <div v-if="group.campaign == false">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" v-on:click="addCheck(group.id)"
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ group.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Criar</button>
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
            campaign: {
                groups: []
            },
            groups: [],
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/campaigns')
            .then(response => {
                console.log(response)
                this.groups = response.data.groups;
            })
    },
    methods: {
        addCheck(group) {
            this.campaign.groups.push(group);
            console.log(this.campaign.groups);
        },
        addCampaign() {
            this.axios
                .post('http://localhost:8000/api/campaigns', this.campaign)
                .then(response => (
                    this.$router.push({ name: 'campaigns' })
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
