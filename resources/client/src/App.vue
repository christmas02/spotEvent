<template>
    <v-app>
        <router-view />
    </v-app>
</template>

<style>
:root {
    --primary: #fbb231;
    --secondary: #2f374a;
}

.vh-100 {
    height: 100vh;
}

.vw-100 {
    width: 100vw;
}

.h-100 {
    height: 100%;
}

.w-100 {
    width: 100%;
}

.my-row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin: calc(var(--bs-gutter-y) * -1) calc(var(--bs-gutter-x) / -2) 0 !important;
}

button {
    text-transform: none !important;
}
button.primary {
    color: #000 !important;
}

button.v-btn--outlined.primary--text .v-btn__content {
    color: #fff !important;
}

.v-input--is-label-active .v-label--active {
    font-weight: bold;
    color: #000 !important;
}

.section-title {
    font-size: 2.3rem;
}

.section-title::after {
    content: "";
    display: block;
    width: 90px;
    height: 5px;
    background: var(--primary);
}

.btn-icon {
    color: #fff !important;
    background: var(--primary);
}
</style>
