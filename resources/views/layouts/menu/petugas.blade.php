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
							<a href="/home" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Kelola Data Master</p>
								<span class="caret"></span>
                            </a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="/daftaraset">
											<span class="sub-item">Daftar Jenis Aset</span>
										</a>
									</li>
									<li>
										<a href="/daftarunit">
											<span class="sub-item">Daftar Unit</span>
										</a>
									</li>
									<li>
										<a href="/daftarruangan">
											<span class="sub-item">Daftar Ruangan</span>
										</a>
									</li>
									<li>
										<a href="/daftarpegawai">
											<span class="sub-item">Daftar Pegawai</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
						<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-pen-square"></i>
								<p>Inventarisasi Aset</p>
								<span class="caret"></span>
                            </a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="/asetti">
											<span class="sub-item">Aset TI</span>
										</a>
									</li>
									<li>
										<a href="/asetjaringan">
											<span class="sub-item">Aset Jaringan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="/kodeQR">
								<i class="fas fa-qrcode"></i>
								<p>Cetak Kode QR</p>
                            </a>
						</li>
						{{-- <li class="nav-item">
							<a href="/rekappengaduan">
								<i class="fas fa-clipboard-list"></i>
								<p>Pengaduan Kerusakan</p>
                            </a>
						</li> --}}
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-clipboard-list"></i>
								<p>Pengaduan Kerusakan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="/rekappengaduanti">
											<span class="sub-item">Pengaduan Aset TI</span>
										</a>
									</li>
									<li>
										<a href="/rekappengaduanjaringan">
											<span class="sub-item">Pengaduan Aset Jaringan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-print"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="/rekapasetti">
											<span class="sub-item">Rekap Pengecekan Aset TI</span>
										</a>
									</li>
									<li>
										<a href="/rekapasetjaringan">
											<span class="sub-item">Rekap Pengecekan Aset Jaringan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>





					</ul>
				</div>
			</div>
        </div>
