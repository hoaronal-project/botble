<template>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Load more khi scroll với laravel và vuejs</strong></div>

                    <div class="card-body">
                        <div>
                            <p v-for="item in items">
                                <a v-bind:href="'https://itsolutionstuff.com/post/'+item.slug" target="_blank">{{item.title}}</a>
                            </p>
                            <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Laravel and Vuejs.')
        },
        data() {
            return {
                items: [],
                page: 1,
            };
        },
        methods: {
            infiniteHandler($state) {
                let that = this;

                this.$http.get('/test/vue?page='+this.page)
                    .then(response => {
                        return response.json();
                    }).then(data => {
                    $.each(data.data, function(key, value) {
                        that.items.push(value);
                    });
                    $state.loaded();
                });

                this.page = this.page + 1;
            },
        },
    }
</script>
