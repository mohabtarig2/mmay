<template>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body" >
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row" v-for="detail,index in details" :key="index">

                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">min budget</span>
                      <span class="info-box-number text-center text-muted mb-0">{{detail.min}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">max budget </span>
                      <span class="info-box-number text-center text-muted mb-0">{{detail.max}}</span>
                    </div>
                  </div>
                </div>


              <div class="row">
                <div class="col-12">

                  <h4>Recent Activity</h4>


            <span v-if="detail.comments.length>0">
                    <div class="post" v-for="Offer,index in detail.comments" :key="index" v-bind="offer">



                      <div class="user-block">

                       <img class="img-circle img-bordered-sm" :src="Offer.user.avatar==null ?'dist/img/AdminLTELogo.png': Offer.user.avatar"
                       alt="user image">
                        <span class="username">
                          <a href="#">{{Offer.user.name}}</a>
                        </span>
                        <span class="description">added  - {{Offer.Commented_at}}</span>

                      </div>

                      <!-- /.user-block -->
                      <p>
                         {{Offer.comment}}
                      </p>
                      <div class="mb-3">
                      <span class="badge badge-primary"> TotalAreaBuild : {{Offer.TotalAreaBuild}} sqft</span>
                      <span class="badge badge-primary">  budget : {{Offer.budget}}</span>
                      </div>



         <span v-for="(request, index) in Offer.requests" :key="index">

                 <div class="" v-if="request!=null">

             <div class="btn btn-outline-success " v-if="request.result!='cancel'">
                     <i class="fa fa-check-circle-o" ></i>
                 تم اختيار هذا العرض</div>
             <div v-else class="btn btn-outline-danger">تم الغاء هذا العرض</div>

             </div>
         </span>


                       <span
                                  v-for="(imgs, index) in Offer.images"
                                  :key="index"
                                >

                                  <div class="text-dark">
                                  <a :href="imgs.path" download="download" class="text-dark">

                                    {{imgs.name}}
                                     <i class="fa fa-file" style="color:#cfd3e2">  </i>

                                  </a>
                                  </div>
                                </span>


                    </div>
            </span>


                        <span  v-else>

                            <h1 class=" text-muted text-center">
                    thser's no Offer Yet
                </h1>
                 </span>




                </div>
              </div>
              </div>


            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" v-for="detail,index in details" :key="index">
              <h3 class="text-primary"><i class="fas fa-home"></i>

               {{detail.title}} <sup class="h6">
               <span class="project-state" >
                      <status :status="detail.status"></status>
                      </span>

               </sup>   </h3>

              <p class="text-muted">{{detail.note}}</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Poster
                  <b class="d-block">{{detail.user.name}}</b>
                </p>
                <p class="text-sm">Date Post
                  <b class="d-block">{{detail.added_at}}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project Details</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> floors :  {{detail.floors}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> bathroom :  {{detail.bathroom}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> dining room :  {{detail.dining_room}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> kitchens:{{detail.kitchens}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> living room :{{detail.living_room}}</a>
                   </li>
                    <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> majlis :{{detail.majlis}}</a>
                   <li>
                   </li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> room mastar :{{detail.room_mastar}}</a>
                   <li>
                   </li>
                    <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i> position :{{detail.position}}</a>
                   </li>
                    <li>
                  <a href="" class="btn-link text-secondary"><i class="fas fa-fw fa-circle"></i>

               emirate:<span v-if="detail.emirats==7">Abudabhi</span>
                    <span v-if="detail.emirats==6">ajman</span>
                    <span v-if="detail.emirats==5">sharja</span>
                    <span v-if="detail.emirats==4">um alqwain</span>
                    <span v-if="detail.emirats==3">Ras Alkhima</span>
                    <span v-if="detail.emirats==2">Fujira</span>
                    <span v-if="detail.emirats==1">Duabi</span></a>
                   </li>

              </ul>
              <div class="text-center mt-5 mb-3">

                <button id="accepted" href="#" class=" btn btn-sm btn-success " v-if="detail.status==0" @click.prevent="accept">


{{accepted}}               </button>

                <button  class="btn btn-sm btn-light text-success form-control" v-if="detail.status==1" disabled><i class="fa fa-check"></i> accepted </button>

                <button href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#reject" v-if="detail.status==0">reject </button>

              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

    <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reason Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <textarea rows="4" v-model="reason" class="form-control">

        </textarea>
        <small class="text-muted">
            {{reason.length>0 ? reason.length : 0 }}
        </small>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" @click="reject">Confirm</button>
      </div>
    </div>
  </div>
</div>
       <div class="modal fade success-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <span class=" text-success"><i class="fa fa-check" aria-hidden="true"></i> {{success}}</span>
    </div>
  </div>
</div>
    <!-- /.content -->
  </div>
</template>

<script>
import status from './status.vue';
export default {
  components: { status },
data(){
    return{
        details:'',
        comments:'',
        success:'',
        accepted:'accept',
        classes:'',
        reason:''
    }
},
created(){
    this.getTender();
},
methods: {
    reject(){

         let data = new FormData();

         data.append('id',this.$route.params.id)
         data.append('reason',this.reason)
         axios.post('tender/consulte/reject',data).then(res=>{
             console.log("success");
             this.getTender();
             $('#reject').modal('hide');
                $('.modal-backdrop').css('display','none');

         })
    },
    getTender(){
    axios.get('/admin/ConslTender/'+this.$route.params.id).then(res=>{
        this.details =res.data;
        this.comments =res.data.all_offers;

})
    },
    accept(){
this.classes="text-dark";
 $('button').addClass('btn btn-sm btn-success').attr("disabled", 'disabled');
        axios.get('/admin/accept/'+this.$route.params.id).then(res=>{
        this.success = res.data.success;

 this.accepted = 'accepted';

              $('.success-modal').modal('show');
                $('.modal-backdrop').css('display','show');
                $('button').removeClass('btn btn-sm btn-success ');
                $('.btn-warning').addClass('d-none');
                $('button').addClass('btn btn-sm btn-light text-success form-control').attr("disabled", 'disabled');

                $('#accepted').prepend('<i class="fa text-success fa-check"></i>');
this.classes = 'd-none';



    }).catch(err=>{
        $( ".hello" ).remove();
          this.success = 'Faild'
    })


    }
},

}
</script>

<style>
.fa-circle{
    font-size: 12px;
}
</style>
