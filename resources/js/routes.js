import VueRouter from 'vue-router';
import Example2 from './components/Example2';
 import bookables from './bookables/bookables';
 import Bookable from './bookable/bookable';
 import index from './index.vue';
 import home from './home.vue';
 import Dashboard from './dashboard/Dashboard';
 import homeDashboard from './dashboard/homeDashboard';
 import alloffers from './dashboard/alloffers';
 import MyOffer from './dashboard/MyOffer';
 import offerdetails from './dashboard/offerdetails';
 import Settings from './dashboard/Settings';
 import FacedVilla from './dashboard/FacedVilla';
 import recent from './v-dash/recent';
 import CoastVilla from './dashboard/CoastVilla';
 import editprofile from './dashboard/editprofile.vue';
 import editBranch from './dashboard/editBranch.vue';
 import profile from './dashboard/profile';
 import Projects from './dashboard/projects.vue';
 import Project from './dashboard/project.vue';
 import tenders from './dashboard/tenders.vue';
 import requestVilla from './dashboard/request-villa.vue';
 import TenderRequest from './dashboard/request-tenders.vue';
 import  RequesttenderDetails from './dashboard/request-tender-details.vue';
 import request_consulte from './dashboard/request_consulte.vue';
 import requestcConstructions from './dashboard/request-construction.vue';
 import requestHvac from './dashboard/request-hvac.vue';
 import requestStone from './dashboard/request-stone.vue';
 import saved from './dashboard/saved.vue';


 import products from './dashboard/products.vue';
 import productsDetails from './dashboard/product-details.vue';


 import request_details from './dashboard/request-villa-details.vue';




 import consultances from './tenders/consultances';
 import constructionTender from './tenders/constructionTender';
 import StoneTender from './tenders/StoneTender';
 import hvac from './tenders/hvac';
 import consrDetails from './tenders/consrDetails.vue'
 import HvacDetails from './tenders/HvacDetails.vue'
 import InteriorDetails from './tenders/InteriorDetails.vue'
 
 import StoneDetails from './tenders/StoneDetails.vue'
 import FromOffers from './tenders/FromOffers.vue'




 import login from './auth/login';
 import reset from './auth/reset';
 import loading from './auth/loading';
 import showAllOfferClient from './auth/showAllOfferClient';
 import Register     from './auth/Register';
 import password     from './auth/password';
 import offerClientDetails     from './auth/offerClientDetails';
 import sidebar     from './auth/sidebar';
 import resetpassword     from './auth/reset-password';
 import mytenders from './tenders/mytenders';

 import ConslTenders from './tenders/ConslTenders';
 import constrtenders from './tenders/constrTenders';
 import HvacTenders  from './tenders/hvacTenders';
 import StoneTenders  from './tenders/StoneTenders';
 import InteriorTenders  from './tenders/InteriorTenders.vue';

 
 import interiorTender  from './tenders/interiorTender';
 import ConslTender from './tenders/ConslTender';
 import AllNotification from './AllNotification.vue';
 import ConsluteTender from './admin/tenderConslute.vue';
 import adminLogin from './admin/adminLogin.vue';
 import admin from './admin/admin.vue';
 import admins from './admin/admins.vue';
 import users from './admin/users.vue';
 import profileUsers from './admin/profileUsers.vue';
 import constructionsProfile from './admin/constructionsProfile.vue';
 import consulteProfile from './admin/consulteProfile.vue';
 import AdminConsulte from './admin/AdminConsulte.vue';
 import HvacProfile from './admin/HvacProfile.vue';
 import StoneProfile from './admin/StoneProfile.vue';


 import AdminConstruction from './admin/AdminConstruction.vue';
 import AdminHvac from './admin/AdminHvac.vue';
 import AdminStone from './admin/AdminStone.vue';




 import adminDashboard from './admin/AdminDashboard.vue';

 import ConsrTender from './admin/tenderConsr.vue';
 import HvacTender from './admin/tenderHvac.vue';

 import tenderStone from './admin/tenderStone.vue';
 import tcDtails from './admin/tenderConsulteDetails.vue';
 import consrDtails from './admin/tenderConsrDetails.vue';

 import HvacAdminDtails from './admin/HvacAdminDtails.vue';
 import StoneAdminDtails from './admin/StoneAdminDtails.vue';
 import AdminConsultingOffer from './admin/AdminConsultingOffer.vue';
 import AdminOfferConsluteDetails from './admin/AdminOfferConsluteDetails.vue';
 import notificationsAdmin from './admin/notificationsAdmin.vue';
 import ConstructionsAdminAds from './admin/ConstructionsAdminAds.vue';


 import paypal from './payment/paypal.vue';
 import visa from './payment/visa.vue';
 import PageNotFound from './auth/PageNotFound';
 import ddd from './auth/ddd';
 import property from './auth/pageDDD';
 import pageDetails from './auth/pageDetails';

 import agents from './auth/agents';
 import services from './auth/services';
 import CompanyProfile from './auth/CompanyProfile';
 import CompanyAdsDetails from './auth/CompanyAdsDetails';
 import store from './store';
 import test from './tesstt';










