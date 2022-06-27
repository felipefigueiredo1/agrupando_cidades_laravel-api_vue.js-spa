import AllProducts from './components/AllProducts.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';
import AllCities from './components/AllCities.vue';
import EditCity from './components/EditCity.vue';
import CreateCity from './components/CreateCity.vue';
import AllGroups from './components/AllGroups.vue';
import CreateGroup from './components/CreateGroup.vue';
import EditGroup from './components/EditGroup.vue';
import AllCampaigns from './components/AllCampaigns.vue';
import CreateCampaign from './components/CreateCampaign.vue';
import EditCampaign from './components/EditCampaign.vue';

export const routes = [
    {
        name: 'cities',
        path: '/',
        component: AllCities,
    },
    {
        name: 'create-city',
        path: '/create-city',
        component: CreateCity,
    },
    {
        name: 'edit-city',
        path: '/edit-city',
        component: EditCity,
    },
    {
        name: 'groups',
        path: '/groups',
        component: AllGroups,
    },
    {
        name: 'create-group',
        path: '/create-group',
        component: CreateGroup,
    },
    {
        name: 'edit-group',
        path: '/edit-group',
        component: EditGroup,
    },
    {
        name: 'campaigns',
        path: '/campaigns',
        component: AllCampaigns,
    },
    {
        name: 'create-campaign',
        path: '/create-campaign',
        component: CreateCampaign,
    },
    {
        name: 'edit-campaign',
        path: '/edit-campaign',
        component: EditCampaign,
    },
    {
        name: 'products',
        path: '/products',
        component: AllProducts,
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct,
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct,
    },
];
