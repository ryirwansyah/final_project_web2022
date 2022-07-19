<div class="thumbnail_slider_area">
  <div class="owl-carousel">
    <?php foreach ($news_header as $row) : ?>
      <div class="signle_iteam"> <img src="<?php echo image($row->id) ?>" alt="">
        <div class="sing_commentbox slider_comntbox">
          <p><i class="fa fa-calendar"></i><?php echo tgl_indo($row->diterbitkan) ?></p>
        </div>
        <a class="slider_tittle" href="<?php echo base_url('berita/detail/' . $row->slug) ?>"><?php echo $row->judul ?></a>
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
                    <a href="<?php echo base_url('berita/detail/' . $row->slug) ?>"><img src="<?php echo image($row->id) ?>" alt=""></a>
                    <a class="recent_title" href="<?php echo base_url('berita/detail/' . $row->slug) ?>"> <?php echo $row->judul ?></a>
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
          <div class="single_post_area">
            <ol class="breadcrumb">
              <li><a href="https://www.free-css.com/free-css-templates"><i class="fa fa-home"></i>Home<i class="fa fa-angle-right"></i></a></li>
              <li><a href="https://www.free-css.com/free-css-templates">Category<i class="fa fa-angle-right"></i></a></li>
              <li class="active"><?php echo $news->judul ?></li>
            </ol>
            <h2 class="post_title wow  animated" style="visibility: visible;"><?php echo $news->judul ?> </h2>
            <a href="https://www.free-css.com/free-css-templates" class="author_name"><i class="fa fa-user"></i><?php echo $news->name ?></a> <a href="#" class="post_date"><i class="fa fa-clock-o"></i><?php echo tgl_indo($news->diterbitkan) ?></a>
            <div class="single_post_content">
              <?php echo html_entity_decode($news->konten) ?>
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