<template>
    <router-link :to="to" class="link" :class="{ active: active }" @click="closeSidebar">
        <i class="icon" :class="icon" />
        <transition name="fade">
            <span v-if="!collapsed">
                <slot />
            </span>
        </transition>
    </router-link>
</template>

<script>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import { collapsed, closeSidebar } from './state'

export default {
    props: {
        to: { type: String, required: true },
        icon: { type: String, required: true }
    },
    setup (props) {
        const route = useRoute()
        const isActive = computed(() => route.path === props.to)
        return { isActive, collapsed, closeSidebar }
    }
}

</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.1s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.link {
    display: flex;
    align-items: center;

    cursor: pointer;
    position: relative;
    font-weight: 500;
    user-select: none;

    margin: 0.1em 0;
    padding: 0.4em;
    border-radius: 0.25em;
    height: 2.5em;

    color: white;
    text-decoration: none;
}

.link:hover {
    background-color: var(--sidebar-item-hover);
}

.router-link-active {
    background-color: var(--sidebar-item-active);
}

.link .icon {
    flex-shrink: 0;
    width: 25px;
    margin-right: 10px;
}

</style>