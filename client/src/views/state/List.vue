<template>
  <div class="state-list">
    <Toolbar :handle-add="addHandler" />

    <v-container grid-list-xl fluid>
      <v-layout row wrap>
        <v-flex sm12>
          <h1>State List</h1>
        </v-flex>
        <v-flex lg12>
          <DataFilter :handle-filter="onSendFilter" :handle-reset="resetFilter">
            <StateFilterForm
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
                <template slot="item.issues" slot-scope="{ item }">
                  <ul>
                    <li v-for="_item in item['issues']" :key="_item.id">
                      {{ _item.id }}
                    </li>
                  </ul>
                </template>
                <template slot="item.previousStates" slot-scope="{ item }">
                  <ul>
                    <li v-for="_item in item['previousStates']" :key="_item.id">
                      {{ _item.id }}
                    </li>
                  </ul>
                </template>
                <template slot="item.nextStates" slot-scope="{ item }">
                  <ul>
                    <li v-for="_item in item['nextStates']" :key="_item.id">
                      {{ _item.id }}
                    </li>
                  </ul>
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
import StateFilterForm from '../../components/state/Filter';
import DataFilter from '../../components/DataFilter';
import Toolbar from '../../components/Toolbar';

export default {
  name: 'StateList',
  servicePrefix: 'State',
  mixins: [ListMixin],
  components: {
    Toolbar,
    ActionCell,
    StateFilterForm,
    DataFilter
  },
  data() {
    return {
      headers: [
        { text: 'title', value: 'title' },
        { text: 'description', value: 'description' },
        { text: 'issues', value: 'issues' },
        { text: 'previousStates', value: 'previousStates' },
        { text: 'nextStates', value: 'nextStates' },
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
    ...mapGetters('state', {
      items: 'list'
    }),
    ...mapFields('state', {
      deletedItem: 'deleted',
      error: 'error',
      isLoading: 'isLoading',
      resetList: 'resetList',
      totalItems: 'totalItems',
      view: 'view'
    })
  },
  methods: {
    ...mapActions('state', {
      getPage: 'fetchAll',
      deleteItem: 'del'
    })
  }
};
</script>
