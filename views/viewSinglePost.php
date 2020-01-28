<div class="slider">
	<div class="display-table  center-text">
		<h1 class="title display-table-cell"><b>POSTS</b></h1>
	</div>
</div><!-- slider -->

<section class="post-area section">
	<div class="container">

		<div class="row">

			<div class="col-lg-8 col-md-12 no-right-padding">

				<div class="main-post">

					<div class="blog-post-inner">

						<div class="post-info">

							<div class="left-area">
								<a class="avatar" href="#"><img src="public/images/avatar-1-120x120.jpg" alt="Profile Image"></a>
							</div>

						</div><!-- post-info -->

						<h3 class="title"><a href="#"><b><?=$article[0]->title()?></b></a></h3>

						<h4 class="chapo"><a href="#"><b><?=$article[0]->chapo()?></b></a><h4><br />

						<p class="para"><?=$article[0]->content()?></p><br />

							<ul class="tags">
								<li><a href="#">Mnual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recommendation</a></li>
								<li><a href="#">Inspiration</a></li>
							</ul>
					</div><!-- blog-post-inner -->

					<div class="post-icons-area">
						<ul class="post-icons">
							<li><a href="#"><i class="ion-heart"></i>57</a></li>
							<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
							<li><a href="#"><i class="ion-eye"></i>138</a></li>
						</ul>

						<ul class="icons">
							<li>SHARE : </li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
						</ul>
					</div>

				</div><!-- main-post -->
			</div><!-- col-lg-8 col-md-12 -->

			<div class="col-lg-4 col-md-12 no-left-padding">

				<div class="single-post info-area">

					<div class="sidebar-area about-area">
							<h4 class="title"><b>ABOUT BONA</b></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
								ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
								Ut enim ad minim veniam</p>
						</div>

						<div class="sidebar-area subscribe-area">

							<h4 class="title"><b>SUBSCRIBE</b></h4>
							<div class="input-area">
								<form>
									<input class="email-input" type="text" placeholder="Enter your email">
									<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
								</form>
							</div>

						</div><!-- subscribe-area -->

						<div class="tag-area">

							<h4 class="title"><b>TAG CLOUD</b></h4>
							<ul>
								<li><a href="#">Manual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recomendation</a></li>
								<li><a href="#">Interpritation</a></li>
								<li><a href="#">Manual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recomendation</a></li>
								<li><a href="#">Interpritation</a></li>
							</ul>

						</div><!-- subscribe-area -->

				</div><!-- info-area -->

			</div><!-- col-lg-4 col-md-12 -->

		</div><!-- row -->

	</div><!-- container -->
</section><!-- post-area -->

<section class="comment-section">
	<div class="container">
		<h4><b>COMMENTAIRE</b></h4>
		<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
			<div>
				<label for="author">Auteur</label><br />
				<input type="text" id="author" name="author" />
			</div>
			<div>
				<label for="comment">Commentaires</label><br />
				<textarea id="comment" name="comment"></textarea>
			</div>
			<div>
				<input type="submit" />
			</div>
		</form>
	</div><!-- container -->
</section>




