export default {
  path: '/comments',
  name: 'comments',
  component: () => import('../components/comment/Layout'),
  redirect: { name: 'CommentList' },
  children: [
    {
      name: 'CommentList',
      path: '',
      component: () => import('../views/comment/List')
    },
    {
      name: 'CommentCreate',
      path: 'new',
      component: () => import('../views/comment/Create')
    },
    {
      name: 'CommentUpdate',
      path: ':id/edit',
      component: () => import('../views/comment/Update')
    },
    {
      name: 'CommentShow',
      path: ':id',
      component: () => import('../views/comment/Show')
    }
  ]
};
