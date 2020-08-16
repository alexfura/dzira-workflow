<template>
    <v-col class="column-background ma-2">
        <v-subheader>{{ column.title }}</v-subheader>
        <draggable
                v-model="column.issues"
                class="draggable-stretch"
                group="column-group"
                @change="log"
        >
            <Task
                    v-for="(issue, index) in column.issues"
                    v-bind:issue="issue"
                    v-bind:index="index"
                    v-bind:key="issue.id"
            ></Task>
        </draggable>
    </v-col>
</template>

<script>
    import draggable from 'vuedraggable';
    import Task from "./Task";
    export default {
        name: "Column",
        components: {
            Task,
            draggable
        },
        props: ['item'],
        data() {
            return {
                column: this.item
            }
        },
        methods: {
            log: function (evt) {
               console.log(evt);
            }
        },
    }
</script>

<style scoped>
    .draggable-stretch {
        height: 100%;
    }
    .column-background {
        background-color: #d8e8eb;
    }
</style>