<template>
    <div class=" content-wrapper ">



      	<section class="section-50">
		<div class="container">
			<h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>

			<div class="notification-ui_dd-content" v-for="(n,i) in notificationlist" :key="i">
      
        <!-- Start User And Consulting -->
				<div class="notification-list notification-list--unread" v-if="n.data.Tender_owner">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.Tender_owner.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'tcDtails',params: {id: n.data.tender.id}}">

							<p><b>{{n.data.Tender_owner.name}}</b>
               {{$t('added_new_Tender')}} 
               <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.tender.note.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

        <div class="notification-list notification-list--unread" v-if="n.data.reTender_consulte">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.reTender_consulte.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'tcDtails',params: {id: n.data.reTender_consulte.id}}">

							<p><b>{{n.data.reTender_consulte.user.name}}</b>
               {{$t('Update_The_Tender')}} 
                 <span class="badge badge-warning">
                {{$t('update')}}</span>
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.reTender_consulte.note.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>
        
    

        	<div class="notification-list notification-list--unread" v-if="n.data.tenderAdminOffer">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.offer_owner.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'tcDtails',params: {id: n.data.tenderAdminOffer.id}}">

							<p><b>{{n.data.offer_owner.name}}</b>
               {{$t('Done_choosed')}} 
                <router-link  :to="{name:'consulteProfile',params: {id: n.data.offerConsulteUser.id}}">
                  <b>{{n.data.offerConsulteUser.name}}</b></router-link>
                <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.tenderAdminOffer.note.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>


          <div class="notification-list notification-list--unread" v-else-if="n.data.request_tender_consulte">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.company.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'tcDtails',params: {id: n.data.request_tender_consulte.tender_id}}">

							<p><b>{{n.data.company.name}}</b>
               {{$t('sent_request')}} 
               <span class="badge badge-info">
                <i class='bx bx-plus-medical'></i></span>
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

			<!--End User And Consulting   -->




      			<!--start User And construction   -->
        
        
          <div class="notification-list notification-list--unread" v-else-if="n.data.New_Tender_construction">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'consrDtails',params: {id: n.data.New_Tender_construction.id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('added_new_Tender')}} 
               <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('construction')}}</span>
        
                </p>
                 </router-link>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

        


            			<!--End User And construction   -->

                     
          <div class="notification-list notification-list--unread" v-else-if="n.data.new_Tender_stone">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'StoneAdminDtails',params: {id: n.data.new_Tender_stone.id}}">

							<p><b>{{n.data.user.user.name}}</b>
               {{$t('added_new_Tender')}} 
               <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('stone')}}</span>
        
                </p>
                 </router-link>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

                  <!--start User And stone   -->


                  <!--start User And stone   -->

                  <!-- Start Hvac  -->
                  
          <div class="notification-list notification-list--unread" v-else-if="n.data.New_tender_Hvac">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'HvacAdminDtails',params: {id: n.data.New_tender_Hvac.id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('added_new_Tender')}} 
               <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('hvac')}}</span>
        
                </p>
                 </router-link>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

                  <!-- Start Hvac  -->

                  <!-- Start stone  -->


                  <!-- Start stone  -->


      

					<!-- start review -->
         <div class="notification-list notification-list--unread" v-if="n.data.review">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
												<img :src="n.data.review.avatar" alt="user">

						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'RequesttenderDetails',params: {type:'consulting',id: n.data.user.request_id}}">

							<p><b>{{n.data.review.name}}</b>
               {{$t('Added_review')}} 
               <span class="badge badge-warning">
                <i class="bx  bxs-star"></i>
                <i class="bx  bxs-star"></i>
                <i class="bx  bxs-star"></i>
                <i class="bx  bxs-star"></i>
                </span>
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
						
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

	<!-- End review -->
			
	
			
		
			</div>

			<div class="text-center">
				<a href="#!" class="dark-link">Load more activity</a>
			</div>

		</div>
	</section>

<div class="p-descrip-box ml-5">

