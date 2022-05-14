<template>
     <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" v-for="user ,index in data " :key="index">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                    <div class="col-5 text-center" v-if="user.avatar==''">
                      <img src="dist/img/AdminLTELogo.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                <div class="text-center" v-else>


                  <img class="profile-user-img img-fluid img-circle"
                       :src="user.avatar"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{user.name}}</h3>

                <p class="text-muted text-center">Constructions</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <div class="h5 text-muted ">العروض المقدمة</div>
                    <li class="list-group-item">
                    <b>كل الطلبات ا لمقدمة </b> <a class="float-right">{{user.CountOffer}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>الطلبات المكتملة   </b> <a class="float-right">{{user.offerRequestsComplete}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>طلبات تحت المراجعة </b> <a class="float-right">{{user.offerRequestsReview}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>الطلبات الملغاة</b> <a class="float-right">{{user.offerRequestsCancel}}</a>
                  </li>
                  <!-- <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> -->
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">more info</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Aboue me </strong>

                <p class="text-muted">
                 {{user.company.about_us}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <all-uae :emirates="user.company.emirates"></all-uae>


                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> company name</strong>

                <p class="text-muted">
                  <span class="tag tag-danger" >{{user.company.company_en}}</span>

                </p>

                <!-- <hr>

               <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">اخر عروض</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"> ملف الشركة</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post" v-for="offer,index in user.Tender" :key="index">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">{{user.name}}</a>
                          <a href="#" class="float-right btn-tool">{{offer.added_at}}</a>
                        </span>
                        <span class="description"></span>
                      </div>
                      <!-- /.user-block -->
                      <div class=" text-right h5"> العرض</div>
                      <p class="text-right">
                          {{offer.textOffer}}
                      </p>
                      <div class="text-right  h5"> البنود المشمولة</div>
                      <p class="text-right">
                          {{offer.items}}
                      </p>


        <div class="card mt-4">
           <div class=" h5 mb-3 font-weight-bold text-right"> هل تم اعتماد جدول مواصفات الاستشاري   </div>
            <p class="text-right" v-if="offer.Approval==1">نعم</p>
            <p class="text-right" v-if="offer.Approval==0">لا</p>
            <div v-for="file , index in offer.image" :key="index">
                <p>
                الملف المقترح
                </p>
                   <i class="fas fa-file"></i> <a  class="font-weight-bold" :href="file.path"  download>{{file.name}}</a>
            </div>

      </div>

                      <p>
                        <!-- <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a> -->
                        <!-- <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a> -->
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <!-- <i class="far fa-comments mr-1"></i> offers (5) -->
                          </a>
                        </span>
                      </p>


                    </div>
                    <!-- /.post -->

                    <!-- Post -->

                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline" >
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                         ملفات الشركة
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fa fa-paperclip bg-primary"></i>

                        <div class="timeline-item">


                          <h3 class="timeline-header"><a href="#">رخصة تجارية </a> </h3>

                          <div class="timeline-body">
                            {{user.companyfile.name}}
                          </div>
                          <div class="timeline-footer">
                            <a :href="user.companyfile.path" class="btn btn-primary btn-sm" download>download</a>

                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fa fa-paperclip bg-success"></i>

                        <div class="timeline-item">


                          <h3 class="timeline-header text-success"><a href="#">رخصة الانجازات </a> </h3>

                          <div class="timeline-body">
                            {{user.achivement_file.name}}
                          </div>
                          <div class="timeline-footer">
                            <a :href="user.achivement_file.path" class="btn btn-success btn-sm" download>download</a>

                          </div>
                        </div>
                      </div>
                      <!-- END timeline item
                      timeline item
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div> -->
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <!-- <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div> -->
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <!-- <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div> -->
                      <!-- END timeline item -->
                      <!-- <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div> -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>


<script>
import AllUae from '../auth/AllUae.vue';
export default {
  components: { AllUae },

data(){
    return{
        id :this.$route.params.id,
        data:null

    }
},
methods: {
    getDataUser(){

        axios.get('admin/Construction/profile/'+this.id).then(res=>{
           this.data = res.data;
        })

    }
},
created() {
    this.getDataUser();
},
}
</script>
