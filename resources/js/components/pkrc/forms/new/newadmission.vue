<template v-for="table">
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
                  <h6 class="m-0 font-weight-bold text-primary">Carian Data Pesakit </h6>
                </div>
<div class="container-fluid"><br>
<b-row>
    <b-col cols="12">
    

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
              <b-button variant="primary" @click="searchName()">Cari</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>     

</b-col>
</b-row> <br>



<b-row   v-if="!isHidden">

   
    </b-row> <br>
<div class="container-fluid">
      <b-table  responsive 
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
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

       <template #cell(action)="row">
       <router-link :to="{name: 'newAdmission', params:{id:row.item.kp_passport}}" class="btn btn-sm btn-secondary"><i class="fas fa-procedures white"></i></router-link> <br>
        
         
       
    
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

  <!--  <b-row>
        <b-col>
          <p align= "center"> Pesakit tidak wujud. Sila daftar baru.  
               <router-link :to="{name: 'dischargeform'}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></router-link>
      </p> 
        </b-col>
    </b-row>-->
<br>
              </div>
            </div>
          </div>
          

   
               
         </div>
            </div>   
          </div>
          <!--Row-->
          </div>
 </div>
</section>
</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/login'})

      } 

    },
      

      
     data(){
      return{
          isHidden: true,
            search:{
                name: null,
                kp_passport:null
            },
 
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
            {
            text: 'PKRC-',
            href: '#'
          },
          {
            text: 'Carian',
            active: true
          },
        ],

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'name',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [     
           { key: 'id', label: 'ID', sortable: true, sortDirection: 'asc' },       
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'age', label: 'Umur', sortable: true, sortDirection: 'desc' },
          { key: 'gender', label: 'Jantina', sortable: true, sortDirection: 'desc' },
         //   { key: 'view', label: 'View' },
         { key: 'action', label: 'Admit' },
        ],
        table:'',
      }
 





    },   

  methods:{
    searchName(){
    this.isHidden = false;
     let self = this;
     axios.get('/api/patient/search/' + this.search.name + '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
      
      });
    },

         viewPatient(record) {
        this.$router.push({name: 'details', params: { id: record.kp_passport } })
   
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