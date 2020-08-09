export default {
  path: '/states',
  name: 'states',
  component: () => import('../components/state/Layout'),
  redirect: { name: 'StateList' },
  children: [
    {
      name: 'StateList',
      path: '',
      component: () => import('../views/state/List')
    },
    {
      name: 'StateCreate',
      path: 'new',
      component: () => import('../views/state/Create')
    },
    {
      name: 'StateUpdate',
      path: ':id/edit',
      component: () => import('../views/state/Update')
    },
    {
      name: 'StateShow',
      path: ':id',
      component: () => import('../views/state/Show')
    }
  ]
};
