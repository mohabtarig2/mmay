<template>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- <a @click="$router.go(-1)" style="cursor:pointer" class="ml-3 text-dark mb-2 "><i class="fa fa-arrow-left  fa-1x"></i></a> -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                     <a @click="$router.go(-1)" style="cursor:pointer" class="ml-3 text-dark mb-2 "><i class="fa fa-arrow-left  fa-1x"></i></a>

                Project Detail</h1>
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

            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
                <!-- <div  v-for="detail,index in details" :key="index">

                </div> -->

              <div  v-for="detail,index in details" :key="index">


<stages :stage="detail.stage"></stages>



                    <!-- <span class="row" v-for="detail,index in details" :key="index"> -->
                <!-- </span> -->
                    <h3 class="text-dark">

               {{detail.title}} <span class="h6">
               <span class="project-state" v-if=" accepted=='accepted'">
                          <span class="badge badge-success">مفتوح</span>
                      </span>
                      <span class="project-state" v-else-if=" accepted=='reject'">
                          <span class="badge badge-danger">مرفوض</span>
                      </span>

                       <span class="project-state" v-else>
                          <status :status="detail.status"></status>
                      </span>

               </span>   </h3>

              <p class="text-muted">{{detail.notes}}</p>
                    <div class="text-muted">
                <p class="text-sm">Poster
                  <b class="d-block">{{detail.user.name}}</b>
                </p>
                <p class="text-sm">Date Post
                  <b class="d-block">{{detail.added_at}}</b>
                </p>
              </div>








              <div class="text-center mt-5 mb-3" v-if="accepted!='reject'">

                <button id="accepted" href="#" class=" btn btn-sm btn-success " v-if="detail.status==0" @click.prevent="accept">


{{accepted}}               <div class="spinner-border " :class="classes" role="status" >
  <span class="sr-only">Loading...</span>
