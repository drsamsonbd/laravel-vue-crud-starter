  

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
                  <h6 class="m-0 font-weight-bold text-primary">Bilangan Pesakit</h6>
                </div>


<b-row>
    <b-col>
    <div class="input-group mb-3">    
        
    <b-form-select v-model="selectedward"
         placeholder="Sila pilih fasiliti"        
         >
                     <option v-for="ward in options" v-bind:key="ward.ward" v-bind:value="ward.id" >{{ward.ward }} </option> 
                </b-form-select>     <button size="sm" variant="outline-primary" @click="getbyWard()">Pilih Wad</button> <br>
    
         
    </div>
</b-col>
</b-row>
<b-row > 
<b-col>
  
  <h5 class="mt-3" v-if="!isHidden" style="color:blue" id="jumlah" > <b>Jumlah Pesakit:  {{ count }}</b></h5>
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

       <template #cell(update)="row">
    <div v-if="(row.item.rn ==null && row.item.status == null )">
 
</div>
       <div v-else>
         <div v-if=" row.item.team_id == current_team_id">
     <router-link :to="{name: 'inpatientupdate', query:{id:row.item.BDid, ward_id: row.item.ward_id }}"  target="_blank"  class="btn btn-sm btn-outline-danger"><i class="fas fa-pen"></i></router-link> <br>
  </div>
  <div v-else> 
     <button  class="btn btn-sm btn-alt" disabled><i class="fas fa-pen"></i></button> <br>
  </div>
</div> 
      
      </template>
 <template #cell(discharge)="row">
   
 <div v-if="(row.item.rn ==null && row.item.status == null ) ">
    <div v-if=" row.item.team_id == current_team_id">
      <router-link :to="{name: 'newinpatientadmission', query:{id:row.item.id}}"  target="_blank" class="btn btn-sm btn-outline-primary"> <i class="fas fa-plus"></i> </router-link>
</div>
 
  <div v-else> 
     <button  class="btn btn-sm btn-alt" disabled><i class="fas fa-plus"></i></button> <br>
  </div>
 </div>
<div v-else> 
  <div v-if=" row.item.team_id == current_team_id">
    <router-link :to="{name: 'inpatientdischargeform', query:{rn:row.item.rn, id:row.item.BDid}}"  target="_blank"  class="btn btn-sm btn-success"><i class="fas fa-sign-out-alt"></i></router-link> <br>
 
  </div>
  <div v-else> 
     <button  class="btn btn-sm btn-alt" disabled><i class="fas fa-sign-out-alt"></i></button> <br>
  </div>
    </div>      
      </template>

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

         <!-- Table not hidden -->

            <div class="row" v-if="isHidden">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
              



<b-row > 
<b-col>
  
  <h5 class="mt-3" v-if="isHidden" style="color:blue" id="jumlah" > <b>Jumlah Pesakit:  {{ items.length }}</b></h5>
  </b-col>
  </b-row>

<b-row   v-if="isHidden">
<b-col sm="2" class="my-1" align="right">
        </b-col>
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
     

       v-if="isHidden"
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>



      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
              
               <div class="card-footer" v-if="isHidden" >
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
          
          <!--Row-->
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
        this.userTeam();
  
      },

      
     data(){
      return{
          isHidden: true,
          current_team_id:'',
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
         
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
            {
            text: 'Wad',
            href: 'inpatientactive'
          },
          {
            text: 'Aktif',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'bed_code',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [     
          { key:'bed_code', label: 'Katil', sortable: true, sortDirection: 'asc' },       
          { key: 'date_bed', label: 'Tarikh', sortable: true, sortDirection: 'asc' },          
         // { key: 'time_bed', label: 'Masa', sortable: true, sortDirection: 'asc' },
          { key: 'rn', label: 'RN', sortable: true, sortDirection: 'asc' },
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. KP', sortable: true, sortDirection: 'desc' },
          { key: 'age', label: 'Umur', sortable: true, sortDirection: 'desc' },
         // { key: 'gender', label: 'Jantina', sortable: true, sortDirection: 'desc' },
          { key: 'diagnosis', label: 'Diagnosis', sortable: true, sortDirection: 'desc', tdClass: 'setDxTdClass' },
          { key: 'stage', label: 'Stage', sortable: true, sortDirection: 'desc' },
          { key: 'vaccine', label: 'Vaccination', sortable: true, sortDirection: 'desc' },
           { key: 'discipline', label: 'Disiplin', sortable: true, sortDirection: 'desc' },
          { key: 'update', label: '', class: 'text-center' },
          { key: 'discharge', label: '', class: 'text-center' },
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

   userTeam() {
        let self = this;
        axios.post('/api/auth/me'+ '?token='+ localStorage.getItem('token'))
        .then(({data}) => (self.current_team_id = data.current_team_id))
        
        .catch(function (error) {
        console.log(error); 

      });    
     
      },



    getbyWard(){
     this.isHidden = false;
    let self = this;
     axios.get('/api/wardbedActive'+ '?token='+ localStorage.getItem('token'), { params: { ward: this.selectedward } })
      .then(function (response) {
        self.items = response.data;
      }),
          axios.get('/api/wardbedActive/count/'+ '?token='+ localStorage.getItem('token'), { params: { ward: this.selectedward } })
      .then(function (response) {
        self.count = response.data;
      })
      
      .catch(function (error) {
        console.log(error);
      });
    },

       getward(){
    let self = this;
     axios.get('/api/ward'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.options = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

         viewPatient(record) {
        this.$router.push({name: 'inpatientdetails', query: { id: record.kp_passport } })
   
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