<template>
  <div class="container mr-5 mt-5">
            	<section class="section-50">

		<div class="container">
			<h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>

			<div class="notification-ui_dd-content" v-for="(n,i) in notificationlist" :key="i">
      
      <!-- Start consulting User  -->
   

				<div class="notification-list notification-list--unread" v-if="n.data.TenderAccepted">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.Tender_owner.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'project',params: {id: n.data.TenderAccepted.id}}">

							<p><b>{{n.data.Tender_owner.name}}</b>
               {{$t('You_Tender_accepted')}} 
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.TenderAccepted.note.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

        	<div class="notification-list notification-list--unread" v-if="n.data.offer_owner">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.offer_owner.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'project',params: {id: n.data.tender.id}}">

							<p><b>{{n.data.offer_owner.name}}</b>
               {{$t('Add_New_Offer')}} 
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

        
        <div class="notification-list notification-list--unread" v-else-if="n.data.Tender_consulte_reject">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.Tender_consulte_reject.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'project',params: {id: n.data.Tender_consulte_reject.id}}">

							<p><b>{{n.data.Tender_consulte_reject.user.name}}</b>
               {{$t('You_Tender_rejected')}} 
               <span class="badge badge-danger">
                {{$t('Rejected')}}</span>
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.Tender_consulte_reject.note.substr(0,100)}}</p>
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
                  <router-link  :to="{name:'RequesttenderDetails',params: {type:'consulting',id: n.data.request_tender_consulte.id}}">

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


        

<!-- End consulting User -->


<!-- start consatruction user -->
		<div class="notification-list notification-list--unread" v-if="n.data.Tender_Construction_Accepted">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.Tender_Consurction_owner.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'consrDetails',params: {id: n.data.Tender_Construction_Accepted.id}}">

							<p><b>{{n.data.Tender_Consurction_owner.name}}</b>
               {{$t('You_Tender_accepted')}} 
               <span class="badge badge-success">
                {{$t('consturcion')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.Tender_Construction_Accepted.notes.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>



        	<div class="notification-list notification-list--unread" v-if="n.data.tender_construction_owner">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.Company_added_offer_construction.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'consrDetails',params: {id: n.data.offer_construction.construction_id}}">

							<p><b>{{n.data.Company_added_offer_construction.name}}</b>
               {{$t('Add_New_Offer')}} 
                <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('construction')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.offer_construction.textOffer.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

          <div class="notification-list notification-list--unread" v-else-if="n.data.copmany_complete_construction_tender">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.copmany_complete_construction_tender.company.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'RequesttenderDetails',params: {type:'construction',id: n.data.copmany_complete_construction_tender.id}}">

							<p><b>{{n.data.copmany_complete_construction_tender.company.name}}</b>
               {{$t('sent_request')}} 
               <span class="badge badge-info">
                <i class='bx bx-plus-medical'></i></span>
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

        

        
<!-- end consatruction user -->

