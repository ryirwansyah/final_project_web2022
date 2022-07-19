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
          <div class="single_category wow fadeInDown">
            <div class="single_category_inner">
              <ul class="catg_nav">
                <?php foreach ($news as $row) : ?>
                  <li>
                    <div class="catgimg_container"> 
                      <a class="catg1_img" href="<?php echo base_url('home/detail/' . $row->slug) ?>"> <img src="<?php echo image($row->id) ?>" alt=""> </a></div>
                    <a class="catg_title" href="<?php echo base_url('home/detail/' . $row->slug) ?>"> <?php echo $row->judul ?></a>
                    <div class="sing_commentbox">
                      <p><i class="fa fa-calendar"></i><?php echo tgl_indo($row->diterbitkan) ?></p>
                    </div>
                  </li>
                <?php endforeach ?>
              </ul>
            </div>
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