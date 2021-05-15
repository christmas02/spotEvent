<template>
    <footer
        class="my-footer default-padding"
    >
        <div class="row">
            <div class="col-md-4">
                <v-img width="200" :src="require('../../assets/light-logo.png')"></v-img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                    alias atque cupiditate debitis dignissimos fuga fugit illum labore laborum nam
                    nostrum odit pariatur perferendis quod quos repellat suscipit, temporibus voluptatem.
                </p>
            </div>
            <div class="offset-md-2 col-md-6">
                <div class="row mt-md-5">
                    <div class="col-md-4">
                        <ul class="footer-list">
                            <li>
                                <h4 class="list-title">Categories</h4>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="footer-list">
                            <li>
                                <h4 class="list-title">Categories</h4>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-4">
                        <ul class="footer-list">
                            <li>
                                <h4 class="list-title">Categories</h4>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                            <li>
                                <router-link class="footer-link" to="/" exact>un lien</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style scoped>
    .my-footer {
        background-color: #303749 !important;
        padding-top: 3%;
        padding-bottom: 5%;
        color: #fff;
    }

    .footer-list {
        list-style-type: none;
    }

    .footer-link {
        font-weight: 300;
        color: #fff;
        text-decoration: none;
    }

    li {
        margin-bottom: 15px;
    }

    p {
        margin-top: 40px;
        font-weight: 300;
    }
</style>