<!-- Start Consulting  -->
<div class="notification-list notification-list--unread" v-if="n.data.OfferConsulteConfirmed">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'project',params: {id: n.data.OfferConsulteConfirmed.id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('Chooseed_Your_Tender')}} 
               <span class="badge badge-success">
                {{$t('consulting')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.OfferConsulteConfirmed.note.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>
          
          
        <div class="notification-list notification-list--unread" v-if="n.data.CompnyCompleteTheRequest">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.CompnyCompleteTheRequest.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'RequesttenderDetails',params: {type:'consulting',id: n.data.TenderConsulteComplete.id}}">

							<p><b>{{n.data.CompnyCompleteTheRequest.name}}</b>
               {{$t('Complete_Request')}} 
               <span class="badge badge-warning">
                <i class="bx  bxs-star"></i></span>
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



<!-- End Consulting -->


<!-- start construction -->
<div class="notification-list notification-list--unread" v-if="n.data.Offer_Construction_Confirmed">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user_owner_construction_request.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'RequesttenderDetails',params: {type:'construction',id: n.data.tender_confrimed_offer_construction.id}}">

							<p><b>{{n.data.user_owner_construction_request.name}}</b>
               {{$t('Chooseed_Your_Tender')}} 
               <span class="badge badge-success">
                {{$t('construction')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.Offer_Construction_Confirmed.notes.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>


          <div class="notification-list notification-list--unread" v-if="n.data.User_done_construction_tender">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'RequesttenderDetails',params: {type:'construction',id: n.data.User_done_construction_tender.id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('Complete_Request')}} 
               <span class="badge badge-warning">
                <i class="bx  bxs-star"></i></span>
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
          


<!-- End construction -->

<!-- Start hvac  -->
<div class="notification-list notification-list--unread" v-if="n.data.Offer_Hvac_Confirmed">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user_owner_Hvac_request.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'HvacDetails',params: {id: n.data.tender_confrimed_offer_Hvac.id}}">

							<p><b>{{n.data.user_owner_Hvac_request.name}}</b>
               {{$t('Chooseed_Your_Tender')}} 
               <span class="badge badge-success">
                {{$t('hvac')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.tender_confrimed_offer_Hvac.notes.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

         <div class="notification-list notification-list--unread" v-else-if="n.data.copmany_complete_Hvac_tender">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.copmany_complete_Hvac_tender.company.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                  <router-link  :to="{name:'RequesttenderDetails',params: {type:'hvac',id: n.data.copmany_complete_Hvac_tender.id}}">

							<p><b>{{n.data.copmany_complete_Hvac_tender.company.name}}</b>
               {{$t('sent_request')}} 
               <span class="badge badge-info">
                <i class='bx bx-plus-medical'></i></span>
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

                 <div class="notification-list notification-list--unread" v-if="n.data.User_done_Hvac_tender">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'RequesttenderDetails',params: {type:'hvac',id: n.data.User_done_Hvac_tender.id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('Complete_Request')}} 
               <span class="badge badge-warning">
                <i class="bx  bxs-star"></i></span>
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
          
          
     



<!-- End hvac -->

<!-- start stone  -->
<div class="notification-list notification-list--unread" v-if="n.data.Offer_Stone_Confirmed">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user_owner_Stone_request.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'StoneDetails',params: {id: n.data.Offer_Stone_Confirmed.id}}">

							<p><b>{{n.data.user_owner_Stone_request.name}}</b>
               {{$t('Chooseed_Your_Tender')}} 
               <span class="badge badge-success">
                {{$t('stone')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.Offer_Stone_Confirmed.notes.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>


<!-- end stone -->

<!-- start user hvac -->
<div class="notification-list notification-list--unread" v-if="n.data.tender_hvac_accepted">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'HvacDetails',params: {id: n.data.tender_hvac_accepted.id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('You_Tender_accepted')}} 
               <span class="badge badge-success">
                {{$t('hvac')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.tender_hvac_accepted.notes.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

        	<div class="notification-list notification-list--unread" v-if="n.data.New_Offer_Hvac">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'HvacDetails',params: {id: n.data.New_Offer_Hvac.tender_id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('Add_New_Offer')}} 
                <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('hvac')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.New_Offer_Hvac.textOffer.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

        




<!-- End user hvac -->



<!-- start user stone -->
<div class="notification-list notification-list--unread" v-if="n.data.TenderStoneAccepted">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.TenderStoneAccepted.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'StoneDetails',params: {id: n.data.TenderStoneAccepted.id}}">

							<p><b>{{n.data.TenderStoneAccepted.user.name}}</b>
               {{$t('You_Tender_accepted')}} 
               <span class="badge badge-success">
                {{$t('stone')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.TenderStoneAccepted.notes.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>

         	<div class="notification-list notification-list--unread" v-if="n.data.New_Offer_stone">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
							<img :src="n.data.user.avatar" alt="user">
						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'StoneDetails',params: {id: n.data.New_Offer_stone.tender_id}}">

							<p><b>{{n.data.user.name}}</b>
               {{$t('Add_New_Offer')}} 
                <span class="badge badge-new">
                {{$t('new')}}</span>
               <span class="badge badge-success">
                {{$t('stone')}}</span>
                </p>
                 </router-link>
							<p class="text-muted">{{n.data.New_Offer_stone.textOffer.substr(0,100)}}</p>
							<p class="text-muted"><small>{{n.added_at}}</small></p>
						</div>
              
					</div>
					<div class="notification-list_feature-img">
					<a  :class="n.raed_at ? 'text-muted':'theme-color'" @click="markAsRead(n,$event)">
            	<i class="fas fa-check-circle fa-2x"></i>
          </a>
					</div>
         
				</div>
        

        

<!-- End user hvac -->



				
        
        
	<!-- start review -->
         <div class="notification-list notification-list--unread" v-if="n.data.review">
					<div class="notification-list_content">
              
						<div class="notification-list_img">
												<img :src="n.data.review.avatar" alt="user">

						</div>
						<div class="notification-list_detail">
                <router-link  :to="{name:'RequesttenderDetails',params: {type:type,id: n.data.user.request_id}}">

							<p><b>{{n.data.review.name}}</b>
               {{$t('Added_review')}} 
               <span class="badge badge-warning">
                <i class="bx  bxs-star"></i>
                <i class="bx  bxs-star"></i>
                <i class="bx  bxs-star"></i>
                <i class="bx  bxs-star"></i>
                </span>
               <span class="badge badge-success">
                {{$t(type)}}</span>
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

			<!-- <div class="text-center">
				<a href="#!" class="dark-link">Load more activity</a>
			</div> -->

		</div>
	</section>
  
  </div>
</template>

<script>
export default {
    date(){
        return{
            notifications:[],
            type:null,
        }
    },
    mounted() {
        this.getAllNotification();
    },
   
    methods: {
       TyPeReview(){
      if(this.IsUser==6){
        this.type='construction'
      }
       if(this.IsUser==1){
                 this.type='consulting'
        
      }
         if(this.IsUser==4){
                 this.type='hvac'
        
      }
         if(this.IsUser==5){
                 this.type='stone'
        
      }
     
    },
        markAsRead(n,event){
            axios.put('NotificatonsMarkAsRead',{id:n.id}).then(res=>{
                console.log(res.data);
                if(res.data.msg=="ok"){
                    event.target.classList.remove('text-danger');
                    event.target.classList.add('text-success');
                }
            }).catch(err=>{
                console.log(err);
            })
        },

        getAllNotification(){
            axios.get('/getAllNotificatons')
            .then(res=>{
                this.$store.state.notificationlist = res.data;
            })
        }
    },
    computed:{
    notificationlist(){
        return this.$store.state.notificationlist
    },
      IsUser(){
            return this.$store.getters.IsUser
        },
    },
    created(){
      this.TyPeReview();
    }
}
</script>

<style scoped>
.media{
    padding:10px;
}
</style>





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

.notification-list .notification-list_feature-img img  , .reviwing{
  height: 48px;
  width: 48px;
  border-radius: 5px;
  margin-left: 20px;
}

 .badge-new{
  color: #ffffff !important;
    background-color: #e74c3c !important;
}
.reviwing{
  position: relative;
}
.reviwing i{
      position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
</style>