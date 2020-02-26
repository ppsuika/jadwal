<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
	 <div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<div class="sidebar-header">
					<div class="sidebar-title">
						Main Navigation
						
					</div>
				</div>
				<!-- SECTION MENU -->
					<?= getTemplateMenu($this->session->userdata('role_id'), 2);  ?>
			</nav>

			<hr class="separator" />

		</div>

	</div>
</aside>