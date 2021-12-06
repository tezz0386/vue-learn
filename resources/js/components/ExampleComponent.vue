<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Menu Component</div>

                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="#">Create Post</a>
                            </li>
                            <li>
                                <a href="#">List of Post</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
