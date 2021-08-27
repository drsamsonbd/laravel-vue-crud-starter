<template>
    <div >
          <footer class="main-footer" v-show="$route.path === '/' ? false : true ">
    <!-- To the right -->
    <div class="float-right d-none d-sm-block">
    <b>  <a href="https://qmed.asia">Powered by Qmed</a>.</b>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021    <a href="#">Dr. Samson Bd Mokuntil</a>.</strong> Hospital Beluran.
  </footer>
    </div>
</template>