import $ from 'jquery';
import Vue from 'vue';
import Home from './components/Home';
import {Button, Container, Header, Input, Loading, Main, Table, TableColumn, Tag} from 'element-ui';

import 'element-ui/lib/theme-chalk/index.css';

Vue.use(Container);
Vue.use(Header);
Vue.use(Main);
Vue.use(Input);
Vue.use(Button);
Vue.use(Table);
Vue.use(TableColumn);
Vue.use(Loading);

$(function () {
    new Vue({
        render: c => c(Home),
    }).$mount('#app');
});