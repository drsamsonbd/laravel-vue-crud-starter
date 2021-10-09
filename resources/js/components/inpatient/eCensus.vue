  

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
                  <h6 class="m-0 font-weight-bold text-primary">Census Harian Wad</h6>
                </div>

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
      v-model="form.ward_id"
    required>   <option v-for="ward in options" v-bind:key="ward.ward" v-bind:value="ward.id" >{{ward.ward }} </option> </b-form-select>


     
                      <label class="mr-sm-3" for="inline-form-custom-select-pref">Disiplin</label>
                         <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0" v-model="form.discipline_id" required>
                        <option v-for="discipline in disciplines" v-bind:key="discipline.discipline" v-bind:value="discipline.id" >{{discipline.discipline }} </option>
                        
                         </b-form-select>
              
        
    <b-button variant="primary" @click="getCensus()">Lihat Census</b-button>
  </b-form>

   </div>
    </b-row>
<br>

     <table  class="table mt-5" border="1" >
         <thead>
           <tr>
    <th>Bil.</th>
    <th scope="col" colspan="2" style="font-size:18px; text-align:center">Butir-Butir Banci</th>
    <th scope="col" colspan="3" style="font-size:18px; text-align:center">Jumlah Keseluruhan dalam Wad</th>
    <th scope="col" colspan="2" style="font-size:18px; text-align:center">{{selected_discipline}}</th>
  </tr>
  </thead>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td ><div style='width: 100px; text-align:center'>Lelaki</div></td>
    
    <td ><div style='width: 100px; text-align:center'>Perempuan</div></td>
    <td ><div style='width: 100px; text-align:center'>Jumlah</div></td>
    <td ><div style='width: 100px; text-align:center'>Lelaki</div></td>
    
    <td ><div style='width: 100px; text-align:center'>Perempuan</div></td>
  </tr>
      <tr>
    <td>4</td>
    <td scope="col" colspan="2">Bilangan pesakit yang dibawa dari hari kelmarin</td>
    <td ><div style='width: 100px; text-align:center'>{{census.kelmarin_total_male  }}</div></td>    
    <td ><div style='width: 100px; text-align:center'>{{census.kelmarin_total_female  }}</div></td>
    <td ><div style='width: 100px; text-align:center'>{{census.kelmarin_total_total  }}</div></td>
    <td ><div style='width: 100px; text-align:center'>{{census.kelmarin_discipline_male  }}</div></td>    
    <td ><div style='width: 100px; text-align:center'>{{census.kelmarin_discipline_female  }}</div></td>
  </tr>
  <tr>
    <td>5</td>
    <th rowspan="3">
     Jumlah bilangan kemasukan</th>
    <td>Dewasa (lebih 12 tahun)</td>
     <td ><div style='width: 100px; text-align:center'>0</div></td>
    
    <td ><div style='width: 100px; text-align:center'>0</div></td>
    <td ><div style='width: 100px; text-align:center'>0</div></td>
    <td ><div style='width: 100px; text-align:center'>0</div></td>
    
    <td ><div style='width: 100px; text-align:center'>0</div></td>
   
  </tr>
  <tr>
    <td>6</td>
    <td>Kanak-kanak (1 - 12 tahun)</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Bayi (di bawah 1 tahun)</td>
  </tr>
  <tr>
    <td>8</td>
    <td scope="col" colspan="2">Bilangan pesakit yang dipindah masuk dari wad-wad lain</td>
  </tr>
<tr>
    <td>9</td>
    <td scope="col" colspan="2">**Bilangan pesakit yang dipindah masuk dari disiplin lain di dalam wad yang sama</td>
  </tr>
<tr>
    <td>10</td>
    <td scope="col" colspan="2">Jumlah bilangan pesakit (4 + 5 + 6 + 7 + 8 + 9)</td>
  </tr>
    <tr>
    <td>11</td>
    <th rowspan="6">
     Jumlah bilangan discaj</th>
    <td>Balik ke rumah</td>
   
  </tr>
    <tr>
    <td>12</td>
    <td>Engkar Nasihat Doktor (DAMA)/Dengan Risiko Sendiri (AOR)</td>
  </tr>
     <tr>
    <td>13</td>
    <td>Tanpa Kebenaran</td>
  </tr>
     <tr>
    <td>14</td>
    <td>Dipindah ke Hospital Lain</td>
  </tr>
     <tr>
    <td>15</td>
    <td>Mati</td>
  </tr>
     <tr>
    <td>16</td>
    <td>Kebenaran Bercuti</td>
  </tr>

    <tr>
    <td>17</td>
    <td scope="col" colspan="2">Bilangan pesakit yang dipindah keluar ke wad-wad lain</td>
  </tr>
      <tr>
    <td>18</td>
    <td scope="col" colspan="2">**Bilangan pesakit yang dipindah keluar ke disiplin lain di dalam wad yang sama</td>
  </tr>
      <tr>
    <td>19</td>
    <td scope="col" colspan="2">Jumlah bilangan pesakit yang tinggal pada tengah malam [10 - (11 + 12 + 13 + 14 + 15 + 16 + 17)]</td>
  </tr>
      <tr>
    <td>20</td>
    <td scope="col" colspan="2">Bilangan pesakit yang masuk dan keluar pada hari yang sama</td>
  </tr>
    <tr>
    <td>21</td>
    <th rowspan="3">Bilangan pesakit yang tinggal pada tengah malam mengikut kelas</th>
    <td>Kelas 1</td>
     </tr>
         <tr>
    <td>22</td>
    <td>Kelas 2</td>
  </tr>
      <tr>
    <td>23</td>
    <td>Kelas 3</td>
  </tr>
</table>          
                       

                    
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
        this.getward();
        this.getDiscipline();

      },

      
     data(){
      return{
                 
        itemize: [
          {
            text: 'Pesakit Dalam',
            href: '#'
          },
          {
            text: 'Census Harian',
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
        options: [],
        disciplines: [],
        form:{
                datereporting: null,
                ward_id: null,
                discipline_id: null,
        },
        selected_discipline: null,
        census:{
            kelmarin_total_male: null,
            kelmarin_total_female: null,
            kelmarin_total_total: null,
            kelmarin_discipline_male: null,
            kelmarin_discipline_female: null,
        },
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
      getCensus(){
        let selected = this.form.discipline_id
        let self = this;
        axios.get('/api/discipline/'+ selected +'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.selected_discipline = response.data.discipline;
      }),
         
      axios.get('/api/inpatient/cencus/inpatient',{ params: { datereporting: this.form.datereporting,
      ward_id: this.form.ward_id, discipline_id: this.form.discipline_id} })
      .then(function (response) {
          self.census = response.data;


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
            getDiscipline(){
    let self = this;
     axios.get('/api/discipline'+'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.disciplines = response.data;
      })
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