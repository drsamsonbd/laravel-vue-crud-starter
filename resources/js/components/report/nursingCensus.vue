  

<template>
  <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="container-fluid">
 <div class="row">
   <div class="col-lg-12 ">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian Kejururawatan</h6>
                </div>

    <div class="container-fluid">

    <b-row >
 
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
      @row-clicked="view"
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
          </div>
          <!--Row-->
  </section>

</template>



<script type="text/javascript">
 
  export default {
      
     mounted(){
        this.report();

      },

      
     data(){
      return{
                 
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
          modalShow: false,

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
          { key: 'datereporting', label: 'Tarikh', sortable: true, sortDirection: 'asc' },
        { key: 'shift', label: 'Syif', sortable: true, sortDirection: 'desc' },
          { key: 'name_kj', label: 'KJ ', sortable: true, sortDirection: 'desc' },
          { key: 'total', label: 'Jumlah Pesakit', sortable: true, sortDirection: 'desc' },
          { key: 'bor', label: 'BOR %', sortable: true, sortDirection: 'desc' },          
            { key: 'staff', label: 'Staf Bertugas', sortable: true, sortDirection: 'desc' },
          { key: 'notes', label: 'Catatan', sortable: true, sortDirection: 'desc' },
        
    
        //{ key: 'actions', label: 'Actions' },

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
      report(){
    let self = this;
     axios.get('/api/nursing/census/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
      });

      },
        view(record) {
        this.$router.push({name: 'NursingCensusDetails', params: { id: record.id } })
   
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