<template>
  <div>
    <Toolbar :handle-delete="del">
      <template slot="left">
        <v-toolbar-title v-if="item">{{
          `${$options.servicePrefix} ${item['@id']}`
        }}</v-toolbar-title>
      </template>
    </Toolbar>

    <br />

    <div v-if="item" class="table-state-show">
      <v-simple-table>
        <template slot="default">
          <thead>
            <tr>
              <th>Field</th>
              <th>Value</th>

              <th>Field</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>{{ $t('title') }}</strong></td>
              <td>
                                    {{ item['title'] }}
              </td>
            
              <td><strong>{{ $t('description') }}</strong></td>
              <td>
                                    {{ item['description'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('issues') }}</strong></td>
              <td>
                                    {{ item['issues'].name }}
              </td>
            
              <td><strong>{{ $t('previousStates') }}</strong></td>
              <td>
                                    {{ item['previousStates'].name }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('nextStates') }}</strong></td>
              <td>
                                    {{ item['nextStates'].name }}
              </td>
            
              <td></td>
            </tr>
            
          </tbody>
        </template>
      </v-simple-table>
    </div>

    <Loading :visible="isLoading" />
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import Loading from '../../components/Loading';
import ShowMixin from '../../mixins/ShowMixin';
import Toolbar from '../../components/Toolbar';

const servicePrefix = 'State';

export default {
  name: 'StateShow',
  servicePrefix,
  components: {
      Loading,
      Toolbar
  },
  mixins: [ShowMixin],
  computed: {
    ...mapFields('state', {
      isLoading: 'isLoading'
    }),
    ...mapGetters('state', ['find'])
  },
  methods: {
    ...mapActions('state', {
      deleteItem: 'del',
      reset: 'reset',
      retrieve: 'load'
    })
  }
};
</script>
