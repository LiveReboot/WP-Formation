<div class="col">
    <div class="card shadow-sm" style="height: 550px;">
        <div class="card-img-top" style="background-image: url('<?php the_post_thumbnail_url() ?>')" width="100%" height="225"></div>
        <div class="card-body">
            <h2 class="card-title">
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
            </h2>

            <p class="card-text"><?php echo substr(get_the_excerpt(), 0, 255) ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted"><?php the_modified_date('d/m/Y') ?></small>
            </div>
        </div>
    </div>
</div>