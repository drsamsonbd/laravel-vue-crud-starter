<template>
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">   
                   <b-breadcrumb :items="itemize"></b-breadcrumb>     
        </div><!-- /.row --> 
      </div><!-- /.container-fluid -->
   
    <!-- /.content-header --><hr>
    <section class="content">

        <div class="container-fluid">
           <div class="row">
            <div class="col">
              <h5><label for=""> BELURAN</label></h5>
            </div>
          </div> 

<!-- /.statistik kesihatan -->
   <div class="row ">

              

                <div class="col-12 col-sm-3 ">
                  
                    <div class="info-box mb-4">
                    
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-head-side-virus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kes Harian</span>
                         <h4><b>
                            {{statBD}}
                           </b> </h4>
                        </div>
                        <!-- /.info-box-content -->
                     
                    </div>
                   
                </div>
                          <div class="col-12 col-sm-3 ">
                 
                    <div class="info-box mb-4">
                    
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-viruses"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kes Aktif</span>
                         <h4><b>
                            {{statBActive}}
                           </b> </h4>
                        </div>
                        <!-- /.info-box-content -->
                     
                    </div>
             
                </div>
                
                <!-- /.col -->
                <div class="col-12 col-sm-3 ">
                 
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kumulatif Kes</span>
                             <h4><b>{{statBCumulative}}</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
          
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                    <div class="col-12 col-sm-3 ">
                 
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-head-side-cough-slash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kematian</span>
                             <h4><b>9</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
             
                    <!-- /.info-box -->
                </div>
         
            <!-- /.col -->
            </div>

<!-------------------------------------------TELUPID---------------------------------------------------------------------------------->
             <div class="row">
            <div class="col">
              <h5><label for=""> TELUPID</label></h5>
            </div>
          </div> 

<!-- /.statistik kesihatan -->
       <div class="row ">

              

                <div class="col-12 col-sm-3 ">
                 
                    <div class="info-box mb-4">
                    
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-head-side-virus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kes Harian</span>
                         <h4><b>
                            {{statTD}}
                           </b> </h4>
                        </div>
                        <!-- /.info-box-content -->
                     
                    </div>
                </div>
                          <div class="col-12 col-sm-3 ">
                    <div class="info-box mb-4">
                    
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-viruses"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kes Aktif</span>
                         <h4><b>
                            {{statTActive}}
                           </b> </h4>
                        </div>
                        <!-- /.info-box-content -->
                     
                    </div>
                </div>
                
                <!-- /.col -->
                <div class="col-12 col-sm-3 ">
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kumulatif Kes</span>
                             <h4><b>{{statTCumulative}}</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                    <div class="col-12 col-sm-3 ">
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-head-side-cough-slash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kematian</span>
                             <h4><b>3</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
         
            <!-- /.col -->
            </div>
<!-- End statistisik kesihatan-->

          <div class="row">
            <div class="col">
              <h5><label for=""> PKRC</label></h5>
            </div>
          </div> 
            <div class="row ">

              

                <div class="col-12 col-sm-4 ">
                    <div class="info-box mb-4">
                    
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-head-side-virus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Dalam Rawatan</span>
                         <h4><b>
                            {{items.length}}
                           </b> </h4>
                        </div>
                        <!-- /.info-box-content -->
                     
                    </div>
                </div>
                
                <!-- /.col -->
                <div class="col-12 col-sm-4 ">
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-head-side-cough-slash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kumulatif Discaj</span>
                             <h4><b>{{discharges.length}}</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                    <div class="col-12 col-sm-4 ">
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kumulatif Pesakit</span>
                             <h4><b>{{admissions.length}}</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
         
            <!-- /.col -->
            </div>

          <div class="row">
               <div class="col-12 col-sm-12 ">
<center><h4>Kemasukan Pesakit ke PKRC</h4></center>
   <bar-chart v-if="loaded" :chart-data="counts" :chart-labels="labels"></bar-chart>
       </div>
       </div>    
<br>
          <div class="row">
               <div class="col-12 col-sm-12 ">
<center><h4>Laporan Harian PKRC</h4></center>
   <LaporanHarian/>
       </div>
       </div>    


            </div>
     
    </section>
    </div>
</template>

<script>

  import BarChart from './charts/BarChart'
  import LaporanHarian from './report/LaporanHarian';
    export default {
      components:{
     BarChart, LaporanHarian
      },
      mounted() {

           this.allCases();
           this.allDischarges();
           this.allAdmissions();
          this.requestData();
          this.BD();
          this.BActive();
          this.BCumulative();
            this.TD();
          this.TActive();
          this.TCumulative();
        },
        data(){
            return{

         itemize: [
          {
            text: 'Dashboard',
            href: true
          },
         
        ],
        items:[],
        discharges:[],
        admissions:[],
      
          package: null,
          loaded: false,
          counts: [],
          labels: [],
          statBD:null,
          statBActive: null,
          statBCumulative: null,
           statTD:null,
          statTActive: null,
          statTCumulative: null,

        }
        },
         computed:{
      filtersearch(){
      return this.users.filter(user => {
         return user.name.match(this.searchTerm)
      }) 
      },
      rows() {
        return this.items.length
        
      },
      row(){
          return this.discharges.length
      },
      rowz(){
          return this.admissions.length
      }
    },
 
  methods:{



// BELURAN STAT
// daily
   BD(){
      let self = this;
     axios.get('/api/statisticsBD/')
       .then(function (response) {
        self.statBD = response.data[0].count;
   });
   },
  BActive(){
      let self = this;
     axios.get('/api/statisticsBBW/')
       .then(function (response) {
        self.statBActive = response.data[0].count;
   });
   },
  BCumulative(){
     let self = this;
     axios.get('/api/statisticsBC/')
       .then(function (response) {
        self.statBCumulative = response.data;
   });
   },

      TD(){
      let self = this;
     axios.get('/api/statisticsTD/')
       .then(function (response) {
        self.statTD = response.data[0].count;
   });
   },
  TActive(){
      let self = this;
     axios.get('/api/statisticsTBW/')
       .then(function (response) {
        self.statTActive = response.data[0].count;
   });
   },
  TCumulative(){
     let self = this;
     axios.get('/api/statisticsTC/')
       .then(function (response) {
        self.statTCumulative = response.data;
   });
   },
      allCases(){
    let self = this;
     axios.get('/api/active/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
          allDischarges(){
    let self = this;
     axios.get('/api/discharge/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.discharges = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },   
    
    allAdmissions(){
    let self = this;
     axios.get('/api/admission/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.admissions = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    requestData () {
    axios.get(`api/admissionChart/`)
    .then(response => {
      this.counts = response.data.map(data => data.count)
      this.labels = response.data.map(data  => data.date)
      
      this.loaded = true
    })
   .catch(function (error) {
        console.log(error);
      });
    }

      }
        } 
  
    

</script>
<style>
#box-number{
  font-size: 1.8em;
}
</style>
