  

<template v-for="table">
 <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">CARIAN</h6>
                </div>
<br>

<!-- ADMISSIONS-->
<div class="container-fluid">
    <header> <b> NAMA ATAU NOMBOR PENGENALAN</b></header> 
                <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="search.name"
              type="search"
              placeholder="Nama atau nombor kad pengenalan"
            ></b-form-input>

            <b-input-group-append>
              <b-button variant="outline-primary" @click="searchName()">Cari</b-button>
            </b-input-group-append>
          </b-input-group>
          
        </b-form-group>   
<br>
    <header> <b> DATA KEMASUKAN </b></header> 
  <form class="user" @submit.prevent="searchAdmission" >  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group 
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
        
          <b-input-group size="md">

<b-form-input v-model="admission.date_from"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>
      
<b-form-input v-model="admission.date_until"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>
         
          </b-input-group>
        </b-form-group>     

</b-col>   <b-input-group-append>
              <b-button type="submit" variant="outline-primary" > <b>Cari </b></b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
  </form>  


<!-- DISCAJ-->

    <header> <b> DATA DISCAJ </b></header>
  <form class="user" @submit.prevent="searchDischarge" >  <div class="form-group">
   <b-form-row>
        
                       <b-col >
    

            <b-form-group 
          label=""
          label-for="filter-input"
          label-cols-sm="0"
          label-align-sm="left"
          label-size="md"
          class="mb-0"
        >
        
          <b-input-group size="md">

<b-form-input v-model="discharge.date_from"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>
      
<b-form-input v-model="discharge.date_until"
         placeholder="Tarikh" type="date"         
        required >
  </b-form-input>
         
          </b-input-group>
        </b-form-group>     

</b-col>   <b-input-group-append>
              <b-button type="submit" variant="outline-primary" > <b>Cari </b></b-button>
            </b-input-group-append>
                     </b-form-row>
                          </div>
  </form>   <hr>
  </div>
<b-row > 
<b-col>
  
  <h5 class="mt-3" v-if="!isHidden" style="color:blue" id="jumlah" > <b>Jumlah Pesakit:  {{ items.length }}</b></h5>
  </b-col>
  </b-row>

<b-row   v-if="!isHidden">
        <b-col sm="6" class="my-1">
        <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Carian"
            ></b-form-input>

            <b-input-group-append>
              <b-button variant="outline-secondary" :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col sm="3"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-select
            id="per-page-select"
             v-model="perPage"
            :options="pageOptions"
            size="sm"
          ></b-form-select>
        </b-form-group>
      </b-col>

   
    </b-row> <br>
<div class="container-fluid">
      <b-table  responsive  bordered
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
      @row-clicked="viewPatient"

       v-if="!isHidden"
    >


      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
              
               <div class="card-footer" v-if="!isHidden" >
                   <p class="mt-3"  align="center">Current Page: {{ currentPage }}</p>
                      <b-pagination  align="center"
                      v-model="currentPage"
                      :total-rows="rows"
                      :per-page="perPage"
                      
                       last-number
                      aria-controls="my-table"
                    ></b-pagination>
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

     
        this.getward();     
        this.allCases();
     
  
      },

      
     data(){
      return{
          isHidden: true,

          count: null,
          races:[],
          wards:[],
          districts:[],
          localities:[],
          hospitals:[],
          views:[], 
          races: [],
          options:[],
          areas:[], 
          selectedward: null,

          form:{
          kp_passport: null,
          reg_number: null,
          kp_passport: null,
          ward: null,
          marriage: null,
          religion: null,
          kin: null,
          kin_address: null,
          kin_relation: null,
          kin_phone: null,
          date: null,
          time: null,
          weight: null,
          adm_diagnosis: null,
          adm_stage: null,
          note: null

        },
         search:{ name: null },
         admission:{
             date_from: null,
             date_until: null
         },
            discharge:{
             date_from: null,
             date_until: null
         },
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
            {
            text: 'Carian',
            href: 'true'
          },
       
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'name',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [    
               { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. KP', sortable: true, sortDirection: 'desc' },
          { key: 'age', label: 'Umur', sortable: true, sortDirection: 'desc' },
            { key: 'gender', label: 'Jantina', sortable: true, sortDirection: 'desc' }, 
        
          { key: 'date', label: 'Tarikh Masuk', sortable: true, sortDirection: 'asc' },          
         { key: 'time_bed', label: 'Masa', sortable: true, sortDirection: 'asc' },
          { key: 'rn', label: 'RN', sortable: true, sortDirection: 'asc' },
             { key:'bed_code', label: 'Katil', sortable: true, sortDirection: 'asc' },   
          { key: 'diagnosis', label: 'Diagnosis', sortable: true, sortDirection: 'desc', tdClass: 'setDxTdClass' },
          { key: 'stage', label: 'Stage', sortable: true, sortDirection: 'desc' },
          { key: 'vaccine', label: 'Vaccination', sortable: true, sortDirection: 'desc' },
           { key: 'discipline', label: 'Disiplin', sortable: true, sortDirection: 'desc' },
           { key: 'date_dc', label: 'Tarikh Discaj', sortable: true, sortDirection: 'desc' },
        ],
        table:'',
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
  setDxTdClass(value) {
       var adm_diagnosis = value;
      if(adm_diagnosis === 'COVID-19')
        return 'text-red';
    },

      allCases(){
    let self = this;
     axios.get('/api/wardbedActives'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },




   searchAdmission(){
    this.isHidden = false;
    let self = this;
     axios.get('/api/SearchWardAdmissionRecord/'+ '?token='+ localStorage.getItem('token'), { params: { date_from: this.admission.date_from,
     date_until: this.admission.date_until } })
      .then(function (response) {
        self.items = response.data;
      })
    },

      searchDischarge(){
    this.isHidden = false;
    let self = this;
     axios.get('/api/SearchWardDischargeRecord/'+ '?token='+ localStorage.getItem('token'), { params: { date_from: this.discharge.date_from,
     date_until: this.discharge.date_until } })
      .then(function (response) {
        self.items = response.data;
      })
    },

      searchName(){
    this.isHidden = false;
    let self = this;
     axios.get('/api/SearchRecord/'+ this.search.name + '?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      })
    },

       getward(){
    let self = this;
     axios.get('/api/ward/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.options = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

         viewPatient(record) {
        let routeData = this.$router.resolve({name: 'inpatientdetails', query: { id: record.kp_passport } } )
        window.open(routeData.href, '_blank');
   
  },

 },
  }   
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
  #jumlah{
    margin-left: 20px;

  }

</style>