<template>
    <div class="sidebar pt-3" :style="{ width: sidebarWidth }">

        <sidebarLink to="/" icon="fas fa-home">Home</sidebarLink>    
        <sidebarLink to="/pocisiones" icon="fas fa-list">Pocisiones</sidebarLink>
        <sidebarLink to="/usuarios" icon="fas fa-users">Usuarios</sidebarLink>    
        
        <span class="collapse-icon" :class="{ 'rotate-180': collapsed }" @click="toggleSidebar">
            <i class="fas fa-angle-double-left" />

        </span>
    </div>
</template>

<script>
import sidebarLink from './sidebarLink.vue'
import { collapsed, toggleSidebar, sidebarWidth } from './state'

export default {
    props: {},
    components: { sidebarLink },
    setup () {
        return { collapsed, toggleSidebar, sidebarWidth }
    }
}

</script>

<style>
:root {
    --sidebar-bg-color: #212529;
    --sidebar-item-hover: #616a6b;
    --sidebar-item-active: #707b7c;
}
</style>

<style scoped>
.sidebar {
    color: white;
    background-color: var(--sidebar-bg-color);

    float: left;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    bottom: 0;
    padding: 0.5em;

    transition: 0.3s ease;

    display: flex;
    flex-direction: column;
}

.collapse-icon {
    position: absolute;
    bottom: 0;
    padding: 0.75em;

    color: antiquewhite;

    transition: 0.2s linear;
}

.rotate-180 {
    transform: rotate(180deg);
    transition: 0.2s linear;
}

</style>