<template>
    <div class="container">
        <h1>This is a list pages</h1>
        <div class="text-right">
            <input type="text" placeholder="search here" class="form-control" v-on:keyup="searchPost()" v-model='searchString'>
        </div>
        <table class="table">
            <thead>
               <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th colspan="2">
                        Action
                    </th>
               </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>
                        {{ post.id }}
                    </td>
                    <td>
                        {{ post.name }}
                    </td>
                    <td>
                        {{ post.content }}
                    </td>
                    <td>
                        <router-link :to="{ name: 'edit', params: { id: post.id }}">Edit</router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" v-on:click="deletePost(post.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
var deleteUrl = ''
export default {
    data(){
        return{
            posts:{
                name:'',
                content:'',
            },
            searchString:'',
        }
    },
    created() {
            axios
            .get('http://localhost:8000/api/post')
            .then(response => (
                this.posts = response.data
            ))
            .catch(err => console.log(err))
            .finally(() => this.loading = false)
    },
    methods:{
        // getList() {
        //      axios
        //         .post('http://localhost:8000/api/post')
        //         .then(response => (
        //             this.posts = response.data
        //         ))
        //         .catch(err => console.log(err))
        //         .finally(() => this.loading = false)
        // }
        deletePost(id){
            axios
                .delete('http://localhost:8000/api/post/'+id)
                .then(response => {
                    let i = this.posts.map(data => data.id).indexOf(id);
                    this.posts.splice(i, 1)
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        },
        searchPost(){
            if(this.searchString==null){
                this.created();
            }
            axios
                .get('http://localhost:8000/api/post/search/'+this.searchString)
                .then(response => {
                   this.posts = response.data;
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    },
}
</script>