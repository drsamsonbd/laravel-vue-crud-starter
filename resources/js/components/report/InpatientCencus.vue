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
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian Pesakit Dalam</h6>
                </div>

    <div class="container-fluid">
<form class="user" @submit.prevent="submitCensus">
    <b-row>
     <b-col cols="12">
    <label >Ketua Jururawat Bertugas :</label>  <span>  {{form.name_kj}} </span>             
  <input type="text" class="form-control" id="mo" v-model="form.name_kj" disabled hidden>
  </b-col>
 </b-row> 
  <b-form inline>
           <label class="mr-sm-2" for="inline-form-custom-select-pref">Tarikh</label>
    <b-form-input
      id="inline-form-input-name"
      class="mb-4 mr-sm-2 mb-sm-0"
      type="date"
      v-model="form.datereporting"
    required ></b-form-input>


    <label class="mr-sm-3" for="inline-form-custom-select-pref">Syif</label>
    <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0"
      v-model="form.shift"
    required>   <option value="Pagi">Pagi</option>
                          <option value="Petang">Petang</option>
                          <option value="Malam">Malam</option></b-form-select>
        
    <b-button variant="primary" @click="report()">Lihat Census</b-button>
  </b-form>
           

       <br>  <hr>
   <h6><b>CENCUS NON-COVID</b></h6>
   <!--NON COVID-->
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Lelaki </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" v-model="form.male_ward" disabled>      
    </div>

       <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Perempuan</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="children" v-model="form.female_ward" disabled>      
    </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Bersalin </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="maternity" v-model="form.maternity_ward" disabled>
        </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Kanak-kanak</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.children_ward" disabled>      
    </div>
   </div>
       <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Akut</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.acute_ward" disabled>      
    </div>
   <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB Lelaki</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.male_tb_ward" disabled>      
    </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB Perempuan</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.female_tb_ward" disabled>      
    </div>   
    </div>
    <hr>
         
 
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.male" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.female" disabled >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.paeds_male" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="form.paeds_female" disabled>
       
    </div> 
      </div>

    <!--admissison, discharge, step up/down-->
 
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.non_covid_new_admission" disabled>
    </div>

         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Disaj</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.non_covid_discharged" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Step Up</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.non_covid_step_up" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kematian</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.non_covid_death" disabled> 
    </div>
    </div>      
       <hr>
   
<!--COVID-->
   <h6><b>CENCUS COVID</b></h6>
  
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.covid_male" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.covid_female" disabled >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.covid_paeds_male" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="form.covid_paeds_female" disabled>
       
    </div> 
      </div>

          <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Warganegara</b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.covid_local" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Bukan Warganegara</b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.covid_non_local" disabled >
      
    </div>

      </div>
  <hr>
    <!--Staging-->
                            <h6><b>Covid Patient Staging</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.stage_1" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b> Stage 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s2" v-model="form.stage_2" disabled>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s3" v-model="form.stage_3" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 4</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s4" v-model="form.stage_4" disabled>
    </div>
      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Stage 5</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s5" v-model="form.stage_5" disabled>
    </div>
  </div>
  
<hr>

        

<!--Vaccination-->

  <h6><b><u>Bilangan Pesakit Menerima Vaksin </u></b></h6>
                     
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <b>Stage 1 :</b> </label>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs11" v-model="form.stage_1_1" disabled>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs12" v-model="form.stage_1_2" disabled>
    </div>
       
  </div>        

                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <b>Stage 2 :</b> </label>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs21" v-model="form.stage_2_1" disabled>
    </div> <div class="col-sm-1">
    </div>

   
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs22" v-model="form.stage_2_2" disabled>
    </div>
       
  </div>        
                           <div class="form-group row">
