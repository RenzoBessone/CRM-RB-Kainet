<template>
  <sidebar/>
  <div :style="{ 'margin-left': sidebarWidth }">
    <router-view v-slot="{ Component, route }">
      <div :key="route.name">
          <Component :is="Component" />
      </div>
    </router-view>
  </div>
</template>
  
<script>
import sidebar from '@/sidebar/sidebar.vue'
import { sidebarWidth } from '@/sidebar/state.js'
export default {
  name: 'App',
  components: { sidebar },
  setup () {
    return { sidebarWidth }
  }
};
</script>

<style scoped>
/* Add component-specific styles here */
</style>
  