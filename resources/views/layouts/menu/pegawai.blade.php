<!-- sidebar -->

<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ url('atlantislite/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{auth()->user()->username}}
									<span class="user-level">{{auth()->user()->role->nama_role}}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-info">
						<li class="nav-item active">
							<a href="{{ route('home') }}" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<!-- <h4 class="text-section">Data Aset</h4> -->
						</li>

						<li class="nav-item">
							<a href="{{ route('view.profil') }}">
								<i class="fas fa-layer-group"></i>
								<p>Profil Pegawai</p>
                            </a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Aset</h4>
						</li>
						<li class="nav-item">
							<a href="/masterti ">
								<i class="fas fa-layer-group"></i>
								<p>Data Aset TI Pribadi</p>
                            </a>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>History Aset</p>
								</a>
						</li>
						<li class="nav-item">
							<a href="/pengaduan">
								<i class="fas fa-pen-square"></i>
								<p>Pengaduan Kerusakan </p>
								</a>
						</li>



					</ul>
				</div>
			</div>
        </div>
