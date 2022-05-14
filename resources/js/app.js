require("./bootstrap");
import router from "./routes"
import VueRouter from 'vue-router';
import Vuex from 'vuex'
import Index from './index.vue';
import home from './home.vue';
import footer from './footer.vue';
import login from './auth/login'
import navbar from './auth/navbar'
import Register from './auth/Register'
import reset from './auth/reset'
import adminLogin from './admin/adminLogin.vue'
import admin from './admin/admin.vue'

import resetpassword from './auth/reset-password'
import partnership from './auth/partnership'
import showoffers from './auth/showOffers'
import FatalError from "./shared/components/FatelError";
import Success from "./shared/components/Success";
import ValidationErrors from "./shared/components/ValidationErrors";
import storeDefinition from "./store";
import axios from "axios";
import '@morioh/v-lightbox/dist/lightbox.css';
import Vue from 'vue'
import Lightbox from '@morioh/v-lightbox'
import vueImages from 'vue-images'

import InfiniteLoading from 'vue-infinite-loading';
import i18n from "./i18n";

import vSelect from 'vue-select'






//import carousel from 'vue-owl-carousel';




const lang = localStorage.getItem('lang')  || 'ar';

axios.defaults.headers['Accept-Language'] = lang;

import VueLuxon from "vue-luxon";



window.Echo.channel("newComment").listen('NewComment',function(e){
    alert(e.message)
});

window.Echo.channel("newTender").listen('NewTender',function(e){
    alert(e.message)
});
window.Echo.channel("acceptTender").listen('AcceptTender',function(e){
    alert(e.message)
});

window.Echo.channel("commentConsr").listen('CommentConsr',function(e){
    alert(e.message)
});
window.Echo.channel("TenderTconulte").listen('NewTenderConsulte',function(e){
    alert(e.message)
});
window.Echo.channel("reJectCOnsulteTender").listen('rejectConsulteTender',function(e){
    alert(e.message)
});

window.Echo.channel("retenderConsulte").listen('retenderConsulte',function(e){
    alert(e.message)
});

window.Echo.channel("ConsulteAdminOffer").listen('ConsluteAdminOffer',function(e){
    alert(e.message)
});

window.Echo.channel("TenderRequestFromCompany").listen('companyAdminConsulteConfirmTender',function(e){
    alert(e.message)
});

window.Echo.channel("companyDoneConsulte").listen('companyDoneConsulte',function(e){
    alert(e.message)
});

window.Echo.channel("companyCancelConsulte").listen('companyCancelConsulte',function(e){
    alert(e.message)
});

window.Echo.channel("NewTenderConstruction").listen('NewTenderConstruction',function(e){
    alert(e.message)
});


window.Echo.channel("RejectConstructionTender").listen('RejectConstructionTender',function(e){
    alert(e.message)
});



window.Echo.channel("RetenderConstruction").listen('RetenderConstruction',function(e){
    alert(e.message)
});


window.Echo.channel("UpdateTitleConstruction").listen('UpdateTitleConstruction',function(e){
    alert(e.message)
});


window.Echo.channel("CompleteConstructionTender").listen('CompleteConstructionTender',function(e){
    alert(e.message)
});

window.Echo.channel("companyDoneConstruction").listen('companyDoneConstruction',function(e){
    alert(e.message)
});


window.Echo.channel("companyCancelConstruction").listen('companyCancelConstruction',function(e){
    alert(e.message)
});

window.Echo.channel("UserCancelConstruction").listen('UserCancelConstruction',function(e){
    alert(e.message)
});


window.Echo.channel("NewOfferHvac").listen('NewOfferHvac',function(e){
    alert(e.message)
});

window.Echo.channel("confirmHvacOffer").listen('confirmHvacOffer',function(e){
    alert(e.message)
});

window.Echo.channel("CompleteHvacTender").listen('CompleteHvacTender',function(e){
    alert(e.message)
});


window.Echo.channel("rejectHvactTender").listen('rejectHvactTender',function(e){
    alert(e.message)
});

window.Echo.channel("reviews").listen('reviewTender',function(e){
    alert(e.message)
});


window.Echo.channel("NewTenderStone").listen('NewTenderStone',function(e){
    alert(e.message)
});

window.Echo.channel("acceptStoneTender").listen('acceptStoneTender',function(e){
    alert(e.message)
});


window.Echo.channel("NewStoneOffer").listen('NewStoneOffer',function(e){
    alert(e.message)
});

window.Echo.channel("ConfirmRequestofferStone").listen('ConfirmRequestofferStone',function(e){
    alert(e.message)
});

window.Echo.channel("CompleteStoneTender").listen('CompleteStoneTender',function(e){
    alert(e.message)
});





























window.Vue = require("vue").default
Vue.use(InfiniteLoading, { /* options */ });
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Lightbox);
Vue.use(vueImages);
Vue.use(vSelect)
Vue.use(VueLuxon, {
    templates: {},
      input: {
          zone: "utc",
          format: "iso"
      },
      output: {
          zone: "local",
          format: {
              year: "numeric",
              month: "long",
              day: "numeric",

          },
          locale: null,
          relative: {
              round: true,
              unit: null
          }
      }
  });

//Vue.filter("fromNow", value => moment(value).fromNow());

//Vue.component("example-component",require("./components/ExampleComponent.vue").default);


//Vue.component("example-2",require("./components/Example2.vue").default);

Vue.component("fatal-error", FatalError);
Vue.component("success", Success);
Vue.component("v-errors", ValidationErrors);
Vue.component('pagination', require('laravel-vue-pagination'));

//Pusher.logToConsole = true;

const store = new Vuex.Store(storeDefinition);

window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (401 === error.response.status) {
            store.dispatch("logout");
        }

        return Promise.reject(error);
    }
);


const app = new Vue({
    el: "#app",
    router,
    i18n,
    store,
    components:  {
        index:Index,
        home:home,
        admin:admin,
        footer:footer   ,
        login:login,
        adminLogin:adminLogin,
        Register:Register,
        resetpassword:resetpassword,
        reset:reset,
        partnership:partnership,
        showoffers:showoffers,






    },
    async beforeCreate() {

        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadStoredAdminState");

        this.$store.dispatch("loadUser");
        this.$store.dispatch("loadAdmin");


    },
});



