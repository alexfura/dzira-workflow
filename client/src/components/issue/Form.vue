<template>
  <v-form>
    <v-container fluid>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.title"
            :error-messages="titleErrors"
            :label="$t('title')"
            required
            @input="$v.item.title.$touch()"
            @blur="$v.item.title.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.description"
            :error-messages="descriptionErrors"
            :label="$t('description')"
            required
            @input="$v.item.description.$touch()"
            @blur="$v.item.description.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.content"
            :error-messages="contentErrors"
            :label="$t('content')"
            required
            @input="$v.item.content.$touch()"
            @blur="$v.item.content.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.assignee"
            :error-messages="assigneeErrors"
            :label="$t('assignee')"
            @input="$v.item.assignee.$touch()"
            @blur="$v.item.assignee.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.estimationTime"
            :error-messages="estimationTimeErrors"
            :label="$t('estimationTime')"
            @input="$v.item.estimationTime.$touch()"
            @blur="$v.item.estimationTime.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.subIssues"
            :error-messages="subIssuesErrors"
            :label="$t('subIssues')"
            @input="$v.item.subIssues.$touch()"
            @blur="$v.item.subIssues.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.parentIssue"
            :error-messages="parentIssueErrors"
            :label="$t('parentIssue')"
            @input="$v.item.parentIssue.$touch()"
            @blur="$v.item.parentIssue.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.state"
            :items="stateSelectItems"
            :error-messages="stateErrors"
            :no-data-text="$t('No results')"
            :label="$t('state')"
            required
            item-text="name"
            item-value="@id"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model.number="item.id"
            :error-messages="idErrors"
            :label="$t('id')"
            @input="$v.item.id.$touch()"
            @blur="$v.item.id.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.title"
            :error-messages="titleErrors"
            :label="$t('title')"
            @input="$v.item.title.$touch()"
            @blur="$v.item.title.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.description"
            :error-messages="descriptionErrors"
            :label="$t('description')"
            @input="$v.item.description.$touch()"
            @blur="$v.item.description.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.content"
            :error-messages="contentErrors"
            :label="$t('content')"
            @input="$v.item.content.$touch()"
            @blur="$v.item.content.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.assignee"
            :error-messages="assigneeErrors"
            :label="$t('assignee')"
            @input="$v.item.assignee.$touch()"
            @blur="$v.item.assignee.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.estimationTime"
            :error-messages="estimationTimeErrors"
            :label="$t('estimationTime')"
            @input="$v.item.estimationTime.$touch()"
            @blur="$v.item.estimationTime.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.subIssues"
            :error-messages="subIssuesErrors"
            :label="$t('subIssues')"
            @input="$v.item.subIssues.$touch()"
            @blur="$v.item.subIssues.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.parentIssue"
            :error-messages="parentIssueErrors"
            :label="$t('parentIssue')"
            @input="$v.item.parentIssue.$touch()"
            @blur="$v.item.parentIssue.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.state"
            :items="stateSelectItems"
            :error-messages="stateErrors"
            :no-data-text="$t('No results')"
            :label="$t('state')"
            item-text="name"
            item-value="@id"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.comments"
            :error-messages="commentsErrors"
            :label="$t('comments')"
            @input="$v.item.comments.$touch()"
            @blur="$v.item.comments.$touch()"
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
  name: 'IssueForm',
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
      this.stateGetSelectItems();
      this.stateGetSelectItems();
  },
  data() {
    return {
        title: null,
        description: null,
        content: null,
        assignee: null,
        estimationTime: null,
        subIssues: null,
        parentIssue: null,
        state: null,
        id: null,
        title: null,
        description: null,
        content: null,
        assignee: null,
        estimationTime: null,
        subIssues: null,
        parentIssue: null,
        state: null,
        comments: null,
    };
  },
  computed: {
      ...mapFields('state', {
        stateSelectItems: 'selectItems'
      }),
      ...mapFields('state', {
        stateSelectItems: 'selectItems'
      }),

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    titleErrors() {
      const errors = [];

      if (!this.$v.item.title.$dirty) return errors;

      has(this.violations, 'title') && errors.push(this.violations.title);

      !this.$v.item.title.required && errors.push(this.$t('Field is required'));

      return errors;
    },
    descriptionErrors() {
      const errors = [];

      if (!this.$v.item.description.$dirty) return errors;

      has(this.violations, 'description') && errors.push(this.violations.description);

      !this.$v.item.description.required && errors.push(this.$t('Field is required'));

      return errors;
    },
    contentErrors() {
      const errors = [];

      if (!this.$v.item.content.$dirty) return errors;

      has(this.violations, 'content') && errors.push(this.violations.content);

      !this.$v.item.content.required && errors.push(this.$t('Field is required'));

      return errors;
    },
    assigneeErrors() {
      const errors = [];

      if (!this.$v.item.assignee.$dirty) return errors;

      has(this.violations, 'assignee') && errors.push(this.violations.assignee);


      return errors;
    },
    estimationTimeErrors() {
      const errors = [];

      if (!this.$v.item.estimationTime.$dirty) return errors;

      has(this.violations, 'estimationTime') && errors.push(this.violations.estimationTime);


      return errors;
    },
    subIssuesErrors() {
      const errors = [];

      if (!this.$v.item.subIssues.$dirty) return errors;

      has(this.violations, 'subIssues') && errors.push(this.violations.subIssues);


      return errors;
    },
    parentIssueErrors() {
      const errors = [];

      if (!this.$v.item.parentIssue.$dirty) return errors;

      has(this.violations, 'parentIssue') && errors.push(this.violations.parentIssue);


      return errors;
    },
    stateErrors() {
      const errors = [];

      if (!this.$v.item.state.$dirty) return errors;

      has(this.violations, 'state') && errors.push(this.violations.state);

      !this.$v.item.state.required && errors.push(this.$t('Field is required'));

      return errors;
    },
    idErrors() {
      const errors = [];

      if (!this.$v.item.id.$dirty) return errors;

      has(this.violations, 'id') && errors.push(this.violations.id);


      return errors;
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
    contentErrors() {
      const errors = [];

      if (!this.$v.item.content.$dirty) return errors;

      has(this.violations, 'content') && errors.push(this.violations.content);


      return errors;
    },
    assigneeErrors() {
      const errors = [];

      if (!this.$v.item.assignee.$dirty) return errors;

      has(this.violations, 'assignee') && errors.push(this.violations.assignee);


      return errors;
    },
    estimationTimeErrors() {
      const errors = [];

      if (!this.$v.item.estimationTime.$dirty) return errors;

      has(this.violations, 'estimationTime') && errors.push(this.violations.estimationTime);


      return errors;
    },
    subIssuesErrors() {
      const errors = [];

      if (!this.$v.item.subIssues.$dirty) return errors;

      has(this.violations, 'subIssues') && errors.push(this.violations.subIssues);


      return errors;
    },
    parentIssueErrors() {
      const errors = [];

      if (!this.$v.item.parentIssue.$dirty) return errors;

      has(this.violations, 'parentIssue') && errors.push(this.violations.parentIssue);


      return errors;
    },
    stateErrors() {
      const errors = [];

      if (!this.$v.item.state.$dirty) return errors;

      has(this.violations, 'state') && errors.push(this.violations.state);


      return errors;
    },
    commentsErrors() {
      const errors = [];

      if (!this.$v.item.comments.$dirty) return errors;

      has(this.violations, 'comments') && errors.push(this.violations.comments);


      return errors;
    },

    violations() {
      return this.errors || {};
    }
  },
  methods: {
      ...mapActions({
        stateGetSelectItems: 'state/fetchSelectItems'
      }),
      ...mapActions({
        stateGetSelectItems: 'state/fetchSelectItems'
      }),
  },
  validations: {
    item: {
      title: {
        required,
      },
      description: {
        required,
      },
      content: {
        required,
      },
      assignee: {
      },
      estimationTime: {
      },
      subIssues: {
      },
      parentIssue: {
      },
      state: {
        required,
      },
      id: {
      },
      title: {
      },
      description: {
      },
      content: {
      },
      assignee: {
      },
      estimationTime: {
      },
      subIssues: {
      },
      parentIssue: {
      },
      state: {
      },
      comments: {
      },
    }
  }
};
</script>
