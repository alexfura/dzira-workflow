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

    <div v-if="item" class="table-issue-show">
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
              <td><strong>{{ $t('content') }}</strong></td>
              <td>
                                    {{ item['content'] }}
              </td>
            
              <td><strong>{{ $t('assignee') }}</strong></td>
              <td>
                                    {{ item['assignee'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('estimationTime') }}</strong></td>
              <td>
                                    {{ item['estimationTime'] }}
              </td>
            
              <td><strong>{{ $t('subIssues') }}</strong></td>
              <td>
                                    {{ item['subIssues'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('parentIssue') }}</strong></td>
              <td>
                                    {{ item['parentIssue'] }}
              </td>
            
              <td><strong>{{ $t('state') }}</strong></td>
              <td>
                                    {{ item['state'].name }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('id') }}</strong></td>
              <td>
                {{ $n(item['id']) }}              </td>
            
              <td><strong>{{ $t('title') }}</strong></td>
              <td>
                                    {{ item['title'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('description') }}</strong></td>
              <td>
                                    {{ item['description'] }}
              </td>
            
              <td><strong>{{ $t('content') }}</strong></td>
              <td>
                                    {{ item['content'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('assignee') }}</strong></td>
              <td>
                                    {{ item['assignee'] }}
              </td>
            
              <td><strong>{{ $t('estimationTime') }}</strong></td>
              <td>
                                    {{ item['estimationTime'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('subIssues') }}</strong></td>
              <td>
                                    {{ item['subIssues'] }}
              </td>
            
              <td><strong>{{ $t('parentIssue') }}</strong></td>
              <td>
                                    {{ item['parentIssue'] }}
              </td>
            </tr>
            
            <tr>
              <td><strong>{{ $t('state') }}</strong></td>
              <td>
                                    {{ item['state'].name }}
              </td>
            
              <td><strong>{{ $t('comments') }}</strong></td>
              <td>
                                    {{ item['comments'] }}
              </td>
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

const servicePrefix = 'Issue';

export default {
  name: 'IssueShow',
  servicePrefix,
  components: {
      Loading,
      Toolbar
  },
  mixins: [ShowMixin],
  computed: {
    ...mapFields('issue', {
      isLoading: 'isLoading'
    }),
    ...mapGetters('issue', ['find'])
  },
  methods: {
    ...mapActions('issue', {
      deleteItem: 'del',
      reset: 'reset',
      retrieve: 'load'
    })
  }
};
</script>
