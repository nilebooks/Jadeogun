<?php
/**
 * Team Member Archive Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'Our Team', 'north-texas-sda-church' ); ?></h1>
            <p class="page-subtitle"><?php esc_html_e( 'Meet the dedicated people who serve our church community.', 'north-texas-sda-church' ); ?></p>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="team-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        $role = get_post_meta( get_the_ID(), '_team_member_role', true );
                        ?>
                        <div class="team-member-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="team-member-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'ntsda-team' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="team-member-info">
                                <h3 class="team-member-name">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <?php if ( $role ) : ?>
                                    <p class="team-member-role"><?php echo esc_html( $role ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>

                <?php ntsda_pagination(); ?>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<style>
.team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.team-member-card {
    background: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: var(--transition);
}

.team-member-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
}

.team-member-image {
    height: 300px;
    overflow: hidden;
}

.team-member-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.team-member-card:hover .team-member-image img {
    transform: scale(1.1);
}

.team-member-info {
    padding: 25px;
    text-align: center;
}

.team-member-name {
    font-size: 22px;
    margin-bottom: 5px;
    font-family: var(--font-heading);
}

.team-member-name a {
    color: var(--dark-color);
}

.team-member-name a:hover {
    color: var(--primary-color);
}

.team-member-role {
    color: var(--primary-color);
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
}

@media (max-width: 992px) {
    .team-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .team-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .team-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
get_footer();
