<template>
  <v-form>
    <v-container fluid>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.content"
            :error-messages="contentErrors"
            :label="$t('content')"
            @input="$v.item.content.$touch()"
            @blur="$v.item.content.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.issue"
            :items="issueSelectItems"
            :error-messages="issueErrors"
            :no-data-text="$t('No results')"
            :label="$t('issue')"
            item-text="name"
            item-value="@id"
          />
        </v-col>
      </v-row>
      
    </v-container>
  </v-form>
</template>

<script>
import has from 'lodash/has';
import { validationMixin } from 'vuelidate';
import { required } from 'vuelidate/lib/validators';
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';

export default {
  name: 'CommentForm',
  mixins: [validationMixin],
  props: {
    values: {
      type: Object,
      required: true
    },

    errors: {
      type: Object,
      default: () => {}
    },

    initialValues: {
      type: Object,
      default: () => {}
    }
  },
  mounted() {
      this.issueGetSelectItems();
  },
  data() {
    return {
        content: null,
        issue: null,
    };
  },
  computed: {
      ...mapFields('issue', {
        issueSelectItems: 'selectItems'
      }),

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    contentErrors() {
      const errors = [];

      if (!this.$v.item.content.$dirty) return errors;

      has(this.violations, 'content') && errors.push(this.violations.content);


      return errors;
    },
    issueErrors() {
      const errors = [];

      if (!this.$v.item.issue.$dirty) return errors;

      has(this.violations, 'issue') && errors.push(this.violations.issue);


      return errors;
    },

    violations() {
      return this.errors || {};
    }
  },
  methods: {
      ...mapActions({
        issueGetSelectItems: 'issue/fetchSelectItems'
      }),
  },
  validations: {
    item: {
      content: {
      },
      issue: {
      },
    }
  }
};
</script>
