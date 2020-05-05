// import components
import Home from '../../components/Home'

export default {
  path: 'home',
  name: 'Home',
  component: Home,
  meta: {
    title: 'ホーム',
    description: '',
    requiredAuth: true,
    permission: ['user'],
  },
}
