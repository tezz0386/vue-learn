<template>
    <div class="container">
        <h3>Edit Post</h3>
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="post.name" id="name">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" v-model="post.content" class="form-control"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" v-on:click="updateProduct">Create</button>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                post: {
                    name:'',
                    content:'',
                }
            }
        },
        created(){
            axios
                .get('http://localhost:8000/api/post/'+this.$route.params.id)
                .then(response => (
                    this.post = response.data
                    ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        },
        methods: {
            updateProduct() {
                axios
                    .patch('http://localhost:8000/api/post/'+this.$route.params.id, this.post)
                    .then(response => (
                        this.post = {}
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>