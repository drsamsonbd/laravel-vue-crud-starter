<template>
  <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
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
    ></b-form-input>


    <label class="mr-sm-3" for="inline-form-custom-select-pref">PKRC</label>
    <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0"
      
    > <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option></b-form-select>

   
    <b-button variant="primary" @click="report()">Pilih fasiliti</b-button>
  </b-form>
                   
                           <br>  <hr>
                            <h6><b>Bilangan Pesakit</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.male">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.female" >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.paeds_male">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="form.paeds_female">
      
    </div>
  </div>
                   
       <hr>
                            <h6><b>Staging</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Stage 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> Stage 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_2">
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Stage 3 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_3">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Stage 4</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_4">
    </div>
  </div>
  
<hr>
    <h6><b>Bilangan kes</b></h6>
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Kemasukan Baru </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.new_admission">
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code></code> <b>Step Up </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.step_up">
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code></code> <b> Discaj </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.discharged">
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code></code> <b>HQ </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.home_q">
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code></code> <b>Pending Admission</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.pending">
    </div>
  </div>

    <h6><b>Jumlah</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Warganegara </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.local">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> BWN </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.non_local">
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Penjaga </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.carer">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>BOR</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.bor">
    </div>
  </div>
 <hr>
  <h6><b><u>Bilangan Pesakit Menerima Vaksin </u></b></h6>
                     <h6> Pesakit Stage 1</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_1_1">
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_1_2">
    </div>
       
  </div>        

              <h6> Pesakit Stage 2</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_2_1">
    </div> <div class="col-sm-1">
    </div>

   
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_2_2">
    </div>
       
  </div>        
                    <h6> Pesakit Stage 3</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_3_1">
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_3_2">
    </div>
       
  </div>    
   <h6> Pesakit Stage 4</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_4_1">
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_4_2">
    </div>
       
  </div>   

  <hr>
                            <h6><b>Pesakit PUI</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.pui_adult_male">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.pui_adult_female" >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.pui_paeds_male">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="form.pui_paeds_female">
      
    </div>
  </div> 

                         
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Kemasukan Baru </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.pui_new">
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code></code> <b>Discaj </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.pui_discharged" >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code></code> <b>Kematian </b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.pui_death">
      
    </div>

  </div> 
<hr>
               <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> <code></code> <b>Bilangan Staf Bertugas </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.staff">
      
    </div>
   

  </div> <hr>
              
                    <div class="form-group">
                      <label> <code></code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                       
                    </div>
                 
                    <hr>

               
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
       this.pkrc();



     },
     data(){
      return{
      
          pkrcs:[],
         
          form:{
          date: null, 
          time: null, 
          pkrc: null, 
          male: null, 
          female: null, 
          paeds_male: null, 
          paeds_female: null, 
          new_adm: null, 
          step_up: null, 
          discharged: null, 
          home_q: null, 
          pending: null, 
          carer: null, 
          local: null, 
          non_local: null, 
          bor: null, 
          stage_1: null, 
          stage_2: null, 
          stage_3: null, 
          stage_4: null, 
          stage_5: null, 
          stage_1_1: null, 
          stage_1_2: null, 
          stage_2_1: null, 
          stage_2_2: null, 
          stage_3_1: null, 
          stage_3_2: null, 
          stage_4_1: null, 
          stage_4_2: null, 
          stage_5_1: null, 
          stage_5_2: null, 
          staff: null, 
          pui_adult_male: null, 
          pui_adult_female: null, 
          pui_paeds_male: null, 
          pui_paeds_female: null, 
          pui_new: null, 
          pui_discharged: null, 
          pui_death: null, 
          notes: null, 
          },
      
        itemize: [
          {
            text: 'Dashboard',
            href: '/'
          },
          {
            text: 'Laporan',
            active: true
          },
        ],
          

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
         sortBy: 'date',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
          { key: 'date', label: 'Tarikh', sortable: true, sortDirection: 'asc' },
          { key: 'time', label: 'Masa', sortable: true, sortDirection: 'desc' },
          { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
          { key: 'male', label: 'Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'female', label: 'Perempuan', sortable: true, sortDirection: 'desc' },
          { key: 'paeds_male', label: 'Kanak-kanak Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'paeds_female', label: 'Kanak-kanak Perempuan', sortable: true, sortDirection: 'desc' },
         // { key: 'carer', label: 'Penjaga', sortable: true, sortDirection: 'desc' },
        //  { key: 'local', label: 'Warganegara', sortable: true, sortDirection: 'desc' },
        //  { key: 'non_local', label: 'BWN', sortable: true, sortDirection: 'desc' },
          //{ key: 'bor', label: 'BOR', sortable: true, sortDirection: 'desc' },
         //{ key: 'stage_1', label: 'Stage 1', sortable: true, sortDirection: 'desc' },
       // { key: 'stage_2', label: 'Stage 2', sortable: true, sortDirection: 'desc' },
       // { key: 'staff', label: 'Staf Bertugas', sortable: true, sortDirection: 'desc' },
      //  { key: 'notes', label: 'Nota', sortable: true, sortDirection: 'desc' },
        { key: 'actions', label: 'Actions' },

        ],
      
      
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
      }
    },
 
  methods:{
       pkrc(){
    let self = this;
     axios.get('/api/pkrc/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.pkrcs = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

 },
  }   
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>