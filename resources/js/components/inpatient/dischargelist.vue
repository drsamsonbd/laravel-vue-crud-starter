  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
<section class="content">  

<div class="container-fluid">
   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Senarai Pesakit Discaj</h6>
                </div>

<br>
    
<div class="container-fluid">
<br>
        <b-row >
   <div class="container-fluid">
     <b-form inline>
           <label class="mr-sm-2" for="inline-form-custom-select-pref">Tarikh</label>
    <b-form-input
      id="inline-form-input-name"
      class="mb-4 mr-sm-2 mb-sm-0"
      type="date"
      v-model="form.datereporting"
    required ></b-form-input>


    <label class="mr-sm-3" for="inline-form-custom-select-pref">Wad</label>
    <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0"
      v-model="form.ward_id" required  >   <option v-for="ward in options" v-bind:key="ward.ward" v-bind:value="ward.id" >{{ward.ward }} </option> </b-form-select>

              
    <b-button variant="primary" @click="DiscajList()">Senarai Discaj</b-button>
  </b-form>

   </div>
    </b-row>
<br>

<b-row>
<!--   <b-col sm="1" class="my-1" align="right">
           <b-button pill size="sm" variant="outline-secondary" id="show-btn" @click="showModal"> <i class="fas fa-plus"></i>&nbsp;Tambah</b-button>
        </b-col>-->
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

      <b-col sm="4"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="6"
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

   
    </b-row>

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
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(actions)="row">
        <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1">
         <i class="fas fa-user-edit"></i>
        </b-button>
        <b-button size="sm" class="btn btn-sm btn-danger" @click="deleteUser(row.item.id)">
         <i class="fas fa-user-times"></i>
        </b-button>
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
                </div>
               <div class="card-footer">
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
                     
            </section>
          </div>
          <!--Row-->



</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/login'})

    
      }
  
    },
      
     mounted(){

        this.getward()
  
      },

      
     data(){
      return{
 
    itemize: [
          {
            text: 'Pesakit Dalam',
            href: '/inpatientactive'
          },
          {
            text: 'Discaj',
            active: true
          },
        ],
          modalShow: false,

                 options: [],
        disciplines: [],
        form:{
                datereporting: null,
                ward_id: null,
        },

        perPage: 15,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'date_dc',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
         { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },         
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'age', label: 'Umur', sortable: true, sortDirection: 'asc' },
           { key: 'race', label: 'Bangsa', sortable: true, sortDirection: 'asc' },
            { key: 'date', label: 'Tarikh Masuk Wad', sortable: true, sortDirection: 'asc' },
             { key: 'ward', label: 'Wad', sortable: true, sortDirection: 'asc' },
          { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'desc' },
         
          { key: 'type_dc', label: 'Jenis Discharges', sortable: true, sortDirection: 'desc' },
          { key: 'date_dc', label: 'Tarikh Disaj', sortable: true, sortDirection: 'desc' },
          { key: 'duration', label: 'Bilangan Hari', sortable: true, sortDirection: 'desc' },
          
          { key: 'diagnosis', label: 'Diagnosis', sortable: true, sortDirection: 'desc' },
          { key: 'notes', label: 'Catatan', sortable: true, sortDirection: 'desc' },
       //    { key: 'actions', label: 'Actions' },
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

      DiscajList(){
    let self = this;
      axios.get('/api/inpatient/dischargelist'+'?token='+ localStorage.getItem('token'),{ params: { datereporting: this.form.datereporting,
      ward_id: this.form.ward_id }})
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
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
        this.$router.push({name: 'inpatientdetails', params: { id: record.kp_passport } })

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