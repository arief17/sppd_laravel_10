<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title>SPPD | {{ $title }}</title>

		<!-- Favicon -->
		<link rel="icon" href="/assets/img/brand/favicon.png" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="/assets/css/icons.css" rel="stylesheet">

		<!-- Bootstrap css -->
		<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- style css -->
		<link href="/assets/css/style.css" rel="stylesheet">

		<!--- Animations css-->
		<link href="/assets/css/animate.css" rel="stylesheet">

	</head>

	<body class="main-body app sidebar-mini ltr">

		<!-- Loader -->
		<div id="global-loader">
			<img src="/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page custom-index">
			<div>
				<!-- main-header -->
				<div class="main-header side-header sticky nav nav-item">
					<div class="container-fluid main-container ">
						<div class="main-header-left ">
							<div class="responsive-logo">
								<a href="index.html" class="header-logo">
									<img src="/assets/img/brand/logo.png" class="logo-1" alt="logo">
									<img src="/assets/img/brand/logo-white.png" class="dark-logo-1" alt="logo">
								</a>
							</div>
							<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
								<a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left" ></i></a>
								<a class="close-toggle" href="javascript:void(0);"><i class="header-icons fe fe-x"></i></a>
							</div>
							<div class="main-header-center ms-3 d-sm-none d-md-none d-lg-block">
								<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
							</div>
						</div>
						<div class="main-header-right">
							<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon fe fe-more-vertical "></span>
							</button>
							<div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
								<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
									<ul class="nav nav-item  navbar-nav-right ms-auto">
										<li class="">
											<div class="dropdown  nav-item">
												<a href="javascript:void(0);" class="d-flex  nav-item nav-link country-flag1" data-bs-toggle="dropdown" aria-expanded="false">
													<span class="avatar country-Flag me-0 align-self-center bg-transparent"><img src="/assets/img/flags/us_flag.jpg" alt="img"></span>
													<div class="my-auto">
														<strong class="me-2 ms-2 my-auto">English</strong>
													</div>
												</a>
												<div class="dropdown-menu dropdown-menu-start  dropdown-menu-arrow" x-placement="bottom-end">
													<a href="javascript:void(0);" class="dropdown-item d-flex ">
														<span class="avatar  me-3 align-self-center bg-transparent"><img src="/assets/img/flags/french_flag.jpg" alt="img"></span>
														<div class="d-flex">
															<span class="mt-2">French</span>
														</div>
													</a>
													<a href="javascript:void(0);" class="dropdown-item d-flex">
														<span class="avatar  me-3 align-self-center bg-transparent"><img src="/assets/img/flags/germany_flag.jpg" alt="img"></span>
														<div class="d-flex">
															<span class="mt-2">Germany</span>
														</div>
													</a>
													<a href="javascript:void(0);" class="dropdown-item d-flex">
														<span class="avatar me-3 align-self-center bg-transparent"><img src="/assets/img/flags/italy_flag.jpg" alt="img"></span>
														<div class="d-flex">
															<span class="mt-2">Italy</span>
														</div>
													</a>
													<a href="javascript:void(0);" class="dropdown-item d-flex">
														<span class="avatar me-3 align-self-center bg-transparent"><img src="/assets/img/flags/russia_flag.jpg" alt="img"></span>
														<div class="d-flex">
															<span class="mt-2">Russia</span>
														</div>
													</a>
													<a href="javascript:void(0);" class="dropdown-item d-flex">
														<span class="avatar  me-3 align-self-center bg-transparent"><img src="/assets/img/flags/spain_flag.jpg" alt="img"></span>
														<div class="d-flex">
															<span class="mt-2">spain</span>
														</div>
													</a>
												</div>
											</div>
										</li>
										<li class="dropdown nav-item main-layout">
											<a class="new nav-link theme-layout nav-link-bg layout-setting" >
												<span class="dark-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24"><path d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z"/></svg></span>
												<span class="light-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24"><path d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z"/></svg></span>
											</a>
										</li>
										<li class="nav-link search-icon d-lg-none d-block">
											<form class="navbar-form" role="search">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Search">
													<span class="input-group-btn">
														<button type="reset" class="btn btn-default">
															<i class="fas fa-times"></i>
														</button>
														<button type="submit" class="btn btn-default nav-link resp-btn">
															<svg xmlns="http://www.w3.org/2000/svg" height="24px" class="header-icon-svgs" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
														</button>
													</span>
												</div>
											</form>
										</li>
										<li class="dropdown nav-item main-header-message ">
											<a class="new nav-link" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
											<div class="dropdown-menu">
												<div class="menu-header-content bg-primary text-start">
													<div class="d-flex">
														<h6 class="dropdown-title mb-1 tx-15 text-white fw-semibold">Messages</h6>
														<span class="badge rounded-pill bg-warning ms-auto my-auto float-end">Mark All Read</span>
													</div>
													<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p>
												</div>
												<div class="main-message-list chat-scroll">
													<a href="javascript:void(0);" class="p-3 d-flex border-bottom">
														<div class="  drop-img  cover-image  " data-bs-image-src="/assets/img/faces/3.jpg">
															<span class="avatar-status bg-teal"></span>
														</div>
														<div class="wd-90p">
															<div class="d-flex">
																<h5 class="mb-1 name">Petey Cruiser</h5>
															</div>
															<p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
															<p class="time mb-0 text-start float-start ms-2 mt-2">Mar 15 3:55 PM</p>
														</div>
													</a>
													<a href="javascript:void(0);" class="p-3 d-flex border-bottom">
														<div class="drop-img cover-image" data-bs-image-src="/assets/img/faces/2.jpg">
															<span class="avatar-status bg-teal"></span>
														</div>
														<div class="wd-90p">
															<div class="d-flex">
																<h5 class="mb-1 name">Jimmy Changa</h5>
															</div>
															<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
															<p class="time mb-0 text-start float-start ms-2 mt-2">Mar 06 01:12 AM</p>
														</div>
													</a>
													<a href="javascript:void(0);" class="p-3 d-flex border-bottom">
														<div class="drop-img cover-image" data-bs-image-src="/assets/img/faces/9.jpg">
															<span class="avatar-status bg-teal"></span>
														</div>
														<div class="wd-90p">
															<div class="d-flex">
																<h5 class="mb-1 name">Graham Cracker</h5>
															</div>
															<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
															<p class="time mb-0 text-start float-start ms-2 mt-2">Feb 25 10:35 AM</p>
														</div>
													</a>
													<a href="javascript:void(0);" class="p-3 d-flex border-bottom">
														<div class="drop-img cover-image" data-bs-image-src="/assets/img/faces/12.jpg">
															<span class="avatar-status bg-teal"></span>
														</div>
														<div class="wd-90p">
															<div class="d-flex">
																<h5 class="mb-1 name">Donatella Nobatti</h5>
															</div>
															<p class="mb-0 desc">Here are some products ...</p>
															<p class="time mb-0 text-start float-start ms-2 mt-2">Feb 12 05:12 PM</p>
														</div>
													</a>
													<a href="javascript:void(0);" class="p-3 d-flex border-bottom">
														<div class="drop-img cover-image" data-bs-image-src="/assets/img/faces/5.jpg">
															<span class="avatar-status bg-teal"></span>
														</div>
														<div class="wd-90p">
															<div class="d-flex">
																<h5 class="mb-1 name">Anne Fibbiyon</h5>
															</div>
															<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
															<p class="time mb-0 text-start float-start ms-2 mt-2">Jan 29 03:16 PM</p>
														</div>
													</a>
												</div>
												<div class="text-center dropdown-footer">
													<a href="text-center">VIEW ALL</a>
												</div>
											</div>
										</li>
										<li class="dropdown nav-item main-header-notification">
											<a class="new nav-link" href="javascript:void(0);">
											<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
											<div class="dropdown-menu">
												<div class="menu-header-content bg-primary text-start">
													<div class="d-flex">
														<h6 class="dropdown-title mb-1 tx-15 text-white fw-semibold">Notifications</h6>
														<span class="badge rounded-pill bg-warning ms-auto my-auto float-end">Mark All Read</span>
													</div>
													<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread Notifications</p>
												</div>
												<div class="main-notification-list Notification-scroll">
													<a class="d-flex p-3 border-bottom" href="javascript:void(0);">
														<div class="notifyimg bg-pink">
															<i class="la la-file-alt text-white"></i>
														</div>
														<div class="ms-3">
															<h5 class="notification-label mb-1">New files available</h5>
															<div class="notification-subtext">10 hour ago</div>
														</div>
														<div class="ms-auto" >
															<i class="las la-angle-right text-end text-muted"></i>
														</div>
													</a>
													<a class="d-flex p-3 border-bottom" href="javascript:void(0);">
														<div class="notifyimg bg-purple">
															<i class="la la-gem text-white"></i>
														</div>
														<div class="ms-3">
															<h5 class="notification-label mb-1">Updates Available</h5>
															<div class="notification-subtext">2 days ago</div>
														</div>
														<div class="ms-auto" >
															<i class="las la-angle-right text-end text-muted"></i>
														</div>
													</a>
													<a class="d-flex p-3 border-bottom" href="javascript:void(0);">
														<div class="notifyimg bg-success">
															<i class="la la-shopping-basket text-white"></i>
														</div>
														<div class="ms-3">
															<h5 class="notification-label mb-1">New Order Received</h5>
															<div class="notification-subtext">1 hour ago</div>
														</div>
														<div class="ms-auto" >
															<i class="las la-angle-right text-end text-muted"></i>
														</div>
													</a>
													<a class="d-flex p-3 border-bottom" href="javascript:void(0);">
														<div class="notifyimg bg-warning">
															<i class="la la-envelope-open text-white"></i>
														</div>
														<div class="ms-3">
															<h5 class="notification-label mb-1">New review received</h5>
															<div class="notification-subtext">1 day ago</div>
														</div>
														<div class="ms-auto" >
															<i class="las la-angle-right text-end text-muted"></i>
														</div>
													</a>
													<a class="d-flex p-3 border-bottom" href="javascript:void(0);">
														<div class="notifyimg bg-danger">
															<i class="la la-user-check text-white"></i>
														</div>
														<div class="ms-3">
															<h5 class="notification-label mb-1">22 verified registrations</h5>
															<div class="notification-subtext">2 hour ago</div>
														</div>
														<div class="ms-auto" >
															<i class="las la-angle-right text-end text-muted"></i>
														</div>
													</a>
													<a class="d-flex p-3 border-bottom" href="javascript:void(0);">
														<div class="notifyimg bg-primary">
															<i class="la la-check-circle text-white"></i>
														</div>
														<div class="ms-3">
															<h5 class="notification-label mb-1">Project has been approved</h5>
															<div class="notification-subtext">4 hour ago</div>
														</div>
														<div class="ms-auto" >
															<i class="las la-angle-right text-end text-muted"></i>
														</div>
													</a>
												</div>
												<div class="dropdown-footer">
													<a href="">VIEW ALL</a>
												</div>
											</div>
										</li>
										<li class="nav-item full-screen fullscreen-button">
											<a class="new nav-link full-screen-link" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
										</li>
										<li class="dropdown main-profile-menu nav nav-item nav-link">
											<a class="profile-user d-flex" href=""><img alt="" src="/assets/img/faces/6.jpg"></a>
											<div class="dropdown-menu">
												<div class="main-header-profile bg-primary p-3">
													<div class="d-flex wd-100p">
														<div class="main-img-user"><img alt="" src="/assets/img/faces/6.jpg" class=""></div>
														<div class="ms-3 my-auto">
															<h6>Petey Cruiser</h6><span>Premium Member</span>
														</div>
													</div>
												</div>
												<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
												<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
												<a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out"></i> Sign Out</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /main-header -->

				<!-- main-sidebar -->
				<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
				<div class="sticky">
					<aside class="app-sidebar sidebar-scroll">
						<div class="main-sidebar-header active">
							<a class="desktop-logo logo-light active" href="index.html"><img src="/assets/img/brand/logo.png" class="main-logo" alt="logo"></a>
							<a class="desktop-logo logo-dark active" href="index.html"><img src="/assets/img/brand/logo-white.png" class="main-logo" alt="logo"></a>
							<a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="/assets/img/brand/favicon.png" alt="logo"></a>
							<a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="/assets/img/brand/favicon-white.png" alt="logo"></a>
						</div>
						<div class="main-sidemenu">
							<div class="app-sidebar__user clearfix">
								<div class="dropdown user-pro-body">
									<div class="">
										<img alt="user-img" class="avatar avatar-xl brround" src="/assets/img/faces/6.jpg"><span class="avatar-status profile-status bg-green"></span>
									</div>
									<div class="user-info">
										<h4 class="fw-semibold mt-3 mb-0">Petey Cruiser</h4>
										<span class="mb-0 text-muted">Premium Member</span>
									</div>
								</div>
							</div>
							<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
							<ul class="side-menu">
								<li class="side-item side-item-category">Main</li>
								<li class="slide">
									<a class="side-menu__item" href="{{ route('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">Index</span></a>
								</li>
								<li class="side-item side-item-category">General</li>

								@can('isAdmin')
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z" opacity=".3"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
										<span class="side-menu__label">Master</span><i class="angle fe fe-chevron-down"></i>
									</a>
									<ul class="slide-menu">
										<li class="side-menu__label1"><a href="javascript:void(0);">Icons</a></li>
										<li><a class="slide-item" href="{{ route('bidang.index') }}">Bidang </a></li>
										<li><a class="slide-item" href="{{ route('seksi.index') }}">Seksi </a></li>
										<li><a class="slide-item" href="{{ route('kegiatan.index') }}">Kegiatan </a></li>
										<li><a class="slide-item" href="{{ route('pegawai.index') }}">Pegawai </a></li>
										<li><a class="slide-item" href="{{ route('tanda-tangan.index') }}">Tanda Tangan </a></li>
										<li><a class="slide-item" href="{{ route('alat-angkut.index') }}">Alat Angkut </a></li>
										<li><a class="slide-item" href="{{ route('jabatan.index') }}">Jabatan </a></li>
										<li><a class="slide-item" href="{{ route('ketentuan.index') }}">Ketentuan </a></li>
										<li><a class="slide-item" href="{{ route('user.index') }}">User </a></li>
										<li class="sub-slide">
											<a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);">
												<span class="sub-side-menu__label">Setting Biaya</span><i class="sub-angle fe fe-chevron-down"></i>
											</a>
											<ul class="sub-slide-menu">
												<li><a class="sub-side-menu__item" href="{{ route('golongan.index') }}">Golongan</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('jenis-perdin.index') }}">Jenis Perdin</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('provinsi.index') }}">Provinsi</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('kota-kabupaten.index') }}">Kota/Kabupaten</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('uang-harian.index') }}">Uang Harian</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('uang-transport.index') }}">Uang Transport</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('biaya-perdin.index') }}">Biaya Perdin</a></li>
											</ul>
										</li>
									</ul>
								</li>
								@endcan
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z" opacity=".3"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>
										<span class="side-menu__label">Perdin</span><i class="angle fe fe-chevron-down"></i>
									</a>
									<ul class="slide-menu">
										<li class="side-menu__label1"><a href="javascript:void(0);">Icons</a></li>
										<li class="sub-slide">
											<a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);">
												<span class="sub-side-menu__label">Data Perdin</span><i class="sub-angle fe fe-chevron-down"></i>
											</a>
											<ul class="sub-slide-menu">
												<li><a class="sub-side-menu__item" href="{{ route('golongan.index') }}">Baru</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('golongan.index') }}">Ditolak</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('golongan.index') }}">Belum Ada Laporan</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('golongan.index') }}">Belum Bayar</a></li>
												<li><a class="sub-side-menu__item" href="{{ route('golongan.index') }}">Sudah Bayar</a></li>
											</ul>
										</li>
										<li><a class="slide-item" href="{{ route('data-anggaran.index') }}">Data Anggaran </a></li>
										<li><a class="slide-item" href="{{ route('data-anggaran.index') }}">Arsip Laporan </a></li>
									</ul>
								</li>
							</ul>
							<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
						</div>
					</aside>
				</div>
				<!-- main-sidebar -->
			</div>

			<!-- main-content -->
			<div class="main-content app-content">

				<!-- container -->
				<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Halo {{ auth()->user()->pegawai->nama ?? 'Super Admin' }}, selamat datang kembali!</h2>
						<p class="mg-b-0">{{ auth()->user()->seksi->nama ?? 'Seksi belum ditentukan' }}</p>
					</div>
					<div class="main-dashboard-header-right">
						
					</div>
				</div>
				<!-- breadcrumb -->

					@yield('container')

				</div>
				<!-- /Container -->
			</div>
			<!-- /main-content -->

			<!-- Message Modal -->
			<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-right chatbox" role="document">
					<div class="modal-content chat border-0">
						<div class="card overflow-hidden mb-0 border-0">
							<!-- action-header -->
							<div class="action-header clearfix">
								<div class="float-start hidden-xs d-flex ms-2">
									<div class="img_cont me-3">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img" alt="img">
									</div>
									<div class="align-items-center mt-2">
										<h4 class="text-white mb-0 fw-semibold">Daneil Scott</h4>
										<span class="dot-label bg-success"></span><span class="me-3 text-white">online</span>
									</div>
								</div>
								<ul class="ah-actions actions align-items-center">
									<li class="call-icon">
										<a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#audiomodal">
											<i class="si si-phone"></i>
										</a>
									</li>
									<li class="video-icon">
										<a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#videomodal">
											<i class="si si-camrecorder"></i>
										</a>
									</li>
									<li class="dropdown">
										<a href="" data-bs-toggle="dropdown" aria-expanded="true">
											<i class="si si-options-vertical"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-end">
											<li><i class="fa fa-user-circle"></i> View profile</li>
											<li><i class="fa fa-users"></i>Add friends</li>
											<li><i class="fa fa-plus"></i> Add to group</li>
											<li><i class="fa fa-ban"></i> Block</li>
										</ul>
									</li>
									<li>
										<a href=""  class="" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true"><i class="si si-close text-white"></i></span>
										</a>
									</li>
								</ul>
							</div>
							<!-- action-header end -->

							<!-- msg_card_body -->
							<div class="card-body msg_card_body">
								<div class="chat-box-single-line">
									<abbr class="timestamp">February 1st, 2019</abbr>
								</div>
								<div class="d-flex justify-content-start">
									<div class="img_cont_msg">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Hi, how are you Jenna Side?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end ">
									<div class="msg_cotainer_send">
										Hi Connor Paige i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end ">
									<div class="msg_cotainer_send">
										You welcome Connor Paige
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken  born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken  born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken  born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start">
									<div class="img_cont_msg">
										<img src="/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Okay Bye, text you later..
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<!-- msg_card_body end -->
							<!-- card-footer -->
							<div class="card-footer">
								<div class="msb-reply d-flex">
									<div class="input-group">
										<input type="text" class="form-control " placeholder="Typing....">
									<div class="input-group-text bg-transparent border-0 p-0">
											<button type="button" class="btn btn-primary ">
												<i class="far fa-paper-plane" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div><!-- card-footer end -->
						</div>
					</div>
				</div>
			</div>

			<!--Video Modal -->
			<div id="videomodal" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content bg-dark border-0 text-white">
						<div class="modal-body mx-auto text-center p-7">
							<h5>Valex Video call</h5>
							<img src="/assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
							<h4 class="mb-1 fw-semibold">Daneil Scott</h4>
							<h6>Calling...</h6>
							<div class="mt-5">
								<div class="row">
									<div class="col-4">
										<a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
											<i class="fas fa-video-slash"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape rounded-circle text-white mb-0 me-3" href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
											<i class="fas fa-phone bg-danger text-white"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
											<i class="fas fa-microphone-slash"></i>
										</a>
									</div>
								</div>
							</div>
						</div><!-- modal-body -->
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->

			<!-- Audio Modal -->
			<div id="audiomodal" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content border-0">
						<div class="modal-body mx-auto text-center p-7">
							<h5>Valex Voice call</h5>
							<img src="/assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
							<h4 class="mb-1  fw-semibold">Daneil Scott</h4>
							<h6>Calling...</h6>
							<div class="mt-5">
								<div class="row">
									<div class="col-4">
										<a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
											<i class="fas fa-volume-up bg-light text-dark"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape rounded-circle text-white mb-0 me-3" href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
											<i class="fas fa-phone text-white bg-success"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape  rounded-circle mb-0 me-3" href="javascript:void(0);">
											<i class="fas fa-microphone-slash bg-light text-dark"></i>
										</a>
									</div>
								</div>
							</div>
						</div><!-- modal-body -->
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->

			<!-- Footer opened -->
			<div class="main-footer ht-45">
				<div class="container-fluid pd-t-0 ht-100p">
					<span> Copyright © 2022 <a href="javascript:void(0);" class="text-primary">Valex</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko </a> All rights reserved.</span>
				</div>
			</div>
			<!-- Footer closed -->

		</div>
		<!-- End Page -->

		@yield('js')
	</body>
</html>