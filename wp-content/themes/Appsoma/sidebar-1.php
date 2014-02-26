
<?php while(have_posts()) :the_post();?> 
<?php $title=get_the_title();?>
<?php endwhile;?>
<?php 	$team_actv='';
		$investors_actv='';
		$story_actv='';
		$careers_actv='';
		$contacts_actv='';
		
		if($title=="Team"){
			$team_actv="actv";
		}else if($title=="Investors"){
			$investors_actv="actv";
		}else if($title=="Story"){
			$story_actv="actv";
		}else if($title=="Careers"){
			$careers_actv="actv";
		}else if($title=="Contacts"){
			$contacts_actv="actv";
		}
		
?>
<!-- Features Select -->
    <section id="company-select">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                    <h2>A Simple Approach to a Big Problem</h2>
                    <div id="company-tabs-scroll">
                        <div class="company-tabs">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_title("Team"))); ?>" class="team <?php echo $team_actv;?>">
                                <div class="iconWrap">
                                    <div class="icon"></div>
                                    <div class="iconHover"></div>
                                </div>
                                Team
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_title("Investors"))); ?>" class="investors <?php echo $investors_actv;?>">
                                <div class="iconWrap">
                                    <div class="icon"></div>
                                    <div class="iconHover"></div>
                                </div>
                                For Investors
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_title("Story"))); ?>" class="story <?php echo $story_actv;?>">
                                <div class="iconWrap">
                                    <div class="icon"></div>
                                    <div class="iconHover"></div>
                                </div>
                                Story
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_title("Careers"))); ?>" class="careers <?php echo $careers_actv;?>">
                                <div class="iconWrap">
                                    <div class="icon"></div>
                                    <div class="iconHover"></div>
                                </div>
                                Careers
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_title("Contacts"))); ?>" class="contacts <?php echo $contacts_actv;?>">
                                <div class="iconWrap">
                                    <div class="icon"></div>
                                    <div class="iconHover"></div>
                                </div>
                                Contacts
                            </a>
                        </div>
                        </div>
                </div>
               </div>
          </div>
          <div class="pointer"></div>
    </section>