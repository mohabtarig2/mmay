<template>
<div class="mt-3 container " :dir="$t('directions')" :class="$t('text_align')">
    
         <div class="modal fade" id="successBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

   <div class="alert alert-info alert-dismissible fade show" role="alert">
{{alertMessage}}
  <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  </div>
</div>
<div class="row">


    <div class="col-md-12">
          <span v-if="request_type=='stone'">
<div class="" v-for="offer , index in data" :key=index>

    <div class="p-descrip-box" v-for="confirm , index in offer.confirm" :key=index>




<a @click="Tenderredirct(confirm.tender.id)" class=" text-dark h5 mb-3 font-weight-bold" style="cursor:pointer">{{confirm.tender.title}}
    <i class="fas fa-external-link-alt grey"></i>
</a>


      <stages :stage="confirm.tender.stage" ></stages>



      <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">الوصف </div>
            <p class="text-right">{{confirm.tender.notes}}</p>

      </div>

  <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">البنود المشمولة </div>
            <p class="text-right">{{confirm.items}}</p>

      </div>



          <div class="p-descrip-box mt-4 text-right">
           <div class=" h5 mb-3 font-weight-bold text-right">المقترح </div>
            <span v-for="image ,index in confirm.image" :key="index">
            <a :href="image.path" class="text-dark"><i class="fa fa-file grey mr-2 ml-2"></i>{{image.name}} </a>

            </span>

      </div>

        <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right"> هل تم اعتماد جدول مواصفات الاستشاري   </div>
            <p class="text-right" v-if="confirm.Approval==1">نعم</p>
            <p class="text-right" v-if="confirm.Approval==0">لا</p>

      </div>

             <div class=" mt-3 p-descrip-box text-center">
                 <div  v-if="IsUser==10">
                      <img :src="confirm.user.avatar" width="50" class="rounded-circle mx-auto " >
                      {{confirm.user.name}}
                 </div>
                     <span  v-for="buyer , index in confirm.buyer" :key=index>
                 <div  v-if="IsUser!=10">
                      <img :src="buyer.user.avatar" width="50" height="50" class="rounded-circle mx-auto " >
                      {{buyer.user.name}}
                 </div>
                     </span>
                       <span class="text-muted">  رقم الطلب  {{offer.id}}</span>
<div  v-if="IsUser==10">

    <div v-if="offer.reason_user==null  ">

<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#done"
 v-if="offer.com_confirm==1 && offer.user_confirm==0  && user_help!==1">
 <i class="fa fa-check-circle-o"></i>
 confirm Complete Project</button>

 <button    class="theme-btn  text-right confirm"
 v-if="offer.com_confirm==0 && offer.reason_user!=null && offer.user_confirm!==1" disabled > Wating Company To complete</button>

 <button    class="theme-btn  text-right confirm"
 v-if="offer.com_confirm==1 && offer.reason_user!=null && offer.user_confirm==1 || user_help==1" disabled > Done!</button>
<button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel"
 v-if="offer.user_confirm==0 && user_help!==1"><i class="fas fa-times"></i> Cancel Project</button>
</div>
<div v-else>
<div class="badge badge-danger" v-if="offer.reason_com=null">Wating the Company To Cancel</div>
<div class="badge badge-danger" v-else>Cancel</div>
</div>

</div>

<div  v-if="IsUser!=10">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==0  && offer.user_confirm==0  " ><i class="fa fa-check-circle-o" ></i> Complete!</button>
<button    class="theme-btn primary text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 &&
 offer.user_confirm==0  " disabled ><i class="fa fa-check-circle-o" ></i>  Wating Company To complete!</button>
<button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel" v-if="offer.com_confirm==0 " ><i class="fas fa-times"></i> Cancel Project</button>


<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 && offer.user_confirm==1" disabled><i class="fa fa-check-circle-o" ></i>     Done!</button>
</div>

                                <div v-show="offer.review==null">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review"
v-show=" offer.result!=null  " ><i class="bx bxs-star" ></i>      اضف تقييم</button>


