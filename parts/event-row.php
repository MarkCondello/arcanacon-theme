<?php 	if($key % 2 === 1): ?>
				<div class="grid-x grid-padding-x align-middle align-center p-b-4">
					<div class="small-8 medium-4 cell">
                        <a href="<?= $event['guid']; ?>">
						    <img class="event-thumb p-2 w-100" src="<?= $event['event_thumbnail'] ?>" alt="<?= $event['post_title']; ?>'s thumbnail" />
                        </a>
                    </div>
					<div class="small-12 medium-8 cell">
						<h3>                        
                            <a href="<?= $event['guid']; ?>">
                            <?= $event['post_title']; ?>
                            </a>    
                        </h3>
						<p class="ff-super-reg">
							<i class="fal fa-calendar-alt"></i>
							<?= $event['event_date'] ?>
						</p>
						<hr class="border-colour-primary">
						<p class="m-0">
							<span class="bold">Synopsis: </span><?= mb_strimwidth($event['post_excerpt'] , 0, 3000, '...') ?>
							<a class="bold" href="<?= $event['guid']; ?>">read more</a>
						</p>
					</div>
				</div>
	<?php 	else: ?>
				<div class="grid-x grid-padding-x align-middle align-center p-b-4">
					<div class="small-8 cell hide-for-medium">
                        <a href="<?= $event['guid']; ?>">
						    <img class="event-thumb p-2 w-100" src="<?= $event['event_thumbnail'] ?>" alt="<?= $event['post_title']; ?>'s thumbnail" />
                        </a>
                    </div>
					<div class="small-12 medium-8 cell">
						<h3>     
                            <a href="<?= $event['guid']; ?>">
                            <?= $event['post_title']; ?>
                            </a>    
                        </h3>
						<p class="ff-super-reg">
							<i class="fal fa-calendar-alt"></i>
							<?= $event['event_date'] ?>
						</p>
						<hr class="border-colour-primary">
						<p class="m-0">
							<span class="bold">Synopsis: </span><?= mb_strimwidth($event['post_excerpt'] , 0, 3000, '...') ?>
							<a class="bold" href="<?= $event['guid']; ?>">read more</a>
						</p>
					</div>
					<div class="medium-4 cell show-for-medium">
                        <a href="<?= $event['guid']; ?>">
						    <img class="event-thumb p-2 w-100" src="<?= $event['event_thumbnail'] ?>" alt="<?= $event['post_title']; ?>'s thumbnail" />
                        </a>
                    </div>
				</div>
	<?php 	endif; ?>