<span class="dropdown-item force-overflow" v-for="(n,i) in notificationlist" :key="i">


  <router-link :to="`/mytenders/ConslTender/${n.data.TenderAccepted.id}`" target="_blank" v-if="n.data.TenderAccepted">
        <div class="media-body">


           <div class="mt-0 text-dark">Your Tender  {{n.data.TenderAccepted.title}} has been<i class="text-success">accept</i></div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i> {{n.added_at}}</p>

        </div>
        </router-link>





        <span v-else-if="n.data.reTender_consulte">
  <router-link :to="{name:'tcDtails',params:{id:n.data.reTender_consulte.id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark">This Tender   {{n.data.reTender_consulte.title}} has been<i class="text-success">update</i></div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>


                <span v-else-if="n.data.tenderAdminOffer">
  <router-link :to="{name:'tcDtails',params:{id:n.data.tenderAdminOffer.id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark">{{n.data.offerConsulteUser.name}} added New Offer in This Tender {{n.data.tenderAdminOffer.title}} </div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>

      <span v-else-if="n.data.OfferConsulteConfirmed">
  <router-link :to="{name:'tcDtails',params:{id:n.data.OfferConsulteConfirmed.id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark">new offer has been selected   {{n.data.OfferConsulteConfirmed.title}} </div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>



      <span v-else-if="n.data.request_tender_consulte">
  <router-link :to="{name:'tcDtails',params:{id:n.data.request_tender_consulte.tender_id}}"  >


        <div class="media-body">


           <div class="mt-0 text-dark"> {{n.data.company.name}} Sended Request To Complete The Request  </div>


          <p class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>


                <span v-else-if="n.data.TenderConsulteComplete">
  <router-link :to="{name:'tcDtails',params:{id:n.data.TenderConsulteComplete.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.CompnyCompleteTheRequest.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.CompnyCompleteTheRequest.name}} </span>
</div>completed The Tender



          <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>

             <span v-else-if="n.data.request_tender_consulte_cancel">
  <router-link :to="{name:'tcDtails',params:{id:n.data.request_tender_consulte_cancel.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.user.name}} </span>
</div> Canceled This Request



          <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p>

        </div>
        </router-link>
        </span>


      <span v-else-if="n.data.request_tender_consulte_user_cancel">
  <router-link :to="{name:'tcDtails',params:{id:n.data.request_tender_consulte_user_cancel.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.user.name}} </span>
</div> Canceled This request





        </div>
        </router-link>
        </span>


     <span v-else-if="n.data.New_Tender_construction">
  <router-link :to="{name:'consrDtails',params:{id:n.data.New_Tender_construction.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20"
><span>{{n.data.user.name}} </span>
</div> Added New Tender In Construction section





        </div>
        </router-link>
        </span>




          <span v-else-if="n.data.offer_construction">
  <router-link :to="{name:'consrDtails',params:{type:'consulting',id:n.data.offer_construction.construction_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.Company_added_offer_construction.avatar" class="profile-user " width="20" height="20"><span>{{n.data.Company_added_offer_construction.name}} </span>
