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
              <h5><label for=""> PKRC</label></h5>
            </div>
          </div> 
            <div class="row ">

              

                <div class="col-12 col-sm-6 ">
                    <router-link to="/active">
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
                    <!-- /.info-box --> </router-link>
                </div>
                
                <!-- /.col -->
                <div class="col-12 col-sm-6 ">
                   <router-link to="/admission">
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-head-side-cough-slash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kumulatif Discaj</span>
                             <h4><b>{{discharges.length}}</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                   </router-link>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 ">
                   <router-link to="/discharge">
                    <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kumulatif Pesakit</span>
                             <h4><b>{{admissions.length}}</b></h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                   </router-link>
                    <!-- /.info-box -->
                </div>
         
            <!-- /.col -->
            </div>

            <div class="container">
<center><h1>Vue laravel Chartjs</h1></center>
         <PlanetChart/>
       </div>
        </div>
    </section>
    </div>
</template>

<script>

import PlanetChart from './charts/PlanetChart'
    export default {
  components: {
    PlanetChart
  },
      mounted() {

      
           this.allCases();
           this.allDischarges();
           this.allAdmissions();
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

    }
    }

</script>
<style>
#box-number{
  font-size: 1.8em;
}
</style>
