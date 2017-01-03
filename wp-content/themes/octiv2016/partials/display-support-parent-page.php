<?php /* INTEGRATIONS PAGE */ if ( is_single(288) ) : ?>
	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'Cloud Storage');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>Cloud Storage</h3>
					<hr>
					<ul class="half">
						<?php 
							$queryArgs = queryArgs(290); 
							getListedItems($queryArgs);
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'CPQ');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>CPQ</h3>
					<hr>
					<div class="half">
						<div>
							<h4>SteelBrick</h4>
							<ul>
								<?php postIDLogic(1067); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'CRM');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>CRM</h3>
					<hr>
					<div class="half">
						<div>
							<h4>Microsoft Dynamics</h4>
							<ul>
								<?php postIDLogic(490); ?>
							</ul>
						</div>
						<div>
							<h4>Netsuite</h4>
							<ul>
								<?php postIDLogic(927); ?>
							</ul>
						</div>
						<div>
							<h4>Pipedrive</h4>
							<ul>
								<?php postIDLogic(930); ?>
							</ul>
						</div>
						<div>
							<h4>Salesforce</h4>
							<ul>
								<?php postIDLogic(489); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'DTM (eSig)');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>DTM (eSig)</h3>
					<hr>
					<div class="half">
						<div>
							<h4>DocuSign</h4>
							<ul>
								<?php postIDLogic(1408); ?>
							</ul>
						</div>
						<div>
							<h4>Octiv eSignature</h4>
								<ul>
									<?php postIDLogic(1409); ?>
								</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'Forms');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>Forms</h3>
					<hr>
					<ul class="half">
						<?php postIDLogic(295); ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'Online Meeting');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>Online Meeting</h3>
					<hr>
					<div class="half">
						<ul>
							<?php postIDLogic(294); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'Social Network');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>Social Network</h3>
					<hr>
					<div class="half">
						<ul>
							<?php postIDLogic(293); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(288,'SSO');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>SSO</h3>
					<hr>
					<ul>
						<?php postIDLogic(291); ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<style>
		section .two-third-reversed li {
			font-size: 0.85em;
			line-height: 1.4em;
		}
	</style>
