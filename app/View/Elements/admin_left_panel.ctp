<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
        <!-- BEGIN SIDEBAR MENU -->

        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">

            </li>
            <li class="open active">
                <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Dashboard
                    </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class="<?php if(($this->params['controller']=='users' && $this->params['action']=='admin_userListing')||($this->params['controller']=='users' && $this->params['action']=='admin_companyListing')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        User Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
					<li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_userListing')); ?>"><i class="fa fa-list"></i>Individual User Listing</a></li>
					<li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_companyListing')); ?>"><i class="fa fa-list"></i>Company Listing</a></li>

                </ul>
            </li>

            <li class="<?php if($this->params['controller']=='contents' && $this->params['action']=='admin_contentListing'){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Content Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
				<ul class="sub-menu">
					<li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_contentListing')); ?>"><i class="fa fa-list"></i>Content Listing</a></li>

                </ul>
			</li>
                    
             <!--<li class="<?php //if($this->params['controller']=='contacts' && $this->params['action']=='admin_contactList'){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Contact Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
					<li><a href="<?php //echo $this->html->url(array('controller' => 'contacts', 'action' => 'admin_contactList')); ?>"><i class="fa fa-list"></i>Contact Listing</a></li>

                </ul>
            </li>--> 
			
			<li class="<?php if(($this->params['controller']=='sectors' && $this->params['action']=='admin_addSector')||($this->params['controller']=='sectors' && $this->params['action']=='admin_sectorList')){ echo "active";};?>">
                <a href="javascript:;" >
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Sector Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
				<li><a  href="<?php echo $this->html->url(array('controller' => 'sectors', 'action' => 'admin_addSector')); ?>"><i class="fa fa-list"></i>Add Sector</a></li> 
				<li><a  href="<?php echo $this->html->url(array('controller' => 'sectors', 'action' => 'admin_sectorList')); ?>"><i class="fa fa-list"></i>Sector Listing</a></li>

                </ul>
            </li>
				
			<li class="<?php if(($this->params['controller']=='courses' && $this->params['action']=='admin_addCourse')||($this->params['controller']=='courses' && $this->params['action']=='admin_courseList')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Course Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
					<li><a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_addCourse')); ?>"><i class="fa fa-list"></i>Add Course</a></li>                   
					<li><a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_courseList')); ?>"><i class="fa fa-list"></i>Course Listing</a></li>

                </ul>
			</li>
			 <li class="<?php if($this->params['controller']=='bookings' && $this->params['action']=='admin_bookingList'){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Booking Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">                  
					<li><a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_bookingList')); ?>"><i class="fa fa-list"></i>Booking Listing</a></li>
                   <!--  <li><a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_bookingHistory')); ?>"><i class="fa fa-list"></i>Booking History</a></li> -->
                    <!-- <li><a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_archiveList')); ?>"><i class="fa fa-list"></i>Archive Listing</a></li> -->

                </ul>
			</li>
             <li class="<?php if(($this->params['controller']=='bookings' && $this->params['action']=='admin_archiveList')||($this->params['controller']=='courses' && $this->params['action']=='admin_courseHistory')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        History Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu"> 
                     <li><a href="<?php echo $this->html->url(array('controller' => 'courses', 'action' => 'admin_courseHistory')); ?>"><i class="fa fa-list"></i>Course History</a></li>
                  
                    <li><a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_archiveList')); ?>"><i class="fa fa-list"></i>Archive Listing</a></li>

                </ul>
            </li>
            <!--  <li class="<?php //if($this->params['controller']=='transactions' && $this->params['action']=='admin_transactionList'){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Transaction Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">                  
					<li><a href="<?php //echo $this->html->url(array('controller' => 'transactions', 'action' => 'admin_transactionList')); ?>"><i class="fa fa-list"></i>Transaction Listing</a></li>

                </ul>
			</li>-->
				
           <li class="<?php if(($this->params['controller']=='galleries' && $this->params['action']=='admin_galleryAdd')||($this->params['controller']=='galleries' && $this->params['action']=='admin_galleryListing')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Gallery Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
					<li><a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'admin_galleryAdd')); ?>"><i class="fa fa-list"></i>Add Gallery</a></li>
					<li><a href="<?php echo $this->html->url(array('controller' => 'galleries', 'action' => 'admin_galleryListing')); ?>"><i class="fa fa-list"></i>Gallery Listing</a></li>

                </ul>
            </li>
			 <li class="<?php if(($this->params['controller']=='trainings' && $this->params['action']=='admin_pdfAdd')||($this->params['controller']=='trainings' && $this->params['action']=='admin_pdfListing')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Training Reference Materials Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
					<li><a href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'admin_pdfAdd')); ?>"><i class="fa fa-list"></i>Add Training Reference Materials</a></li>
					<li><a href="<?php echo $this->html->url(array('controller' => 'trainings', 'action' => 'admin_pdfListing')); ?>"><i class="fa fa-list"></i>Training Reference Materials Listing</a></li>

                </ul>
            </li>

             <li class="<?php if(($this->params['controller']=='locations' && $this->params['action']=='admin_addLocation')||($this->params['controller']=='locations' && $this->params['action']=='admin_locationList')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Location Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo $this->html->url(array('controller' => 'locations', 'action' => 'admin_addLocation')); ?>"><i class="fa fa-list"></i>Add Location</a></li>                   
                    <li><a href="<?php echo $this->html->url(array('controller' => 'locations', 'action' => 'admin_locationList')); ?>"><i class="fa fa-list"></i>Location Listing</a></li>

                </ul>
            </li>
			<li class="<?php if(($this->params['controller']=='sponsors' && $this->params['action']=='admin_sponsorList')||($this->params['controller']=='sponsors' && $this->params['action']=='admin_certificateListing')||($this->params['controller']=='sponsors' && $this->params['action']=='admin_certificateAdd')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Accreditation Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
                    <!--<li><a href="<?php //echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_addSponsor')); ?>"><i class="fa fa-list"></i>Add Sponsor</a></li>--> 
					<li><a href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_certificateAdd')); ?>"><i class="fa fa-list"></i>Add Certificate </a></li>
					<li><a href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_certificateListing')); ?>"><i class="fa fa-list"></i>Certificate Listing</a></li>
                    
                    <li><a href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_addSponsor')); ?>"><i class="fa fa-list"></i>Add Accreditation</a></li>

                    <li><a href="<?php echo $this->html->url(array('controller' => 'sponsors', 'action' => 'admin_sponsorList')); ?>"><i class="fa fa-list"></i>Accreditation Listing</a></li>

                </ul>
            </li>



           <!--  <li>
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        FAQ Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
					<li><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_addFaq')); ?>"><i class="fa fa-list"></i>Add FAQ</a></li>                   
					<li><a href="<?php echo $this->html->url(array('controller' => 'faqs', 'action' => 'admin_faqList')); ?>"><i class="fa fa-list"></i>FAQ Listing</a></li>

                </ul>
            </li> -->

			 <li class="<?php if($this->params['controller']=='users' && $this->params['action']=='admin_changePassword'){ echo "active";};?>">
				<a href="javascript:;">
					<i class="fa fa-building-o"></i>
					<span class="title">
						Miscellaneous
					</span>
					<span class="arrow ">
					</span>
				</a>
				<ul class="sub-menu">
					<li>
                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_changePassword')); ?>"><i class="fa fa-list"></i>Change Password</a></li>
				</ul>
			</li>
			
			 <li class="<?php if(($this->params['controller']=='bookings' && $this->params['action']=='admin_bookingHistory')||($this->params['controller']=='reports' && $this->params['action']=='admin_reportListing')){ echo "active";};?>">
                <a href="javascript:;">
                    <i class="fa fa-building-o"></i>
                    <span class="title">
                        Reporting Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">         
                    <li><a href="<?php echo $this->html->url(array('controller' => 'reports', 'action' => 'admin_reportListing')); ?>"><i class="fa fa-list"></i>Listing</a></li>
                      <li><a href="<?php echo $this->html->url(array('controller' => 'bookings', 'action' => 'admin_bookingHistory')); ?>"><i class="fa fa-list"></i>Booking History</a></li>

                </ul>
            </li>



        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->