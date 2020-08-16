<template>
    <v-row>
        <Column
                v-for="(item, index) in columns"
                v-bind:item="item"
                v-bind:index="index"
                v-bind:key="item.id"
        ></Column>
    </v-row>
</template>

<script>
    import Column from "./Column";
    import axios from "axios";

    export default {
        name: "Group",
        components: {
            Column
        },
        data() {
            return {
                columns : null
            }
        },
        mounted() {
            axios
                .get('https://localhost:8443/states')
                .then(response => {
                    this.columns = response.data['hydra:member']
                })
        },
    }
</script>

<style scoped>

</style>