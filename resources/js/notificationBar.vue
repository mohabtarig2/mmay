<template>


<div class="dropdown">
  <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span class="badge badge-danger" v-if="notificationlist.length>0"> {{notificationlist.length}}</span>
   <i class="far text-muted fa-bell" style="font-size: 19px;
    margin-top: 11px;"></i>

  </a>


  <div class="dropdown-menu scrollbar"  id="style-4" aria-labelledby="dropdownMenuButton">

      <div class="header-notification container">

      <router-link :to="{name:'AllNotification'}"  class="see-all">See All </router-link>

      <span class=" h5 font-weight-bold">Notifications</span>

      </div>
    <span class="dropdown-item force-overflow" v-for="(n,i) in notificationlist" :key="i">


  <router-link :to="{name:'project',params:{id:n.data.TenderAccepted.id}}"  v-if="n.data.TenderAccepted">
        <div class="media-body">


           <div class="mt-0 text-dark">Your Tender  {{n.data.TenderAccepted.title}} has been<i class="text-success">accept</i></div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i> {{n.added_at}}</p>

        </div>
        </router-link>


<span v-if="n.data.tender" >

  <router-link :to="{name:'project',params:{id:n.data.tender.id}}"  >
        <div class="media-body">
          <div class="mt-0 text-dark"><strong> {{n.data.offer_owner.name}} </strong>added Offer For Your Tender
          </div>
          <router-link :to="{name:'project',params:{id:n.data.tender.id}}">{{n.data.tender.title}}</router-link>

          <span class="text-dark"><i class="fa fa-clock-o mr-1"></i> {{n.added_at}}</span>

        </div>
  </router-link>

</span>
    <span v-else-if="n.data.Tender_consulte_reject">
  <router-link :to="{name:'project',params:{id:n.data.Tender_consulte_reject.id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark">Your Tender  {{n.data.Tender_consulte_reject.title}} has been<i class="text-danger">Reject</i></div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>

        <span v-else-if="n.data.reTender_consulte">
  <router-link :to="{name:'project',params:{id:n.data.reTender_consulte.id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark">This Tender   {{n.data.reTender_consulte.title}} has been<i class="text-danger">retender</i></div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>



        <span v-else-if="n.data.request_tender_consulte">
  <router-link :to="{name:'RequesttenderDetails',params:{type:'consulting',id:n.data.request_tender_consulte.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.company.avatar" class="profile-user " width="20" height="20"><span>{{n.data.company.name}} </span>
</div> Send To Agree for Request



          <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>


  <span v-else-if="n.data.Tender_Construction_Accepted">
  <router-link :to="{name:'consrDetails',params:{type:'consulting',id:n.data.Tender_Construction_Accepted.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.Tender_Consurction_owner.avatar" class="profile-user " width="20" height="20"><span>{{n.data.Tender_Consurction_owner.name}} </span>
</div> Your Construtions Tender Has Been Accepted



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


          <span v-else-if="n.data.offer_construction">
  <router-link :to="{name:'consrDetails',params:{type:'consulting',id:n.data.offer_construction.construction_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.Company_added_offer_construction.avatar" class="profile-user " width="20" height="20"><span>{{n.data.Company_added_offer_construction.name}} </span>
