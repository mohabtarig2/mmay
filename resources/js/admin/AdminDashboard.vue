<template>

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">AMB PROJECT MANAGMENT</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{counts.AllTendersConsulate}}</h3>

                  <p>All Conslute tenders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>

                <router-link to="/Conslute-Tenders" class="small-box-footer">
                  More info
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                    <div class="inner">
                  <h3>{{counts.AllTenderConsr}}</h3>

                  <p>All Construaction Tenders </p>
                </div>



                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <router-link :to="{name:'ConsrTender'}" class="small-box-footer">
                  More info
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{counts.user}}</h3>

                  <p>users Regiseterations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                      <div class="inner">
                  <h3>
                  {{counts.Consulte}}
                  </h3>

                  <p>Consulate Company</p>
                </div>

                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <section>
          <div class="row">

                <div class="col-lg-3 col-6">
                  <div class="card text-right" dir="rtl" >
                      <div class="h5"> مناقصة الاستشارات </div>


                        <div class="text-dark mt-3">
                             {{counts.ConsluteComplete }}
                            مكتمل
                             <span class="float-left">  {{
                               Math.floor((counts.ConsluteComplete * 100)/
                                 counts.AllTendersConsulate)

                                 }}% </span>
                        </div>


                      <div class="progress progress--slim">
                            <div class="progress-bar bg-success " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" :style="'width:'+
                            (counts.ConsluteComplete * 100)/
                                 counts.AllTendersConsulate+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                        <div class="text-dark mt-3">
                            {{counts.ConsluteExcuted}}

                            تحت التنفيذ
                            <span class="float-left">  {{
                                 Math.floor((counts.ConsluteExcuted * 100)/
                                 counts.AllTendersConsulate)

                                 }}% </span>
                            </div>
                      <div class="progress progress--slim">
                            <div class="progress-bar  warning-tender" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.ConsluteExcuted * 100)/
                                 counts.AllTendersConsulate)+'%'">
                                <span class="sr-only">{{Math.floor((counts.ConsluteComplete * 100)/
                                 counts.AllTendersConsulate)}}%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.ConsluteReview}}
                                  تحت المراجعة
                                                   <span class="float-left">  {{
                                Math.floor( (counts.ConsluteReview * 100)/
                                 counts.AllTendersConsulate)

                                 }}% </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                            :style="'width:'+Math.floor((counts.ConsluteReview * 100)/
                                 counts.AllTendersConsulate) +'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.ConsluteDraft}}
                                  مسودة
                            <span class="float-left">
                                  {{ Math.floor((counts.ConsluteDraft * 100) /counts.AllTendersConsulate)}}%
                                 </span>
                                   </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-secondary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.ConsluteDraft * 100) /counts.AllTendersConsulate)+'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                              <div class="text-dark mt-3">
                                {{counts.ConsluteOpen}}
                                  مفتوحة
                                  <span class="float-left">
                                  {{ Math.floor((counts.ConsluteOpen * 100) /counts.AllTendersConsulate)}}%
                                 </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar  before-complete" role="progressbar" aria-valuenow="80"
                             aria-valuemin="0" aria-valuemax="100" :style="'width:'+Math.floor((counts.ConsluteOpen * 100) /counts.AllTendersConsulate)+ '%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                               <div class="text-dark mt-3">
                                                                     {{counts.ConsluteClosed}}
                                   مغلقة
