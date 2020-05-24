
import cartList from '@/_public/components/cart/list';

new Vue({

    components: {
        
        'cart-list': cartList
    },

    data: {
        urlParams: {
            category: {
                value: null,
                handler: function() {

                    //handle initial category load & product display from URL param (category)
                    if (this.value) {
                        //we have a URL parameter called 'category' - attempt to load this category and its products
                        vueEventBus.$emit('select-category', this.value);
                        vueEventBus.$emit('load-category-products', this.value);
                    } else {
                        //we do not have a URL parameter called 'category' - load 'uncategorized' category and all 'uncategorized' products
                        vueEventBus.$emit('load-category-products', null);
                    }

                }
            }
        }
    },

    el: '#carts',

    methods: {

        _initApp: function() {

            var thisApp = this;

            parseURLParams(thisApp.urlParams);

        }

    },

    mounted: function() {
        
        var thisApp = this;

        thisApp._initApp();

    }

});