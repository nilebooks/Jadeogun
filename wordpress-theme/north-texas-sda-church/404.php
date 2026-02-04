<?php
/**
 * 404 Error Page Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404-section">
        <div class="container">
            <div class="error-404-content">
                <h1 class="error-404-title">404</h1>
                <h2 class="error-404-subtitle"><?php esc_html_e( 'Page Not Found', 'north-texas-sda-church' ); ?></h2>
                <p class="error-404-text"><?php esc_html_e( "Oops! The page you're looking for seems to have wandered off. Let's get you back on track.", 'north-texas-sda-church' ); ?></p>
                <div class="error-404-buttons">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Go Home', 'north-texas-sda-church' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-outline"><?php esc_html_e( 'Contact Us', 'north-texas-sda-church' ); ?></a>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
.error-404-section {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 100px 0;
}

.error-404-title {
    font-size: 180px;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.error-404-subtitle {
    font-size: 48px;
    margin-bottom: 20px;
}

.error-404-text {
    font-size: 18px;
    color: var(--text-light);
    margin-bottom: 40px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.error-404-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.error-404-buttons .btn-outline {
    border: 2px solid var(--dark-color);
    color: var(--dark-color);
}

.error-404-buttons .btn-outline:hover {
    background: var(--dark-color);
    color: var(--white);
}

@media (max-width: 768px) {
    .error-404-title {
        font-size: 100px;
    }
    
    .error-404-subtitle {
        font-size: 32px;
    }
    
    .error-404-buttons {
        flex-direction: column;
    }
}
</style>

<?php
get_footer();
