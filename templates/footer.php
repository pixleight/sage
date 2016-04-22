<?php if( is_active_sidebar( 'sidebar-mega-footer' ) ) : ?>
<footer class="mdl-mega-footer" role="contentinfo">
  <div class="mdl-mega-footer__middle-section">
    <?php dynamic_sidebar( 'sidebar-mega-footer' ); ?>
  </div>
</footer>
<?php endif; ?>

<?php if( is_active_sidebar( 'sidebar-mini-footer' ) ) : ?>
<footer class="mdl-mini-footer" role="contentinfo">
  <?php dynamic_sidebar( 'sidebar-mini-footer' ); ?>
</footer>
<?php endif; ?>