<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <b>Stage 3 :</b> </label>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs31" v-model="form.stage_3_1" disabled>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs32" v-model="form.stage_3_2" disabled>
    </div>
       
  </div>    

       <div class="form-group row">
       <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <b>Stage 4 :</b> </label>                            
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs41" v-model="form.stage_4_1" disabled>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs42" v-model="form.stage_4_2" disabled> 
    </div>
       
  </div>   
     <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <b>Stage 5 :</b> </label>     
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs51" v-model="form.stage_5_1" disabled>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="vs52" v-model="form.stage_5_2" disabled>
    </div>
       
  </div>   
  <hr>

    <h6><b>Bilangan Kemasukan Baru</b></h6>
        <div class="form-group row">

         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 1</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.new_stage_1" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 2</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.new_stage_2" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.new_stage_3" disabled>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 4</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns4" v-model="form.new_stage_4" disabled>
    </div>
                           </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 5</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns5" v-model="form.new_stage_5" disabled>
    </div>

<br>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Pending</b></label>
    <div class="col-sm-1">
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.covid_pending" >
    </div>
  </div>

    <!--admissison, discharge, step up/down-->
 
  <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.covid_new_admission" disabled>
    </div>

         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Disaj</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.covid_discharged" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Step Up</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.covid_step_up" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kematian</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.covid_death" disabled> 
    </div>
</div>
        <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Home Quarantine</b> </label>

    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.covid_home_q" disabled> 
    </div>
    </div>      
   
    
<!-- PUI--> <hr>
    <h6><b>CENCUS PUI</b></h6>
  
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.pui_male" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.pui_female" disabled >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.pui_paeds_male" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="form.pui_paeds_female" disabled>
       
    </div> 
      </div>
    

    <!--admissison, discharge, step up/down-->
 
  <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.pui_admission" disabled>
    </div>

         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Disaj</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.pui_discharged" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Step Up</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.pui_step_up" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kematian</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.pui_death" disabled> 
    </div>
    </div>      

<!-- SARI--> <hr>
    <h6><b>CENCUS SARI</b></h6>
  
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.sari_male" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.sari_female" disabled >
      
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki</b> </label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pmale" v-model="form.sari_paeds_male" disabled>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="pfemale" v-model="form.sari_paeds_female" disabled>
       
    </div> 
      </div>
   

    <!--admissison, discharge, step up/down-->
 
  <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.sari_admission" disabled>
    </div>

         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Disaj</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.sari_discharged" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Step Up</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.sari_step_up" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kematian</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.sari_death" disabled> 
    </div>
    </div>      
       <hr>
<!--Oxygen-->

    <h6><b>Penggunaan Oksigen</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Concentrator </b> </label>
    <div class="col-sm-1">
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_conc" required>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Oxygen Concentrator Occupied </b></label>
    <div class="col-sm-1">
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_conc_occupied" required>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Cylinder </b> </label>
    <div class="col-sm-1">
   <input type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder" required>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Oxygen Cylinder Occupied</b></label>
    <div class="col-sm-1">
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder_occupied" required>
    </div>
  </div> 
  <hr>

                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> <code>*</code> <b>JUMLAH KESELURUHAN PESAKIT</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.total" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> BOR </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.bor" disabled>
    </div>
  
  </div> 
  <hr>
                <div class="form-group">
    <label for="colFormLabelSm" > <code>*</code> <b>Staf Bertugas </b> </label>
 
      <textarea type="text" class="form-control "  id="staff" v-model="form.staff"></textarea>

   

  </div> 
<hr>
                      
      
                    <div class="form-group">
                      <label> <code>*</code>Catatan</label>
                      <textarea 
                        auto-grow
                        input type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Hantar</button>
                    </div>
                    <hr>
