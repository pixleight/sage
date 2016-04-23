<?php
if (post_password_required()) {
  return;
}
?>

<section id="comments" class="comments">
  <?php if (have_comments()) : ?>
    <h2 class="mdl-typography--title"><?php printf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?></h2>

    <ol class="comment-list mdl-list">
      <?php wp_list_comments(['style' => 'ol', 'short_ping' => true, 'class' => 'mdl-list__item']); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'sage'); ?>
    </div>
  <?php endif; ?>

  <?php
  /**
   * Comment form arguments
   */
  $args = array(
    'id_form'           => 'commentform',
    'class_form'      => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'      => 'submit mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent',
    'name_submit'       => 'submit',
    'title_reply'       => __( 'Leave a Reply' ),
    'title_reply_to'    => __( 'Leave a Reply to %s' ),
    'cancel_reply_link' => __( 'Cancel Reply' ),
    'label_submit'      => __( 'Post Comment' ),
    'format'            => 'xhtml',

    'comment_field' =>  '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <textarea class="mdl-textfield__input" type="text" rows= "3" id="comment" name="comment" aria-required="true"></textarea>
        <label class="mdl-textfield__label" for="comment">' . _x( 'Comment', 'noun' ) . '</label>
      </div>',

    'must_log_in' => '<p class="must-log-in">' .
      sprintf(
        __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
      ) . '</p>',

    'logged_in_as' => '<p class="logged-in-as">' .
      sprintf(
      __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
        admin_url( 'profile.php' ),
        $user_identity,
        wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
      ) . '</p>',

    'comment_notes_before' => '<p class="comment-notes mdl-typography--caption">' .
      __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
      '</p>',

    'comment_notes_after' => '<p class="form-allowed-tags mdl-typography--caption">' .
      sprintf(
        __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
        ' <code>' . allowed_tags() . '</code>'
      ) . '</p>',

    'fields' => array(

      'author' => '<div class="comment-field"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) .'" ' . $aria_req . ($req ? ' required' : '') . ' ">
        <label class="mdl-textfield__label" for="author">' . __( 'Name', 'sage' ) . '</label>
      </div></div>',

      'email' => '<div class="comment-field"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="email" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) .'" ' . $aria_req . ($req ? ' required' : '') . '">
        <label class="mdl-textfield__label" for="email">' . __( 'Email', 'sage' ) . '</label>
      </div></div>',

      'url' => '<div class="comment-field"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) .'" ' . $aria_req . ($req ? ' required' : '') . '">
        <label class="mdl-textfield__label" for="url">' . __( 'Website', 'sage' ) . '</label>
      </div></div>',

    ),
  );
  ?>

  <?php comment_form( $args ); ?>
</section>
