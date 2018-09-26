<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                       Products
                    </div>

                    <div class="card-body">
                        <ul class="productList">
                            <li v-for="product in products" v-bind:key="product.id">
                                {{product.title}}

                                <div class="images" v-if="product.images[0]">
                                    <img :src="product.images[0].src" alt="" width="400">
                                </div>
                            </li>
                        </ul>

                        <p v-if="isLoading">Loading...</p>

                        <button v-if="isNextPageAvailable" class="btn btn-primary" v-on:click="nextPage()">Next Page</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ["url"],

        data: function () {
            return {
                products: [],
                current_page: 1,
                last_page: 1,
                next_page_url: '',
                isLoading: true,
                requestedPage: "",
            }
        },

        computed: {
            isNextPageAvailable: function() {
                return this.current_page < this.last_page;
            }
        },

        mounted() {
            console.log('Component mounted.')
            this.getProducts();
            this.scroll();
        },

        methods: {
            getProducts(getUrl) {
                if(getUrl == undefined){
                    getUrl = this.url + "/api/products";
                }
                console.log('getting page: ' + getUrl);
                this.requestedPage = getUrl;
                this.isLoading = true;
                axios
                    .get(getUrl)
                    .then(
                    function(response) {
                        let res = response.data;
                        let newProducts = res.data;
                        let statedProducts = this.products;

                        this.current_page = res.current_page;
                        this.last_page = res.last_page;
                        this.next_page_url = res.next_page_url;

                        if(statedProducts.length == 0) {
                            this.products = newProducts;
                        } else {
                            let n = this.products.concat(newProducts);
                            this.products = n;
                        }
                        this.isLoading = false;
                    }.bind(this)
                    )
                    .catch(function(error) {
                        console.log("GET ERR");
                        console.log(error);
                    });
            },

            nextPage(){
                if(this.requestedPage == this.next_page_url) {
                    console.log('this page requested.');
                    return;
                }
                if(this.last_page > this.current_page){
                    this.getProducts(this.next_page_url);
                }
            },

            scroll(){
                window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

                if (bottomOfWindow) {
                    this.nextPage();
                }
                };
            }
        }
    }
</script>
