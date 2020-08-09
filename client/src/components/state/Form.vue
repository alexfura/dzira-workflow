<template>
  <v-form>
    <v-container fluid>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.title"
            :error-messages="titleErrors"
            :label="$t('title')"
            @input="$v.item.title.$touch()"
            @blur="$v.item.title.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.description"
            :error-messages="descriptionErrors"
            :label="$t('description')"
            @input="$v.item.description.$touch()"
            @blur="$v.item.description.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.issues"
            :items="issuesSelectItems"
            :error-messages="issuesErrors"
            :no-data-text="$t('No results')"
            :label="$t('issues')"
            multiple
            item-text="name"
            item-value="@id"
            chips
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.previousStates"
            :items="previousStatesSelectItems"
            :error-messages="previousStatesErrors"
            :no-data-text="$t('No results')"
            :label="$t('previousStates')"
            multiple
            item-text="name"
            item-value="@id"
            chips
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.nextStates"
            :items="nextStatesSelectItems"
            :error-messages="nextStatesErrors"
            :no-data-text="$t('No results')"
            :label="$t('nextStates')"
            multiple
            item-text="name"
            item-value="@id"
            chips
          />
        </v-col>
      
        <v-col cols="12"></v-col>
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
  name: 'StateForm',
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
      this.issuesGetSelectItems();
      this.previousStatesGetSelectItems();
      this.nextStatesGetSelectItems();
  },
  data() {
    return {
        title: null,
        description: null,
        issues: null,
        previousStates: null,
        nextStates: null,
    };
  },
  computed: {
      ...mapFields('issue', {
        issuesSelectItems: 'selectItems'
      }),
      ...mapFields('state', {
        previousStatesSelectItems: 'selectItems'
      }),
      ...mapFields('state', {
        nextStatesSelectItems: 'selectItems'
      }),

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    titleErrors() {
      const errors = [];

      if (!this.$v.item.title.$dirty) return errors;

      has(this.violations, 'title') && errors.push(this.violations.title);


      return errors;
    },
    descriptionErrors() {
      const errors = [];

      if (!this.$v.item.description.$dirty) return errors;

      has(this.violations, 'description') && errors.push(this.violations.description);


      return errors;
    },
    issuesErrors() {
      const errors = [];

      if (!this.$v.item.issues.$dirty) return errors;

      has(this.violations, 'issues') && errors.push(this.violations.issues);


      return errors;
    },
    previousStatesErrors() {
      const errors = [];

      if (!this.$v.item.previousStates.$dirty) return errors;

      has(this.violations, 'previousStates') && errors.push(this.violations.previousStates);


      return errors;
    },
    nextStatesErrors() {
      const errors = [];

      if (!this.$v.item.nextStates.$dirty) return errors;

      has(this.violations, 'nextStates') && errors.push(this.violations.nextStates);


      return errors;
    },

    violations() {
      return this.errors || {};
    }
  },
  methods: {
      ...mapActions({
        issuesGetSelectItems: 'issue/fetchSelectItems'
      }),
      ...mapActions({
        previousStatesGetSelectItems: 'state/fetchSelectItems'
      }),
      ...mapActions({
        nextStatesGetSelectItems: 'state/fetchSelectItems'
      }),
  },
  validations: {
    item: {
      title: {
      },
      description: {
      },
      issues: {
      },
      previousStates: {
      },
      nextStates: {
      },
    }
  }
};
</script>
