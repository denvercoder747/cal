 <!--  Left Side bar Informations -->
 <?php
 		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->select_profile())
		{
//			$data['records'] = $query;
			$firstname=$query[0]->first_name;
			$lastname=$query[0]->last_name;
			$email=$query[0]->email;
			$contact_no=$query[0]->contact_no;
			$fax_no=$query[0]->fax_no;
			$photo=$query[0]->photo;
		}
 ?>
<div class="art-sidebar1">
                        <!-- Profile Information View -->
                        <div class="art-Block">
                            <div class="art-Block-tl"></div>
                            <div class="art-Block-tr"></div>
                            <div class="art-Block-bl"></div>
                            <div class="art-Block-br"></div>
                            <div class="art-Block-tc"></div>
                            <div class="art-Block-bc"></div>
                            <div class="art-Block-cl"></div>
                            <div class="art-Block-cr"></div>
                            <div class="art-Block-cc"></div>
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                 <div id="header-mdi">
                                                	<div id="header-left">
                                                    <div id="header-right">
                                                    <div class="blockHeaderIcon"><img border="0" src="/images/Profile-Info.png" height="24" width="24" /></div>
                                              <div class="t">Profile Info</div>                                                </div></div></div>
                                    

                                </div><div class="art-BlockContent">
                                    <div class="art-BlockContent-body">
                                    <?php // echo $photo; exit; ?>
                                        <div><?php if($photo!='noimage.jpeg'){?>
                                              <img src="/images/thumbs/<?php echo $photo;?>" alt="an image" style="margin: 0 auto;display:block;width:95%" /><?php }else{?><img src="/images/noimage_male.png" alt="an image" style="margin: 0 auto;display:block;width:95%" /><?php }?>
                                        </div>
                                        <span class="art-button-wrapper">
                                        	<span class="l"> </span>
                                        	<span class="r"> </span>
                                        	<input class="art-button" type="button" name="search" value="View Full Profile&nbsp;&nbsp;&nbsp;&nbsp;" onclick="window.location='<?php echo base_url();?>index.php/member/edit_profile'"/>
                                        </span>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!--  News Heighlights Informations -->
                        <div class="art-Block">
                            <div class="art-Block-tl"></div>
                            <div class="art-Block-tr"></div>
                            <div class="art-Block-bl"></div>
                            <div class="art-Block-br"></div>
                            <div class="art-Block-tc"></div>
                            <div class="art-Block-bc"></div>
                            <div class="art-Block-cl"></div>
                            <div class="art-Block-cr"></div>
                            <div class="art-Block-cc"></div>
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                <div id="header-mdi">
                                                	<div id="header-left">
                                                    <div id="header-right">
                                                    <div class="blockHeaderIcon"><img border="0" src="/images/newss.png" height="24" width="24" /></div>
                                        <div class="t">News Highlights</div>                                                </div></div></div>
                                   
                                    	
                                        
                                </div>
                                <div class="art-BlockContent">
                                    <div class="art-BlockContent-body">
                                        <div>
<?php /*?>                                                          <p><b>Jun 14, 2008</b><br/>
                                                          Aliquam sit amet felis. Mauris semper, 
                                                         velit semper laoreet dictum, quam 
                                                          diam dictum urna, nec placerat elit 
                                                          nisl in quam. Etiam augue pede, 
                                                          molestie eget, rhoncus at, convallis 
                                                          ut, eros. Aliquam pharetra.<br/>
                                                          <a href="javascript:void(0)">Read more...</a></p>
<?php */?>                                                          
<marquee behavior="scroll" direction="up" scrolldelay="150" onmouseover="this.stop();" onmouseout="this.start();"> <p>                                            
<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Feconomictimes.indiatimes.com%2Frssfeeds%2F13358793.cms&chan=y&num=0&desc=0&date=y&targ=y" type="text/javascript"></script>

<noscript>
<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Feconomictimes.indiatimes.com%2Frssfeeds%2F13358793.cms&chan=y&num=0&desc=0&date=y&targ=y&html=y">View RSS feed</a>
</noscript>                                    
<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.voanews.com%2Ftemplates%2FArticles.rss%3FsectionPath%3D%2Fenglish%2Fnews%2Fasia&chan=y&num=0&desc=0&date=y&targ=y" type="text/javascript"></script>

<noscript>
<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.voanews.com%2Ftemplates%2FArticles.rss%3FsectionPath%3D%2Fenglish%2Fnews%2Fasia&chan=y&num=0&desc=0&date=y&targ=y&html=y">View RSS feed</a>
</noscript>
</p>
</marquee>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>