<span class="float-left">
                                  {{ Math.floor((counts.ConsluteClosed * 100) /counts.AllTendersConsulate)}}%
                                 </span>
                                     </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar closed-tender " role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" :style="'width:'+ Math.floor((counts.ConsluteClosed * 100) /counts.AllTendersConsulate)+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                  </div>
              </div>
        <div class="col-lg-3 col-6">
                  <div class="card text-right" dir="rtl" >
                      <div class="h5"> مناقصة المقاولات </div>


                        <div class="text-dark mt-3">
                             {{counts.ConsrComplete }}
                            مكتمل
                             <span class="float-left">  {{
                               Math.floor((counts.ConsrComplete * 100)/
                                 counts.AllTenderConsr)

                                 }}% </span>
                        </div>


                      <div class="progress progress--slim">
                            <div class="progress-bar bg-success " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" :style="'width:'+
                            (counts.ConsrComplete * 100)/
                                 counts.AllTenderConsr+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                        <div class="text-dark mt-3">
                            {{counts.ConsrExcuted}}

                            تحت التنفيذ
                            <span class="float-left">  {{
                                 Math.floor((counts.ConsrExcuted * 100)/
                                 counts.AllTenderConsr)

                                 }}% </span>
                            </div>
                      <div class="progress progress--slim">
                            <div class="progress-bar  warning-tender" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.ConsrExcuted * 100)/
                                 counts.AllTenderConsr)+'%'">
                                <span class="sr-only">{{Math.floor((counts.ConsrComplete * 100)/
                                 counts.AllTenderConsr)}}%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.ConsrReview}}
                                  تحت المراجعة
                                                   <span class="float-left">  {{
                                Math.floor( (counts.ConsrReview * 100)/
                                 counts.AllTenderConsr)

                                 }}% </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                            :style="'width:'+Math.floor((counts.ConsrReview * 100)/
                                 counts.AllTenderConsr) +'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.ConsrDraft}}
                                  مسودة
                            <span class="float-left">
                                  {{ Math.floor((counts.ConsrDraft * 100) /counts.AllTenderConsr)}}%
                                 </span>
                                   </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-secondary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.ConsrDraft * 100) /counts.AllTenderConsr)+'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                              <div class="text-dark mt-3">
                                {{counts.ConsrOpen}}
                                  مفتوحة
                                  <span class="float-left">
                                  {{ Math.floor((counts.ConsrOpen * 100) /counts.AllTenderConsr)}}%
                                 </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar  before-complete" role="progressbar" aria-valuenow="80"
                             aria-valuemin="0" aria-valuemax="100" :style="'width:'+Math.floor((counts.ConsrOpen * 100) /counts.AllTenderConsr)+ '%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                               <div class="text-dark mt-3">
                                                                     {{counts.ConsrClosed}}
                                   مغلقة
<span class="float-left">
                                  {{ Math.floor((counts.ConsrClosed * 100) /counts.AllTenderConsr)}}%
                                 </span>
                                     </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar closed-tender " role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" :style="'width:'+ Math.floor((counts.ConsrClosed * 100) /counts.AllTenderConsr)+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                  </div>
              </div>
               <div class="col-lg-3 col-6">
                  <div class="card text-right" dir="rtl" >
                      <div class="h5"> مناقصة تكييف </div>


                        <div class="text-dark mt-3">
                             {{counts.hvacComplete }}
                            مكتمل
                             <span class="float-left">  {{
                               Math.floor((counts.hvacComplete * 100)/
                                 counts.AllTenderhvac)

                                 }}% </span>
                        </div>


                      <div class="progress progress--slim">
                            <div class="progress-bar bg-success " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" :style="'width:'+
                            (counts.hvacComplete * 100)/
                                 counts.AllTenderhvac+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                        <div class="text-dark mt-3">
                            {{counts.hvacExcuted}}

                            تحت التنفيذ
                            <span class="float-left">  {{
                                 Math.floor((counts.hvacExcuted * 100)/
                                 counts.AllTenderhvac)

                                 }}% </span>
                            </div>
                      <div class="progress progress--slim">
                            <div class="progress-bar  warning-tender" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.hvacExcuted * 100)/
                                 counts.AllTenderhvac)+'%'">
                                <span class="sr-only">{{Math.floor((counts.hvacComplete * 100)/
                                 counts.AllTenderhvac)}}%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.hvacReview}}
                                  تحت المراجعة
                                                   <span class="float-left">  {{
                                Math.floor( (counts.hvacReview * 100)/
                                 counts.AllTenderhvac)

                                 }}% </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                            :style="'width:'+Math.floor((counts.hvacReview * 100)/
                                 counts.AllTenderhvac) +'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.hvacDraft}}
                                  مسودة
                            <span class="float-left">
                                  {{ Math.floor((counts.hvacDraft * 100) /counts.AllTenderhvac)}}%
                                 </span>
                                   </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-secondary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.hvacDraft * 100) /counts.AllTenderhvac)+'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                              <div class="text-dark mt-3">
                                {{counts.hvacOpen}}
                                  مفتوحة
                                  <span class="float-left">
                                  {{ Math.floor((counts.hvacOpen * 100) /counts.AllTenderhvac)}}%
                                 </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar  before-complete" role="progressbar" aria-valuenow="80"
                             aria-valuemin="0" aria-valuemax="100" :style="'width:'+Math.floor((counts.hvacOpen * 100) /counts.AllTenderhvac)+ '%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                               <div class="text-dark mt-3">
                                                                     {{counts.hvacClosed}}
                                   مغلقة
