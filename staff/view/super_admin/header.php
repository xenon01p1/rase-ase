
<div class="topbar d-flex align-items-center">
					<nav class="navbar navbar-expand gap-3">

						<!--breadcrumb-->
						<div class="page-breadcrumb d-none d-sm-flex align-items-center ">
							 
							<?php


							$current_menu = (isset($_GET['sm'])) ? $_GET['sm'] : 'Default';



							if ($current_menu=='ktp_add')
							{
								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0"><li class="breadcrumb-item active" aria-current="page">KTP</li></ol>';
								echo '</nav>';
								echo '</div>'; 

								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0"><li class="breadcrumb-item"></li><li class="breadcrumb-item active" aria-current="page">Tambah KTP Baru</li></ol>';
								echo '</nav>';
								echo '</div>';  

							} else 
							if ($current_menu=='stnk_add')
							{
								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0"><li class="breadcrumb-item active" aria-current="page">STNK</li></ol>';
								echo '</nav>';
								echo '</div>'; 

								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0"><li class="breadcrumb-item"></li><li class="breadcrumb-item active" aria-current="page">Tambah STNK Baru</li></ol>';
								echo '</nav>';
								echo '</div>';  

							} else {
								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0">';
								echo '<li class="breadcrumb-item active" aria-current="page">Layanan</li>';
								echo '</ol>';
								echo '</nav>';
								echo '</div>';
								 
								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0">';
								echo '<li class="breadcrumb-item"></li>';
								echo '<li class="breadcrumb-item active" aria-current="page">Pajak 1 Tahun</li>';
								echo '</ol>';
								echo '</nav>';
								echo '</div>';
								 
								echo '<div class="ps-0">';
								echo '<nav aria-label="breadcrumb">';
								echo '<ol class="breadcrumb mb-0 p-0">';
								echo '<li class="breadcrumb-item"></li>';
								echo '<li class="breadcrumb-item active" aria-current="page">View</li>';
								echo '</ol>';
								echo '</nav>';
								echo '</div>'; 

							}



							
							?>

							 
						</div>
					  


					  <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div> 

					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							 
							 

							<li class="nav-item dropdown dropdown-app"> 

								<div class="dropdown-menu dropdown-menu-end p-0"><div class="app-container p-2 my-2"></div></div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="../../assets/admin/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">dc
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="../../assets/admin/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success">
													<img src="../../assets/admin/images/app/outlook.png" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Account Created<span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">Successfully created new email</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">Ss
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="../../assets/admin/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary">
													<img src="../../assets/admin/images/app/github.png" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="../../assets/admin/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large"> 
								<div class="dropdown-menu dropdown-menu-end"><div class="header-message-list"></div></div>
							</li>



						</ul>
					</div>


					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="../../assets/admin/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0"><?= $_SESSION['super_admin_name'] ?></p>
								<p class="designattion mb-0">Admin</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a></li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a></li> 
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>