<?php /* ADMINISTRATION + DOCUMENTATION PAGE */ elseif ( is_single(280) ) : ?>
	<section>
		<div class="site-width">
			<section>
				<div class="two-third-reversed">
					<div>
						<?php 
							$queryArgs = queryArgs(280,'Analytics');
							getThumbnail($queryArgs);
						?>
					</div>
					<div>
						<h3>Analytics</h3>
						<hr>
						<div class="half">
							<div>
								<h4>Insights (beta)</h4>
								<ul style="padding-bottom: 0;">
									<?php 
									
										$args = array(
											'post_type' => 'support',
											'post_parent' => 979,
											'orderby' => 'title',
											'order' => 'ASC',
											'post__not_in' => array(1030, 1035, 1045, 1008, 1020)
										);
									
										$query = new WP_Query( $args );
									
										if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post() 
									
									?>
											<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<?php	endwhile; endif; wp_reset_query(); ?>

								</ul>
								<p style="font-size: 0.85em;"><strong>Calculated Fields and Measures</strong></p>
								<ul style="padding-bottom: 0;">
									<?php postIDLogic(1030); ?>
								</ul>
								<p style="font-size: 0.85em;"><strong>Crosstabs</strong></p>
								<ul style="padding-bottom: 0;">
									<?php postIDLogic(1035); ?>
								</ul>
								<p style="font-size: 0.85em;"><strong>Filters and Input Controls</strong></p>
								<ul style="padding-bottom: 0;">
									<?php postIDLogic(1045); ?>
								</ul>
								<p style="font-size: 0.85em;"><strong>Tables</strong></p>
								<ul style="padding-bottom: 0;">
									<?php postIDLogic(1008); ?>
								</ul>
								<p style="font-size: 0.85em;"><strong>Charts</strong></p>
								<ul style="padding-bottom: 0;">
									<?php postIDLogic(1020); ?>
								</ul>
							</div>
							<div>
								<h4>Report Builder</h4>
								<ul>
									<?php postIDLogic(1065); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section>
				<div class="two-third-reversed">
					<div>
						<?php 
							$queryArgs = queryArgs(280,'Assets');
							getThumbnail($queryArgs);
						?>
					</div>
					<div>
						<h3>Assets</h3>
						<hr>
						<div class="half">
							<div>
								<h4>Content</h4>
								<ul>
									<?php postIDLogic(1060); ?>
								</ul>
							</div>
							<div>
								<h4>Files</h4>
								<ul>
									<?php postIDLogic(1059); ?>
								</ul>
							</div>
							<div>
								<h4>Forms</h4>
								<ul>
									<?php postIDLogic(1062); ?>
								</ul>
							</div>
							<div>
								<h4>Images</h4>
								<ul>
									<?php postIDLogic(1058); ?>
								</ul>
							</div>
							<div>
								<h4>Text Snippets</h4>
								<ul>
									<?php postIDLogic(1061); ?>
								</ul>
							</div>
					</div>
				</div>
			</section>

			<section>
				<div class="two-third-reversed">
					<div>
						<?php 
							$queryArgs = queryArgs(280,'Dashboard');
							getThumbnail($queryArgs);
						?>
					</div>
					<div>
						<h3>Dashboard</h3>
						<hr>
						<ul>
							<?php 
								$queryArgs = queryArgs(281);
								getListedItems($queryArgs);
							?>
						</ul>
					</div>
				</div>
			</section>
			<section>
				<div class="two-third-reversed">
					<div>
						<?php 
							$queryArgs = queryArgs(280,'Documents');
							getThumbnail($queryArgs);
						?>
					</div>
					<div>
						<h3>Documents</h3>
						<hr>
						<div class="half">
							<div>
								<h4>Contracts</h4>
								<ul>
									<?php postIDLogic(287); ?>
								</ul>
							</div>
							<div>
								<h4>Document Scripting</h4>
								<ul>
									<?php postIDLogic(925); ?>
								</ul>
							</div>
							<div>
								<h4>General</h4>
								<ul>
									<?php postIDLogic(1072); ?>
								</ul>
							</div>
							<div>
								<h4>Presentations</h4>
								<ul>
									<?php postIDLogic(285); ?>
								</ul>
							</div>
							<div>
								<h4>Proposals</h4>
								<ul>
									<?php postIDLogic(286); ?>
								</ul>
							</div>
							<div>
								<h4>Signatures</h4>
								<ul>
									<?php postIDLogic(1074); ?>
								</ul>
							</div>
							<div>
								<h4>Tables</h4>
								<ul>
									<?php postIDLogic(1073); ?>
								</ul>
							</div>
							<div>
								<h4>Templates</h4>
								<ul>
									<?php postIDLogic(1068); ?>
								</ul>
							</div>
							<div>
								<h4>Themes</h4>
								<ul>
									<?php postIDLogic(1071); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="two-third-reversed">
					<div>
						<?php 
							$queryArgs = queryArgs(280,'Platform Administration');
							getThumbnail($queryArgs);
						?>
					</div>
					<div>
						<h3>Platform Administration</h3>
						<hr>
						<div class="half">
							<div>
								<h4>General</h4>
								<ul>
									<?php postIDLogic(1078); ?>
								</ul>
							</div>
							<div>
								<h4>Passwords</h4>
								<ul>
									<?php postIDLogic(1076); ?>
								</ul>
							</div>
							<div>
								<h4>Roles + Permissions</h4>
								<ul>
									<?php postIDLogic(1077); ?>
								</ul>
							</div>
							<div>
								<h4>Security</h4>
								<ul>
									<?php postIDLogic(1070); ?>
								</ul>
							</div>
							<div>
								<h4>Users + Workgroups</h4>
								<ul>
									<?php postIDLogic(1075); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="two-third-reversed">
					<div>
						<?php 
							$queryArgs = queryArgs(280,'Search Functionality');
							getThumbnail($queryArgs);
						?>
					</div>
					<div>
						<h3>Search Functionality</h3>
						<hr>
						<ul class="half">
							<?php postIDLogic(1406); ?>
						</ul>
					</div>
				</div>
			</section>

			
		</div>
	</section>

	<style>
		section .two-third-reversed li {
			font-size: 0.85em;
			line-height: 1.4em;
		}
	</style>
