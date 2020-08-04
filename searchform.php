<!--搜索框遮罩-->
<div class="search-shade">
    <button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form">
        <svg class="icon icon--cross">
            <use xlink:href="#icon-cross"></use>
        </svg>
    </button>
    <form class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input class="search__input" name="s" type="search" placeholder="" autocomplete="off"
               autocorrect="off" autocapitalize="off" spellcheck="false">
        <span class="search__info">输入搜索词并回车确认</span>
    </form>
    <div class="search__related">
        <div class="search__suggestion">
            <h3>目 录</h3>
            <p>
                <?php wp_tag_cloud('smallest=14&largest=18&number=12&order=RAND&taxonomy=category&separator=');?>
            </p>
        </div>
        <div class="search__suggestion">
            <h3>标 签</h3>
            <p><?php wp_tag_cloud('smallest=10&largest=18&number=12&order=RAND&taxonomy=post_tag&separator= ');?>
            </p>
        </div>
    </div>
</div>