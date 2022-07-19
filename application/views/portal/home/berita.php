<div class="thumbnail_slider_area">
  <div class="owl-carousel">
    <?php foreach ($news_header as $row) : ?>
      <div class="signle_iteam"> <img src="<?php echo image($row->id) ?>" alt="">
        <div class="sing_commentbox slider_comntbox">
          <p><i class="fa fa-calendar"></i><?php echo tgl_indo($row->diterbitkan) ?></p>
        </div>
        <a class="slider_tittle" href="<?php echo base_url('home/detail/' . $row->slug) ?>"><?php echo $row->judul ?></a>
      </div>
    <?php endforeach ?>
  </div>
</div>
<section id="contentbody">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
      <div class="row">
        <div class="left_bar">
          <div class="single_leftbar">
            <h2><span>Recent Post</span></h2>
            <div class="singleleft_inner">
              <ul class="recentpost_nav wow fadeInDown">
                <?php foreach ($recent_post as $row) : ?>
                  <li>
                    <a href="<?php echo base_url('home/detail/' . $row->slug) ?>"><img src="<?php echo image($row->id) ?>" alt=""></a>
                    <a class="recent_title" href="<?php echo base_url('home/detail/' . $row->slug) ?>"> <?php echo $row->judul ?></a>
                  </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
      <div class="row">
        <div class="middle_bar">
          <div class="category_archive_area">
            <?php foreach ($news as $row) : ?>
              <div class="single_archive wow fadeInDown">
                <a href="<?php echo base_url('home/detail/' . $row->slug) ?>"><img src="<?php echo image($row->id) ?>" alt=""></a>
                <a href="<?php echo base_url('home/detail/' . $row->slug) ?>" class="read_more">Read More <i class="fa fa-angle-double-right"></i></a>
                <div class="singlearcive_article">
                  <h2><a href="single_page.html"><?php echo $row->judul ?></a></h2>
                  <a class="author_name" href="<?php echo base_url('home/detail/' . $row->slug) ?>"><i class="fa fa-user"></i><?php echo $row->name ?></a> <a class="post_date" href="#"><i class="fa  fa-clock-o"></i>Thursday,December 01,2045</a>
                  <p><?php echo truncate($row->konten, 100) ?></p>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="row">
        <div class="right_bar">
          <div class="single_leftbar wow fadeInDown">
            <h2><span>Category</span></h2>
            <div class="singleleft_inner">
              <ul class="label_nav">
                <?php foreach ($category as $row) : ?>
                  <li><a href="#"><?php echo $row->nama ?></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>