export default {
  path: '/issues',
  name: 'issues',
  component: () => import('../components/issue/Layout'),
  redirect: { name: 'IssueList' },
  children: [
    {
      name: 'IssueList',
      path: '',
      component: () => import('../views/issue/List')
    },
    {
      name: 'IssueCreate',
      path: 'new',
      component: () => import('../views/issue/Create')
    },
    {
      name: 'IssueUpdate',
      path: ':id/edit',
      component: () => import('../views/issue/Update')
    },
    {
      name: 'IssueShow',
      path: ':id',
      component: () => import('../views/issue/Show')
    }
  ]
};