const routes = [
    { path: "*", component: PageNotFound,name:'PageNotFound', },


    {

        path:"/",
        component: home,
        name:'home',

    },

    {
        path:"/sidebar",
        component:sidebar,
        name:'sidebar',
    },

    {
        path:"/test",
        component:test,
        name:'test',
    },
    

    {
        path:'/admin/login',
        component:adminLogin,
        name:'adminLogin',
    },

    {
        path:'/loading',
        component:loading,
        name:'loading',
    },

    {

        path:'/admin',
        component:admin,
        name:'admin',
        redirect:"/admin",
        // meta: {
        //     requiresAuth: true
        //   },
        children:[
            {
                path:"/admin",
                component:adminDashboard,
                name:'adminDashboard',

            },
            {
                path:"/manager",
                component:admins,
                name:'admins',

            },
            {
                path:"/users",
                component:users,
                name:'users',


            },

            {
                path:"admin/notifications",
                component:notificationsAdmin,
                name:'notificationsAdmin',


            },


            {
                path:"/consulte",
                component:AdminConsulte,
                name:'AdminConsulte',


            },
            {
                path:"/construction",
                component:AdminConstruction,
                name:'AdminConstruction',


            },
            {
                path:"/hvac",
                component:AdminHvac,
                name:'AdminHvac',


            },
            {
                path:"/Stone",
                component:AdminStone,
                name:'AdminStone',


            },



            {
                path:"/Users/profile/:id",
                component:profileUsers,
                name:'profileUsers',

            },
            {
                path:"/consulte/profile/:id",
                component:consulteProfile,
                name:'consulteProfile',

            },
            {
                path:"/constructions/profile/:id",
                component:constructionsProfile,
                name:'constructionsProfile',

            },
            {
                path:"/Hvac/profile/:id",
                component:HvacProfile,
                name:'HvacProfile',

            },

            {
                path:"/stone/profile/:id",
                component:StoneProfile,
                name:'StoneProfile',

            },






            {
                path:"/ConsrTender",
                component:ConsrTender,
                name:'ConsrTender',
                },
                {
                    path:"/Conslute-Tenders",
                    component:ConsluteTender,
                    name:'ConsluteTender',
                    //......
                    },
                {
                    path:"/Conslute-Tenders/:id",
                    component:tcDtails,
                    name:'tcDtails',
                    // ......
                },

                {
                    path:"/Admin/Consulting/Offer",
                    component:AdminConsultingOffer,
                    name:'AdminConsultingOffer',
                    //......
                    },

                    {
                        path:"/Admin/Consulting/Offer/:id",
                        component:AdminOfferConsluteDetails,
                        name:'AdminOfferConsluteDetails',
                        //......
                        },

                        {
                            path:"/Admin/Construction/Offer",
                            component:ConstructionsAdminAds,
                            name:'ConstructionsAdminAds',
                            //......
                            },



                {
                    path:"/Hvac-Tenders",
                    component:HvacTender,
                    name:'HvacTender',
                    //......
                    },

                      {
                        path:"/Stone-Tenders",
                        component:tenderStone,
                        name:'tenderStone',
                        //......
                        },
                        {
                            path:"/Stone-Tenders/:id",
                            component:StoneAdminDtails,
                            name:'StoneAdminDtails',
                            //......
                            },



                     {
                        path:"construction-Tenders/:id",
                        component:consrDtails,
                        name:'consrDtails',
                    },
                    {
                        path:"Hvac-Tenders/:id",
                        component:HvacAdminDtails,
                        name:'HvacAdminDtails',
                    },


        ],
    },
    {

        path:"/dashboard",
     component:Dashboard,
     name:'dashboard',
     meta: {
        requiresAuth: true
      },
    //  redirect: '/homeDashboard',

     children:[
        {
            path:"",
            component:homeDashboard,
            name:'homeDashboard',


            meta: {
                requiresAuth: true
              },

        },
        {
            path: "saved",
            component:saved,
            name:'saved',
            meta: { title :"saved | Amb " ,  requiresAuth: true }
            // redirect: '/dashboard/myads'
        
           },
        {
            path: "myads",
            component:MyOffer,
            name:'Myoffer',
            meta: { title :"New Offer | Amb "  ,  requiresAuth: true}
            
            // redirect: '/dashboard/myads'

           },
           {
            path:"/myads/details/:id",
         component:offerdetails,
         name:'offerdetails',
 requiresAuth: true


        },
           {
            path: "/myads/all",
              component:alloffers,
              name:'alloffers',
          },
           {
            path:"tenders",
         component:tenders,
         name:'tenders',
         meta: { title :"Tenders | Amb " }


     },
     {
        path:"/Projects",
        component:Projects,
        name:'Projects',
        
        },
        {
            path:"/Projects/:id",
            component:Project,
            name:'project',
         },
         {
            path:"/password/reset/:token",
         component:resetpassword,
         name:'resetpassword',


        },
        {
            path:"/password/reset",
         component:reset,
         name:'reset',


        },
         {
          path:"/tenders/construction/:id",
            component:consrDetails,
            name:'consrDetails'
            },
            {
                path:"/tenders/hvac/:id",
                  component:HvacDetails,
                  name:'HvacDetails'
             },
             {
                path:"/tenders/interior/:id",
                  component:InteriorDetails,
                  name:'InteriorDetails'
             },
             
             {
                path:"/tenders/stone/:id",
                  component:StoneDetails,
                  name:'StoneDetails'
             },


         {
            path:"tenders/consultances",
            component:consultances,
            name:'consultances',
         },
         {
         path:"/tenders/FromOffers/:id",
         component:FromOffers,
         name:'FromOffers',
      },

            {
            path:"/tenders/construction",
            component:constructionTender,
            name:'consturction'
            },
         {
         path:"tenders/construction-tender",
         component:constructionTender,
         name:'constructionTender',
        },
        {
            path:"tenders/Stone-tender",
            component:StoneTender,
            name:'StoneTender'
         },
         {
            path:"tenders/interiorTender",
            component:interiorTender,
            name:'interiorTender'
         },
        {
            path:"tenders/hvac",
            component:hvac,
            name:'hvac',
           },
         {
            path:"/all/tenders",
            component:mytenders,
            name:'mytenders',
            redirect: '/all/tenders/ConslTenders',
            children:[
                {
                    path:"/all/tenders/ConslTenders",
                    component:ConslTenders,
                    name:'ConslTenders',
                },
                {
                    path:"/all/tenders/constrtenders",
                    component:constrtenders,
                    name:'constrtenders',
                },
                {
                    path:"/all/tenders/HvacTenders",
                    component:HvacTenders,
                    name:'HvacTenders',
                },
                {
                    path:"/all/tenders/StoneTenders",
                    component:StoneTenders,
                    name:'StoneTenders',
                },
                {
                    path:"/all/tenders/InteriorTenders",
                    component:InteriorTenders,
                    name:'InteriorTenders',
                },
                {
                    path:"/request/consltung",
                    component:request_consulte,
                    name:'request_consulte',
                    },
                    {
                    path:"/request/villa",
                    component:requestVilla,
                    name:'requestVilla',
                    },
                    
                    {
                    path:"/request/consurctions",
                    component:requestcConstructions,
                    name:'requestcConstructions',
                    },
                    {
                        path:"/request/stone",
                        component:requestStone,
                        name:'requestStone',
                    },

                    {
                        path:"/request/hvac",
                        component:requestHvac,
                        name:'requestHvac',
                    },


            ]
         },
         {

            path:"/mytenders/ConslTender/:id",
            component:ConslTender,
            name:'ConslTender',
         },

         {



                path:"/profile",
                component:profile,
                name:'profile',
                },




            {
                path:"/notifications",
                component:AllNotification,
                name:'AllNotification',
            },
          
            {
                path:"/tender/request",
                component:TenderRequest,
                name:'TenderRequest',

                // children:[
                //     {
                //         path:"/request/consltung",
                //     component:request_consulte,
                //     name:'request_consulte',
                //     },
                //     {
                //     path:"/request/villa",
                //     component:requestVilla,
                //     name:'requestVilla',
                //     },
                    
                //     {
                //     path:"/request/consurctions",
                //     component:requestcConstructions,
                //     name:'requestcConstructions',
                //     },
                //     {
                //         path:"/request/stone",
                //         component:requestStone,
                //         name:'requestStone',
                //     },

                //     {
                //         path:"/request/hvac",
                //         component:requestHvac,
                //         name:'requestHvac',
                //     },

                    



                //   ],



            },
            {
                path:"/request/:type/:id",
              component:RequesttenderDetails,
              name:'RequesttenderDetails',
                },


            {
                path:"products",
                component:products,
                name:'products',


            },
            {
                path:"products/:id",
                component:productsDetails,
                name:'productsDetails',


            },
            {
                path:'request/details/:id',
                component:request_details,
                name:'requestDetails'
            },

            {
                path: "Settings",
                  component:Settings,
                  name:'Settings',
                  redirect: '/edit/profile',
                  children:[
                      {
                          path:"/edit/profile",
                      component:editprofile,
                      name:'editprofile',
                      },
                      {
                        path: "/password",
                          component:password,
                          name:'password',
                      },
                      {
                        path: "/edit/branch",
                          component:editBranch,
                          name:'editBranch',
                      },

                    ],
              },


        ],


 },

    {
        path:"/ddd",
        component:ddd,
        name:'ddd',
    },
    {
        // path:"/ddd/villa/emirats=:location/type=:type/bed=:bed/bath=:bath",
        path:"/ddd/villa/emirats=:location/type=:type/bed=:bed",
        component:property,
        name:'property',
    },

    {
        path:"/ddd/page/Details/:id",
        component:pageDetails,
        name:'pageDetails',
    },



    {
        path:"/recent",
     component:recent,
     name:'recent',


 },
 {
    path:"/offer/details/:id",
 component:offerClientDetails,
 name:'offerClientDetails',
 meta: { title :"Offer | Amb " }

},
 {
    path:"/offers",
 component:showAllOfferClient,
 name:'showAllOfferClient',


},

{
        path:"/login",
     component:login,
     name:'login',
     meta: { title :"Login | Amb " }

 },

 {
 path:"/Register",
 component:Register,
 name:'Register',
 },
 {
    path: "/FacedVilla",
      component:FacedVilla,
      name:'FacedVilla',
  },
  {
  path: "/CoastVilla",
  component:CoastVilla,
  name:'CoastVilla',
},
{
    path:"/company/:type",
    component:agents,
    name:'agents',
},
{
    path:"/services/:type",
    component:services,
    name:'services',
},
{
    path:"/company/:id/:type",
    component:CompanyProfile,
    name:'CompanyProfile',
},


{
    path:"/ads/:type/:id",
    component:CompanyAdsDetails,
    name:'CompanyAdsDetails',
},




    {
        path: "/bookable/:id",
        component:Bookable,
        name:'bookable',
    },











];


const router = new VueRouter({
    routes,

//    mode: 'history',




});

function Navbar(){
    $('#offcanvas-modal').modal('hide');
    $('#offcanvas-modal').css('display','none');

    $('.menu-arrow').removeClass('active');
    $('.modal-backdrop').css('display','none'); 
}




router.beforeEach((to, from, next) => {
    const loggedIn = store.state.isLoggedIn;

    window.scrollTo(0, 0)
    if (to.matched.some(record => record.meta.requiresAuth ) ) {



            if(!loggedIn){

                console.log(loggedIn);



                next({
                     name: 'login',
                     query: { redirect:to.fullPath}
                    });

        } else {
            next() // does not require auth, make sure to always call next()!

          }



    } else {
      next() // does not require auth, make sure to always call next()!
    }
  })
router.afterEach((to, from) => {

   
Navbar();
    Vue.nextTick(() => {
        document.title = to.meta.title || "Amb - Home ";
    })
});
export default router ;
