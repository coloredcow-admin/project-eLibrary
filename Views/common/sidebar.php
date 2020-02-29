<nav class="col-md-2 py-5 d-none d-lg-block position-fixed align-self-center bg-white" style="top: 0; bottom:0; z-index:2;">
	<div class="pt-5 mt-5" >
		<ul class="nav flex-column">
			<li class="nav-item border-bottom border-top">
				<?php if(!isset($_GET['view']) && (Request::uri()=='login')):?>
					<a class="btn btn-link font-weight-bolder" href="/">
						<i class="fas fa-tools"></i>
						Dashboard <i class="fas fa-caret-left"></i>
					</a>
					<?php else:?>
						<a class="btn btn-link  text-muted " href="/">
							<i class="fas fa-tools"></i>
							Dashboard
						</a>
					<?php endif; ?>
				</li>
				<li class="nav-item border-bottom " >
					<?php if(!isset($_GET['view'])):?>
						<a class="btn btn-link text-muted"  href="/login?view=users">
							<i class="fas fa-users"></i>
							Users 
						</a>
						<?php elseif($_GET['view']=='users'):?>
							<a class="btn btn-link font-weight-bolder"  href="/login?view=users">
								<i class="fas fa-users"></i>
								Users <i class="fas fa-caret-left"></i>
							</a>
							<?php else: ?>
								<a class="btn btn-link text-muted"  href="/login?view=users">
									<i class="fas fa-users"></i>
									Users 
								</a>
							<?php endif;?>
						</li>
						<li class="nav-item border-bottom ">
							<?php if(!isset($_GET['view'])):?>
								<a class="btn btn-link text-muted" href="/login?view=categories">
									<i class="fas fa-list"></i>
									Categories 
								</a>
								<?php elseif($_GET['view']=='categories'):?>
									<a class="btn btn-link font-weight-bolder"  href="/login?view=categories">	<i class="fas fa-list"></i>
										Categories <i class="fas fa-caret-left"></i>
									</a>							
									<?php else: ?>
										<a class="btn btn-link text-muted" href="/login?view=categories">
											<i class="fas fa-list"></i>
											Categories 
										</a>
									<?php endif;?>
								</li>
								<li class="nav-item border-bottom ">
									<?php 
									if(Request::uri()=='editbook') :?>
										<a class="btn btn-link font-weight-bolder" href="/login?view=books">
												<i class="fas fa-book"></i>
												Books <i class="fas fa-caret-left"></i>
											</a>
									<?php elseif(!isset($_GET['view'])):?>
										<a class="btn btn-link text-muted" href="/login?view=books">
											<i class="fas fa-book"></i>
											Books
										</a>
										<?php elseif($_GET['view']=='books'):?>
											<a class="btn btn-link font-weight-bolder" href="/login?view=books">
												<i class="fas fa-book"></i>
												Books <i class="fas fa-caret-left"></i>
											</a>
											<?php else: ?>
												<a class="btn btn-link text-muted" href="/login?view=books">
													<i class="fas fa-book"></i>
													Books
												</a>
											<?php endif;?>
										</li>
									</ul>
								</div>
							</nav>
