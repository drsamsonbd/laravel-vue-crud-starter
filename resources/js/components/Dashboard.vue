<template>
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">   
                   <b-breadcrumb :items="itemize"></b-breadcrumb>     
        </div><!-- /.row --> 
      </div><!-- /.container-fluid -->
   
    <!-- /.content-header -->
    <section class="content">

    </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
      itemize: [
          {
            text: 'Utama',
            href: true
          },
         
        ],
}
        }
    }

</script>
<style>
.ml-1 {
  margin-left: ($spacer * .25) !important;
}
</style>