</div> add New Offer In tender Number {{n.data.offer_construction.construction_id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


          <span v-else-if="n.data.Offer_Construction_Confirmed">
  <router-link :to="{name:'consrDtails',params:{id:n.data.tender_confrimed_offer_construction.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user_owner_construction_request.avatar" class="profile-user " width="20" height="20"><span>{{n.data.user_owner_construction_request.name}} </span>
</div>  Selected Construction Offer in Tender Number {{n.data.tender_confrimed_offer_construction.tender_id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

             <span v-else-if="n.data.retender_construction_notes">
  <router-link :to="{name:'consrDtails',params:{id:n.data.retender_construction_notes.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20"><span>{{n.data.user.name}} </span>
</div>  Update Construction Tender Number :  {{n.data.retender_construction_notes.id}}



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
</div> Send Request To Complete The Tender in Construction Tender



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


          <span v-else-if="n.data.User_done_construction_tender">
  <router-link :to="{name:'consrDtails',params:{id:n.data.User_done_construction_tender.tender_id}}"  >


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
  <router-link :to="{name:'consrDtails',params:{type:'construction',id:n.data.company_cancled_consutrcion_tenders.tender_id}}"  >


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
  <router-link :to="{name:'consrDtails',params:{type:'construction',id:n.data.User_cancled_tender_construction.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user  .avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> Canceled The Request  number: {{n.data.User_cancled_tender_construction.id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

                <span v-else-if="n.data.New_tender_Hvac">
  <router-link :to="{name:'HvacAdminDtails',params:{id:n.data.New_tender_Hvac.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user  .avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">New Tender</span> in Hvac Number: {{n.data.New_tender_Hvac.id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


         <span v-else-if="n.data.User_title_tender_hvac">
  <router-link :to="{name:'HvacAdminDtails',params:{id:n.data.User_title_tender_hvac.id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">Retender Hvac Tender</span> in Hvac Number: {{n.data.User_title_tender_hvac.id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>




   <span v-else-if="n.data.New_Offer_Hvac">
  <router-link :to="{name:'HvacAdminDtails',params:{id:n.data.New_Offer_Hvac.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">Add Offer in Hvac Tender</span>   number: {{n.data.New_Offer_Hvac.tender_id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>

          <span v-else-if="n.data.tender_confrimed_offer_Hvac">
  <router-link :to="{name:'HvacAdminDtails',params:{id:n.data.Offer_Hvac_Confirmed.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user_owner_Hvac_request.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user_owner_Hvac_request.name}} </span>
</div> <span class="text-success">Select Offer in his Notifications</span>



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

        </div>
        </router-link>
        </span>


<span v-else-if="n.data.copmany_complete_Hvac_tender">

  <router-link :to="{name:'HvacAdminDtails',params:{id:n.data.copmany_complete_Hvac_tender.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-success">send request To Complete The Tender Number {{n.data.copmany_complete_Hvac_tender.tender_id}}</span>


        </div>
        </router-link>
        </span>

            <span v-else-if="n.data.company_offer_hvac_cancled">

  <router-link :to="{name:'HvacAdminDtails',params:{type:'hvac',id:n.data.company_offer_hvac_cancled.tender_id}}"  >


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

  <router-link :to="{name:'HvacAdminDtails',params:{type:'hvac',id:n.data.request_tender_hvac_cancel.tender_id}}"  >


        <div class="media-body">
<div>
<img :src="n.data.user.avatar" class="profile-user " width="20" height="20">
<span>{{n.data.user.name}} </span>
</div> <span class="text-danger ">Cancled </span> The Work in Hvac Tender number {{n.data.request_tender_hvac_cancel.tender_id}}



          <!-- <p    class="m-0 text-dark"><i class="fa fa-clock-o mr-1 "></i>  {{n.added_at}}</p> -->

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
      mounted() {

            this.getUnreadNotificatons();
        },
    methods: {
         markAsRead(n,event){
            axios.put('NotificatonsMarkAsRead',{id:n.id}).then(res=>{
                console.log(res.data);
                if(res.data.msg=="ok"){
                    event.target.classList.remove('text-muted');
                    event.target.classList.add('theme-color');
                }
            }).catch(err=>{
                console.log(err);
            })
        },

        getUnreadNotificatons(){

            axios.get('/AdmingetLastTenNotifications').then(res=>{
                console.log(res.data);
               this.$store.state.notificationlist = res.data;


            }).catch(err=>{
                console.log(err);
            })

        }

    },
computed:{
    ...mapState({


      isAdminLoggedIn:"isAdminLoggedIn"
    }),
    ...mapGetters({

    }),
    notificationlist(){
        return this.$store.state.notificationAdminlist
    },
    IsUser(){
            return this.$store.getters.IsUser
        },
     IsAdmin(){
            return this.$store.getters.IsAdmin
    },
}
})
</script>




<style scoped>
@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);body {
  font-family: "Roboto", sans-serif;
  background: #EFF1F3;
  min-height: 100vh;
  position: relative;
}

.section-50 {
  padding: 50px 0;
}

.m-b-50 {
  margin-bottom: 50px;
}

.dark-link {
  color: #333;
}

.heading-line {
  position: relative;
  padding-bottom: 5px;
}

.heading-line:after {
  content: "";
  height: 4px;
  width: 75px;
  background-color: #29B6F6;
  position: absolute;
  bottom: 0;
  left: 0;
}

.notification-ui_dd-content {
  margin-bottom: 30px;
}

.notification-list {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  padding: 20px;
  margin-bottom: 7px;
  background: #fff;
  -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
          box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
}

.notification-list--unread {
  border-left: 2px solid #29B6F6;
}

.notification-list .notification-list_content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.notification-list .notification-list_content .notification-list_img img {
  height: 48px !important;
  width: 48px !important;
  border-radius: 50px;
  margin-right: 20px;
}

.notification-list .notification-list_content .notification-list_detail p {
  margin-bottom: 5px;
  line-height: 1.2;
}

.notification-list .notification-list_feature-img img {
  height: 48px;
  width: 48px;
  border-radius: 5px;
  margin-left: 20px;
}
 .badge-new{
  color: #ffffff !important;
    background-color: #e74c3c !important;
}

</style>





