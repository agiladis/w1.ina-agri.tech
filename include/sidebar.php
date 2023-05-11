	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="images/logo-inastek-resized.png" alt="">
			</a>
		</div>
		<?php
		//hide-selain-root
		$acc = $_SESSION['level'];
		if ($acc == 'root') {
			$acc1 = '';
		} else {
			$acc1 = 'style="display:none;"';
		}

		//enginner-only
		$role = $_SESSION['ugroup'];
		if ($role == 'Engineer') {
			$eng = '';
		} else {
			$eng = 'style="display:none;"';
		}
		//ppic-only
		if ($role == 'PPIC' || $role == 'Engineer') {
			$ppic = '';
		} else {
			$ppic = 'style="display:none;"';
		}
		//qc-only
		if ($role == 'QC' || $role == 'Engineer') {
			$qc = '';
		} else {
			$qc = 'style="display:none;"';
		}
		//warehouse-only
		if ($role == 'Warehouse' || $role == 'Engineer') {
			$wh = '';
		} else {
			$wh = 'style="display:none;"';
		}

		?>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li <?php echo $wh; ?> class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-table"></span><span class="mtext">Incoming</span>
						</a>
						<ul class="submenu">
							<li><a href="incoming-hw.php">Incoming List</a></li>
							<li><a href="create-new-perangkat.php">New Incoming (per kardus)</a></li>
							<li><a href="create-new-perangkat-perbatch.php">New Incoming (per batch)</a></li>
						</ul>
					</li>

					<li <?php echo $ppic; ?> class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-table"></span><span class="mtext">Production</span>
						</a>
						<ul class="submenu">
							<li><a href="serial-number.php"> List Serial Number</a></li>
							<li><a href="batch-production-table.php">Create Batch & Generate QR</a></li>
							<li><a href="list-kategori-produk.php">List Kategori Produk</a></li>
							<li><a href="list-pemesan-produk.php">List Pemesanan Produk</a></li>
							<li><a href="incoming-hw(ppic).php">List Incoming Komponen</a></li>
						</ul>
					</li>
					<li <?php echo $qc; ?> class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-check-square-o"></span><span class="mtext">Quality Control</span>
						</a>
						<ul class="submenu">
							<li><a href="incoming-qc.php">Incoming QC</a></li>
							<li><a href="final-qc.php">Final SN QC</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-briefcase"></span><span class="mtext">Tools</span>
						</a>
						<ul class="submenu">
							<li><a href="http://w1.ina-agri.tech/file_print/Software%20&%20Driver/Driver_BP%20TR110.zip" target="_blank">Driver Printer</a></li>
							<li><a href="http://w1.ina-agri.tech/file_print/Software%20&%20Driver/Dlabel_PC.exe" target="_blank">Software Dlabel</a></li>
							<li><a href="http://w1.ina-agri.tech/file_print/Manual-Book-QR-Print.pdf " target="_blank">Petunjuk Install</a></li>
							<li><a href="http://w1.ina-agri.tech/file_print/template_fix(extract%20dulu).zip" target="_blank">Template Dlabel</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-user-circle-o"></span><span class="mtext">Account</span>
						</a>
						<ul class="submenu">
							<li <?php echo $acc1; ?>><a href="create-new-user.php">Create New User</a></li>
							<li><a href="reset-password.php?userId=<?php echo $_SESSION['idid'] ?>">Change Password</a></li>
							<li <?php echo $acc1; ?>><a href="list-user.php">List User</a></li>
							<li <?php echo $acc1; ?>><a href="list-usergroup.php">List Usergroup</a></li>
							<li><a href="log.php">Log</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>