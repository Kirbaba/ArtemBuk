<? get_header() ?>
    <div class="col-xs-12">
        <div class="page__wrapper" oncopy="return false">
                <div class="page__head">
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                        <?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }?>
                    </div>
                </div>
                <div class="page__body page__scrolltext">
                    <?php echo do_shortcode('[reviews]'); ?>
                    <div class="preloader"></div>
                </div>
        </div>
    </div>
<? get_footer() ?>