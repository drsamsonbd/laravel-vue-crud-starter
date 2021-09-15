<template>
  <section class="content"> 
  <div>

 <hr>
 <div class="row">
   <div class="col-lg-12 ">
  <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian PKRC</h6>
                </div>

    <div class="container-fluid">
  <br> 
      <b-form inline>
           <label class="mr-sm-2" for="inline-form-custom-select-pref">Tarikh</label>
    <b-form-input
      id="inline-form-input-name"
      class="mb-4 mr-sm-2 mb-sm-0"
      type="date"
      v-model="datereporting"
    ></b-form-input>


    <label class="mr-sm-3" for="inline-form-custom-select-pref">PKRC</label>
    <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0"
      v-model="selectedpkrc"
    > <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option></b-form-select>

   
    <b-button variant="primary" @click="report()">Pilih fasiliti</b-button>
  </b-form>
                   
                           <br>  <hr>

<!--    <div class="row">
        <div class="col">
            <p>Tarikh: {{tarikh}}</p>
        </div>
    </div> -->

                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="male" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="female" disabled>
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="paeds_male" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="paeds_female" disabled >
      
    </div>
  </div>
                   


  

                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Warga Emas Lelaki </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="senior_male" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Warga Emas Perempuan </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="senior_female" disabled>
    </div>
                     
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Warganegara </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="local" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> BWN </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="non_local" disabled>
    </div>

  </div>
   <div class="form-group row">

            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Pecahan Lelaki </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="total_male" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Pecahan Perempuan </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="total_female" disabled>
    </div>
      <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><code></code> <b> Jumlah Keselurahan Pesakit </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="total" disabled>
    </div>
   
     
  </div>
 <hr>
 
                            <h6><b>KUMULATIF</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Jumlah Dimasukkan </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="cumulative_admissions" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Jumlah Discaj </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="cumulative_discharges" disabled >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Step Up ke Hospital </b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="step_up" disabled>
      
    </div>
    
  </div> 


  </div>
              
         

               
          </div>


              </div>
            </div>
          </div>
            </div>  

   </div>


  </section>


</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})

    
      }
      },
     mounted(){
       this.pkrclist();



     },
     data(){
      return{
          tarikh: new Date().toISOString().slice(0,10),
          pkrcs:[],
          selectedpkrc: null,
          datereporting: null,       
     
          date: null, 
          time: null, 
          pkrc: null, 
          male: null, 
          female: null, 
          paeds_male: null, 
          paeds_female: null, 
          senior_male: null,
          senior_female: null,
          total_male: null,
          total_female: null,
          local: null,
          non_local: null,
          total: null,
          cumulative_admissions: null,
          cumulative_discharges: null,
          step_up: null,       

      
      
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

    },
 
  methods:{
       pkrclist(){
    let self = this;
     axios.get('/api/pkrc/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.pkrcs = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

    
    report(){
    let self = this;
     axios.get('/api/laporanDewasaPerempuan/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.female  = response.data[0].count;
      }),
        axios.get('/api/laporanDewasaLelaki/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.male  = response.data[0].count;
      }),
        axios.get('/api/laporanKanakLelaki/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.paeds_male  = response.data[0].count;
      })
     ,
        axios.get('/api/laporanKanakPerempuan/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.paeds_female  = response.data[0].count;
      }),
        axios.get('/api/laporanDewasaPerempuanEmas/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.senior_female  = response.data[0].count;
      }),
        axios.get('/api/laporanDewasaLelakiEmas/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.senior_male  = response.data[0].count;
      }),
           axios.get('/api/laporanPerempuan/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.total_female  = response.data[0].count;
      }),
        axios.get('/api/laporanLelaki/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.total_male  = response.data[0].count;
      }),
              axios.get('/api/laporanJumlah/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.cumulative_admissions  = response.data[0].count;
      }) , 
 
        axios.get('/api/laporanStepUp/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.step_up  = response.data[0].count;
      }),
            axios.get('/api/laporanDischarges/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.cumulative_discharges  = response.data[0].count;
      }) ,  
      axios.get('/api/laporanJumlahHarian/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.total  = response.data[0].count;
      })
       ,           axios.get('/api/WN/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.local  = response.data[0].count;
      })
      ,           axios.get('/api/BWN/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.non_local = response.data[0].count;
      })

    }
  }
 
  }   
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>