<template>
    <v-row>
        <v-col>
            <v-autocomplete
                    color="white"
                    hide-details
                    hide-no-data
                    hide-selected
                    placeholder="Search for an issue"
            >
            </v-autocomplete>
        </v-col>
    </v-row>
</template>

<script>
    export default {
        name: "TaskSearch"
    }
</script>

<style scoped>

</style>