</form>    
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
        this.user();


     },
     data(){
      return{
      
          form:{
          datereporting: null,   
          shift: null,
          name_kj:null,
          male: null, 
          female: null, 
          paeds_male: null, 
          paeds_female: null, 
          non_covid_new_admission: null, 
          non_covid_step_up: null, 
          non_covid_discharged: null, 
          non_covid_death: null,
          male_ward: null,
          female_ward: null,
          maternity_ward: null,
          children_ward: null,
          male_tb_ward: null,
          female_tb_ward: null,
          acute_ward: null,
          covid_new_admission: null, 
          covid_step_up: null, 
          covid_discharged: null, 
          covid_death: null,
          covid_home_q: null, 
          covid_male: null, 
          covid_female: null, 
          covid_paeds_male: null, 
          covid_paeds_female: null, 
          covid_local: null, 
          covid_non_local: null, 
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
          new_stage_1: null, 
          new_stage_2: null, 
          new_stage_3: null, 
          new_stage_4: null, 
          new_stage_5: null, 
          pui_adult_male: null, 
          pui_adult_female: null, 
          pui_paeds_male: null, 
          pui_paeds_female: null, 
          pui_admission: null, 
          pui_discharged: null, 
          pui_step_up: null, 
          pui_death: null, 
          sari_adult_male: null, 
          sari_adult_female: null, 
          sari_paeds_male: null, 
          sari_paeds_female: null, 
          sari_admission: null, 
          sari_discharged: null, 
          sari_step_up: null, 
          sari_death: null, 
          staff: null, 
          total: null,
          bor: null, 
          notes: null, 
          o2_conc: null,
          o2_conc_occupied: null,
          o2_cylinder: null,
          o2_cylinder_occupied: null,
          covid_pending: null,
        },
        errors:'',
        itemize: [
          {
            text: 'Laporan',
            href: '#'
          },
          
          {
            text: 'Pesakit Dalam',
            active: true
          },
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
      },

    },
 
  methods:{

    user(){
      let loggeduser = localStorage.getItem('user')
      this.form.name_kj = loggeduser;
    }, 
    report(){
    let self = this;
     axios.get('/api/inpatient/cencus/noncovid',{ params: { datereporting: this.form.datereporting } })
      .then(function (response) {
          self.form.male= response.data.statistic_nca_male[0].count; 
          self.form.female= response.data.statistic_nca_female[0].count; 
          self.form.paeds_male= response.data.statistic_nca_male_paeds[0].count; 
          self.form.paeds_female= response.data.statistic_nca_female_paeds[0].count; 
          self.form.non_covid_new_admission= response.data.statistic_nca_new_admission[0].count; 
          self.form.non_covid_step_up= response.data.statistic_nca_step_up[0].count; 
          self.form.non_covid_discharged= response.data.statistic_nca_new_discharges[0].count; 
          self.form.non_covid_death= response.data.statistic_nca_death[0].count;
          self.form.male_ward= response.data.statistic_nca_male_ward[0].count;
          self.form.female_ward= response.data.statistic_nca_female_ward[0].count;
          self.form.maternity_ward= response.data.statistic_nca_maternity_ward[0].count;
          self.form.children_ward= response.data.statistic_nca_children_ward[0].count;
          self.form.male_tb_ward= response.data.statistic_nca_male_tb_ward[0].count;
          self.form.female_tb_ward= response.data.statistic_nca_female_tb_ward[0].count;
          self.form.acute_ward= response.data.statistic_nca_acute_ward[0].count;
          self.form.total= response.data.total;
          self.form.bor= response.data.total_bor;


      }),
         axios.get('/api/inpatient/cencus/covid',{ params: { datereporting: this.form.datereporting } })
        .then(function (response) {
         self.form.covid_new_admission = response.data.statistic_covid_new_admission[0].count; 
         self.form.covid_step_up = response.data.statistic_covid_step_up[0].count; 
         self.form.covid_discharged = response.data.statistic_covid_new_discharges[0].count; 
         self.form.covid_death = response.data.statistic_covid_death[0].count;
         self.form.covid_home_q = response.data.statistic_covid_home_q[0].count; 
         self.form.covid_male = response.data.statistic_covid_male[0].count; 
         self.form.covid_female = response.data.statistic_covid_female[0].count; 
         self.form.covid_paeds_male = response.data.statistic_covid_male_paeds[0].count; 
         self.form.covid_paeds_female = response.data.statistic_covid_female_paeds[0].count; 
         self.form.covid_local = response.data.statistic_covid_local[0].count; 
         self.form.covid_non_local = response.data.statistic_covid_non_local[0].count; 
         self.form.stage_1 = response.data.statistic_stage_1[0].count; 
         self.form.stage_2 = response.data.statistic_stage_2[0].count; 
         self.form.stage_3 = response.data.statistic_stage_3[0].count; 
         self.form.stage_4 = response.data.statistic_stage_4[0].count; 
         self.form.stage_5 = response.data.statistic_stage_5[0].count; 
         self.form.stage_1_1 = response.data.statistic_stage_1_1[0].count; 
         self.form.stage_2_1 = response.data.statistic_stage_2_1[0].count; 
         self.form.stage_3_1 = response.data.statistic_stage_3_1[0].count; 
         self.form.stage_4_1 = response.data.statistic_stage_4_1[0].count; 
         self.form.stage_5_1 = response.data.statistic_stage_5_1[0].count; 
         self.form.stage_1_2 = response.data.statistic_stage_1_2[0].count; 
         self.form.stage_2_2 = response.data.statistic_stage_2_2[0].count; 
         self.form.stage_3_2 = response.data.statistic_stage_3_2[0].count; 
         self.form.stage_4_2 = response.data.statistic_stage_4_2[0].count; 
         self.form.stage_5_2 = response.data.statistic_stage_5_2[0].count; 
         self.form.new_stage_1 = response.data.statistic_covid_new_admission_1[0].count;
         self.form.new_stage_2 = response.data.statistic_covid_new_admission_2[0].count;
         self.form.new_stage_3 = response.data.statistic_covid_new_admission_3[0].count;
         self.form.new_stage_4 = response.data.statistic_covid_new_admission_4[0].count;
         self.form.new_stage_5 = response.data.statistic_covid_new_admission_5[0].count;
      }),
          axios.get('/api/inpatient/cencus/pui',{ params: { datereporting: this.form.datereporting } })
        .then(function (response) {
         self.form.pui_admission = response.data.statistic_pui_new_admission[0].count; 
         self.form.pui_step_up = response.data.statistic_pui_step_up[0].count; 
         self.form.pui_discharged = response.data.statistic_pui_new_discharges[0].count; 
         self.form.pui_death = response.data.statistic_pui_death[0].count;
         self.form.pui_male = response.data.statistic_pui_male[0].count; 
         self.form.pui_female = response.data.statistic_pui_female[0].count; 
         self.form.pui_paeds_male = response.data.statistic_pui_male_paeds[0].count; 
         self.form.pui_paeds_female = response.data.statistic_pui_female_paeds[0].count; 




      }),
       axios.get('/api/inpatient/cencus/sari',{ params: { datereporting: this.form.datereporting } })
        .then(function (response) {
         self.form.sari_admission = response.data.statistic_sari_new_admission[0].count; 
         self.form.sari_step_up = response.data.statistic_sari_step_up[0].count; 
         self.form.sari_discharged = response.data.statistic_sari_new_discharges[0].count; 
         self.form.sari_death = response.data.statistic_sari_death[0].count;
         self.form.sari_male = response.data.statistic_sari_male[0].count; 
         self.form.sari_female = response.data.statistic_sari_female[0].count; 
         self.form.sari_paeds_male = response.data.statistic_sari_male_paeds[0].count; 
         self.form.sari_paeds_female = response.data.statistic_sari_female_paeds[0].count; 


      });
    },
    submitCensus(){
          axios.post('/api/nursing/census'+ '?token='+ localStorage.getItem('token'), this.form)
          .then(() => {
              Toast.fire({
              icon: 'success',
              title: 'Laporan telah dihantar!'
                  })
         })
          this.$router.push({name: 'NursingCensus' });
  

    }
  }
 
  }   
</script>

<style type="text/css">

</style>