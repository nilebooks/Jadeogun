<?php
/**
 * Single Team Member Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();

// Get team member meta
$role     = get_post_meta( get_the_ID(), '_team_member_role', true );
$email    = get_post_meta( get_the_ID(), '_team_member_email', true );
$phone    = get_post_meta( get_the_ID(), '_team_member_phone', true );
$facebook = get_post_meta( get_the_ID(), '_team_member_facebook', true );
$twitter  = get_post_meta( get_the_ID(), '_team_member_twitter', true );
$linkedin = get_post_meta( get_the_ID(), '_team_member_linkedin', true );
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <?php ntsda_breadcrumbs(); ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if ( $role ) : ?>
                <p class="page-subtitle"><?php echo esc_html( $role ); ?></p>
            <?php endif; ?>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-team-member' ); ?>>
                
                <div class="team-member-profile">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="team-member-photo">
                            <?php the_post_thumbnail( 'ntsda-team' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="team-member-details">
                        <h2 class="team-member-name"><?php the_title(); ?></h2>
                        <?php if ( $role ) : ?>
                            <p class="team-member-role"><?php echo esc_html( $role ); ?></p>
                        <?php endif; ?>

                        <div class="team-member-contact">
                            <?php if ( $email ) : ?>
                                <a href="mailto:<?php echo esc_attr( $email ); ?>" class="team-contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <?php echo esc_html( $email ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ( $phone ) : ?>
                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="team-contact-item">
                                    <i class="fas fa-phone"></i>
                                    <?php echo esc_html( $phone ); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php if ( $facebook || $twitter || $linkedin ) : ?>
                            <div class="team-member-social">
                                <?php if ( $facebook ) : ?>
                                    <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ( $twitter ) : ?>
                                    <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ( $linkedin ) : ?>
                                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>

            <?php
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
            ) );
            ?>
        </div>
    </section>

</main>

<style>
.team-member-profile {
    display: flex;
    gap: 50px;
    margin-bottom: 50px;
    align-items: flex-start;
}

.team-member-photo {
    flex-shrink: 0;
    width: 300px;
}

.team-member-photo img {
    width: 100%;
    height: auto;
    border-radius: 12px;
}

.team-member-details {
    flex: 1;
}

.team-member-details .team-member-name {
    font-size: 48px;
    margin-bottom: 10px;
    font-family: var(--font-heading);
}

.team-member-details .team-member-role {
    font-size: 18px;
    color: var(--primary-color);
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 25px;
}

.team-member-contact {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 25px;
}

.team-contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--text-color);
}

.team-contact-item i {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 50%;
    font-size: 14px;
}

.team-contact-item:hover {
    color: var(--primary-color);
}

.team-member-social {
    display: flex;
    gap: 10px;
}

.team-member-social a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--dark-color);
    color: var(--white);
    border-radius: 50%;
    transition: var(--transition);
}

.team-member-social a:hover {
    background: var(--primary-color);
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .team-member-profile {
        flex-direction: column;
    }

    .team-member-photo {
        width: 100%;
        max-width: 300px;
    }

    .team-member-details .team-member-name {
        font-size: 36px;
    }
}
</style>

<?php
get_footer();