<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5)"></i>


          </div>
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(offer.user_id,offer.com_id,offer.id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
</div>

<div v-if="offer.review" >
  	<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">Rating & Reviews</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">1 Review</h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.review.rating"></review>

											</div>
										</div>
										<p>{{offer.review.content}}</p>
										<span v-if="offer.review_added_at">{{offer.review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>


                </div>

<div class="mt-5 ">

        <span> <i  class="fa fa-clock grey"></i>  {{offer.added_at}}</span>

</div>


</div>
</div>


<!-- Modal -->
<div class="modal fade" id="done" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
       هل انت متأكد تريد تأكيد هذا الطلب ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right "  @click="user_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser!=10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
       هل أنت متأكد تريد أكمال هذا المشروع ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right " @click="com_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="form-group">
          <h6>
       هل انت متأكد تريد إلغاء هذا الطلب


        <strong>  :: السبب  </strong>
          </h6>

        <textarea class="form-control" rows="6" v-model="reason" @input="ontype()" :class="[{'is-invalid': errorFor('reason_cancel')}]" style="background: #eee;" :maxlength="maxlength">

        </textarea>
        <small>{{value}}/{{maxlength}}</small>
        <div class="invalid-feedback" v-for="(error, index) in errorFor('reason_cancel')" :key="'reason_cancel' + index" >{{ error }}</div>
         <!-- <button type="button" class="theme-btn  text-right mt-2" @click="cancel_user()" v-if="IsUser==10" :disabled="reason==null  ">Confirm </button> -->
         <button type="button" class="theme-btn  text-right" @click="cancel_com()" v-if="IsUser==1">Confirm </button>
             </div>






    </div>
  </div>
</div>
    </span>
    <span v-if="request_type=='interior'">
<div class="" v-for="offer , index in data" :key=index>

    <div class="p-descrip-box" v-for="confirm , index in offer.confirm" :key=index>




<a @click="Tenderredirct(confirm.tender.id)" class=" text-dark h5 mb-3 font-weight-bold" style="cursor:pointer">{{confirm.tender.title}}
    <i class="fas fa-external-link-alt grey"></i>
</a>


      <stages :stage="confirm.tender.stage" ></stages>



      <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">الوصف </div>
            <p class="text-right">{{confirm.tender.notes}}</p>

      </div>

  <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">البنود المشمولة </div>
            <p class="text-right">{{confirm.items}}</p>

      </div>



          <div class="p-descrip-box mt-4 text-right">
           <div class=" h5 mb-3 font-weight-bold text-right">المقترح </div>
            <span v-for="image ,index in confirm.image" :key="index">
            <a :href="image.path" class="text-dark"><i class="fa fa-file grey mr-2 ml-2"></i>{{image.name}} </a>

            </span>

      </div>

        

             <div class=" mt-3 p-descrip-box text-center">
                 <div  v-if="IsUser==10">
                      <img :src="confirm.user.avatar" width="50" class="rounded-circle mx-auto " >
                      {{confirm.user.name}}
                 </div>
                     <span  v-for="buyer , index in confirm.buyer" :key=index>
                 <div  v-if="IsUser!=10">
                      <img :src="buyer.user.avatar" width="50" height="50" class="rounded-circle mx-auto " >
                      {{buyer.user.name}}
                 </div>
                     </span>
                       <span class="text-muted">  رقم الطلب  {{offer.id}}</span>
<div  v-if="IsUser==10">

    <div v-if="offer.reason_user==null  ">

<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#done"
 v-if="offer.com_confirm==1 && offer.user_confirm==0  && user_help!==1">
 <i class="fa fa-check-circle-o"></i>
 confirm Complete Project</button>

 <button    class="theme-btn primary text-right confirm"
 v-if="offer.com_confirm==0 && offer.user_confirm!==1" disabled > Wating Company To complete</button>

 <button    class="theme-btn  text-right confirm"
 v-if="offer.com_confirm==1 && offer.user_confirm==1 || user_help==1" disabled > Done!</button>
<button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel"   v-if="offer.user_confirm==0 && user_help!==1"><i class="fas fa-times"></i> Cancel Project</button>
</div>
<div v-else>
<div class="badge badge-danger">ملغي</div>
</div>

</div>

<div  v-if="IsUser!=10">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==0  && com_help!==1 && offer.user_confirm==0  " ><i class="fa fa-check-circle-o" ></i> Complete!</button>
<button    class="theme-btn primary text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 && offer.user_confirm==0 " d ><i class="fa fa-check-circle-o" ></i>  Wating Company To complete!</button>
<button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel" v-if="offer.com_confirm==0 && com_help!==1" ><i class="fas fa-times"></i> Cancel Project</button>


<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 && offer.user_confirm==1" disabled><i class="fa fa-check-circle-o" ></i>     Done!</button>
</div>



                </div>

                                <div v-show="offer.review==null">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review"
v-show=" offer.result!=null  " ><i class="bx bxs-star" ></i>     اضف تقييم</button>


<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5)"></i>


          </div>
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(offer.user_id,offer.com_id,offer.id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
</div>

<div v-if="offer.review" >
  	<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">Rating & Reviews</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">1 Review</h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.review.rating"></review>

											</div>
										</div>
										<p>{{offer.review.content}}</p>
										<span v-if="offer.review_added_at">{{offer.review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>

<div class="mt-5 ">

        <span> <i  class="fa fa-clock grey"></i>  {{offer.added_at}}</span>

</div>


</div>
</div>


<!-- Modal -->
<div class="modal fade" id="done" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
       Are You Sure You Want Confirm For This Request?
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right "  @click="user_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser!=10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
       Are You Sure You Complete  This Project?
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right " @click="com_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="form-group">
          <h6>
       هل انت متأكد تريد إلغاء هذا الطلب


        <strong>  The Reason : </strong>
          </h6>

        <textarea class="form-control" rows="6" v-model="reason" @input="ontype()" :class="[{'is-invalid': errorFor('reason_cancel')}]" style="background: #eee;" :maxlength="maxlength">

        </textarea>
        <small>{{value}}/{{maxlength}}</small>
        <div class="invalid-feedback" v-for="(error, index) in errorFor('reason_cancel')" :key="'reason_cancel' + index" >{{ error }}</div>
         <button type="button" class="theme-btn  text-right mt-2" @click="cancel_user()" v-if="IsUser==10"
         :disabled="reason==null  ">Confirm </button>
         <button type="button" class="theme-btn  text-right mt-3" @click="cancel_com()" v-if="IsUser==4">Confirm </button>
             </div>






    </div>
  </div>
</div>
    </span>

     <span v-if="request_type=='hvac'">
<div class="" v-for="offer , index in data" :key=index>

    <div class="p-descrip-box" v-for="confirm , index in offer.confirm" :key=index>




<a @click="Tenderredirct(confirm.tender.id)" class=" text-dark h5 mb-3 font-weight-bold" style="cursor:pointer">{{confirm.tender.title}}
    <i class="fas fa-external-link-alt grey"></i>
</a>


      <stages :stage="confirm.tender.stage" ></stages>



      <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">الوصف </div>
            <p class="text-right">{{confirm.tender.notes}}</p>

      </div>

  <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">البنود المشمولة </div>
            <p class="text-right">{{confirm.items}}</p>

      </div>



          <div class="p-descrip-box mt-4 text-right">
           <div class=" h5 mb-3 font-weight-bold text-right">المقترح </div>
            <span v-for="image ,index in confirm.image" :key="index">
            <a :href="image.path" class="text-dark"><i class="fa fa-file grey mr-2 ml-2"></i>{{image.name}} </a>

            </span>

      </div>

        <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right"> هل تم اعتماد جدول مواصفات الاستشاري   </div>
            <p class="text-right" v-if="confirm.Approval==1">نعم</p>
            <p class="text-right" v-if="confirm.Approval==0">لا</p>

      </div>

             <div class=" mt-3 p-descrip-box text-center">
                 <div  v-if="IsUser==10">
                      <img :src="confirm.user.avatar" width="50" class="rounded-circle mx-auto " >
                      {{confirm.user.name}}
                 </div>
                     <span  v-for="buyer , index in confirm.buyer" :key=index>
                 <div  v-if="IsUser!=10">
                      <img :src="buyer.user.avatar" width="50" height="50" class="rounded-circle mx-auto " >
                      {{buyer.user.name}}
                 </div>
                     </span>
                       <span class="text-muted">  رقم الطلب  {{offer.id}}</span>
<div  v-if="IsUser==10">

    <div v-if="offer.reason_user==null  ">

<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#done"
 v-if="offer.com_confirm==1 && offer.user_confirm==0  && user_help!==1">
 <i class="fa fa-check-circle-o"></i>
 confirm Complete Project</button>

 <button    class="theme-btn primary text-right confirm"
 v-if="offer.com_confirm==0 && offer.user_confirm!==1" disabled > Wating Company To complete</button>

 <button    class="theme-btn  text-right confirm"
 v-if="offer.com_confirm==1 && offer.user_confirm==1 || user_help==1" disabled > Done!</button>
<button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel"   v-if="offer.user_confirm==0 && user_help!==1"><i class="fas fa-times"></i> Cancel Project</button>
</div>
<div v-else>
<div class="badge badge-danger">ملغي</div>
</div>

</div>

<div  v-if="IsUser!=10">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==0  && com_help!==1 && offer.user_confirm==0  " ><i class="fa fa-check-circle-o" ></i> Complete!</button>
<button    class="theme-btn primary text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 && offer.user_confirm==0 " d ><i class="fa fa-check-circle-o" ></i>  Wating Company To complete!</button>
<button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel" v-if="offer.com_confirm==0 && com_help!==1" ><i class="fas fa-times"></i> Cancel Project</button>


<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 && offer.user_confirm==1" disabled><i class="fa fa-check-circle-o" ></i>     Done!</button>
</div>



                </div>

                                <div v-show="offer.review==null">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review"
v-show=" offer.result!=null  " ><i class="bx bxs-star" ></i>     اضف تقييم</button>


<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5)"></i>


          </div>
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(offer.user_id,offer.com_id,offer.id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
</div>

<div v-if="offer.review" >
  	<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">Rating & Reviews</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">1 Review</h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.review.rating"></review>

											</div>
										</div>
										<p>{{offer.review.content}}</p>
										<span v-if="offer.review_added_at">{{offer.review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>

<div class="mt-5 ">

        <span> <i  class="fa fa-clock grey"></i>  {{offer.added_at}}</span>

</div>


</div>
</div>


<!-- Modal -->
<div class="modal fade" id="done" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
       Are You Sure You Want Confirm For This Request?
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right "  @click="user_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser!=10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
       Are You Sure You Complete  This Project?
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right " @click="com_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="form-group">
          <h6>
       هل انت متأكد تريد إلغاء هذا الطلب


        <strong>  The Reason : </strong>
          </h6>

        <textarea class="form-control" rows="6" v-model="reason" @input="ontype()" :class="[{'is-invalid': errorFor('reason_cancel')}]" style="background: #eee;" :maxlength="maxlength">

        </textarea>
        <small>{{value}}/{{maxlength}}</small>
        <div class="invalid-feedback" v-for="(error, index) in errorFor('reason_cancel')" :key="'reason_cancel' + index" >{{ error }}</div>
         <button type="button" class="theme-btn  text-right mt-2" @click="cancel_user()" v-if="IsUser==10"
         :disabled="reason==null  ">Confirm </button>
         <button type="button" class="theme-btn  text-right mt-3" @click="cancel_com()" v-if="IsUser==4">Confirm </button>
             </div>






    </div>
  </div>
</div>
    </span>

    <span v-if="request_type=='construction'">
<div class="" v-for="offer , index in data" :key=index>

    <div class="p-descrip-box" v-for="confirm , index in offer.confirm" :key=index>




<a @click="Tenderredirct(confirm.tender.id)" class=" text-dark h5 mb-3 font-weight-bold" style="cursor:pointer">{{confirm.tender.title}}
    <i class="fas fa-external-link-alt grey"></i>
</a>


      <stages :stage="confirm.tender.stage" ></stages>



      <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">الوصف </div>
            <p class="text-right">{{confirm.tender.notes}}</p>

      </div>

  <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right">البنود المشمولة </div>
            <p class="text-right">{{confirm.textOffer}}</p>

      </div>



          <div class="p-descrip-box mt-4 text-right">
           <div class=" h5 mb-3 font-weight-bold text-right">المقترح </div>
            <span v-for="image ,index in confirm.image" :key="index">
            <a :href="image.path" class="text-dark"><i class="fa fa-file grey mr-2 ml-2"></i>{{image.name}} </a>

            </span>

      </div>

        <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right"> هل تم اعتماد جدول مواصفات الاستشاري   </div>
            <p class="text-right" v-if="confirm.Approval==1">نعم</p>
            <p class="text-right" v-if="confirm.Approval==0">لا</p>

      </div>

             <div class=" mt-3 p-descrip-box text-center">
                 <div  v-if="IsUser==10">
                      <img :src="confirm.user.avatar" width="50" class="rounded-circle mx-auto " >
                      {{confirm.user.name}}
                 </div>

                     <span  v-for="buyer , index in confirm.buyer" :key=index>
                 <div  v-if="IsUser==6">
                      <img :src="buyer.user.avatar" width="50" height="50" class="rounded-circle mx-auto " >
                      {{buyer.user.name}}
                 </div>
                     </span>
                       <span class="text-muted">  رقم الطلب  {{offer.id}}</span>
<div  v-if="IsUser==10">

    <div v-if="offer.reason_user==null  ">

<button    class="theme-btn text-right confirm" data-toggle="modal" data-target="#done"
 v-if="offer.com_confirm==1 && offer.user_confirm==0 && offer.result==null ">
 <i class="fa fa-check-circle-o"></i>
 التأكيد على إكمال الطلب</button>

 <button    class="theme-btn primary  text-right confirm"
 v-if="offer.com_confirm==0 && offer.user_confirm!==1" disabled >انتظار الطرف الثاني لاكمال الطلب</button>

 <button    class="theme-btn primary text-right confirm"
 v-if="offer.com_confirm==1 && offer.user_confirm==1 " disabled > Done!</button>
<button class="theme-btn primary  text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel"
 v-if="offer.user_confirm==0 "><i class="fas fa-times"></i> إلغاء المشروع </button>
</div>
<div v-else>
<div class="badge badge-danger">ملغي</div>
</div>

</div>

<div  v-if="IsUser==6">
<button    class="theme-btn text-right confirm" data-toggle="modal" data-target="#Complete"
  v-if="offer.com_confirm==0  &&  offer.user_confirm==0  && offer.result==null" ><i class="fa fa-check-circle-o" ></i>إكمال</button>
<button    class="theme-btn primary text-right confirm" data-toggle="modal" data-target="#Complete"
 v-if="offer.com_confirm==1 && offer.user_confirm==0 && offer.result==null" ><i class="fa fa-check-circle-o" ></i>  انتظر حتي يقوم المالك بالتأكيد</button>
<button class="theme-btn primary  text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel"
v-if="offer.com_confirm==0 " ><i class="fas fa-times"></i> إلغاء المشروع </button>


<button   class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==1 && offer.user_confirm==1" disabled><i class="fa fa-check-circle-o" ></i>     Done!</button>
</div>


                </div>
                <div v-show="offer.review==null">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review"
v-show=" offer.result!=null  " ><i class="bx bxs-star" ></i>     اضف تقييم</button>


<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5)"></i>


          </div>
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(offer.user_id,offer.com_id,offer.id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
</div>

<div v-if="offer.review" >
  	<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">Rating & Reviews</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">1 Review</h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.review.rating"></review>

											</div>
										</div>
										<p>{{offer.review.content}}</p>
										<span v-if="offer.review_added_at">{{offer.review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>

<div class="mt-5 ">

        <span> <i  class="fa fa-clock grey"></i>  {{offer.added_at}}</span>

</div>


</div>
</div>


<!-- Modal -->
<div class="modal fade" id="done" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
      هل أنت متأكد انك تريد اكمال المشروع ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right "  @click="user_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==6">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
          هل انت متأكد انك تريد اكمال المشروع !
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn text-right " @click="com_confirm()" :disabled="loading">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="form-group">
          <h6>
     هل انت متاكد انك تريد الغاء هذا المشروع ؟



          </h6>

        <textarea class="form-control" rows="6" v-model="reason" @input="ontype()" :class="[{'is-invalid': errorFor('reason_cancel')}]" style="background: #eee;" :maxlength="maxlength">

        </textarea>
        <small>{{value}}/{{maxlength}}</small>
        <div class="invalid-feedback" v-for="(error, index) in errorFor('reason_cancel')" :key="'reason_cancel' + index" >{{ error }}</div>
         <button type="button" class="theme-btn text-right mt-2" @click="cancel_user()"
          v-if="IsUser==10" :disabled="reason==null || loading ">تأكيد </button>
         <button type="button" class="theme-btn primary text-right" @click="cancel_com()" v-if="IsUser==6"
         :disabled="reason==null || loading">
             تأكيد </button>
             </div>






    </div>
  </div>
</div>
    </span>



     <span v-if="request_type=='consulting'">
<div class="" v-for="offer , index in data" :key="index">

    <div class="" v-for="confirm , index in offer.confirm" :key="index">

   <h1>المرحلة الاولى</h1>
            <h4 class="theme-color">
              
      <i class="fas fa-check-circle text-success" ></i>
         الطلب 
      </h4>

                    <div class="p-descrip-box">
                                   

  <div class=" h5 mb-3 title">
              <router-link class="theme-color h4 " target="_blank" 
           :to="{name:'project',params:{id:confirm.tender.id}}" >
            {{confirm.tender.title}}
            <i class="fas fa-external-link-alt grey"></i>
           
           </router-link>
           
        </div>
        <div class="list-item">
        <span class="text-dark"><i  class="fa fa-bookmark grey"></i>   رقم الطلب : {{offer.id}}</span>
        <span class="text-dark"><i  class="fa fa-user grey"></i>  
        <span v-if="IsUser==1">
               المشتري : 
               <span v-for="buyer , index in confirm.buyer " :key="index" >{{buyer.user.name}}
               </span>

          </span>
          <span v-if="IsUser==10">
               البائع : {{name_eng = confirm.user.name}}

          </span>
              <!-- <span v-if="IsUser==10" >
 البائع :
<router-link  class="theme-color" :to="{name:'CompanyProfile',params:{id:request.company.id,type:'consulting'}}" target="_blank">

                {{request.company.company.company_ar}}
</router-link>


          </span> -->
        </span>

        <span class="text-dark" v-if="confirm.budget"><i  class="fa fa-money grey"></i>  الميزانية :
         {{confirm.budget}}{{$t('aed')}}</span>
        <span class="text-dark"> <i  class="fa fa-clock grey"></i>وقت الطلب :{{offer.added_at}}</span>
        </div>
                </div>
                <!-- end of new commpnent -->




      <!-- <stages :stage="confirm.tender.stage" ></stages> -->

<div class="row">
  <div class="col-md-8">

  <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right theme-color">وصف المشروع </div>
            <p class="text-right">{{confirm.tender.note}}</p>

      </div>


<div class="p-descrip-box" >
       <h1>المرحلة الثانية </h1>
    <h4 class=theme-color>
     
      <i class="fas fa-check-circle text-success" ></i>
       عرض الاستشاري 
    </h4>
      
          <div class=" mt-4 text-right">
           <div class=" h5 mb-3 font-weight-bold text-right theme-color">العرض المقترح </div>
           {{confirm.comment}}


      </div>

        <div class="p-descrip-box mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right theme-color"> تفاصيل  </div>
           <table class="table font-weight-bold " :dir="$t('directions')">
  <thead class="thead">
    <tr>
      <th scope="col">التكلفة التقريبية</th>
      <th scope="col">{{confirm.budget}}{{$t('aed')}}</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">إشراف</th>
     
      <td colspan="4">{{confirm.Supervisor}}{{$t('aed')}}</td>

    </tr>
    <tr>
      <th scope="row">مساحة البناء</th>
      <td colspan="4">{{confirm.TotalAreaBuild}} <small class="text-muted">قدم مربع</small> </td>

    </tr>
    <tr>
           <th scope="col">التصميم</th>
      <th scope="col">{{confirm.design}}{{$t('aed')}}</th>

    </tr>
  </tbody>
</table>

                <div  v-if="IsUser==10">

    <div v-if="offer.reason_user==null   ">

<button    class="theme-btn text-right confirm" data-toggle="modal" data-target="#done"
 v-if="offer.com_confirm==1 && offer.user_confirm==0 ">
 <i class="fa fa-check-circle-o"></i>
 تأكيد طلب الاكمال </button>

 <button    class="theme-btn text-right confirm"
 v-if="offer.com_confirm==0 && offer.user_confirm!==1 && offer.reason_com==null" disabled="disabled" >
 انتظار رد الشركة
  </button>

  <button class="theme-btn primary text-right ml-2 mr-2"  data-toggle="modal" data-target="#cancel"
  v-show=" offer.result==null" ><i class="fas fa-times"></i> الغاء المشروع  </button>
</div>
<div v-else>
<div class="badge badge-danger" v-if="offer.reason_com==null">انتظار الشركة لي الغاء الطلب    </div>
<div class="badge badge-danger" v-else>ملغي</div>
</div>

</div>

<div  v-if="IsUser==1">

    <div v-if="offer.result!='cancel'">
<button    class="theme-btn text-right confirm" data-toggle="modal" data-target="#Complete"  v-if="offer.com_confirm==0
&& com_help!==1 && offer.user_confirm==0  && offer.reason_user==null " ><i class="fa fa-check-circle-o" ></i> طلب اكمال</button>
<button    class="theme-btn primary text-right confirm" data-toggle="modal" data-target="#Complete"
v-if="offer.com_confirm==1 && offer.user_confirm==0  " disabled >
<i class="fa fa-check-circle-o" ></i>  انتظار رد المالك للاكمال </button>
    </div>

<button class="theme-btn primary text-right ml-2 mr-2"
        data-toggle="modal" data-target="#cancel" v-show=" offer.result==null  " >
    <i class="fas fa-times"></i> الغاء المشروع
    </button>


<!-- <button    class="theme-btn primary  text-right confirm"
v-show=" offer.result!=null  " disabled ><i class="fa fa-check-circle-o text-light" ></i>     تم الانتهاء من الطلب </button> -->

<!-- <div class="badge badge-danger" v-if="offer.reason_user=null">Wating the owner To Cancel</div> -->
<div class="badge badge-danger" v-if="offer.reason_user!=null && offer.reason_com!=null">ملغي</div>
</div>

      </div>

      
      
<div v-if="offer.com_confirm!=null && offer.user_confirm!=null">

      <div class="form-group second-stage"  >
            <h1>المرحلة الثالثة</h1>
            <div class="p-descrip-box">
            <h4 class="theme-color">
               <i class="fas fa-check-circle text-secondary" :class="{'text-success':offer.contract!=null}" ></i>
      عقد الاستشاري </h4>
      

           <span v-if="offer.contract==null" >
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png )</small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
        
                <div class="modal fade" id="Contractfile" v-if="offer.contract==null" 
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد الاستشاري</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.cont" v-if="Contracts==null">
                   <span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.cont" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الاستشاري</span>
                <input type="file" class="form-control"  @change.prevent="ContaractFile($event)" style="display:none" ref="cont">

               <div class=" text-danger" v-if="FileNotContractsAllowd!=null">{{FileNotContractsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultContractsSize" @click="RemoveFile('Contracts')"></span>
<span v-if="resultContractsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultContractsName}}</span>
<span v-if="resultContractsSize!=null"  class="float-right">{{resultContractsSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('contract')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1  "  class="btn btn-light"  
                data-toggle="modal" data-target="#Contractfile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else>
               <p class="alert alert-light"> 
              <a :href="offer.contract.ContractPath" target="_blank" class="btn btn-success">
                <i class="fa fa-eye"></i>
                عرض
              
              </a>
              </p>



        </span>
            </div>
 
 
            <div  v-if="offer.contract">
              <h1>المرحلة الرابعة</h1>
            <div >
             <h4 class="theme-color"> 
                     <i class="fas fa-check-circle text-success" ></i>

               ملفات المشروع </h4>
                            <form  class="c-form-inner" style="background:#fff;padding:16px">



<span v-for="tender,index in offer.saved_tenders " :key="index">
  <div class="p-descrip-box">
    <label class="theme-color"> عنوان </label>

    <div v-if="tender.title!=null">
<p class="">{{tender.title}}  </p>
    </div>

<div v-else-if="tender.title==null" >

         <div class="form-group" v-show="IsUser==1">
    <input class="form-control mb-2" type="text" placeholder="وصف مختصر للمشروع" 
     v-model="title" :class="[{'is-invalid': errorFor('title')}]">
   
            <button  class="btn btn-download" :disabled='title.length  <=  4' @click.prevent="saveTinder('title',tender.id)">حفظ</button>
             </div>
             <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لكتب عنوان وصف مختصر
             </div>
    </div>

    <div v-if="tender.notes!=null" class="container">
        <label class="theme-color"> وصف </label>

<p class="text-lg-start">{{tender.notes}}  </p>

    </div>
    <div v-else >
<div v-show="IsUser==1">
    <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color">الوصف</label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="4"
                    v-model="notes"
                    :class="[{'is-invalid': errorFor('Notes')}]"
                      placeholder=" أدخل وصفاً مفصلاً لمشروعك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
                <button  class="btn btn-download" :disabled='notes.length  <=  100
            ' @click.prevent="saveTinder('notes',tender.id)">حفظ</button>
    </div>
<div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لكتب وصف مختصر
             </div>
    </div>
       


  <div v-if="tender.threeDName!=null" class="alert alert-light">
        <label class="theme-color"> ملف الثري دي PDF </label>

<div class="thm-color  container">
  <a :href="tender.threeDPath" target="_blank" class="btn btn-success">
 
    <i class="fa fa-eye"></i>
عرض
 
    </a>
    </div>

    </div>
    <div v-else class="file-style" >
      <div v-show="IsUser==1"  >
        ملف الثري دي
        <button @click.prevent="HandleFile('threed',tender.id)" class="btn btn-download "  data-toggle="modal" 
        data-target="#editFile">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>

               <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف الثري دي 
             </div>
    </div>

      <div v-if="tender.ThreeDDWG!=null" class="alert alert-light">
        <label class="theme-color"> ملف الثري دي AutoCad </label>

<div class="thm-color  container"><a :href="tender.ThreeDDWG" download="download" class="btn btn-secondary">
<i class='bx bxs-down-arrow-circle' ></i>    تحميل
    </a>
    </div>

    </div>
    <div v-else class="file-style" >
      <div v-show="IsUser==1"  >

                 ملف الثري دي
 الاوتوكاد<button @click.prevent="HandleFile('threedDwg',tender.id)" class="btn btn-success "  data-toggle="modal" data-target="#editFileDwg">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>

               <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف الثري ديAutoCad     
             </div>
    </div>



     <div v-if="tender.ArchitectName!=null" class="alert alert-light">
        pdf <label> ملف المخططات المعمارية   </label>

<div class="thm-color  container">
  <a :href="tender.ArchitectPath" target="_blank" class="btn btn-success">
 
    <i class="fa fa-eye"></i>
    عرض
    </a>
    </div>

    </div>
    <div v-else class="file-style">
      <div   v-show="IsUser==1">
pdf    ملف المخططات المعمارية
        <button @click.prevent="HandleFile('Architect',tender.id)" class="btn btn-download "
          data-toggle="modal" data-target="#editFileArch">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>
      
               <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف المخططات   
             </div>
    </div>






         <div v-if="tender.ArchitectDWG!=null" class="alert alert-light">
        AUTOCAD <label> ملف المخططات المعمارية   </label>

<div class="thm-color  container"><a :href="tender.ArchitectDWG" target="_blank" class="btn btn-secondary">
  <i class='bx bxs-down-arrow-circle' ></i>
 تحميل
    </a>
    </div>

    </div>
    <div v-else class="file-style">
      <div   v-show="IsUser==1">
autocad    ملف المخططات المعمارية
        <button @click.prevent="HandleFile('Architect',tender.id)" class="btn btn-download "
          data-toggle="modal" data-target="#editFileArchDWG">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>
      
               <div v-if="IsUser==10" class="text-danger">
         autocad       إنتظار الاستشاري لرفع  ملف المخططات   
             </div>
    </div>
    
      <div v-if="tender.servicesName!=null" class="alert alert-light">
        <label> ملف الخدمات    </label>

<div class="thm-color  container"><a :href="tender.servicesPath" download="download" class="btn btn-success">
<i class='fa fa-eye' ></i>    عرض
    </a>
    </div>

    </div >
    <div v-else  class="file-style">
      <div  v-show="IsUser==1">
    ملف الخدمات
        <button @click.prevent="HandleFile('Services',tender.id)" class="btn btn-success "
          data-toggle="modal" data-target="#editFileServic">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>
         <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف الخدمات   
             </div>
    </div>

       <div v-if="tender.servicesDWG!=null" class="alert alert-light">
        <label> ملف الخدمات  اوتوكاد  </label>

<div class="thm-color  container"><a :href="tender.servicesDWG" target="_blank" class="btn btn-secondary">
  <i class='bx bxs-down-arrow-circle' ></i>
    تحميل
    </a>
    </div>

    </div >
    <div v-else  class="file-style">
      <div  v-show="IsUser==1">
    ملف الخدمات اوتوكاد
        <button @click.prevent="HandleFile('Services',tender.id)" class="btn btn-download "  data-toggle="modal" data-target="#editFileSErvicesDwg">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>
         <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف الخدمات الاوتوكاد   
             </div>
    </div>

     <div v-if="tender.SpecificationsName!=null" v-show="IsUser==1" class="alert alert-light">
        <label> ملف المواصفات    </label>

<div class="thm-color  container"><a :href="tender.SpecificationsPath" target="_blank"  class="btn btn-success">
<i class='bx bxs-down-arrow-circle' ></i>    عرض
    </a>
    </div>

    </div>
    <div v-else class="file-style">
      <div  v-show="IsUser==1">
    ملف المواصفات
        <button @click.prevent="HandleFile('spec',tender.id)" class="btn btn-download "  data-toggle="modal" data-target="#editFileSpec">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>

            </div>
         <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف المواصفات   
             </div>
    </div>

        <div v-if="tender.SpecificationsEXCEL!=null" v-show="IsUser==1" class="alert alert-light">
        <label> ملف المواصفات الاكسل    </label>

<div class="thm-color  container"><a :href="tender.SpecificationsEXCEL" target="_blank" class="btn btn-secondary">

  <i class='bx bxs-down-arrow-circle' ></i> 
تحميل
    </a>
    </div>

    </div>
    <div v-else class="file-style">
      <div  v-show="IsUser==1">
    ملف المواصفات الاكسل
        <button @click.prevent="HandleFile('spec',tender.id)" class="btn btn-download "  data-toggle="modal" data-target="#editFileSpecDWG">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>

            </div>
         <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  ملف المواصفات الاكسل   
             </div>
    </div>


      <div v-if="tender.mapName!=null" class="alert alert-light">
        <label> خارطة الارض     </label>

<div class="thm-color  container"><a :href="tender.mapPath" target="_blank" class="btn btn-success">
  
<i class="fa fa-eye"></i>
عرض    </a>
    </div>

    </div>
    <div v-else class="file-style" >
          
            <div v-show="IsUser==1">
                خارطة الارض
        <button @click.prevent="HandleFile('map',tender.id)" class="btn btn-download "  data-toggle="modal" data-target="#editFileMap">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
            </div>
             <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  خارطة الارض    
             </div>
    </div>


        <div v-if="tender.StructureName!=null" class="alert alert-light">
        <label>  الملف الانشائي     </label>

<div class="thm-color  container"><a :href="tender.StructurePath" target="_blank" class="btn btn-success">
     <i class="fa fa-eye"></i>
    عرض
    </a>
    </div>

    </div>
    <div v-else class="file-style" >
      <div v-show="IsUser==1">
         الملف الانشائي
        <button @click.prevent="HandleFile('Structure',tender.id)" class="btn btn-download "  data-toggle="modal" data-target="#editFileStructure">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
            </div>
            <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  الملف الانشائي     
             </div>

            
    </div>

            <div v-if="tender.StructureDWG!=null" class="alert alert-light">
        <label>  الملف الانشائي اوتوكاد    </label>

<div class="thm-color  container"><a :href="tender.StructureDWG" download="download" class="btn btn-secondary">
<i class="fa fa-eye"></i>
تحميل
    </a>
    </div>

    </div>
    <div v-else class="file-style" >
      <div v-show="IsUser==1">
         الملف الانشائي اوتوكاد
        <button @click.prevent="HandleFile('Structure',tender.id)" class="btn btn-download "  
        data-toggle="modal" data-target="#editFilestructureDWG">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
            </div>
            <div v-if="IsUser==10" class="text-danger">
               إنتظار الاستشاري لرفع  الملف الانشائي اوتوكاد    
             </div>

            
    </div>


      <div v-if="tender.identityName!=null" class="alert alert-light">
        <label>   الهوية     </label>

<div class="thm-color  container"><a :href="tender.identityPath" target="_blank" class="btn btn-success">
    <i class="fa fa-eye"></i>
    عرض
    </a>
    </div>

    </div>
    <div v-else class="file-style">
      <div  v-show="IsUser==1">
         الهوية
        <button @click.prevent="HandleFile('Ident',tender.id)" class="btn btn-download " 
         data-toggle="modal" data-target="#editFileIdent">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل</small>
            </button>
      </div>
    </div>

  </div>

    <!-- <button @click.prevent="sendTender(TTender,tender)" class="btn btn-download" v-show="tender.identityPath!=null && tender.StructurePath!=null
                    && tender.ArchitectPath!=null && tender.mapPath!=null &&
                     tender.SpecificationsPath!=null && tender.servicesPath!=null &&
                     tender.threeDName!=null && IsUser==10  " 
                     :disabled="TTender==null"


                     >  {{tender.submitted==1 ?
                      'تم نشر المناقصة'
                      :'انشر المناقصة'}} </button> -->
                       <div v-if="tender.identityPath!=null && tender.StructurePath!=null
                    && tender.ArchitectPath!=null && tender.mapPath!=null &&
                     tender.SpecificationsPath!=null && tender.servicesPath!=null &&
                     tender.threeDName!=null" >
                     <h1>المرحلة الخامسة </h1>
                      <h5>تحويل المناقصة </h5>
              
<div>
 
   

<div v-if="IsUser==10">
 
  
    <div class="form-group container file-style " v-if="TypeTender1==null" >
 <label class=" mt-2 ">
   <span v-for="buyer , index in confirm.buyer " :key="index">

     <span class="d-none">{{soil = buyer.soil}}</span>
   </span>
   
  
    <button class="btn btn-download"  @click.prevent="sendTender(1,tender) ">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('construcion_company')}}   </span>

  </div>
  <div v-else-if="TypeTender1" class="mt-3">

      <router-link :to="{name:'consrDetails',params:{id:TypeTenderId1}}" class="theme-btn " >
                            الذهاب الي مناقصة المقاولات
                            </router-link>
  </div>

      <div class="form-group container file-style"  v-if="TypeTender2==null" >
 <label class=" mt-2 ">
    <button class="btn btn-download " @click="sendTender(2,tender)">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('HVAC_companies')}}   </span>

  </div>
  <div v-else-if="TypeTender2" class="mt-3">

      <router-link :to="{name:'HvacDetails',params:{id:TypeTenderId2}}" class="theme-btn " >
            الذهاب الي مناقصة التكييف
            </router-link>

  </div>

   <div class="form-group container file-style" v-if="TypeTender3==null"> 
 <label class=" mt-2 ">
    <button class="btn btn-download"  @click="sendTender(3,tender)">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('Stone_companies')}}   </span>

  </div>
   <div v-else-if="TypeTender3" class="mt-3">
    
      <router-link :to="{name:'StoneDetails',params:{id:TypeTenderId3}}" class="theme-btn " >
            الذهاب الي مناقصة الحجر
            </router-link>

  </div>
    <div class="form-group container file-style" v-if="TypeTender4==null"> 
 <label class=" mt-2 ">
    <button class="btn btn-download"  @click="sendTender(4,tender)">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('interior_decoration')}}   </span>

  </div>

     <div v-else-if="TypeTender4" class="mt-3">

           <router-link :to="{name:'InteriorDetails',params:{id:TypeTenderId4}}" class="theme-btn " >
            الذهاب الي مناقصة الحجر
            </router-link>
     </div>
  
</div>
<div v-else>
<p class=" text-success">تحويل المناقصات من قبل العميل </p>
</div>




  



<div class="">
<h1>المرحلة السادسة </h1>
    <h5>عقود المناقصات </h5>
   
<h6>
   <i :class="{'fas fa-check-circle text-success':offer.toffers.contracts_consrcution!=null}"></i>
  عقد المقاول
  </h6>
             <span v-if="offer.toffers.contracts_consrcution==null && IsUser==1" >
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="contractFiles"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="offer.toffers.contracts_consrcution==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="contractFiles">
           
            
        <span >   عقد المقاول</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.contracConstruction" v-if="contracConstruction==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.contracConstruction" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد المقاول</span>
                <input type="file" class="form-control"  @change="ContaracConstructiontFile" style="display:none"
                 ref="contracConstruction">

               <div class=" text-danger" v-if="FileNotcontracConstructionAllowd!=null">{{FileNotcontracConstructionAllowd}}</div>



            </label>
             </div>
<span v-if="progressconstrucion" class="">{{progressconstrucion}}</span>
<div class="progress" v-if="progressconstrucion" style="hieght:10px !important">


  <div v-if="progressconstrucion!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" 
  :style="'width:'+progressconstrucion+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0"
   aria-valuemax="100"></div>
  <div v-if="progressconstrucion=='100%'" class="progress-bar  progress-bar-striped bg-success"
   role="progressbar" :style="'width:'+progressconstrucion+';hieght:10px !important'" aria-valuenow="25"
    aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultcontracConstructionSize" @click="RemoveFile('contracConstruction')"></span>
<span v-if="resultcontracConstructionSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultcontracConstructionName}}</span>
<span v-if="resultcontracConstructionSize!=null"  class="float-right">{{resultcontracConstructionSize}}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" :id="offer.toffers.id" class="btn theme-btn"
         @click="updateContracts('construction',offer.toffers.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && offer.toffers.contracts_consrcution==null"  class="btn btn-light" @click.prevent
                data-toggle="modal" data-target="#contractFiles">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="offer.toffers.contracts_consrcution">
        

            <p class="alert alert-light"> 
              <a :href="offer.toffers.contracts_consrcution.ContractPath" target="_blank" class="btn btn-success">
    <i class="fa fa-eye"></i>
    عرض
              </a>
              </p>
              <hr>
        </span>

                <h6>
   <i :class="{'fas fa-check-circle text-success':offer.toffers.contracts_stone!=null}"></i>
  عقد الحجر
  </h6>
                <span v-if="offer.toffers.contracts_stone==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="Contractfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="offer.toffers.contracts_stone==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد الحجر</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.contracstone" v-if="contracstone==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.contracstone" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الحجر</span>
                <input type="file" class="form-control"  @change="ContaracStoneFile" style="display:none" ref="contracstone">

               <div class=" text-danger" v-if="FileNotcontracstoneAllowd  !=null">{{FileNotcontracstoneAllowd  }}</div>



            </label>
             </div>
<span v-if="progressstone" class="">{{progressstone}}</span>
<div class="progress" v-if="progressstone" style="hieght:10px !important">


  <div v-if="progressstone!='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progressstone+';hieght:10px !important'" aria-valuenow="25
   " aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressstone=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar"
   :style="'width:'+progressstone+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultcontracstoneName " @click="RemoveFile('contracstone')"></span>
<span v-if="resultcontracstoneName !=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultcontracstoneName }}</span>
<span v-if="resultcontracstoneName !=null"  class="float-right">{{resultcontracstoneSize }}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="updateContracts('contractStone',offer.toffers.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && offer.toffers.contracts_stone==null"  class="btn btn-light"
                data-toggle="modal" data-target="#contractFile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="offer.toffers.contracts_stone">
        

            <p class="alert alert-light"> 
              <a :href="offer.toffers.contracts_stone.ContractPath" target="_blank" class="btn btn-success">
    <i class="fa fa-eye"></i>
    عرض
              </a>
              </p>
              <hr>
        </span>
        <h6>
           <i :class="{'fas fa-check-circle text-success':offer.toffers.contracts_hvac!=null}"></i>
  عقد التكييف
  </h6>
                <span v-if="offer.toffers.contracts_hvac==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="ContractHvactfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="offer.toffers.contracts_hvac==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد التكييف</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.contrachvac" v-if="contrachvac==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.contrachvac" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد التكييف</span>
                <input type="file" class="form-control"  @change="ContaracHvacFile" style="display:none" ref="contrachvac">

               <div class=" text-danger" v-if="FileNotcontrachvacAllowd !=null">{{FileNotcontrachvacAllowd }}</div>



            </label>
             </div>
<span v-if="progresshvac " class="">{{progresshvac }}</span>
<div class="progress" v-if="progresshvac " style="hieght:10px !important">


  <div v-if="progresshvac !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progresshvac +';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progresshvac =='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar"
   :style="'width:'+progresshvac +';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultcontrachvacSize " @click="RemoveFile('contrachvac')"></span>
<span v-if="resultcontrachvacSize !=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultcontrachvacName }}</span>
<span v-if="resultcontrachvacSize !=null"  class="float-right">{{resultcontrachvacSize }}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="updateContracts('contractHvac',offer.toffers.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && offer.toffers.contracts_hvac==null"  class="btn btn-light"
                data-toggle="modal" data-target="#ContractHvactfile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="offer.toffers.contracts_hvac">
        

            <p class="alert alert-light"> 
              <a :href="offer.toffers.contracts_hvac.ContractPath"target="_blank" class="btn btn-success">
    <i class="fa fa-eye"></i>
    عرض
              </a>
              </p>
              <hr>
        </span>


        <h6>
           <span v-if="offer.toffers.contracts_interior">
             <i :class="{'fas fa-check-circle text-success':offer.toffers.contracts_interior.ContractName}"></i>
           </span>
  عقد الديكور الداخلي
  </h6>
                <span v-if="offer.toffers.contracts_interior==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="ContractInteriortfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="offer.toffers.contracts_interior==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد الديكور الداخلي</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.contracinterior" v-if="contracinterior==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.contracinterior" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الديكور الداخلي</span>
                <input type="file" class="form-control"  @change="ContaracInteriortFile" style="display:none" ref="contracinterior">

               <div class=" text-danger" v-if="FileNotcontracinteriorAllowd !=null">{{FileNotcontracinteriorAllowd }}</div>



            </label>
             </div>
<span v-if="progressinterior " class="">{{progressinterior }}</span>
<div class="progress" v-if="progressinterior " style="hieght:10px !important">


  <div v-if="progressinterior !='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressinterior +';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressinterior =='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progressinterior +';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultcontracinteriorSize " @click="RemoveFile('contracinterior')"></span>
<span v-if="resultcontracinteriorSize !=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultcontracinteriorSize }}</span>
<span v-if="resultcontracinteriorSize !=null"  class="float-right">{{resultcontracinteriorSize }}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="updateContracts('contractInterior',offer.toffers.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && offer.toffers.contracts_interior==null"  class="btn btn-light"
                data-toggle="modal" data-target="#ContractInteriortfile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="offer.toffers.contracts_interior">
        

            <p class="alert alert-light"> 
              <a :href="offer.toffers.contracts_interior.ContractPath" target="_blank" class="btn btn-success">
    <i class="fa fa-eye"></i>
    عرض
              </a>
              </p>
              <hr>
        </span>


        </div>

        <div class="">
<h1>المرحلة السابعة </h1>
    <h5> متابعة مرحلة البناء </h5>

    <div class="row c-form-inner" v-if="IsUser==1">
      <div class="col-md-6">
       <div class="file-style " style="height:60; border: 2px solid #E8E8E8">
                 <label>
                 <span class="btn btn-light" @click="$refs.Flowup" v-if="Flowup==null" 
                 style="margin-top: 10px; margin-right: 10px">
                   <span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.Flowup" v-else  style="margin-top: 10px; margin-right: 10px">
                  <span class="fa fa-paperclip" ></span> </span>
          <span class="">     صور البناء</span>
                <input type="file" class="form-control"  @change="FlowupFile" style="display:none" ref="Flowup">

               <div class=" text-danger" v-if="FileNotFlowupAllowd!=null">{{FileNotFlowupAllowd}}</div>
            </label>
             </div>
             <span v-if="progressFollow" class="">{{progressFollow}}</span>
<div class="progress" v-if="progressFollow" style="hieght:10px !important">


  <div v-if="progressFollow!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressFollow+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressFollow=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progressFollow+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultFlowupSize" @click="RemoveFile('Flowup')"></span>
<span v-if="resultFlowupSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultFlowupName}}</span>
<span v-if="resultFlowupSize!=null"  class="float-right">{{resultFlowupSize}}</span>

      </div>
      <div class="col-md-6">
        <div class="form-group">
        <input type="date" v-model="dateFlow" placeholder="تاريخ الانجاز">
        </div>

      </div>
              <button type="button" class="btn btn-download" @click="updateContracts('FlowUp',offer.toffers.id)" :disabled="loading || dateFlow==null">
                 {{loading==true ? 'انتظر ..':'حفظ'}}
                 </button>

</div>
<table class="table">
  <thead>
    <tr>
 
      
      <th scope="col"> #</th>
      <th scope="col"> صورة البناء</th>
      <th scope="col">تاريخ الانجاز</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="files , index in offer.toffers.constfollowup" :key="index">
    
      <td>{{index+1}}</td>
      <td>
        <a :href="files.path" target="_blank">
        <img :src="files.path" width="50" height="50">
        </a>
        
  
        </td>
      <td>{{files.date}}</td>
  
    </tr>
  </tbody>
</table>
</div>





</div>

            
                      </div>
                     
                      
                    

</span>






</form>



    


  

            </div>
            </div>
            <div class="" v-show="offer.toffers.contracts_consrcution">

<h1>المرحلة الثامنة </h1>
 

    <div class="" v-if="IsUser==10">
     
                  <div class="text-right form-group" dir="rtl">
            <p class="font-weight-bold theme-color"> هل تم الانتهاء من البناء بالشكل المطلوب ؟</p>
<span v-if="offer.status_project==0">
<div class="badge badge-primary">
لا
</div>
</span>
<span v-else-if="offer.status_project==1">
<div class="badge badge-primary">
نعم
</div>
</span>
<span v-else>
        <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="yes" name="done"  v-model="done">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">نعم</span>
         </label>
             <label class="checkbox d-bolck" :dir="$t('directions')" >
            
           <input type="radio" value="no"  name="done"  v-model="done">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">لا</span>
             </label>
</span>


 
</div>


            <div class="form-group ">

              <span v-if="offer.notes">
                                                <label for="exampleFormControlTextarea1"> ملاحظات</label>

<div class="alert alert-primary">
{{offer.notes}}
</div>
</span>
<span v-else>
                                <label for="exampleFormControlTextarea1">أضافة ملاحظات</label>

 <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    v-model="notesdone"
                    rows="4">
 </textarea>
</span>
 <button class="btn btn-success mt-3" @click="DoneOrNo"
  :disabled="notesdone==null
   || done==null||
    loading" v-show="offer.notes==null ||offer.status_project==null ">ارسال </button>
</div>


    </div>
</div>
     

    <div class="modal fade" id="editFileDwg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          ملف 
        <span >  3d</span>
     



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(Dwg)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.Excel" v-if="threeDExcel==null"><span class=" 
                 fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.Excel" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">  تصميم الفيلا</span>
          <span class=""> 3D </span>
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDExcelAllowd!=null">{{FileNotthreeDExcelAllowd}}</small>
                <input type="file" class="form-control"  @change="threedExcelFile" style="display:none" ref="Excel">



                 </label>

            </div>
<span v-if="progress111" class="">{{progress111}}</span>
<div class="progress" v-if="progress111" style="hieght:10px !important">


  <div  v-if="progress111 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress111+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress111=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress111+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDExcelSize" @click="RemoveFile('threeDExcel')"></span>

<span v-if="resultthreeDExcelSize!=null"  class="float-right">{{resultthreeDExcelName}}</span>
<span v-if="resultthreeDExcelSize!=null"  class="float-right">{{resultthreeDExcelSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('threeDDWG')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileSpec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
              ملف المواصفات
    



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="SpecFile">{{SpecFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else>
                  <span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('spec')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>







<div class="modal fade" id="editFilestructure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
             ملف الانشائي
  



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.struc" v-if="Structure==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.struc" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotStructureAllowd!=null">{{FileNotStructureAllowd}}</small>

                <input type="file" class="form-control"  @change="StructureFile" style="display:none" ref="struc">



                 </label>

            </div>
<span v-if="progress3" class="">{{progress3}}</span>
<div class="progress" v-if="progress3" style="hieght:10px !important">

  <div  v-if="progress3 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress3 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultStructureSize" @click="RemoveFile('structure')"></span>

<span v-if="resultStructureSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultStructureSize}}</span>
<span v-if="resultStructureSize!=null"  class="float-right">{{resultStructureSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structure')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileServic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
           
        ملف الخدمات



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.services" v-if="services==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.services" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   ملف الخدمات</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotservicesAllowd!=null">{{FileNotservicesAllowd}}</small>

                <input type="file" class="form-control"  @change="ServicesFile" style="display:none" ref="services">



                 </label>
            </div>
<span v-if="progress8" class="">{{progress8}}</span>
<div class="progress" v-if="progress8" style="hieght:10px !important">

  <div  v-if="progress8 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress8+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress8 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress8+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultservicesSize" @click="RemoveFile('services')"></span>

<span v-if="resultservicesSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultservicesName}}</span>
<span v-if="resultservicesSize!=null"  class="float-right">{{resultservicesSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('services')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          ملف 
        <span >  3d</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.threeD" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">  تصميم الفيلا</span>
          <span class=""> 3D </span>
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDAllowd!=null">{{FileNotthreeDAllowd}}</small>
                <input type="file" class="form-control"  @change="threedFile" style="display:none" ref="threeD">



                 </label>

            </div>
<span v-if="progress11" class="">{{progress11}}</span>
<div class="progress" v-if="progress11" style="hieght:10px !important">


  <div  v-if="progress11 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress11=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress11+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDSize" @click="RemoveFile('threeD')"></span>

<span v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDName}}</span>
<span v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('threeD')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

    





          </div>
      
</div>
      

</div>
  </div>

  <div class="col-md-4">
<partsconsl v-bind="confirm.tender" ></partsconsl>

<div class="p-descrip-box">
           <provider  
              :Provider="confirm.tender.Provider"
              :typeBuild="confirm.tender.typeBuild"
              :priceGrant="confirm.tender.priceGrant"
              :BankProvider="confirm.tender.BankProvider"
              ></provider>


 <div class="h5 mt-4">  التواصل</div>
              <div class="contact">
                  <span class="btn btn-light" v-if="IsUser==1">{{confirm.buyer.email}}</span>
                  <span class="btn btn-light" v-if="IsUser==10">{{confirm.user.email}}</span>
                  <a class="btn btn-light" :href="'tel:'+confirm.tender.phone"  dir="ltr" v-show="IsUser==1" >
                      <i class="fas fa-phone-alt"></i>
                      {{confirm.tender.phone}}
                      </a>
                       <a class="btn btn-light" :href="'tel:'+confirm.tender.phone"  dir="ltr" v-show="IsUser==10" >
                      <i class="fas fa-phone-alt"></i>
                      {{confirm.user.mobile}}
                      </a>
                  <a class="btn btn-success" :href="'http://wa.me/'+confirm.tender.whatsapp" dir="ltr"  v-show="IsUser==1">
                     <i class="fab fa-whatsapp"></i>
                     <span>
         {{confirm.tender.whatsapp}}
                     </span>
                  
                      </a>

              </div>
</div>
  


  <div class="p-descrip-box pro-features">
						<h4 class="pr-d-title">{{$t('price_include')}}</h4>
						<ul class="single-pro-f list-none">
							<li>
								<i class="fas fa-check-circle" :class="{'text-muted':confirm.Consultant_fee!='true'}">	</i>{{$t('Consultant_fee')}}</li>
							<li><i class="fas fa-check-circle" :class="{'text-muted':confirm.conditioning!='true'}"></i>{{$t('conditioning')}}</li>
							<li><i class="fas fa-check-circle" :class="{'text-muted':confirm.gypsum!='true'}"></i>{{$t('gypsum')}}</li>
          <li><i class="fas fa-check-circle" :class="{'text-muted':confirm.electric_pendants!='true'}"> </i>{{$t('electric_pendants')}}</li>

             
							<li><i class="fas fa-check-circle" :class="{'text-muted':confirm.Kitchen_Cabinets!='true'}"></i>{{$t('Kitchen_Cabinets')}}</li>

						</ul>
						<ul class="single-pro-f list-none">
							<li><i class="fas fa-check-circle" :class="{'text-muted':confirm.Bedroom_wardrobes!='true'}"></i>{{$t('Bedroom_wardrobes')}}</li>
							<li><i class="fas fa-check-circle" :class="{'text-muted':confirm.the_elevator!='true'}"></i>{{$t('the_elevator')}}</li>
							<li><i class="fas fa-check-circle" :class="{'text-muted':confirm.interior_decoration!='true'}"></i>{{$t('interior_decoration')}}</li>
                    <li><i class="fas fa-check-circle" :class="{'text-muted':confirm.garden_design!='true'}"></i>{{$t('garden_design')}}</li>

						</ul>
            
					
					</div>

          <div class="p-descrip-box">
                 <span  v-for="buyer , index in confirm.buyer" :key="index" v-show="IsUser==1">

                        رقم اتصال العميل : 
                                    <div>
                        <a :href="'tel:'+buyer.user.mobile" class="theme-btn" dir="ltr">{{buyer.user.mobile}}</a>
                          </div>
                     </span>  

                            <span  v-show="IsUser==10">

                        رقم اتصال الشركة : 
                                    <div>
                        <a :href="'tel:'+ confirm.user.mobile" class="theme-btn" dir="ltr">{{ confirm.user.mobile}}</a>
                          </div>
                     </span>  

                     

          </div>

  </div>
</div>

    
      

      <input type="hidden" name="emirats" :value="confirm.tender.emirats">






<span v-if="offer.reason_user" class="p-descrip-box text-right">
    <div class="text-dark "> سبب العاء المالك :</div>
   <span class="text-danger"> {{offer.reason_user}}</span>

</span>
<span v-if="offer.reason_com" class="p-descrip-box text-right">
    <div class="text-dark "> سبب العاء الشركة :</div>
   <span class="text-danger"> {{offer.reason_com}}</span>

</span>
        


<div class="mt-5 ">

        <span> <i  class="fa fa-clock grey"></i>  {{offer.added_at}}</span>

</div>

<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1,TypeReview)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2,TypeReview)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3,TypeReview)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4,TypeReview)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5,TypeReview)"></i>


          </div>
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(offer.user_id,offer.com_id,offer.id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
<div v-show="offer.review==null">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review" @click="handleReview(1)"
v-show=" offer.result!=null  " ><i class="bx bxs-star" ></i>     اضف تقييم للاستشارات الهندسية</button>






</div>

<div v-if="offer.review" >
  	<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">Rating & Reviews</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">1 Review</h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.review.rating"></review>

											</div>
										</div>
										<p>{{offer.review.content}}</p>
										<span v-if="offer.review_added_at">{{offer.review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>



<span v-if="offer.construction_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة المقاولات</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:offer.construction_review.company.id,type:'construction'}}" class="theme-color">
									{{offer.construction_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.construction_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.construction_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.construction_review.rating"></review>

											</div>
										</div>
										<p v-show="offer.construction_review.content">{{offer.construction_review.content}}</p>
										<!-- <span v-if="offer.review_added_at">{{offer.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>

<span v-else>
<button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(6)"
 v-show="TypeTenderId1"
 ><i class="bx bxs-star" ></i>     اضف تقييم المقاولات </button>

</span>


<span v-if="offer.stone_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة الحجر</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:offer.stone_review.company.id,type:'stone'}}" class="theme-color">
									{{offer.stone_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.stone_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.stone_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.stone_review.rating"></review>

											</div>
										</div>
										<p v-show="offer.stone_review.content">{{offer.stone_review.content}}</p>
										<!-- <span v-if="offer.review_added_at">{{offer.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>

<span v-else>


<button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(3)"
 v-show="TypeTenderId3"
 ><i class="bx bxs-star" ></i>     اضف تقييم الحجر </button>


</span>

<span v-if="offer.hvac_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة التكييف</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:offer.hvac_review.company.id,type:'hvac'}}" class="theme-color">
									{{offer.hvac_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.hvac_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.hvac_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.hvac_review.rating"></review>

											</div>
										</div>
										<p v-show="offer.hvac_review.content">{{offer.hvac_review.content}}</p>
										<!-- <span v-if="offer.review_added_at">{{offer.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>
<span v-else>
 <button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(4)"
 v-show="TypeTenderId2"
 ><i class="bx bxs-star" ></i>     اضف تقييم التكييف </button>

 </span>

<span v-if="offer.interior_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة الديكور الداخلي</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:offer.interior_review.company.id,type:'interior'}}" class="theme-color">
									{{offer.interior_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="offer.interior_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{offer.interior_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="offer.interior_review.rating"></review>

											</div>
										</div>
										<p v-show="offer.interior_review.content">{{offer.interior_review.content}}</p>
										<!-- <span v-if="offer.review_added_at">{{offer.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>
<span v-else>
 <button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(5)"
 v-show="TypeTenderId4"
 ><i class="bx bxs-star" ></i>     اضف تقييم الديكور الداخلي </button>



</span>









</div>
<div class="">


</div>

<!-- tender for user  -->

<div class="models">


<div class="modal fade" id="editFileSpec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
             تبديل الملف
        <span v-if="SpecFile">  ملف المواصفات</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="SpecFile">{{SpecFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" text-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="text-right">{{resultSpecificationsSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('spec')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
             تبديل
        <span v-if="MapFile">   خارطة الارض</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="MapFile">{{MapFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted"> Pdf , dwg (autocad file)</small>
                    <small class=" text-right text-danger font-weight-bold">إجباري</small>

            <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.ele" v-if="map==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.ele" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   خارطة الارض  </span>
                <input type="file" class="form-control"  @change="MapUpload" style="display:none" ref="ele">

               <div class=" text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</div>



            </label>
            </div>
<span v-if="progress5" class="">{{progress5}}</span>
<div class="progress" v-if="progress5" style="hieght:10px !important">

  <div   v-if="progress5!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div   v-if="progress5=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultmapSize" @click="RemoveFile('map')"></span>

<span v-if="resultmapSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultmapName}}</span>
<span v-if="resultmapSize!=null"  class="text-right">{{resultmapSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('map')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editFileIdent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">

      الهوية



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="IdentFile">{{IdentFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, xlsx)</small>
            <small class=" text-right text-danger font-weight-bold">إجباري</small>

            <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.idfile" v-if="identity==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.idfile" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     الهوية</span>
                <input type="file" class="form-control"  @change="idFile" style="display:none" ref="idfile">

               <div class=" text-danger" v-if="FileNotidentityAllowd!=null">{{FileNotidentityAllowd}}</div>



            </label>
            </div>
<span v-if="progress6" class="">{{progress6}}</span>
<div class="progress" v-if="progress6" style="hieght:10px !important">


  <div v-if="progress6!='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress6+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress6=='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress6+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultidentitySize" @click="RemoveFile('identity')"></span>
<span v-if="resultidentitySize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultidentityName}}</span>
<span v-if="resultidentitySize!=null"  class="text-right">{{resultidentitySize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('ident')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileStructure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">

        <span >  الملف الانشائي</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="StrutureFile">{{StrutureFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" text-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.struc" v-if="Structure==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.struc" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotStructureAllowd!=null">{{FileNotStructureAllowd}}</small>

                <input type="file" class="form-control"  @change="StructureFile" style="display:none" ref="struc">



                 </label>

            </div>
<span v-if="progress3" class="">{{progress3}}</span>
<div class="progress" v-if="progress3" style="hieght:10px !important">

  <div  v-if="progress3 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress3 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultStructureSize" @click="RemoveFile('Structure')"></span>

<span v-if="resultStructureSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultStructureName}}</span>
<span v-if="resultStructureSize!=null"  class="text-right">{{resultStructureSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structure')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileServic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">

         ملف الخدمات


        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="serviceFile">{{serviceFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" text-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.services" v-if="services==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.services" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   ملف الخدمات</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotservicesAllowd!=null">{{FileNotservicesAllowd}}</small>

                <input type="file" class="form-control"  @change="ServicesFile" style="display:none" ref="services">



                 </label>
            </div>
<span v-if="progress8" class="">{{progress8}}</span>
<div class="progress" v-if="progress8" style="hieght:10px !important">

  <div  v-if="progress8 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress8+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress8 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress8+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultservicesSize" @click="RemoveFile('services')"></span>

<span v-if="resultservicesSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultservicesName}}</span>
<span v-if="resultservicesSize!=null"  class="text-right">{{resultservicesSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('services')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileArch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
           المخطط المعماري




        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="Archictfile">{{Archictfile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
    <small class="text-muted"> Pdf , dwg (autocad file)</small>
    <small class=" text-right text-danger font-weight-bold">إجباري</small>
             <div class="file-style">

                 <label>
                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="Architect==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.fileinput2" v-else><span class="fa fa-paperclip" ></span></span>
              <span class=""> الملف المخططات المعماري </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="ArchitectFile" style="display:none" ref="fileinput2" >




                 </label>
            </div>
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultSize" @click="RemoveFile('Architect')"></span>

<span v-if="resultSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span> {{resultName}}</span>
<span v-if="resultSize!=null"  class="text-right"> {{resultSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('arch')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileSErvicesDwg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
           
        ملف الخدمات 
اوتوكاد
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted"> dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.servicesDWG" v-if="servicesDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.servicesDWG" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   ملف الخدمات</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotservicesDWGAllowd!=null">{{FileNotservicesDWGAllowd}}</small>

                <input type="file" class="form-control"  @change="servicesDWGFile" style="display:none" ref="servicesDWG">



                 </label>
            </div>
<span v-if="progress888" class="">{{progress888}}</span>
<div class="progress" v-if="progress888" style="hieght:10px !important">

  <div  v-if="progress888 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress888+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress888 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress888+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultservicesDWGSize" @click="RemoveFile('servicesDWG')"></span>

<span v-if="resultservicesDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultservicesDWGName}}</span>
<span v-if="resultservicesDWGSize!=null"  class="float-right">{{resultservicesDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('servicesDWG')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editFileSpecDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
              ملف المواصفات (اكسل)
    



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">( xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.SpecificationsDWG" v-if="SpecificationsDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.SpecificationsDWG" v-else>
                  <span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsDWGFile" style="display:none" ref="SpecificationsDWG">

               <div class=" text-danger" v-if="FileNotSpecificationsDWGAllowd!=null">{{FileNotSpecificationsDWGAllowd}}</div>



            </label>
             </div>
<span v-if="progress444" class="">{{progress444}}</span>
<div class="progress" v-if="progress444" style="hieght:10px !important">


  <div v-if="progress444!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress444+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress444=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress444+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsDWGSize" @click="RemoveFile('SpecificationsDWG')"></span>
<span v-if="resultSpecificationsDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsDWGName}}</span>
<span v-if="resultSpecificationsDWGSize!=null"  class="float-right">{{resultSpecificationsDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('SpecificationsDWG')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileArchDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          
        <span >   مخطط المعماري اوتوكاد</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
    <small class="text-muted">  dwg (autocad file)</small>
    <small class=" float-right text-danger font-weight-bold">إجباري</small>
             <div class="file-style">

                 <label>
                 <span class="btn btn-light" @click="$refs.ArchitectdWG" v-if="ArchitectDWG==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.ArchitectdWG" v-else><span class="fa fa-paperclip" ></span></span>
              <span class=""> الملف المخططات المعماري </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotArchitectDWGAllowd!=null">
                {{FileNotArchitectDWGAllowd}}</small>
                <input type="file" class="form-control"  @change="ArchitectDwgFile" style="display:none" ref="ArchitectdWG" >




                 </label>
            </div>
<span v-if="progress222" class="">{{progress222}}</span>
<div class="progress" v-if="progress222" style="hieght:10px !important">

  <div  v-if="progress222!='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress222+';hieght:10px !important'" aria-valuenow="25" 
   aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress222=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" 
  :style="'width:'+progress2222+';hieght:10px !important;background-color:#3454d1 !important'"
   aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultArchitectDWGSize" @click="RemoveFile('ArchitectDWG')"></span>

<span v-if="resultArchitectDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span> 
{{resultArchitectDWGName}}</span>
<span v-if="resultArchitectDWGSize!=null"  class="float-right"> {{resultArchitectDWGSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('archDWG')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFilestructureDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
             ملف الانشائي
  



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.structureDWG" v-if="structureDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structureDWG" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotstructureDWGAllowd!=null">{{FileNotstructureDWGAllowd}}</small>

                <input type="file" class="form-control"  @change="structureDWGFile" style="display:none" ref="structureDWG">



                 </label>

            </div>
<span v-if="progress3" class="">{{progress333}}</span>
<div class="progress" v-if="progress333" style="hieght:10px !important">

  <div  v-if="progress333 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress333+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress333 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress333+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultstructureDWGSize" @click="RemoveFile('structureDWG')"></span>

<span v-if="resultstructureDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultstructureDWGName}}</span>
<span v-if="resultstructureDWGSize!=null"  class="float-right">{{resultstructureDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structureDWG')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="editFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
              اضافة ملف
        <span >  3d</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="threeDfile">{{threeDfile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" text-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.threeD" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">  تصميم الفيلا</span>
          <span class=""> 3D </span>
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDAllowd!=null">{{FileNotthreeDAllowd}}</small>
                <input type="file" class="form-control"  @change="threedFile" style="display:none" ref="threeD">



                 </label>

            </div>
<span v-if="progress11" class="">{{progress11}}</span>
<div class="progress" v-if="progress11" style="hieght:10px !important">


  <div  v-if="progress11 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress11=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress11+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDSize" @click="RemoveFile('threeD')"></span>

<span v-if="resultthreeDSize!=null"  class="text-right">{{resultthreeDName}}</span>
<span v-if="resultthreeDSize!=null"  class="text-right">{{resultthreeDSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('threeD')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

</div>


<div class="saved_tender container" :class="$t('text_align')">
 <div class="row  mt-4">
        <div class=" col-md-12 ">



    <h2 class="text-center text-muted">  الرسائل  </h2>

   <div class="p-descrip-box  mb-4" style="background:#f6f6f6 !important">




            <chat-messages :messages="messages"></chat-messages>
  <div class="message">
    
                            <chat-form v-on:messagesent="addMessage" :user="user" :offer_id="request_id" :type="typeMessage"></chat-form>


  </div>




   </div>
        </div>
 </div>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="done" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
      هل انت متأكد تريد أكمال هذا الطلب؟
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary " data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn  text-right "  @click="user_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Complete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
           هل انت متأكد تريد أكمال هذا المشروع ؟

      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary " data-dismiss="modal">لا</button>
        <button type="button" class="theme-btn text-right " @click="com_confirm()">نعم </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="form-group">
          <h6>
      هل انت متأكد تريد الغاء هذا الطلب ؟ 


        <strong>  السبب </strong>
          </h6>


        <!-- <textarea class="form-control" rows="6" v-model="reason" @input="ontype()"
        :class="[{'is-invalid': errorFor('reason_cancel')}]" style="background: #eee;" :maxlength="maxlength">

        </textarea> -->
           <div class=" form-group mt-3" :class="$t('text_align')" :dir="$t('direactions')">
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="4"
                    name="desc"
                    v-model="reason"
                    :class="[{'is-invalid': errorFor('Notes')}]"
                      placeholder=" أدخل سبب الغاء الطلب     "

                  ></textarea>

                </div>
        <small>{{value}}/{{maxlength}}</small>
        <div class="invalid-feedback" v-for="(error, index) in errorFor('reason_cancel')" :key="'reason_cancel' + index" >{{ error }}</div>
         <button type="button" class="theme-btn text-right mt-2" @click="cancel_user()" v-if="IsUser==10"
          :disabled="reason==null  ">تأكيد </button>
         <button type="button" class="theme-btn  text-right" @click="cancel_com()" v-if="IsUser==1" :disabled="reason==null">Confirm </button>
             </div>






    </div>
  </div>
</div>
    </span>
</div>
    <div class="offset-md-2">
</div>
</div>


</div>
</template>

<script>
import stages from '../tenders/stages.vue';
import ValidationErrors from "../shared/components/ValidationErrors.vue";
import validationErrors from "../shared/mixins/validationErrors";
import Partsconsl from '../tenders/partsconsl.vue';
import provider from './provider.vue';

import Review from './review.vue';
import ChatMessages from './ChatMessages.vue';
import ChatForm from './ChatForm.vue';
export default {
  
  components: { stages , ValidationErrors, Partsconsl,provider, Review, ChatMessages, ChatForm },
  mixins: [validationErrors],
data(){
  
    return{
        // saved_tender
        soil:null,
         open_select:null,
        TTender:null,
        alertMessage:null,
        id:null,
        title:'',
        notes:'',
          files: [],
          messages: [],
      images: [],
      typeMessage:'tender',
       progressbar:[],
   
      item: null,
      budget: null,
      design: null,
      Supervisor: null,

        // end Tender
        maxlength : 100,
        data:null,
         request_id :this.$route.params.id,
         request_type :this.$route.params.type,
         com_help :null,
         user_help :null,
         reason:null,
          errors: null,
      status: null,
      value:0,
      user:null,
result_reason:0,


  threeDfile:null,
        Archictfile:null,
        serviceFile:null,
        StrutureFile:null,
        SpecFile:null,
        IdentFile:null,
        MapFile:null,


    //   Architect dWG file
        resultArchitectDWGSize:null,
        resultArchitectDWGName:null,
        progress222:null,
        FileNotArchitectDWGAllowd:null,
        ArchitectDWG:null,
        
        resultservicesDWGSize :null,
        resultservicesDWGName :null,
        progress888 :null,
        FileNotservicesDWGAllowd:null,
        servicesDWG:null,
        

            FileNotthreeDExcelAllowd:null,
         threeDExcel:null,
         resultthreeDExcelSize:null,
        resultthreeDExcelName:null,
        progress111:null,

           //structure dwg Files
        resultstructureDWGSize :null,
        resultstructureDWGName :null,
        progress333:null,
        FileNotstructureDWGAllowd :null,
        structureDWG:null,



        resultSpecificationsDWGSize :null,
        resultSpecificationsDWGName :null,
        progress444 :null,
        FileNotSpecificationsDWGAllowd :null,
        SpecificationsDWG:null,


        // 3d file vraible
         FileNotthreeDAllowd:null,
         threeD:null,
         resultthreeDSize:null,
        resultthreeDName:null,
        progress11:null,
        FilesID:null,


        //   Architect file
        resultSize:null,
        resultName:null,
        progress2:null,
        FileNotMapAllowd:null,
        Architect:null,


        // Services File

        resultservicesSize :null,
        resultservicesName :null,
        progress8 :null,
        FileNotservicesAllowd:null,
        services:null,


        //structure Files
        resultStructureSize :null,
        resultStructureName :null,
        progress3 :null,
        FileNotStructureAllowd :null,
        Structure:null,

        //specifcation file
        resultSpecificationsSize :null,
        resultSpecificationsName :null,
        progress4 :null,
        FileNotSpecificationsAllowd :null,
        Specifications:null,


          //contracConstruction file
        resultcontracConstructionSize :null,
        resultcontracConstructionName :null,
        progressconstrucion :null,
        FileNotcontracConstructionAllowd :null,
        contracConstruction:null,


           //contracstone file
        resultcontracstoneSize :null,
        resultcontracstoneName :null,
        progressstone :null,
        FileNotcontracstoneAllowd :null,
        contracstone:null,

           //contrachvac file
        resultcontrachvacSize :null,
        resultcontrachvacName :null,
        progresshvac :null,
        FileNotcontrachvacAllowd :null,
        contrachvac:null,


           //contracinterior file
        resultcontracinteriorSize :null,
        resultcontracinteriorName :null,
        progressinterior :null,
        FileNotcontracinteriorAllowd :null,
        contracinterior:null,



        
        //specifcation file
        resultContractsSize :null,
        resultContractsName :null,
        progress4 :null,
        FileNotContractsAllowd :null,
        Contracts:null,

  resultFlowupName :null,
        resultFlowupSize:null,
        FileNotFlowupAllowd :null,
        Flowup:null,
        progressFollow:null,
        dateFlow:null,
        //identifcation

        resultidentitySize:null,
        resultidentityName :null,
        progress6:null,
        FileNotidentityAllowd :null,
        identity:null,
        map :null,
        progress5:null,
        resultmapName:null,
        resultmapSize:null,
        NextTenders:null,
        tenderSubmitted:null,
        start1:null,
        start2:null,
        start3:null,
        start4:null,
        start5:null,
        reveiw:1,
        TypeRequest:null,
        ReviewContent:null,

           TypeTender1:null,
        TypeTenderId1:'',

        TypeTender2:null,
          TypeTenderId2:'',

        TypeTender3:null,
        TypeTenderId3:'',

        TypeTender4:null,
        TypeTenderId4:'',
        name_eng:null,
        loading:false,
        done:null,
        notesdone:null,
        TypeReview:null

    

    }
},
methods: {

  DoneOrNo(){
    this.loading=true
    console.log('this done '+this.done)
    console.log('this notesdone '+this.notesdone)
    
    let data = new FormData();

    data.append('status_project',this.done)
    data.append('notes',this.notesdone)
    data.append('request_id',this.request_id)
    axios.post('doneorno',data).then(res=>{
      this.getRequestDetails();
      this.loading=false
    })
    

  },
   
     updateContracts(event,id){
                 let data = new FormData();
             
          data.append('offer_id', id);

          if(event == 'construction'){

         
 
                                data.append('contract', this.contracConstruction,this.contracConstruction.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progressconstrucion =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/tender/Update',data,config).then(res=>{
                    $('#contractFiles').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                       
                        this.specifications  =null
                        this.contracConstruction =null
                        this.progressconstrucion=null
                        this.resultcontracConstructionName=null
                        this.resultcontracConstructionSize=null
                        this.FileNotcontracConstructionAllowd=null
                        this.successAlert();
                        this.getRequestDetails();
                        })
          }
             if(event == 'contractHvac'){
                                data.append('contractHvac', this.contrachvac,this.contrachvac.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progresshvac =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/tender/Update',data,config).then(res=>{
                    $('#Contractfile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                             this.resultcontrachvacSize =null
                              this.resultcontrachvacName =null
                              this.progresshvac =null
                              this.FileNotcontrachvacAllowd =null
                              this.contrachvac=null
                        this.successAlert();
                        this.getRequestDetails();
                        })
                }

                     if(event == 'contractStone'){
                                data.append('contractstone', this.contracstone,this.contracstone.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progressstone =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/tender/Update',data,config).then(res=>{
                    $('#Contractfile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                            this.resultcontracstoneSize =null
                            this.resultcontracstoneName =null
                            this.progressstone= null
                            this.FileNotcontracstoneAllowd =null
                            this.contracstone=null
                        this.successAlert();
                        this.getRequestDetails();
                        })
                }

                

                if(event == 'contractInterior'){

                  console.log('hello contractInterior')
                                data.append('contractInterior', this.contracinterior,this.contracinterior.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progressinterior  =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/tender/Update',data,config).then(res=>{
                    $('#ContractInteriortfile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                            this.resultcontracinteriorSize   =null
                            this.resultcontracinteriorName   =null
                            this.progressinterior  = null
                            this.FileNotcontracinteriorAllowd   =null
                            this.contracinterior=null
                        this.successAlert();
                        this.getRequestDetails();
                        })
                }
                  if(event == 'FlowUp'){
                 this.loading=true;
                                data.append('dateFlow', this.dateFlow);
                                data.append('Flow', this.Flowup,this.Flowup.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progressFollow =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/tender/Update',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultFlowupSize   =null
                        this.resultFlowupName    =null
                        this.progressFollow   =null
                        this.FileNotFlowupAllowd    =null
                        this.Flowup  =null,
                        this.dateFlow=null,
                        this.loading=false;
                        this.successAlert();
                        this.getRequestDetails();
                        })
                }

                
     },
    UpdateFiles(event){
            console.log('wait uploading....')



                    let data = new FormData();
             
          data.append('offer_id', id);

         

             
                
               
             if(event == 'contractInterior'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/Interior',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.getRequestDetails();
                        
                        })
                }
               

           if(event == 'contractHvac'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/Hvac',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                         this.getRequestDetails();

                        
                        })
                }
               

           
               
           
               
                if(event == 'contract'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/consulting',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                                                this.getRequestDetails();

                        
                        })
                }

                   if(event == 'threeD'){
                    data.append('threeD', this.threeD,this.threeD.name);
                                const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }

                    axios.post('save/tender/files',data,config).then(res=>{



                            $('#editFile').modal('hide');
                           $('.modal-backdrop').css('display','none');

                        this.FileNotthreeDAllowd=null;
                        this.threeD=null;
                        this.resultthreeDSize=null;
                        this.resultthreeDName=null;
                        this.progress11=null;
                        this.successAlert();
                                                this.getRequestDetails();

                        
                    })

                }

                
                 if(event == 'threeDDWG'){
                   console.log('hi')
                 this.loading=true;
                                data.append('ThreeDDWG', this.threeDExcel,this.threeDExcel.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress111 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileDwg').modal('hide');
                       $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultthreeDExcelSize   =null
                        this.resultthreeDExcelName    =null
                        this.progress111   =null
                        this.FileNotthreeDExcelAllowd    =null
                        this.threeDExcel  =null,
                      
                        this.loading=false;

                        this.successAlert();
                        this.getRequestDetails();
                        
                        })
                }

                
                        if(event == 'arch'){
                    data.append("Architect",this.Architect,this.Architect.name);

                        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }




                    axios.post('save/tender/files',data ,config).then(res=>{



                            $('#editFileArch').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultSize=null
                        this.resultName=null
                        this.progress2=null
                        this.FileNotMapAllowd=null
                        this.Architect=null
                        this.getRequestDetails();
                        this.successAlert();
                        
                    })
                        }


                        


                        if(event == 'services'){
                        data.append('services', this.services,this.services.name);

                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

                    axios.post('save/tender/files',data,config).then(res=>{



                            $('#editFileServic').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultservicesSize =null
                        this.resultservicesName =null
                        this.progress8 =null
                        this.FileNotservicesAllowd =null
                        this.services =null
                        this.successAlert();
                        this.getRequestDetails();
                    })

                }

          
                if(event == 'structure'){
                            data.append('structure', this.structure,this.structure.name);
                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }
                      

            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFilestructure').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultstructureSize  =null
                        this.resultstructureName  =null
                        this.progress3  =null
                        this.FileNotstructureAllowd  =null
                        this.structure =null
                        this.successAlert();
                        this.getRequestDetails();

                        
                        })
                }




          
                    if(event == 'spec'){
                                data.append('Specifications', this.Specifications,this.Specifications.name);

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileSpec').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.getRequestDetails();

                        
                        })
                }
          

           
            },
                 ContaracStoneFile(event){ //check
console.log('hi testing code from contracStone')

 

                this.contracstone=event.target.files[0];

                console.log('hi File  from  contracstone' + this.contracstone)


      

                    if(!this.contracstone.type.match('application/pdf')){
                        this.FileNotcontracstoneAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.contracstone.size < 1048576){
        let size = Math.floor(this.contracstone.size/1024);
        this.resultcontracstoneName = this.contracstone.name   ;
        this.resultcontracstoneSize = size+' KB' ;


                    }
        if(this.contracstone.size > 1048576){
        let size = Math.floor(this.contracstone.size/1024);
        this.resultcontracstoneName = this.contracstone.name   ;
        this.resultcontracstoneSize = size+' MB' ;


        }
            





            },
                    ContaracHvacFile(event){ //check
console.log('hi testing code from contracHvac')

 

                this.contrachvac=event.target.files[0];

                console.log('hi File  from  contracstone' + this.contrachvac)


      

                    if(!this.contrachvac.type.match('application/pdf')){
                        this.FileNotcontrachvacAllowd  =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.contrachvac.size < 1048576){
        let size = Math.floor(this.contrachvac.size/1024);
        this.resultcontrachvacName  = this.contrachvac.name   ;
        this.resultcontrachvacSize  = size+' KB' ;


                    }
        if(this.contrachvac.size > 1048576){
        let size = Math.floor(this.contrachvac.size/1024);
        this.resultcontrachvacName  = this.contrachvac.name   ;
        this.resultcontrachvacSize  = size+' MB' ;


        }
            





            },
              ContaracConstructiontFile(event){ //check
console.log('hi testing code from contracConstruction ')



                this.contracConstruction=event.target.files[0];

                console.log('hi File  from  contracConstruction' + this.contracConstruction)


      

                    if(!this.contracConstruction.type.match('application/pdf')){
                        this.FileNotcontracConstructionAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.contracConstruction.size < 1048576){
        let size = Math.floor(this.contracConstruction.size/1024);
        this.resultcontracConstructionName = this.contracConstruction.name   ;
        this.resultcontracConstructionSize = size+' KB' ;


                    }
        if(this.contracConstruction.size > 1048576){
        let size = Math.floor(this.contracConstruction.size/1024);
        this.resultcontracConstructionName = this.contracConstruction.name   ;
        this.resultcontracConstructionSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }





            },

               ContaracInteriortFile(event){ //check
console.log('hi testing code from contracConstruction ')



                this.contracinterior=event.target.files[0];

                console.log('hi File  from  contracinterior' + this.contracinterior)


      

                    if(!this.contracinterior.type.match('application/pdf')){
                        this.FileNotcontracinteriorAllowd  =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.contracinterior.size < 1048576){
        let size = Math.floor(this.contracinterior.size/1024);
        this.resultcontracinteriorName  = this.contracinterior.name   ;
        this.resultcontracinteriorSize  = size+' KB' ;


                    }
        if(this.contracinterior.size > 1048576){
        let size = Math.floor(this.contracinterior.size/1024);
        this.resultcontracinteriorName  = this.contracinterior.name   ;
        this.resultcontracinteriorSize  = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }





            },
                      FlowupFile(event){ //check

                this.Flowup=event.target.files[0];


        const result3 = getFileExtension(this.Flowup.name);

                    if(!this.Flowup.type.match('image.*') ){
                        this.FileNotFlowupAllowd =`should Jpg Or Png `;
                            return ;
                        }

                        if(this.Flowup.size < 1048576){
        let size = Math.floor(this.Flowup.size/1024);
        this.resultFlowupName = this.Flowup.name   ;
        this.resultFlowupSize = size+' KB' ;


                    }
        if(this.Flowup.size > 1048576){
        let size = Math.floor(this.Flowup.size/1024);
        this.resultFlowupName = this.Flowup.name   ;
        this.resultFlowupSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Flowup);

                        let data = new FormData();
                data.append("Flowup",this.Flowup,this.Flowup.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },

            
    sendTender(TTender,Tender){

      let data = new FormData();

      if(TTender==1){
       data.append('soil',this.soil); 
      }
      
    
    let emirats = document.querySelector('input[name=emirats]').value;
      data.append('name_age',this.name_eng);
      data.append('mapPath',Tender.mapPath);
      data.append('mapName',Tender.mapName);
      data.append('identityName',Tender.identityName);
      data.append('identityPath',Tender.identityPath);
      data.append('title',Tender.title);
      data.append('Description',Tender.notes);
      data.append('Emirates',emirats);
      data.append('ArchitectPath',Tender.ArchitectPath);
      data.append('ArchitectName',Tender.ArchitectName);
      data.append('SpecificationsPath',Tender.SpecificationsPath);
      data.append('SpecificationsName',Tender.SpecificationsName);
      data.append('StructurePath',Tender.StructurePath);
      data.append('StructureName',Tender.StructurePath);
      data.append('servicesPath',Tender.servicesPath);
      data.append('servicesName',Tender.servicesName);
      data.append('threeDPath',Tender.threeDPath);
      data.append('threeDName',Tender.threeDName);

      data.append('ThreeDDWG',Tender.ThreeDDWG);
      data.append('ArchitectDWG',Tender.ArchitectDWG);
      data.append('StructureDWG',Tender.StructureDWG);
      data.append('SpecificationsEXCEL',Tender.SpecificationsEXCEL);
      data.append('servicesDWG',Tender.servicesDWG);


      
      data.append('type',TTender);
      data.append('tenderNumber',TTender);



      data.append('request_id',this.request_id);
      console.log(Tender)

                axios.post('ConvertToTenderProject',data).then(res=>{

                    this.getRequestDetails();
                    this.successAlert('نشر مناقصة المقاولات بنجاح');
                    this.tenderSubmitted = res.data;
                })
   


  },
    open(event){
        if(event=='villa'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"
    }
    },
      tenderType(event){
    this.TTender=event;
  },
     fetchMessages() {
            //GET request to the messages route in our Laravel server to fetch all the messages
            axios.get(`/messages/${this.request_id}/${this.typeMessage}`).then(response => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
            });
        },
        //Receives the message that was emitted from the ChatForm Vue component
        addMessage(message) {
     


            this.messages.push(message);


            //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
            axios.post('/messages', message).then(response => {
                console.log(response.data);
           
            });
        },
    
     formSubmit(e) {
      e.preventDefault();
      this.loading = true;
      this.errors = null;

      let datas = new FormData();
      // this.files.forEach((file) => {
      //   datas.append("images[]", file, file.name);
      // });

      this.btntender = true;
      datas.append("item", this.item);
      datas.append("notes", this.notes);
      datas.append("budget", this.budget);
      datas.append("Supervisor", this.Supervisor);
      datas.append("design", this.design);
      datas.append("tab", this.tab);
      datas.append("tender_id", this.id);
      datas.append("type", 'FromRequest');

      axios
        .post("/offer_consulte", datas)
        .then((response) => {
    
        //   this.Myoffers.unshift(response.data);
        //   this.MyofferIsset = 1;
        this.getRequestDetails();
        })
        .catch((error) => {
          if (422 === error.response.status) {
            // console.log(error.response.data.errors);
            this.errors = error.response.data.errors;
          }
          this.status = error.response.status;
        })
        .then(() => ((this.loading = false), (this.btntender = false)));
    },
    errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
   
      
            removeImage(i){
  let files = this.files;
  let images = this.images;
  files.splice(i,1,'');
  images.splice(i,1,'');
    console.log(files);




            },
               Rating(event,Number){

        if(event==1){

            this.start1='bxs-star text-warning'
        this.start2=null
        this.start3=null
        this.start4=null
        this.start5=null
        }
         if(event==2){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3=null
        this.start4=null
        this.start5=null
        }
         if(event==3){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4=null
        this.start5=null
        }
         if(event==4){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4='bxs-star text-warning'
        this.start5=null
        }
         if(event==5){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4='bxs-star text-warning'
        this.start5='bxs-star text-warning'
        }

       this.reveiw=event;
       this.TypeRequest=Number;
       console.log(this.reveiw)

    },
              handleReview(event){
    this.TypeReview=event

   

          this.start1=null
        this.start2=null
        this.start3=null
        this.start4=null
        this.start5=null
        this.ReviewContent=null
  },

    SubmiitReview(userid , comid , requestid){
            let data = new FormData();
            let post=null

         
            post ='review';
             data.append('TypeRequest', this.TypeRequest);

             if(this.TypeRequest==1){
                data.append('com_id', comid);
             }if(this.TypeRequest==6){
                data.append('tender_id', this.TypeTenderId1);
             }
              if(this.TypeRequest==4){
                data.append('tender_id', this.TypeTenderId2);
             }
               if(this.TypeRequest==3){
                data.append('tender_id', this.TypeTenderId3);
             }
              if(this.TypeRequest==5){
                data.append('tender_id', this.TypeTenderId4);
             }



            data.append('rating', this.reveiw);
            data.append('content', this.ReviewContent);
            data.append('user_id', userid);
           
            data.append('request_id', requestid);


             axios.post(post,data).then(res=>{
                         this.getRequestDetails();
                 $('#Review').modal('hide');
                  $('.modal-backdrop').css('display','none');
                


             })
          
      


    },
       ContaractFile(event){ //check

                this.Contracts=event.target.files[0];


        const result3 = getFileExtension(this.Contracts.name);

                    if(!this.Contracts.type.match('application/pdf')  && result3 !='xlsx'){
                        this.FileNotContractsAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.Contracts.size < 1048576){
        let size = Math.floor(this.Contracts.size/1024);
        this.resultContractsName = this.Contracts.name   ;
        this.resultContractsSize = size+' KB' ;


                    }
        if(this.Contracts.size > 1048576){
        let size = Math.floor(this.Contracts.size/1024);
        this.resultContractsName = this.Contracts.name   ;
        this.resultContractsSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Contracts);

                        let data = new FormData();
                data.append("Architect",this.Contracts,this.Contracts.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },
 
    
                threedFile(event){ //check
            this.threeD=event.target.files[0];


        const result3 = getFileExtension(this.threeD.name);

                    if(!this.threeD.type.match('application/pdf')){
                        this.FileNotthreeDAllowd =`should Pdf (autocad file) `;
                            return ;
                        }

                        if(this.threeD.size < 1048576){
        let size = Math.floor(this.threeD.size/1024);
        this.resultthreeDName = this.threeD.name   ;
        this.resultthreeDSize = size+' KB' ;


                    }
        if(this.threeD.size > 1048576){
        let size = Math.floor(this.threeD.size/1024);
        this.resultthreeDName = this.threeD.name   ;
        this.resultthreeDSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }
          if(this.FileNotContractsAllowd!=null){
            this.FileNotContractsAllowd=''
          }
        // passing the filename


                //    this.url2 = URL.createObjectURL(this.threeD);

        //                let data = new FormData();
        //         data.append("threeD",this.threeD,this.threeD.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotthreeDAllowd=null
        //               });



            },
                              threedExcelFile(event){ //check

          
            this.threeDExcel=event.target.files[0];
   


        const result3 = getFileExtension(this.threeDExcel.name);
              
                    console.log(result3);
          if(result3 !='dwg'){
              this.FileNotthreeDExcelAllowd =`should Be Dwg (autocad file) `;
                  return ;
              }
                  

                        if(this.threeDExcel.size < 1048576){
        let size = Math.floor(this.threeDExcel.size/1024);
        this.resultthreeDExcelName = this.threeDExcel.name   ;
        this.resultthreeDExcelSize = size+' KB' ;


                    }
        if(this.threeDExcel.size > 1048576){
        let size = Math.floor(this.threeDExcel.size/1024);
        this.resultthreeDExcelName = this.threeDExcel.name   ;
        this.resultthreeDExcelSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }


            },
                ArchitectFile(event){
                this.Architect=event.target.files[0];


        const result1 = getFileExtension(this.Architect.name);

                    if(!this.Architect.type.match('application/pdf')){
                        this.FileNotMapAllowd =`should be Pdf `;
                            return ;
                        }

                        if(this.Architect.size < 1048576){
        let size = Math.floor(this.Architect.size/1024);
        this.resultName = this.Architect.name   ;
        this.resultSize = size+' KB' ;


                    }
        if(this.Architect.size > 1048576){
        let size = Math.floor(this.Architect.size/1024);
        this.resultName = this.Architect.name   ;
        this.resultSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Architect);

        //                let data = new FormData();
        //         data.append("Architect",this.Architect,this.Architect.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotMapAllowd=null
        //               });




            },
                ServicesFile(event){

                this.services=event.target.files[0];


        const result2 = getFileExtension(this.services.name);

                    if(!this.services.type.match('application/pdf') ){
                        this.FileNotservicesAllowd =`should Pdf `;
                            return ;
                        }

                        if(this.services.size < 1048576){
        let size = Math.floor(this.services.size/1024);
        this.resultservicesName = this.services.name   ;
        this.resultservicesSize = size+' KB' ;


                    }
        if(this.services.size > 1048576){
        let size = Math.floor(this.services.size/1024);
        this.resultservicesName = this.services.name   ;
        this.resultservicesSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.services);

        //                let data = new FormData();
        //         data.append("Architect",this.services,this.services.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotservicesAllowd=null
        //               });




            },
                StructureFile(event){

                this.Structure=event.target.files[0];


        const result2 = getFileExtension(this.Structure.name);

                    if(!this.Structure.type.match('application/pdf') && result2 !='dwg' ){
                        this.FileNotStructureAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.Structure.size < 1048576){
        let size = Math.floor(this.Structure.size/1024);
        this.resultStructureName = this.Structure.name   ;
        this.resultStructureSize = size+' KB' ;


                    }
        if(this.Structure.size > 1048576){
        let size = Math.floor(this.Structure.size/1024);
        this.resultStructureName = this.Structure.name   ;
        this.resultStructureSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Structure);

                        let data = new FormData();
                data.append("Structure",this.Structure,this.Structure.name);
                this.FileNotStructureAllowd=null

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{

        //               });




            },
                SpecificationsFile(event){ //check

                this.Specifications=event.target.files[0];


        const result3 = getFileExtension(this.Specifications.name);

                    if(!this.Specifications.type.match('application/pdf')  && result3 !='xlsx'){
                        this.FileNotSpecificationsAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.Specifications.size < 1048576){
        let size = Math.floor(this.Specifications.size/1024);
        this.resultSpecificationsName = this.Specifications.name   ;
        this.resultSpecificationsSize = size+' KB' ;


                    }
        if(this.Specifications.size > 1048576){
        let size = Math.floor(this.Specifications.size/1024);
        this.resultSpecificationsName = this.Specifications.name   ;
        this.resultSpecificationsSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Specifications);

                        let data = new FormData();
                data.append("Architect",this.Specifications,this.Specifications.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },
                idFile(event){
            this.identity=event.target.files[0];


        const result3 = getFileExtension(this.identity.name);

                    if(!this.identity.type.match('application/pdf') && result3 !='xlsx'){
                        this.FileNotidentityAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.identity.size < 1048576){
        let size = Math.floor(this.identity.size/1024);
        this.resultidentityName = this.identity.name   ;
        this.resultidentitySize = size+' KB' ;


                    }
        if(this.identity.size > 1048576){
        let size = Math.floor(this.identity.size/1024);
        this.resultidentityName = this.identity.name   ;
        this.resultidentitySize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                //    this.url2 = URL.createObjectURL(this.identity);

                        let data = new FormData();
                data.append("identity",this.identity,this.identity.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress6 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotidentityAllowd=null
        //               });



            },
                          ArchitectDwgFile(event){
                this.ArchitectDWG=event.target.files[0];


        const result1 = getFileExtension(this.ArchitectDWG.name);

                    if(result1 !='dwg'){
                        this.FileNotArchitectDWGAllowd =`Dwg (autocad file) `;
                            return ;
                        }else{
                        this.FileNotArchitectDWGAllowd ='';

                        }

                        if(this.ArchitectDWG.size < 1048576){
        let size = Math.floor(this.ArchitectDWG.size/1024);
        this.resultArchitectDWGName = this.ArchitectDWG.name   ;
        this.resultArchitectDWGSize = size+' KB' ;


                    }
        if(this.ArchitectDWG.size > 1048576){
        let size = Math.floor(this.ArchitectDWG.size/1024);
        this.resultArchitectDWGName = this.ArchitectDWG.name   ;
        this.resultArchitectDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                // this.url2 = URL.createObjectURL(this.Architect);

        //                let data = new FormData();
        //         data.append("Architect",this.Architect,this.Architect.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotMapAllowd=null
        //               });




            },
           
                  servicesDWGFile(event){

                this.servicesDWG=event.target.files[0];


        const result2 = getFileExtension(this.servicesDWG.name);

                    if(result2 !='dwg' ){
                        this.FileNotservicesDWGAllowd =` should be  Dwg (autocad file) `;
                            return ;
                        }else{
                          this.FileNotservicesDWGAllowd=null
                        }

                        if(this.servicesDWG.size < 1048576){
        let size = Math.floor(this.servicesDWG.size/1024);
        this.resultservicesDWGName = this.servicesDWG.name   ;
        this.resultservicesDWGSize = size+' KB' ;


                    }
        if(this.servicesDWG.size > 1048576){
        let size = Math.floor(this.servicesDWG.size/1024);
        this.resultservicesDWGName = this.servicesDWG.name   ;
        this.resultservicesDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.services);

        //                let data = new FormData();
        //         data.append("Architect",this.services,this.services.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotservicesAllowd=null
        //               });




            },
         

                    structureDWGFile(event){

                this.structureDWG=event.target.files[0];


        const result2 = getFileExtension(this.structureDWG.name);

                    if( result2 !='dwg' ){
                        this.FileNotstructureDWGAllowd =`should be Dwg (autocad file) `;
                            return ;
                        }

                        if(this.structureDWG.size < 1048576){
        let size = Math.floor(this.structureDWG.size/1024);
        this.resultstructureDWGName = this.structureDWG.name   ;
        this.resultstructureDWGSize = size+' KB' ;


                    }
        if(this.structureDWG.size > 1048576){
        let size = Math.floor(this.structureDWG.size/1024);
        this.resultstructureDWGName = this.structureDWG.name   ;
        this.resultstructureDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.FileNotstructureDWGAllowd=null

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{

        //               });




            },
        

                 SpecificationsDWGFile(event){ //check
                 console.log('hi specfiction')

                this.SpecificationsDWG=event.target.files[0];


        const result3 = getFileExtension(this.SpecificationsDWG.name);
 
                    if(result3 !='xlsx'){
                        this.FileNotSpecificationsDWGAllowd =`should Xlsx  `;
                            return ;
                        }else{
                          this.FileNotSpecificationsDWGAllowd=null
                        }

                        if(this.SpecificationsDWG.size < 1048576){
        let size = Math.floor(this.SpecificationsDWG.size/1024);
        this.resultSpecificationsDWGName = this.SpecificationsDWG.name   ;
        this.resultSpecificationsDWGSize = size+' KB' ;


                    }
        if(this.SpecificationsDWG.size > 1048576){
        let size = Math.floor(this.SpecificationsDWG.size/1024);
        this.resultSpecificationsDWGName = this.SpecificationsDWG.name   ;
        this.resultSpecificationsDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


            

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },
                MapUpload(event){
            this.map=event.target.files[0];


        const result3 = getFileExtension(this.map.name);

                    if(!this.map.type.match('application/pdf') && result3 !='dwg'){
                        this.FileNotmapAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.map.size < 1048576){
        let size = Math.floor(this.map.size/1024);
        this.resultmapName = this.map.name   ;
        this.resultmapSize = size+' KB' ;


                    }
        if(this.map.size > 1048576){
        let size = Math.floor(this.map.size/1024);
        this.resultmapName = this.map.name   ;
        this.resultmapSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                //    this.url2 = URL.createObjectURL(this.map);

                        let data = new FormData();
                data.append("map",this.map,this.map.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotmapAllowd=null
                        // });



            },
                HandleFile(event ,id){
                    this.FilesID=id;
                    if(event=='threed'){
                    this.threeDfile=value

                    }

                     if(event=='threedDwg'){
                    this.threeDExcel=value

                    }
                    

                    if(event=='Architect'){
                    this.Archictfile=value

                    }
                    if(event=='Services'){
                    this.serviceFile=value

                    }

                    if(event=='Structure'){
                    this.StrutureFile=value

                    }

                    if(event=='spec'){
                    this.SpecFile=value

                    }

                        if(event=='ident'){
                    this.IdentFile=value

                    }

                    if(event=='map'){
                    this.MapFile=value
                    console.log(this.MapFile);

                    }









                },
                UpdateFile(event){

                    let data = new FormData();
                    data.append('FilesID', this.FilesID);

   if(event == 'archDWG'){
                    data.append("archDWG",this.ArchitectDWG,this.ArchitectDWG.name);

                        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress222 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }




                    axios.post('save/tender/files',data ,config).then(res=>{



                            $('#editFileArchDWG').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultArchitectDWGSize=null
                        this.resultArchitectDWGName=null
                        this.progress222=null
                        this.FileNotArchitectDWGAllowd=null
                        this.ArchitectDWG=null
                        this.successAlert();
                        this.getRequestDetails();

                        
                    })
                        }
                      
                 if(event == 'threeDDWG'){
                   console.log('hi')
                 this.loading=true;
                                data.append('ThreeDDWG', this.threeDExcel,this.threeDExcel.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress111 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileDwg').modal('hide');
                       $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultthreeDExcelSize   =null
                        this.resultthreeDExcelName    =null
                        this.progress111   =null
                        this.FileNotthreeDExcelAllowd    =null
                        this.threeDExcel  =null,
                      
                        this.loading=false;
                           this.getRequestDetails();
                        this.successAlert();
                        
                        })
                }
               
    if(event == 'structureDWG'){
                            data.append('structureDWG', this.structureDWG,this.structureDWG.name);
                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress333 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }
                      

            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFilestructureDWG').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultstructureDWGSize  =null
                        this.resultstructureDWGName  =null
                        this.progress333  =null
                        this.FileNotstructureDWGAllowd  =null
                        this.structureDWG =null
                        this.successAlert();
                        
                        })
                }
                   if(event == 'servicesDWG'){
                        data.append('servicesDWG', this.servicesDWG,this.servicesDWG.name);

                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress888 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

                    axios.post('save/tender/files',data,config).then(res=>{



                            $('#editFileSErvicesDwg').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultservicesDWGSize =null
                        this.resultservicesDWGName =null
                        this.progress888 =null
                        this.FileNotservicesDWGAllowd =null
                        this.servicesDWG =null
                           this.getRequestDetails();
                        this.successAlert();
                        

                    })

                }
                if(event == 'SpecificationsDWG'){
                                data.append('SpecificationsDWG', this.SpecificationsDWG,this.SpecificationsDWG.name);

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileSpecDWG').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultSpecificationsDWGSize   =null
                        this.resultSpecificationsDWGName   =null
                        this.progress444   =null
                        this.FileNotSpecificationsDWGDwgAllowd   =null
                        this.SpecificationsDWG  =null
                        this.successAlert();
                           this.getRequestDetails();
                        
                        })
                }

                if(event == 'contract'){
                  console.log('hi im in contract')
                                data.append('contract', this.Contracts,this.Contracts.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        
                        }

    data.append('request_id',this.request_id);

            axios.post('save/tender/files',data,config).then(res=>{

                    $('#Contractfile').modal('hide')
                    $('.modal-backdrop').css('display','none')

                       this.getRequestDetails();

                        this.resultContractsSize   =null
                        this.resultContractsName   =null
                        this.progress4   =null
                        this.FileNotContractsAllowd   =null
                        this.Contracts  =null

                        this.successAlert('تم رفع ملف الاستشاري بنجاح');
                        
                     
                        })
                }
                if(event == 'threeD'){
                  console.log('hi')
                    data.append('threeD', this.threeD,this.threeD.name);
                                const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }

                    axios.post('save/tender/files',data,config).then(res=>{



                            $('#editFile').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.FileNotthreeDAllowd=null;
                        this.threeD=null;
                        this.resultthreeDSize=null;
                        this.resultthreeDName=null;
                        this.progress11=null;
                        // this.successAlert();
                        this.getRequestDetails();
                    })

                }

                        if(event == 'arch'){
                    data.append("Architect",this.Architect,this.Architect.name);

                        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }




                    axios.post('save/tender/files',data ,config).then(res=>{



                            $('#editFileArch').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultSize=null
                        this.resultName=null
                        this.progress2=null
                        this.FileNotMapAllowd=null
                        this.Architect=null
                        this.getRequestDetails();
                    })
                        }


                        if(event == 'services'){
                        data.append('services', this.services,this.services.name);

                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

                    axios.post('save/tender/files',data,config).then(res=>{



                            $('#editFileServic').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultservicesSize =null
                        this.resultservicesName =null
                        this.progress8 =null
                        this.FileNotservicesAllowd =null
                        this.services =null
                         this.getRequestDetails();
                    })

                }
                if(event == 'structure'){
                            data.append('Structure', this.Structure,this.Structure.name);
                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileStructure').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultStructureSize  =null
                        this.resultStructureName  =null
                        this.progress3  =null
                        this.FileNotStructureAllowd  =null
                        this.Structure =null
                         this.getRequestDetails();
                        })
                }
                if(event == 'spec'){
                                data.append('Specifications', this.Specifications,this.Specifications.name);

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileSpec').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                         this.getRequestDetails();
                        })
                }
            if(event == 'ident'){
        data.append('identity', this.identity,this.identity.name);

                    const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress6 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }

            axios.post('save/tender/files',data,config).then(res=>{
                    $('#editFileIdent').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultidentitySize   =null
                        this.resultidentityName   =null
                        this.progress6   =null
                        this.FileNotidentityAllowd   =null
                        this.identity  =null
                         this.getRequestDetails();
                        })
                }

                                if(event =='map'){
                                  console.log('hi this my oorma')
                                    data.append('map', this.map,this.map.name);
                                    const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }
                                    axios.post('save/tender/files',data , config).then(res=>{
                        $('#editFileMap').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.map =null
                        this.progress5=null
                        this.resultmapName=null
                        this.resultmapSize=null
                        this.getRequestDetails();
                        })
                            }



        // IdentFile

            },
                  addImage(file){

    function getFileExtension(filename){

    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}

// passing the filename
const result1 = getFileExtension(file.name);
console.log(result1);



                if(!file.type.match('application/pdf')){
                   this.FileNotAllowd ="يجب ان يكون الملف pdf";
                    return ;
                }

                this.files.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)


                reader.readAsDataURL(file);

                 let data = new FormData();
          data.append("file",file,file.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotAllowd=null
                });

                 this.FileNotAllowd ='';
            },
        onImageChanged(e){
               const files = e.target.files;
               Array.from(files).forEach(file => this.addImage(file))
            },

                     RemoveFile(event){
                        if(event =='Flowup'){
this.Flowup =null
this.progressFollow=null
this.resultFlowupName =null
this.resultFlowupSize=null
       }
         if(event =='contracstone'){
        this.resultcontracstoneSize =null
        this.resultcontracstoneName =null
        this.progressstone= null
       this.FileNotcontracstoneAllowd =null
        this.contracstone=null
         }
          if(event =='contrachvac'){
        this.resultcontrachvacSize =null
        this.resultcontrachvacName =null
        this.progresshvac =null
        this.FileNotcontrachvacAllowd =null
        this.contrachvac=null
          }
          if(event =='contracinterior'){

           //contracinterior file
        this.resultcontracinteriorSize =null
        this.resultcontracinteriorName =null
        this.progressinterior =null
        this.FileNotcontracinteriorAllowd =null
        this.contracinterior=null
          }


if(event =='contracConstruction'){
this.contracConstruction =null
this.progressconstrucion=null
this.resultcontracConstructionName=null
this.resultcontracConstructionSize=null
this.FileNotcontracConstructionAllowd=null
       }
                        if(event =='Contracts'){
this.Contracts =null
this.progress4=null
this.resultContractsName=null
this.resultContractsSize=null
       }

 if(event =='drainage'){
this.drainage =null
this.progress9=null
this.resultdrainageName=null
this.resultdrainageSize=null
       }
        if(event =='threeD'){
this.threeD =null
this.progress11=null

this.resultthreeDame=null
this.resultthreeDSize=null
       }

 if(event =='Another'){
this.Another =null
this.progress10=null
this.resultAnotherName=null
this.resultAnotherSize=null
       }
        if(event =='services'){
this.services =null
this.progress8=null
this.resultservicesName=null
this.resultservicesSize=null
       }
                  if(event =='identity'){
this.identity =null
this.progress6=null
this.resultidentityName=null
this.resultidentitySize=null
       }
if(event =='map'){
this.map =null
this.progress5=null
this.resultmapName=null
this.resultmapSize=null
       }

       if(event =='Water'){
this.Water =null
this.progress7=null
this.resultWaterName=null
this.resultWaterSize=null
       }

            if(event =='Specifications'){
this.Specifications =null
this.progress4=null
this.resultSpecificationsName=null
this.resultSpecificationsSize=null
       }
if(event =='Structure'){
this.Structure =null
this.progress3=null
this.resultStructureName=null
this.resultStructureSize=null
       }
if(event =='Architect'){
this.Architect =null
this.progress2=null
this.resultName=null
this.resultSize=null
       }
                      if(event =='servicesDWG'){
this.servicesDWG =null
this.progress888=null
this.resultservicesDWGName=null
this.resultservicesSize=null
       }


                  if(event =='SpecificationsDWG'){
this.SpecificationsDWG =null
this.progress444=null
this.resultSpecificationsDWGName=null
this.resultSpecificationsDWGSize=null
       }

       if(event =='structureDWG'){
this.structureDWG =null
this.progress333=null
this.resultstructureDWGName=null
this.resultstructureDWGSize=null
       }
       if(event =='ArchitectDWG'){
this.ArchitectDWG =null
this.progress222=null
this.FileNotArchitectDWGAllowd=null
this.resultArchitectDWGName=null
this.resultArchitectDWGSize=null
       }

                  if(event =='threeDExcel'){
  this.FileNotthreeDExcelAllowd=null
this.threeDExcel=null
 this.resultthreeDExcelSize=null
  this.resultthreeDExcelName=null
  this.progress111=null
       }




       },


    ontype(event){
        this.value = this.reason.length;



    },
    user_confirm(){
      this.loading=true;
    let datas = new FormData();
      datas.append("request_id", this.request_id);
      datas.append("request_type", this.request_type);


      console.log(this.request_id)

        axios.post('user_confirm',datas).then(res=>{

                 this.getRequestDetails()


                   $("#done").modal("hide");
          $(".modal-backdrop").css("display", "none");
        })
    },
    cancel_user(){
  let datas = new FormData();

      datas.append("request_id", this.request_id);
      datas.append("reason_cancel", this.reason);
       datas.append("type", this.request_type);

        axios.post('user_cancel',datas).then(res=>{



 this.getRequestDetails()
                   $("#cancel").modal("hide");
          $(".modal-backdrop").css("display", "none");

               this.result_reason=1;
        })
    },
        cancel_com(){
  let datas = new FormData();

      datas.append("request_id", this.request_id);
      datas.append("reason_cancel", this.reason);
      datas.append("type", this.request_type);

        axios.post('com_cancel',datas).then(res=>{



 this.getRequestDetails()
                   $("#cancel").modal("hide");
          $(".modal-backdrop").css("display", "none");

               this.result_reason=1;
        })
    },

    com_confirm(){

            this.loading=true;
      let datas = new FormData();
      datas.append("request_id", this.request_id);

        axios.post('com_confirm',datas).then(res=>{



                this.getRequestDetails()
          $("#Complete").modal("hide");
          $(".modal-backdrop").css("display", "none");
        })
    },

     Tenderredirct(id){
     this.$router.push({ name: "consrDetails" ,params:{id}});
},

    getRequestDetails(){

        axios.get(`request/${this.request_type}/${this.request_id}`).then(res=>{
            this.data = res.data;

             this.data.forEach((TenderId) => {

                      this.id = TenderId.tender_id;
  
     });
     if(this.IsUser==10){
         this.data.forEach((request) => {

         
         request.converted.forEach((converted) => {
          //  console.log(converted.type);

           if(converted.type=='construction'){
          //     this.TypeTender1 = converted.type;
          //     this.TypeTenderId1 = converted.tender_id;
              this.TypeTender1=converted.type;
              this.TypeTenderId1=converted.tender_id;
          
           }

           if(converted.type=='hvac'){
              this.TypeTender2 = converted.type;
              this.TypeTenderId2 = converted.tender_id;
           }
            if(converted.type=='stone'){
               this.TypeTender3 = converted.type;
              this.TypeTenderId3= converted.tender_id;
           }
             if(converted.type=='interior'){
                this.TypeTender4 = converted.type;
              this.TypeTenderId4= converted.tender_id;
           }
         

      });
      });
      
     }
            
        })


    },
     saveTinder(event,value){
         let data = new FormData();
         data.append('id',value);
           if(event=='title'){
                        data.append('title',this.title);


               axios.post('save/tender/title',data).then(res=>{
                   this.getRequestDetails();
               })

           }
           if(event=='notes'){
                        data.append('notes',this.notes);


               axios.post('save/tender/notes',data).then(res=>{
                   this.getRequestDetails();
               })

           }
       },
 
        successAlert(event){
          if(event==null){
            this.alertMessage="تم بنجاح"
          }else{
            this.alertMessage=event;
          }
              $('#successBox').modal('show');
                $('.modal-backdrop').css('display','block');
                },
       submit(){


                let emirats = document.querySelector('input[name=emirats]').value;
                let request_id = this.request_id;

                let data = new FormData();

                data.append('emirats',emirats);
                data.append('request_id',request_id);

                axios.post('post_tender_from_request',data).then(res=>{

                   
                    this.successAlert();
                    this.tenderSubmitted = res.data;
                })


       },
    errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },

},


created() {
   Echo.private(`chat.this.${this.request_id}`)
  .listen('MessageSent', (e) => {
    this.messages.push({
      message: e.message.message,
      user: e.user
    });
  });
  this.fetchMessages();
        this.getRequestDetails();
       
        
        // this.value = this.reason.length;
},
computed:{
  IsUser(){
            return this.$store.getters.IsUser
        },
 hasErrors() {
        return 422 === this.status && this.errors !== null;
    },
}
}
</script>

<style>
.p-descrip-box{
    padding:20px;
}
.grey{
    color: #ccd1e1;
}
.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    /* border: 1px solid rgba(0, 0, 0, 0.2); */
    border-radius: 0.3rem;
    outline: 0;
    padding: 20px;
}
.detials {
 direction: rtl;
    text-align: right;
}
.detials span{
padding: 10px;
}
.table{
    height: auto !important;
}
.btn-download
{
background:#3454d1 !important;
color: #fff !important;
}
.star-rating .bx-star{
    font-size: 2rem;
    cursor: pointer;
    margin: 5px;
}
.main-color{
  color: #000 !important;
}
</style>
