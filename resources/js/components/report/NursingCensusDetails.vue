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
     <br>    
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Tarikh </b></label>
    <div class="col-sm-2">
       <input type="text" class="form-control form-control-sm" v-model="form.datereporting" disabled>      
    </div>

       <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Syif</b></label>
    <div class="col-sm-1">
       <input type="text" class="form-control form-control-sm" id="children" v-model="form.shift" disabled>      
    </div>
      <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>KJ Bertugas </b></label>
    <div class="col-sm-4">
       <input type="text" class="form-control" id="maternity" v-model="form.name_kj" disabled>
        </div>
  
   </div>
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
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.covid_pending"  disabled>
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
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.pui_adult_male" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.pui_adult_female" disabled >
      
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
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.pui_new" disabled>
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
      <input type="text" class="form-control form-control-sm"  id="male" v-model="form.sari_adult_male" disabled>

    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Perempuan </b></label>
    <div class="col-sm-1">
      <input type="text" class="form-control form-control-sm" id="female" v-model="form.sari_adult_female" disabled >
      
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
   <input type="text" class="form-control form-control-sm" id="newadm" v-model="form.sari_new" disabled>
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
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_conc" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Oxygen Concentrator Occupied </b></label>
    <div class="col-sm-1">
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_conc_occupied" disabled>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Bed With Oxygen Cylinder </b> </label>
    <div class="col-sm-1">
   <input type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Oxygen Cylinder Occupied</b></label>
    <div class="col-sm-1">
   <input  type="number" min="0" class="form-control form-control-sm" id="s1" v-model="form.o2_cylinder_occupied" disabled>
    </div>
  </div> 
  <hr>

                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> <code>*</code> <b>JUMLAH KESELURUHAN PESAKIT</b> </label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.total" disabled>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> BOR(%) </b></label>
    <div class="col-sm-1">
   <input type="text" class="form-control form-control-sm" id="s1" v-model="form.bor" disabled>
    </div>
  
  </div> 
  <hr>
                <div class="form-group">
    <label for="colFormLabelSm" > <code>*</code> <b>Staf Bertugas </b> </label>
 
      <textarea type="text" class="form-control "  id="staff" v-model="form.staff" disabled></textarea>

   

  </div> 
<hr>
                      
      
                    <div class="form-group">
                      <label> <code>*</code>Catatan</label>
                      <textarea 
                        auto-grow
                        input type="text" class="form-control" id="notes" v-model="form.notes" disabled></textarea>
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
        this.report();


     },
     data(){
      return{
      
        form:[],
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

 
  methods:{
 
    report(){
    let self = this;
     axios.get('/api/nursing/census/' + this.$route.params.id+ '/?token='+ localStorage.getItem('token'))
      .then(function (response) {
          self.form= response.data;
      


      });
    }
  }
 
  }   
</script>

<style type="text/css">

</style>