<?php /* PRODUCT TRAINING + VIDEOS */ else : ?>
	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(266,'Online Training');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>Online Training</h3>
					<hr>
					<div class="half">
						<div>
							<h4>Platform</h4>
							<ul>
								<?php 
									$queryArgs = queryArgs(1372); 

									$pres_query = new WP_Query($queryArgs);

									if ( $pres_query->have_posts() ) : while ( $pres_query->have_posts() ) : $pres_query->the_post() ?>
									<?php 
										$link_location = get_field('external_link');
									?>
											<li><a href="<?php echo $link_location; ?>"><?php the_title(); ?></a></li>
									<?php endwhile; endif; wp_reset_query(); ?>
							</ul>
						</div>
						<div>
							<h4>Presentations</h4>
							<ul>
								<?php 
									$queryArgs = queryArgs(270); 

									$pres_query = new WP_Query($queryArgs);

									if ( $pres_query->have_posts() ) : while ( $pres_query->have_posts() ) : $pres_query->the_post() ?>
									<?php 
										$link_location = get_field('external_link');
									?>
											<li><a href="<?php echo $link_location; ?>"><?php the_title(); ?></a></li>
									<?php endwhile; endif; wp_reset_query(); ?>
							</ul>
						</div>
						<div>
							<h4>Proposals</h4>
							<ul>
								<?php 
									$queryArgs = queryArgs(271); 

									$pres_query = new WP_Query($queryArgs);

									if ( $pres_query->have_posts() ) : while ( $pres_query->have_posts() ) : $pres_query->the_post() ?>
									<?php 
										$link_location = get_field('external_link');
									?>
											<li><a href="<?php echo $link_location; ?>"><?php the_title(); ?></a></li>
									<?php endwhile; endif; wp_reset_query(); ?>
							</ul>
						</div>
						<div>
							<h4>Contracts</h4>
							<ul>
								<?php 
									$queryArgs = queryArgs(272); 

									$pres_query = new WP_Query($queryArgs);

									if ( $pres_query->have_posts() ) : while ( $pres_query->have_posts() ) : $pres_query->the_post() ?>
									<?php 
										$link_location = get_field('external_link');
									?>
											<li><a href="<?php echo $link_location; ?>"><?php the_title(); ?></a></li>
									<?php endwhile; endif; wp_reset_query(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="site-width">
			<div class="two-third-reversed">
				<div>
					<?php 
						$queryArgs = queryArgs(266,'Video Tutorials');
						getThumbnail($queryArgs);
					?>
				</div>
				<div>
					<h3>Video Tutorials</h3>
					<hr>
					<div class="half">
						<div>
							<h4>Admininstration</h4>
							<ul>
								<?php postIDLogic(1709); ?>
							</ul>
						</div>
						<div>
							<h4>Presentations</h4>
							<ul>
								<?php postIDLogic(274); ?>
							</ul>
						</div>
						<div>
							<h4>Proposals</h4>
							<ul>
								<?php postIDLogic(275); ?>
							</ul>
						</div>
						<div>
							<h4>Contracts</h4>
							<ul>
								<?php postIDLogic(276); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php /* FUNCTIONS */ 

	function queryArgs($parent, $title = NULL) {
		$args = array(
			'post_type' => 'support', 
			'post_parent' => $parent,
			'title' => $title,
			'orderby' => 'title',
			'order' => 'ASC'
		);

		return $args;
	}

	function getListedItems($queryArgs) {
		$query = new WP_Query($queryArgs);
		if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post();
			echo '<li><a href="' . get_the_permalink() . '">' .get_the_title() . '</a></li>';
		endwhile; endif; wp_reset_query();
	}

	function getThumbnail($queryArgs) {
		$query = new WP_Query($queryArgs);
		if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post();
			the_post_thumbnail();
		endwhile; endif; wp_reset_query();
	}

	function postIDLogic($ID) {
	if ($post->ID = $ID) :
		$args = array(
			'post_type' => 'support',
			'post_parent' => $ID,
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$IDLogic = new WP_Query($args);
		if ( $IDLogic->have_posts() ) : while ( $IDLogic->have_posts() ) : $IDLogic->the_post();
			echo '<li><a href="' . get_the_permalink() . '">' .get_the_title() . '</a></li>';
		endwhile; endif; wp_reset_query();
	endif;
	}

?>