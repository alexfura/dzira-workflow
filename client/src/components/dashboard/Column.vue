<template>
    <v-list class="column-item">
        <v-subheader>Header</v-subheader>
        <Task></Task>
        <Task></Task>
        <Task></Task>
        <div>{{info}}</div>
    </v-list>
</template>

<script>
    import Task from "./Task";
    export default {
        name: "Column",
        components: {Task},
        data() {
            return {
                info: null
            }
        },
        mounted() {
        }
    }
</script>

<style scoped>
    .column-item {
        margin: 10px;
        padding: 10px;
        background-color: #def8ff;
    }
</style>