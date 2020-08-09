<template>
  <div class="issue-list">
    <Toolbar :handle-add="addHandler" />

    <v-container grid-list-xl fluid>
      <v-layout row wrap>
        <v-flex sm12>
          <h1>Issue List</h1>
        </v-flex>
        <v-flex lg12>
          <DataFilter :handle-filter="onSendFilter" :handle-reset="resetFilter">
            <IssueFilterForm
              ref="filterForm"
              :values="filters"
              slot="filter"
            />
          </DataFilter>

          <br />

          <v-data-table
            v-model="selected"
            :headers="headers"
            :items="items"
            :items-per-page.sync="options.itemsPerPage"
            :loading="isLoading"
            :loading-text="$t('Loading...')"
            :options.sync="options"
            :server-items-length="totalItems"
            class="elevation-1"
            item-key="@id"
            show-select
            @update:options="onUpdateOptions"
          >
                <template slot="item.id" slot-scope="{ item }">
                  {{ $n(item['id']) }}
                </template>

            <ActionCell
              slot="item.action"
              slot-scope="props"
              :handle-show="() => showHandler(props.item)"
              :handle-edit="() => editHandler(props.item)"
              :handle-delete="() => deleteHandler(props.item)"
            ></ActionCell>
          </v-data-table>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import ListMixin from '../../mixins/ListMixin';
import ActionCell from '../../components/ActionCell';
import IssueFilterForm from '../../components/issue/Filter';
import DataFilter from '../../components/DataFilter';
import Toolbar from '../../components/Toolbar';

export default {
  name: 'IssueList',
  servicePrefix: 'Issue',
  mixins: [ListMixin],
  components: {
    Toolbar,
    ActionCell,
    IssueFilterForm,
    DataFilter
  },
  data() {
    return {
      headers: [
        { text: 'title', value: 'title' },
        { text: 'description', value: 'description' },
        { text: 'content', value: 'content' },
        { text: 'assignee', value: 'assignee' },
        { text: 'estimationTime', value: 'estimationTime' },
        { text: 'subIssues', value: 'subIssues' },
        { text: 'parentIssue', value: 'parentIssue' },
        { text: 'state', value: 'state' },
        { text: 'id', value: 'id' },
        { text: 'title', value: 'title' },
        { text: 'description', value: 'description' },
        { text: 'content', value: 'content' },
        { text: 'assignee', value: 'assignee' },
        { text: 'estimationTime', value: 'estimationTime' },
        { text: 'subIssues', value: 'subIssues' },
        { text: 'parentIssue', value: 'parentIssue' },
        { text: 'state', value: 'state' },
        { text: 'comments', value: 'comments' },
        {
          text: 'Actions',
          value: 'action',
          sortable: false
        }
      ],
      selected: []
    };
  },
  computed: {
    ...mapGetters('issue', {
      items: 'list'
    }),
    ...mapFields('issue', {
      deletedItem: 'deleted',
      error: 'error',
      isLoading: 'isLoading',
      resetList: 'resetList',
      totalItems: 'totalItems',
      view: 'view'
    })
  },
  methods: {
    ...mapActions('issue', {
      getPage: 'fetchAll',
      deleteItem: 'del'
    })
  }
};
</script>
