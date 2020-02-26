	<?= get_template('header'); ?>	
<div class="inner-wrapper">
	<?= get_template('menu'); ?>			
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2><?= $title; ?></h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Pages</span></li>
					<li><span>Blank Page</span></li>
				</ol>
				
				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
		<?= $contents; ?>
		<!-- start: page -->
		<!-- end: page -->
	</section>
</div>

	<?= get_template('footer'); ?>	