</div></button>
                <button href="#" class="btn btn-sm btn-light text-success form-control" v-if="detail.status==1" disabled><i class="fa fa-check"></i> accepted </button>
                <button href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#reject"
                 v-if="detail.status==0" >reject </button>
              </div>
              <br>

                  <h4>Recent Activity</h4>
                  <span v-for="Offer,index in detail.comments" :key="index">
                       <div class="post">
                      <div class="user-block" >
                        <img class="img-circle img-bordered-sm" :src="Offer.user.avatar" alt="user image">
                        <span class="username" >
                          <a href="#">

                    </a>
                        </span>
                         <h5 class="main-color">{{detail.company_name}}</h5>
                        <span class="description">Shared publicly - {{Offer.added_at}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>

                      </p>

                      <p>


                      </p>
                    </div>
                    <div class="h5 main-color">Propsal</div>
                   <p> {{Offer.textOffer}} </p>
                   <div class="h5 main-color">Items Not Includes</div>
                    <p> {{Offer.items}} </p>

                    <div class="h5 main-color">Has the consultant specification table been approved?</div>
                     <p v-if="Offer.Approval==0" >no </p>
                            <p v-if="Offer.Approval==1" >yes </p>


                      <span v-for="image , index in Offer.image" :key="index">
                        <a :href="image.path" class="link-black text-sm" ><i class="fas fa-link mr-1"></i> Propsal File </a>



                          </span>

                    <div v-if="Offer.request_tender">
                        <div v-for="request , index in Offer.request_tender " :key="index">

                        <a class="badge badge-success" v-if="request.result==null">تم اختيار هذا العرض</a>
                        <a class="badge badge-danger" v-else-if="request.result=='cancel'">تم الغاء هذا العمل من</a>
                        <a class="badge badge-success" v-else-if="request.result=='done'">قام بأكمال هذا العمل</a>

                    </div>
                    </div>


                    </span>




              </div>


            </div>
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2" v-for="detail,index in details" :key="index">


                                <div class=" col-sm-12 container">
        <div class="">
          <div class="">
            <h5 class="text-muted text-right">ملفات المناقصة </h5>
          </div>

          <ul class="list-unstyled ml-2">
            <span v-for="tender,ind in details" :key="ind">

                <table class="table table-bordered font-weight-bold" dir="rtl">

  <tbody>
    <tr>
         <td>  3D </td>
        <td class="text-center"><a :href="tender.construction_files.threeDPath" download="" class="btn btn-light">
            <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>
    <tr>
      <td>المخطط المعماري</td>
        <td class="text-center"><a :href="tender.construction_files.ArchitectPath" download="" class="btn btn-light">
             <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>

     <tr v-if="tender.construction_files.servicesPath">

      <td> الخدمات</td>
        <td class="text-center"><a :href="tender.construction_files.servicesPath" download="" class="btn btn-light">
              <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>
    <tr>

      <td> الملف الانشائي</td>
        <td class="text-center"><a :href="tender.construction_files.StructurePath" download="" class="btn btn-light">
            <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>
        <tr>

      <td>جدول المواصفات</td>
        <td class="text-center"><a :href="tender.construction_files.SpecificationsPath" download="" class="btn btn-light">
           <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>

     <tr>

      <td> الهوية</td>
        <td class="text-center"><a :href="tender.construction_files.identityPath" download="" class="btn btn-light">
              <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>

      <tr>

      <td> خارطة الارض</td>
        <td class="text-center"><a :href="tender.construction_files.mapPath" download="" class="btn btn-light">
              <i class="text-dark fas fa-cloud-download-alt" style="font-size:10px"></i>
            <small class="text-muted">تحميل </small>
            </a>
        </td>
    </tr>

    <tr>

      <td colspan="4"> <div class="text-center ">الاستشاري : {{tender.company_name}}</div></td>

    </tr>
  </tbody>
</table>

  <h5 class="text-muted text-right">  ملفات خدمات اضافية </h5>

              <li v-for="file,indimg in tender.additional_file" :key="indimg" v-bind="file">

                  <a :href="file.AdditionalPath" download class="btn-link text-dark">
                    <i class="far fa-fw fa-file btn-link text-primary"></i>
                    {{file.AdditionalName}}
                  </a>


              </li>


<h5 class="text-muted text-right">ملفات اضافية </h5>

              <li v-for="file,indimg in tender.tcimg" :key="indimg" v-bind="file">
                <span v-if="file.extension=='jpg'">
                  <a :href="'Construction/image/'+ file.name" download class="btn-link text-dark">
                    <i class="far fa-fw fa-image btn-link text-primary"></i>
                    {{file.name}}
                  </a>
                </span>
                <span v-else-if="file.extension=='xlsx'">
                  <a :href="'Construction/Excel/'+ file.name" download class="btn-link text-dark">
                    <i class="fa fa-fw fa-file-csv text-success"></i>
                    {{file.name}}
                  </a>
                </span>
                <span v-else-if="file.extension=='pdf'">
                  <a :href="'Construction/pdf/'+ file.name" download class="text-dark btn-link">
                    <i class="text-danger far fa-fw fa-file-pdf"></i>
                    {{file.name}}
                  </a>
                </span>
                <span v-else-if="file.extension=='dwg'">
                  <a :href="'Construction/autocad/'+ file.name" download class="text-dark btn-link">
                    <i class="text-info far fa-fw fa-file"></i>
                    {{file.name}}
                  </a>
                </span>


              </li>
            </span>


            <!-- <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="fa fa-fw  fa-file-csv"></i> Contract-10_12_2014.docx</a>
            </li>-->
          </ul>

        </div>
                                </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
       <div class="modal fade success-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <span class=" text-success" v-if="success"><i class="fa fa-check" aria-hidden="true"></i> You Accept The Tender Succefully</span>
    </div>
  </div>
</div>

<div class="modal fade reject" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reject With Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <textarea rows="5" class="form-control" v-model="reason">

       </textarea>
       <sup>{{reason.length > 0 ? reason.length : 0}}|50 </sup>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" @click="RejectTender" class="btn btn-danger" :disabled="reason.length <50">Confirm</button>
      </div>
    </div>
  </div>
</div>
    <!-- /.content -->
  </div>
</template>

<script>
import stages from '../tenders/stages.vue';
import Status from './status.vue';
export default {
  components: { stages, Status },
data(){
    return{
        id : this.$route.params.id,
        details:[],
        comments:'',
        success:'',
        accepted:'accept',
        classes:'d-none',
        reason:'',
    }
},
created(){
    this.getTender();
},
methods: {
    getTender(){
    axios.get('/admin/ConsrTenders/'+this.$route.params.id).then(res=>{
        this.details =res.data;
        this.comments =res.data.all_offers;
    })

    },
      RejectTender(){
          let data = new FormData();

          data.append('reasone',this.reason);
          data.append('id',this.id);

            axios.post('admin/RejectConstructionTender',data).then(res=>{
                this.reason='',
                 this.accepted = 'reject';
                $('.reject').modal('hide');
                $('.modal-backdrop').css('display','none');
            });


      },
    accept(){
// this.classes="text-dark d-block";
 $('button').addClass('btn btn-sm btn-success').attr("disabled", 'disabled');
        axios.get('/admin/consr/accept/'+this.$route.params.id).then(res=>{
        this.success = res.data;


 this.accepted = 'accepted';

              $('.success-modal').modal('show');
                $('.modal-backdrop').css('display','show');
                $('button').removeClass('btn btn-sm btn-success ');
                $('.btn-warning').addClass('d-none');
                $('button').addClass('btn btn-sm btn-light text-success form-control').attr("disabled", 'disabled');

                $('#accepted').prepend('<i class="fa text-success fa-check"></i>');




    }).catch(err=>{
        $( ".hello" ).remove();
          this.success = 'Faild'
    })
this.classes = 'd-none';

    }
},

}
</script>

<style>
.fa-circle{
    font-size: 12px;
}
</style>