</div> add New Offer In tender Number {{n.data.offer_construction.construction_id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


          <span v-else-if="n.data.Offer_Construction_Confirmed">
  <router-link :to="{name:'RequesttenderDetails',params:{type:'construction',id:n.data.tender_confrimed_offer_construction.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user_owner_construction_request.avatar" class="profile-user " width="20" height="20"><span>{{n.data.user_owner_construction_request.name}} </span>
</div> Your Offer Has been Selected By owner



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

                  <span v-else-if="n.data.tender_construction_Rejected">
  <router-link :to="{name:'consrDetails',params:{type:'construction',id:n.data.tender_construction_Rejected.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.tender_construction_Rejected.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.tender_construction_Rejected.user.name}} </span>
</div> Your Construction Tender Has Been Rejected



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

                    <span v-else-if="n.data.copmany_complete_construction_tender">
  <router-link :to="{name:'RequesttenderDetails',params:{type:'construction',id:n.data.copmany_complete_construction_tender.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> Send Request To Complete The Tender



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


                <span v-else-if="n.data.User_done_construction_tender">
  <router-link :to="{name:'RequesttenderDetails',params:{type:'construction',id:n.data.User_done_construction_tender.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> Complete The Project successfully!



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


  <span v-else-if="n.data.company_cancled_consutrcion_tenders">
  <router-link :to="{name:'RequesttenderDetails',params:{type:'construction',id:n.data.company_cancled_consutrcion_tenders.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.tender_construction_cancel_company.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.tender_construction_cancel_company.name}} </span>
</div> Canceled The Request  number: {{n.data.company_cancled_consutrcion_tenders.id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

        <span v-else-if="n.data.User_cancled_tender_construction">
  <router-link :to="{name:'RequesttenderDetails',params:{type:'construction',id:n.data.User_cancled_tender_construction.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user  .avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> Canceled The Request  number: {{n.data.User_cancled_tender_construction.id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>
     <span v-else-if="n.data.tender_hvac_accepted">
  <router-link :to="{name:'HvacDetails',params:{id:n.data.tender_hvac_accepted.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">You Tender Has Accepted</span>   number: {{n.data.tender_hvac_accepted.id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


         <span v-else-if="n.data.New_Offer_Hvac">
  <router-link :to="{name:'HvacDetails',params:{id:n.data.New_Offer_Hvac.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">Add Offer in Your Hvac Tender</span>   number: {{n.data.New_Offer_Hvac.tender_id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

                <span v-else-if="n.data.rejected_hvac_tender">

  <router-link :to="{name:'HvacDetails',params:{id:n.data.rejected_hvac_tender.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> Your Hvac Tender<span class="text-danger"> Rejected</span>



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>



<span v-else-if="n.data.tender_confrimed_offer_Hvac">

  <router-link :to="{name:'RequesttenderDetails',params:{type:'hvac',id:n.data.Offer_Hvac_Confirmed.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user_owner_Hvac_request.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user_owner_Hvac_request.name}} </span>
</div> <span class="text-success">You  Offer Has Been Selected</span>



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

        <span v-else-if="n.data.copmany_complete_Hvac_tender">

  <router-link :to="{name:'RequesttenderDetails',params:{type:'hvac',id:n.data.copmany_complete_Hvac_tender.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">send request To Complete The Tender</span>



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


    <span v-else-if="n.data.company_offer_hvac_cancled">

  <router-link :to="{name:'RequesttenderDetails',params:{type:'hvac',id:n.data.company_offer_hvac_cancled.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-danger ">Cancled </span> The Work in Hvac Tender



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

        <span v-else-if="n.data.request_tender_hvac_cancel">

  <router-link :to="{name:'RequesttenderDetails',params:{type:'hvac',id:n.data.request_tender_hvac_cancel.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-danger ">Cancled </span> The Work in Hvac Tender



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>






        <span v-else-if="n.data.User_done_Hvac_tender">

  <router-link :to="{name:'RequesttenderDetails',params:{type:'hvac',id:n.data.User_done_Hvac_tender.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">complete The Tender successfully</span>



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>






















        <!-- consulting seaction -->
            <span v-else-if="n.data.OfferConsulteConfirmed">
  <router-link :to="{name:'project',params:{id:n.data.OfferConsulteConfirmed.id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark">Your offer has been selected  {{n.data.OfferConsulteConfirmed.title}} </div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>

            <span v-else-if="n.data.TenderConsulteComplete">
  <router-link :to="{name:'project',params:{id:n.data.TenderConsulteComplete.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.CompnyCompleteTheRequest.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.CompnyCompleteTheRequest.name}} </span>
</div><span class="text-success">Congratulations</span> The work has been successfully completed !



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

                <span v-else-if="n.data.request_tender_consulte_cancel">
  <router-link :to="{name:'project',params:{id:n.data.request_tender_consulte_cancel.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.user.name}} </span>
</div> Canceled This request



          <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>


                <span v-else-if="n.data.request_tender_consulte_user_cancel">
  <router-link :to="{name:'project',params:{id:n.data.request_tender_consulte_user_cancel.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.user.name}} </span>
</div> Canceled This request



        </div>
        </router-link>
        </span>


    </span>

  </div>


</div>





</template>

<script>

import {mapState ,mapGetters} from 'vuex';
export default({
    //   mounted() {

    //         this.getUnreadNotificatons();
    //     },
    // methods: {

    //     getUnreadNotificatons(){

    //         axios.get('/getLastTenNotifications').then(res=>{
    //             console.log(res.data);
    //            this.$store.state.notificationlist = res.data;


    //         }).catch(err=>{
    //             console.log(err);
    //         })

    //     }

    // },
// computed:{
//     ...mapState({

//       isLoggedIn: "isLoggedIn",
//       isAdminLoggedIn:"isAdminLoggedIn"
//     }),
//     ...mapGetters({

//     }),
//     notificationlist(){
//         return this.$store.state.notificationlist
//     },
//     IsUser(){
//             return this.$store.getters.IsUser
//         },
//      IsAdmin(){
//             return this.$store.getters.IsAdmin
//     },
// }
})
</script>


<style scoped>
a i:hover {
color: #e43a15 ;
cursor: pointer;
}
.dropdown{
    padding: 0 5px;
    font-size: 12px;




}


.dropdown .dropdown-item  {
color: #e43a15 ;
cursor: pointer;
    font-size: 12px;



}
.dropdown-menu.show{
    width: 20rem;
    height: 31rem;
    overflow-y: scroll;
}
.badge-danger {
      color: #fff;
    background-color: #e3342f;
    position: absolute;
    left: 25px;
    top: 7px;
    border-radius: 16px;
    font-size: 9px;
}
.scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	width: 65px;
	background: #fff;
	overflow-y: scroll;
	margin-bottom: 25px;
}


/*
 *  STYLE 2
 */

#style-4::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #fff;
}

#style-4::-webkit-scrollbar
{
	width: 12px;
	background-color: #fff;
}

#style-4::-webkit-scrollbar-thumb
{
	border-radius: 10px;

	background-color: #ced0d4;
}

/*
 *  STYLE 3
 */
</style>
