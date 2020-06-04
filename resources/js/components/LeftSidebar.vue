      <template>
	  <div class="side-content-wrap">
	    <VuePerfectScrollbar class="scroll-area sidebar-left open rtl-ps-none" v-once :settings="settings" @ps-scroll-y="scrollHandle">

            <div>
                <ul class="navigation-left">
                    <li class="nav-item" data-item="dashbord"><a class="nav-item-hold" href="#"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
					
					 <li class="nav-item" data-item="restaurant"><a class="nav-item-hold" href="#"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Restaurants </span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="cuisines"><a class="nav-item-hold" href="#"><i class="nav-icon i-Library"></i><span class="nav-text">Cuisines</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="categories"><a class="nav-item-hold" href="#"><i class="nav-icon i-Suitcase"></i><span class="nav-text">Categories</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="foods"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Foods </span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="orders"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Orders </span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="charts"><a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Payments</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="forms"><a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Settings </span></a>
                        <div class="triangle"></div>
                    </li>
                    <!--<li class="nav-item"><a class="nav-item-hold" href="datatables.html"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">Datatables</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="sessions"><a class="nav-item-hold" href="#"><i class="nav-icon i-Administrator"></i><span class="nav-text">Sessions</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item active" data-item="others"><a class="nav-item-hold" href="#"><i class="nav-icon i-Double-Tap"></i><span class="nav-text">Others</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank"><i class="nav-icon i-Safe-Box1"></i><span class="nav-text">Doc</span></a>
                        <div class="triangle"></div>
                    </li>-->
                </ul>
            </div>
			 </VuePerfectScrollbar>
			 
			 
			 	    <VuePerfectScrollbar class="scroll-area sidebar-left-secondary  rtl-ps-none" v-once :settings="settings" @ps-scroll-y="scrollHandle">

            <div >
			
			
			
                <!-- Submenu Dashboards-->
                <ul class="childNav" data-parent="dashbord">
                    <li class="nav-item"><a href="/admin/organisation"><i class="nav-icon i-Clock-3"></i><span class="item-name">List dashbord</span></a></li>
                    <li class="nav-item"><a href="/admin/organisation/add"><i class="nav-icon i-Clock-3"></i><span class="item-name">Add dashbord</span></a></li>
                </ul>
				
				
				
				 <ul class="childNav" data-parent="orders">
                    <li class="nav-item"><a href="/admin/organisation"><i class="nav-icon i-Clock-3"></i><span class="item-name">List Orders</span></a></li>
                    <li class="nav-item"><a href="/admin/organisation/add"><i class="nav-icon i-Clock-3"></i><span class="item-name">Add Orders</span></a></li>
                </ul>
				
				
				 <ul class="childNav" data-parent="restaurant">
                    <li class="nav-item"><a href="/admin/organisation"><i class="nav-icon i-Clock-3"></i><span class="item-name">List Restaurants</span></a></li>
                    <li class="nav-item"><a href="/admin/organisation/add"><i class="nav-icon i-Clock-3"></i><span class="item-name">Add Restaurant</span></a></li>
                </ul>
				
				
                <ul class="childNav" data-parent="forms">
                    <li class="nav-item"><a href="form.basic.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Basic Elements</span></a></li>
                    
                </ul>
                <ul class="childNav" data-parent="foods">
                    <li class="nav-item"><a href="/admin/food"><i class="nav-icon i-Clock-3"></i><span class="item-name">List Foods</span></a></li>
                    <li class="nav-item"><a href="/admin/food/add"><i class="nav-icon i-Email"></i><span class="item-name">Add Foods</span></a></li>
                </ul>
                <ul class="childNav" data-parent="Orders">
                    <li class="nav-item"><a href="widget-card.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">List Orders</span></a></li>
                  </ul>
                <!-- chartjs-->
                <ul class="childNav" data-parent="charts">
                    <li class="nav-item"><a href="charts.echarts.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">echarts</span></a></li>
                    
                </ul>
                <ul class="childNav" data-parent="categories">
                    <li class="nav-item"><a href="/admin/category"><i class="nav-icon i-Crop-2"></i><span class="item-name">List Categories</span></a></li>
                    <li class="nav-item"><a href="/admin/category/add"><i class="nav-icon i-Loading-3"></i><span class="item-name">Add Categories</span></a></li>
                       </ul>
                <ul class="childNav" data-parent="cuisines">
                    <li class="nav-item"><a href="/admin/cuisine"><i class="nav-icon i-Bell1"></i><span class="item-name">List Cuisines</span></a></li>
                    <li class="nav-item"><a href="/admin/cuisine/add"><i class="nav-icon i-Split-Horizontal-2-Window"></i><span class="item-name">Add Cuisines </span></a></li>
                                    </ul>
                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item"><a href="../sessions/signin.html"><i class="nav-icon i-Checked-User"></i><span class="item-name">Sign in</span></a></li>
                   
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item"><a href="../sessions/not-found.html"><i class="nav-icon i-Error-404-Window"></i><span class="item-name">Not Found</span></a></li>
                  
                </ul>
            </div>
			 </VuePerfectScrollbar>
			
			
            <div class="sidebar-overlay"></div>
        </div>
		
		</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

    export default {
        components: {
    VuePerfectScrollbar
  },
  name: 'app',
  data() {
    return {
      settings: {
        maxScrollbarLength: 60
      }
    }
  },
  methods: {
    scrollHandle(evt) {
      console.log(evt)
    }
  }
    }
</script>
