<template>
    <div>
        <h3 class="text-center">Criar produto</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input type="text" class="form-control" v-model="product.price">
                    </div>
                    <div v-if="campaigns == ''" class="mt-2">
                        <strong>Tenha ao menos uma campanha para criar algum produto!</strong>
                    </div>
                    <div v-else>
                        <p>Selecione a campanha que o produto pertence</p>
                        <div v-for="(campaign, index) in campaigns" :key="index">
                            <div>
                                <div class="form-check">
                                    <!--v-on:click="addCheck(campaign.id)"-->
                                    <input class="form-check-input" type="radio" v-model="product.campaign_id"
                                        v-bind:value="campaign.id" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ campaign.name }}
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
            product: {
                //campaigns: [],
            },
            campaigns: [],
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/products/')
            .then(response => {
                this.campaigns = response.data.campaigns;
                console.log(response)
            });
    },
    methods: {
        /*addCheck(group) {
            this.campaign.groups.push(group);
            console.log(this.campaign.groups);
        }*/
        addProduct() {
            this.axios
                .post('http://localhost:8000/api/products', this.product)
                .then(response => (
                    this.$router.push({ name: 'products' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>
