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
      v-model="datereporting"
    ></b-form-input>


    <label class="mr-sm-3" for="inline-form-custom-select-pref">Syif</label>
    <b-form-select
      id="inline-form-custom-select-pref"
      class="mb-3 mr-sm-2 mb-sm-0"
      v-model="form.shift"
    >   <option value="Pagi">Pagi</option>
                          <option value="Petang">Petang</option>
                          <option value="Malam">Malam</option></b-form-select>
        
    <b-button variant="primary" @click="report()">Generate Cencus</b-button>
  </b-form>
           

       <br>  <hr>
   <h6><b>CENCUS NON-COVID</b></h6>
   <!--NON COVID-->
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
    <hr>
         
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Lelaki </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" v-model="form.ward_male" disabled>      
    </div>

       <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Perempuan</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="children" v-model="form.ward_female" disabled>      
    </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Bersalin </b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="maternity" v-model="form.ward_maternity" disabled>
        </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Kanak-kanak</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.ward_children" disabled>      
    </div>
   </div>

    <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad Akut</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.ward_acute" disabled>      
    </div>
   <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB Lelaki</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.ward_male_tb" disabled>      
    </div>
      <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Wad TB Perempuan</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="tb" v-model="form.ward_female_tb" disabled>      
    </div>   
    </div>
    <!--admissison, discharge, step up/down-->
 
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.nc_admission" disabled>
    </div>

         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Disaj</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.nc_discharged" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Step Up</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.nc_step_up" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kematian</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.nc_death" disabled> 
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
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.newstage_1" disabled>
    </div>

        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 2</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns2" v-model="form.newstage_2" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns3" v-model="form.newstage_3" disabled>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 4</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns4" v-model="form.newstage_4" disabled>
    </div>
                           </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 5</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="ns5" v-model="form.newstage_5" disabled>
    </div>

<br>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Pending</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.pending" disabled>
    </div>
  </div>

    <!--admissison, discharge, step up/down-->
 
  <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.covid_admission" disabled>
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
    <hr>

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
    <hr>

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
<hr>
    <h6><b>Penggunaan Oksigen</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Concentrator </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.o2_conc">
                         <small class="text-danger" v-if="errors.o2_conc">{{errors.o2_conc[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Oxygen Concentrator Occupied </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.o2_conc_occupied">
                         <small class="text-danger" v-if="errors.o2_conc_occupied">{{errors.o2_conc_occupied[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Cylinder </b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder">
                         <small class="text-danger" v-if="errors.o2_cylinder">{{errors.o2_cylinder[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Oxygen Cylinder Occupied</b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder_occupied">
                         <small class="text-danger" v-if="errors.o2_cylinder_occupied">{{errors.o2_cylinder_occupied[0]}}</small>
    </div>
  </div> 
  <hr>
                <div class="form-group">
    <label for="colFormLabelSm" > <code>*</code> <b>Staf Bertugas </b> </label>
 
      <textarea type="text" class="form-control "  id="staff" v-model="form.staff"></textarea>
      
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>

   

  </div> 
<hr>
                      
      
                    <div class="form-group">
                      <label> <code>*</code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Hantar</button>
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
       this.pkrclist();
        this.user();


     },
     data(){
      return{
      
          pkrcs:[],
          selectedpkrc: null,
          datereporting: null,       
     
        form:{
          name_kj:null,
          date: null, 
          time: null, 
          pkrc: null, 
          male: null, 
          female: null, 
          paeds_male: null, 
          paeds_female: null, 
          new_admission: null, 
          step_up: null, 
          discharged: null, 
          home_q: null, 
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
          pui_step_up: null, 
          notes: null, 
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
     user(){
      let loggeduser = localStorage.getItem('user')
      this.form.name_kj = loggeduser;
    }, 
    report(){
    let self = this;
     axios.get('/api/CovidFemale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.female  = response.data[0].count;
      }),
        axios.get('/api/CovidMale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.male  = response.data[0].count;
      }),
        axios.get('/api/CovidMalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.paeds_male  = response.data[0].count;
      })
     ,
        axios.get('/api/CovidFemalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.paeds_female  = response.data[0].count;
      })
        ,
        axios.get('/api/stageOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_1  = response.data[0].count;
      })    ,
        axios.get('/api/stageTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_2  = response.data[0].count;
      })    ,
        axios.get('/api/stageThree/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_3  = response.data[0].count;
      })    ,
        axios.get('/api/stageFour/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_4  = response.data[0].count;
      })    ,
        axios.get('/api/stageFive/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_5  = response.data[0].count;
      })
       ,
        axios.get('/api/newAdmission/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.new_admission  = response.data[0].count;
      }),
        axios.get('/api/stepUp/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.step_up  = response.data[0].count;
      }),
            axios.get('/api/statDischarges/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.discharged  = response.data[0].count;
      }) ,           axios.get('/api/HQ/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.home_q  = response.data[0].count;
      })
       ,           axios.get('/api/WN/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.local  = response.data[0].count;
      })
      ,           axios.get('/api/BWN/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.non_local = response.data[0].count;
      })
       ,           axios.get('/api/stageOneVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_1_1 = response.data[0].count;
      })
         ,           axios.get('/api/stageOneVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_1_2 = response.data[0].count;
      })   ,           axios.get('/api/stageTwoVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_2_1 = response.data[0].count;
      }) ,           axios.get('/api/stageTwoVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_2_2 = response.data[0].count;
     }) ,           axios.get('/api/stageThreeVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_3_1 = response.data[0].count;
     })  ,           axios.get('/api/stageThreeVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_3_2 = response.data[0].count;
     }) ,           axios.get('/api/stageFourVaccineOne/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_4_1 = response.data[0].count;
     })   ,           axios.get('/api/stageFourVaccineTwo/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.stage_4_2 = response.data[0].count;
     })  ,           axios.get('/api/PUIMale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_adult_male = response.data[0].count;
     })  ,           axios.get('/api/PUIFemale/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_adult_female = response.data[0].count;
     })  ,           axios.get('/api/PUIMalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_paeds_male = response.data[0].count;
     }) 
      ,           axios.get('/api/PUIFemalePaeds/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_paeds_female = response.data[0].count;
     })   ,           axios.get('/api/newAdmissionPUI/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_new = response.data[0].count;
     })    ,           axios.get('/api/statDischargesPUI/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_discharged = response.data[0].count;
     }) ,           axios.get('/api/stepUpPUI/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.pui_step_up = response.data[0].count;
     }) ,           axios.get('/api/BOR/',{ params: { pkrc: this.selectedpkrc, datereporting: this.datereporting } })
      .then(function (response) {
        self.bor = response.data;
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