<template>
    <v-container fluid>
        <TaskSearch></TaskSearch>
        <Group></Group>
    </v-container>
</template>

<script>
    import Group from "./Group";
    import TaskSearch from "./TaskSearch";
    export default {
        name: "Board",
        components: {TaskSearch, Group}
    }
</script>

<style scoped>

</style>