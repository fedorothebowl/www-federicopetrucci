import './theme.scss';
import Alpine from 'alpinejs';
import storeGlobal from './js/storeGlobal';
import collapse from '@alpinejs/collapse'
 

// alpine components
import sliders from './js/components/sliders';

// alpine directive
// import models from './js/directive/models';


Alpine.plugin(collapse);

storeGlobal();
// models();

// Alpine.data('homepage', homepage);
Alpine.data('sliders', sliders);
Alpine.start();