<span class="float-left">
                                  {{ Math.floor((counts.hvacClosed * 100) /counts.AllTenderhvac)}}%
                                 </span>
                                     </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar closed-tender " role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" :style="'width:'+ Math.floor((counts.hvacClosed * 100) /counts.AllTenderhvac)+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                  </div>
              </div>

                 <div class="col-lg-3 col-6">
                  <div class="card text-right" dir="rtl" >
                      <div class="h5"> مناقصة حجر </div>


                        <div class="text-dark mt-3">
                             {{counts.stoneComplete }}
                            مكتمل
                             <span class="float-left">  {{
                               Math.floor((counts.stoneComplete * 100)/
                                 counts.AllTenderstone)

                                 }}% </span>
                        </div>


                      <div class="progress progress--slim">
                            <div class="progress-bar bg-success " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" :style="'width:'+
                            (counts.stoneComplete * 100)/
                                 counts.AllTenderstone+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                        <div class="text-dark mt-3">
                            {{counts.stoneExcuted}}

                            تحت التنفيذ
                            <span class="float-left">  {{
                                 Math.floor((counts.stoneExcuted * 100)/
                                 counts.AllTenderstone)

                                 }}% </span>
                            </div>
                      <div class="progress progress--slim">
                            <div class="progress-bar  warning-tender" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.stoneExcuted * 100)/
                                 counts.AllTenderstone)+'%'">
                                <span class="sr-only">{{Math.floor((counts.stoneComplete * 100)/
                                 counts.AllTenderstone)}}%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.stoneReview}}
                                  تحت المراجعة
                                                   <span class="float-left">  {{
                                Math.floor( (counts.stoneReview * 100)/
                                 counts.AllTenderstone)

                                 }}% </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-warning " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                            :style="'width:'+Math.floor((counts.stoneReview * 100)/
                                 counts.AllTenderstone) +'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                              <div class="text-dark mt-3">
                                  {{counts.stoneDraft}}
                                  مسودة
                            <span class="float-left">
                                  {{ Math.floor((counts.stoneDraft * 100) /counts.AllTenderstone)}}%
                                 </span>
                                   </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar bg-secondary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             :style="'width:'+Math.floor((counts.stoneDraft * 100) /counts.AllTenderstone)+'%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                              <div class="text-dark mt-3">
                                {{counts.stoneOpen}}
                                  مفتوحة
                                  <span class="float-left">
                                  {{ Math.floor((counts.stoneOpen * 100) /counts.AllTenderstone)}}%
                                 </span>
                                  </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar  before-complete" role="progressbar" aria-valuenow="80"
                             aria-valuemin="0" aria-valuemax="100" :style="'width:'+Math.floor((counts.stoneOpen * 100) /counts.AllTenderstone)+ '%;'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>
                               <div class="text-dark mt-3">
                                                                     {{counts.stoneClosed}}
                                   مغلقة
<span class="float-left">
                                  {{ Math.floor((counts.stoneClosed * 100) /counts.AllTenderstone)}}%
                                 </span>
                                     </div>

                      <div class="progress progress--slim">
                            <div class="progress-bar closed-tender " role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" :style="'width:'+ Math.floor((counts.stoneClosed * 100) /counts.AllTenderstone)+'%'">
                                <span class="sr-only">100%</span>
                            </div>
                        </div>

                  </div>
              </div>

          </div>

      </section>
      <!-- /.content -->
    </div>

</template>
<script>
export default {
  data() {
    return {
      counts: null,
      conssulteCompletePrcente: null

    };
  },

  precent(){
    this.conssulteCompletePrcente =  (this.counts.ConsluteComplete*100)/this.counts.AllTendersConsulate
    console.log(this.counts.AllTendersConsulate)
  },

  created() {

      this.precent();
  },
  watch:{
        GetCounts() {
      axios.get("countAll").then((res) => {
        this.counts = res.data;
      });
    },
  },
  computed: {
    GetCounts() {
      axios.get("countAll").then((res) => {
        this.counts = res.data;
      });
    },
  },
};
</script>

<style  scoped>
#navbar_top{
    display: none;
}
</style>
<style  scoped>
.progress--slim {
    box-shadow: none;
    height: 8px;
    border-radius: 5px;
    background-color: #f0f0f0 !important;
}
.closed-tender{
    background-color: #9e9e9e !important;
}

.warning-tender{
    background-color: #f8772b !important;
}

.before-complete{
    background-color: #80c19b !important;
}



</style>
