<template>

    <div id="slider-wrapper" class="v-cloak" :class="{ 'admin': currentRoute.startsWith('admin'), 'private': currentRoute.startsWith('private') }" v-if="currentRoute">

        <div class="main-links">
            <a href="" class="mr-4">
                <i class="fal fa-search"></i>
            </a>
            <a href="" class="mr-4">
                <i class="fal fa-bell"></i>
            </a>
            <a href="/admin" class="mr-4" v-if="isAdmin">
                <i class="fal fa-cog"></i>
            </a>
            <button type="button" class="btn btn-secondary round" v-html="userInitials" v-on:click="flag.showSlider = ! flag.showSlider"></button>
        </div>

        <div class="my-account" :class="{ 'show': flag.showSlider }">
            <div class="header d-flex align-items-center pl-4 pt-1">
                <button type="button" class="btn btn-link m-0 ml-auto" v-on:click="flag.showSlider = false">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="d-flex px-2 pb-0">
                <div class="p-2">
                    <button type="button" class="btn btn-primary round" v-html="userInitials"></button>  
                </div>
                <div class="p-2">

                    <!-- organisation -->
                    <div v-if="isAdmin || hasMultipleOrganisations">

                        <modal-organisation-actions></modal-organisation-actions>

                        <a href="#" v-on:click="showOrganisationModal">
                            <h5 v-html="organisationName"></h5>
                        </a>

                    </div>

                    <div v-else>
                        <h5 v-html="organisationName"></h5>
                    </div>

                    <h5 v-html="userName"></h5>
                    <h6 v-html="userEmail"></h6>
                    <div class="d-flex flex-column">
                        <a href="/my-account" class="py-2">My Account</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</template>

<script>

    import organisationActions from '@/_private/components/nav/organisation-actions';

    export default {

        components: {
            'modal-organisation-actions': organisationActions
        },

        data: function() {

            return {
                flag: {
                    showSlider: false
                }
            }

        },

        methods: {

            showOrganisationModal: function() {
                showModal('modal-organisation-actions','right');
            }

        }

    }

</script>

<style>

    /*from animate.css*/
    @-webkit-keyframes slideInRight {
      from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible;
      }

      to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    @keyframes slideInRight {
      from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible;
      }

      to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    #slider-wrapper .main-links {
        display: flex;
        align-items: center;
    }

    #slider-wrapper .main-links a {
        font-size: 1rem;
        color: #4c6b8a;        
    }

    #slider-wrapper.admin .main-links a,
    #slider-wrapper.private .main-links a {
        color: #fff;        
    }

    #slider-wrapper .main-links a:hover {
        color: rgba(75,107,138,0.7);
    }

    #slider-wrapper.admin .main-links a:hover,
    #slider-wrapper.private .main-links a:hover {
        color: rgba(255,255,255,0.7);
    }

    #slider-wrapper .my-account {
        position: absolute;
        display: none;
        top: 0;
        margin-top: 79px;
        right: -320px;
        bottom: 0;
        width: 320px;
        z-index: 150;
        height: calc(100vh - 80px);
        background: #eee;
        -webkit-animation-name: slideInRight;
        animation-name: slideInRight;
        -webkit-animation-duration: 300ms;
        animation-duration: 300ms;
    }
    #slider-wrapper.admin .my-account,
    #slider-wrapper.private .my-account {
        margin-top: 64px;
        height: calc(100vh - 65px);
    }

    #slider-wrapper .my-account.show {
        right: 0;
        display: block;
    }

</style>